<?php

// Load Nominal lib
require_once(dirname(__FILE__) . '/../lib/Nominal.php');

abstract class NominalTest extends PHPUnit_Framework_TestCase { 
  protected function setUp()
  {
    $apiEnvKey = 'f0f69797bd74948979daa9e4a0749';
    Nominal::setApiKey($apiEnvKey);
    $privateApiEnvKey = 'fc519f4332533f6dec05a3c7723cb';
    Nominal::setPrivateApiKey($privateApiEnvKey);
  }
}
?>