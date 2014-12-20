<?php

// Load Nominal lib
require_once(dirname(__FILE__) . '/../lib/Nominal.php');

abstract class NominalTest extends PHPUnit_Framework_TestCase { 
  protected function setUp()
  {
    $apiEnvKey = 'b75ab614259b2cb6d4f27ae3524da';
    Nominal::setApiKey($apiEnvKey);
    $privateApiEnvKey = 'b793fd0d7c6dfe12a817c4b461641';
    Nominal::setPrivateApiKey($privateApiEnvKey);
  }
}
?>
