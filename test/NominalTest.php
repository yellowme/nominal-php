<?php

// Load Nominal lib
require_once(dirname(__FILE__) . '/../lib/Nominal.php');

abstract class NominalTest extends PHPUnit_Framework_TestCase { 
  protected function setUp()
  {
    $apiEnvKey = 'fc4f112f2a1272ab0f4dc42e97567';
    Nominal::setApiKey($apiEnvKey);
    $privateApiEnvKey = 'f282f482b4c36203a80341ce8d945';
    Nominal::setPrivateApiKey($privateApiEnvKey);
  }
}
?>