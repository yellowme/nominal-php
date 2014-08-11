<?php
class Nominal_Requestor {
  public $apiKey;
  
  public function __construct($apiKey=null) {
    $this->apiKey = Nominal::$apiKey;
    $this->privateApiKey = Nominal::$privateApiKey;
  }
  
  public static function apiUrl($url='') {
    $apiBase = Nominal::$apiBase;
    return "$apiBase$url";
  }
  
  private function setHeaders() {
    $objDateTime = new DateTime('NOW');
    $time = gmdate("c");
    $signature = base64_encode(hash_hmac('sha256', $time, $this->privateApiKey));

    $user_agent = array('bindings_version' => Nominal::VERSION,
    'lang' => 'php',
    'lang_version' => phpversion(),
    'publisher' => 'nominal',
    'uname' => php_uname());
    $headers = array(
      'Accept: application/vnd.nominal-v' . Nominal::$apiVersion . '+json',
      'X-Nominal-Client-User-Agent: ' . json_encode($user_agent),
      'User-Agent: Nominal/v1 PhpBindings/' . Nominal::VERSION,
      'x-nominal-date: ' . $time,
      'Authorization: Nominal ' . $this->apiKey . ':' . $signature);

    return $headers;
  }
  
  public function request($meth, $url, $params=null) {
    $params = self::encode($params);
    $headers = $this->setHeaders();
    $curl = curl_init();
    $meth = strtolower($meth);
    $opts = array();
    $query = "";
    if (count($params) > 0)
    {
      $query = '?'.$params;
    }
    switch($meth) 
    {
      case 'get':
        $opts[CURLOPT_HTTPGET] = 1;
        $url = $url.$query;
        break;
      case 'post':
        $opts[CURLOPT_POST] = 1;
        $opts[CURLOPT_POSTFIELDS] = $params;
        break;
      case 'put':
        $opts[CURLOPT_RETURNTRANSFER] = 1;
        $opts[CURLOPT_CUSTOMREQUEST] = 'PUT';
        $opts[CURLOPT_POSTFIELDS] = $params;
        break;
      case 'delete':
        $opts[CURLOPT_CUSTOMREQUEST] = 'DELETE';
        $url = $url.$query;
        break;
      default:
        throw new Exception('Wrong method');
    }
    $url = $this->apiUrl($url);
    $opts[CURLOPT_URL] = $url;
    $opts[CURLOPT_RETURNTRANSFER] = true;
    $opts[CURLOPT_CONNECTTIMEOUT] = 30;
    $opts[CURLOPT_TIMEOUT] = 80;
    $opts[CURLOPT_RETURNTRANSFER] = true;
    $opts[CURLOPT_HTTPHEADER] = $headers;
    $opts[CURLOPT_CAINFO] = dirname(__FILE__) . '/../data/ca-certificates.crt';
    curl_setopt_array($curl, $opts);
    $response = curl_exec($curl);
    $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if ($response_code != 200 && $response_code != 201) {
      Nominal_Error::errorHandler($response, $response_code);
    }
    return json_decode($response);
  }
  
  public static function encode($arr, $prefix=null) {
    if (!is_array($arr)) {
      return $arr;
    }
    $r = array();
    foreach ($arr as $k => $v) {
      if (is_null($v)) {
        continue;
      }

      if ($prefix && $k && !is_int($k)) {
        $k = $prefix."[".$k."]";
      }
      else if ($prefix) {
        $k = $prefix."[]";
      }

      if (is_array($v)) {
        $r[] = self::encode($v, $k, true);
      } else {
        if (is_bool($v)) {
          $v = $v ? 'true' : 'false';
        }
        $r[] = urlencode($k)."=".urlencode($v);
      }
    }
    return implode("&", $r);
  }
}
?>