<?php
abstract class Nominal_Util
{
  public static $types = array(
    'invoice' => 'Nominal_Invoice',
    'issuer' => 'Nominal_Issuer',
    'receptor' => 'Nominal_Receptor',
    'branch' => 'Nominal_Branch',
  );
  
  public static function convertToNominalObject($resp)
  {
    $types = self::$types;
    if (is_array($resp)) 
    {
      if (isset($resp['object']) && is_string($resp['object']) && isset($types[$resp['object']]))
      {
        $class = $types[$resp['object']];
        $instance = new $class();
        $instance->loadFromArray($resp);
        return $instance;
      }
      if (current($resp)) {
        $instance = new Nominal_Object();
        $instance->loadFromArray($resp);
        return $instance;
      }
      return new Nominal_Object();
    } 
    return $resp;
  }
  
  public static function shiftArray($array, $k) {
    unset($array[$k]);
    end($array);
    $lastKey = key($array);
    
    for ($i = $k; $i < $lastKey; ++ $i) {
      $array[$i] = $array[$i+1];
      unset($array[$i+1]);
    }
    
    return $array;
  }
}
?>