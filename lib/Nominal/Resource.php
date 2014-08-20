<?php
abstract class Nominal_Resource
{   

  public function __construct($id=null)
  {
    $this->id = $id;
  }

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

  protected static function _where($class, $params) 
  {
    $requestor = new Nominal_Requestor();
    $url = self::classUrl($class);
    return $requestor->request('get', $url, $params);
  }

  protected static function _find($class, $id) 
  {
    $instance = new $class($id);
    $requestor = new Nominal_Requestor();
    $url = $instance->instanceUrl();
    return $requestor->request('get', $url);
  }

  protected static function _create($class,$params) 
  {
    $requestor = new Nominal_Requestor();
    $url = self::classUrl($class);
    return $requestor->request('post', $url, $params);
  }

  protected static function _delete($class,$id) 
  {
    $instance = new $class($id);
    $requestor = new Nominal_Requestor();
    $url = $instance->instanceUrl();
    return $requestor->request('delete', $url);
  }

}
?>