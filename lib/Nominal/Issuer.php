<?php
class Nominal_Issuer extends Nominal_Resource {
  public static function find($id) {
    $class = get_called_class();
    return self::_find($class, $id);
  }

  public static function create($params=null)
  {
    $class = get_called_class();
    return self::_create($class, $params);
  }

  public static function update($id, $params=null)
  {
    $class = get_called_class();
    return self::_update($class, $id, $params);
  }

  public static function all($params=null) {
    $class = get_called_class();
    return self::_where($class, $params);
  }
}
?>