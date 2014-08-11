<?php
abstract class Nominal_Util
{
  public static $types = array(
    'invoice' => 'Nominal_Invoice',
    'issuer' => 'Nominal_Issuer',
    'receptor' => 'Nominal_Receptor',
    'branch' => 'Nominal_Branch',
  );
}
?>