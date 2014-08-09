<?php
abstract class Nominal_Resource extends Nominal_Object
{   
   public static function className($class)
  {
    // Useful for namespaces: Foo\Nominal_Invoice
    if ($postfix = strrchr($class, '\\'))
    $class = substr($postfix, 1);
    if (substr($class, 0, strlen('Nominal')) == 'Nominal')
    $class = substr($class, strlen('Nominal'));
    $class = str_replace('_', '', $class);
    $name = urlencode($class);
    $name = strtolower($name);
    return $name;
  }
 
  protected static function _getBase($class, $method)
  {
    $args = array_slice(func_get_args(), 2);
    return call_user_func_array(array($class, $method), $args);
  }
 
  public static function classUrl($class=null) 
  {
    if (!$class)
    {
      $class = get_class($this);
    }
    $base = self::_getBase($class, 'className', $class);
    return "/${base}s";
  }

  public function instanceUrl() 
  {
    $id = $this->id;
    if (!$id) 
    {
      throw new Nominal_Error();
    }
    $class = get_class($this);
    $base = $this->classUrl($class);
    $extn = urlencode($id);
    return "$base/$extn";  
  }

  protected static function _find($class, $id) 
  {
    $instance = new $class($id);
    $requestor = new Nominal_Requestor();
    $url = $instance->instanceUrl();
    $response = $requestor->request('get', $url);
    $instance->loadFromArray($response);
    return $instance;
  }

  protected static function _create($class,$params) 
  {
    $requestor = new Nominal_Requestor();
    $url = self::classUrl($class);
    $response = $requestor->request('post', $url, $params);
    $instance = new $class();
    $instance->loadFromArray($response);
    return $instance;
  }

  protected function _delete($parent=null, $member=null) 
  {
    self::_customAction('delete', null, null);
    if (isset($parent) && isset($member)) {
      $obj = $this->$parent->$member;
      if (strpos(get_class($obj), "Nominal_Object") !== false) {        
        foreach ($this->$parent->$member as $k => $v) {
          if (strpos($v->id, $this->id) !== false) {
            $this->$parent->$member->_values = Nominal_Util::shiftArray($this->$parent->$member->_values,$k);
            $this->$parent->$member->loadFromArray($this->$parent->$member->_values);
            $this->$parent->$member->offsetUnset(count($this->$parent->$member)-1);
            break ;
          }
        }
      } else {
        unset($this->$parent->$member);
      }
    }
    return $this;
  }

  protected function _update($params) 
  {
    $requestor = new Nominal_Requestor();
    $url = $this->instanceUrl();
    $response = $requestor->request('put', $url, $params);
    $this->loadFromArray($response);
    return $this;
  }

  protected function _customAction($method='post', $action=null, $params=null) 
  {
    $requestor = new Nominal_Requestor();
    if (isset($action)) {
      $url = $this->instanceUrl() . '/' . $action;
    } else {
      $url = $this->instanceUrl();
    }
    $response = $requestor->request($method, $url, $params);
    $this->loadFromArray($response);
    return $this;
  }
}
?>