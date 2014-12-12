<?php
class Nominal_Invoice extends Nominal_Resource {
  public static function find($id) {
    $class = get_called_class();
    return self::_find($class, $id);
  }

  public static function where($params=null) {
    $class = get_called_class();
    return self::_where($class, $params);
  }

  public static function create($params=null)
  {
    $class = get_called_class();
    return self::_create($class, $params);
  }

  public static function all($params=null) {
    $class = get_called_class();
    return self::_where($class, $params);
  }

  public static function stamp_xml($xml) {
    $class = get_called_class();
    $instance = new $class();
    $base = Nominal_Invoice::classUrl($class);
    $url = "$base/stamp_xml";
    $requestor = new Nominal_Requestor();
    $xml_enc = rawurlencode(base64_encode($xml));
    $params = "xml=" . $xml_enc;
    return $requestor->request('post', $url, $params);
  }

  public static function files($id) {
    $class = get_called_class();
    $instance = new $class($id);
    $base = Nominal_Invoice::classUrl($class);
    $extn = urlencode($id);
    $url = "$base/pdf/$extn";
    $requestor = new Nominal_Requestor();
    return $requestor->request('get', $url);
  }

  public static function sealXML($xml, $certificate_number, $certificate, $private_key){
    $private = openssl_pkey_get_private(file_get_contents($private_key));
    $certificado = str_replace(array('\n', '\r'), '', base64_encode(file_get_contents($certificate)));
    
    $xdoc = new DomDocument();
    $xdoc->loadXML($xml) or die("XML invalido");
    $XSL = new DOMDocument();
    $XSL->load('lib/data/sat/cadenaoriginal_3_2.xslt');
    $proc = new XSLTProcessor;
    $proc->importStyleSheet($XSL);
    $cadena_original = $proc->transformToXML($xdoc);    
    openssl_sign($cadena_original, $sig, $private);
    $sello = base64_encode($sig);
    $c = $xdoc->getElementsByTagNameNS('http://www.sat.gob.mx/cfd/3', 'Comprobante')->item(0); 
    $c->setAttribute('sello', $sello);
    $c->setAttribute('certificado', $certificado);
    $c->setAttribute('noCertificado', $certificate_number);
    return $xdoc->saveXML();
  }
}
?>