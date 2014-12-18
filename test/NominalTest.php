<?php

// Load Nominal lib
require_once(dirname(__FILE__) . '/../lib/Nominal.php');

abstract class NominalTest extends PHPUnit_Framework_TestCase { 
  protected function setUp()
  {
    $apiEnvKey = 'fe864290d465bd13788ba34c6b896';
    Nominal::setApiKey($apiEnvKey);
    $privateApiEnvKey = 'ffdfc69acdb906e57abe142374767';
    Nominal::setPrivateApiKey($privateApiEnvKey);
  }
}
?>
