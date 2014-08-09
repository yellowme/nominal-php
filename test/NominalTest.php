<?php

// Load Nominal lib
require_once(dirname(__FILE__) . '/../lib/Nominal.php');

abstract class NominalTest extends PHPUnit_Framework_TestCase { 
  protected function setUp()
  {
    $apiEnvKey = 'fe6aa268d6f19459ce5185b614def';
    Nominal::setApiKey($apiEnvKey);
    $privateApiEnvKey = 'fd2a226bc1c173812104e7df61324';
    Nominal::setPrivateApiKey($privateApiEnvKey);
  }
}
?>