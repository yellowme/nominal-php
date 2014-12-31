<?php

// Load Nominal lib
require_once(dirname(__FILE__) . '/../lib/Nominal.php');

abstract class NominalTest extends PHPUnit_Framework_TestCase { 
  protected function setUp()
  {
    $apiEnvKey = 'b7d1dfc55e10a4ca61b4da95cd238';
    Nominal::setApiKey($apiEnvKey);
    $privateApiEnvKey = 'b2ee1c38fdf0607ab2da67bc34d0d';
    Nominal::setPrivateApiKey($privateApiEnvKey);
  }
}
?>
