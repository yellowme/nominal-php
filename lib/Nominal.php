<?php

// Tested on PHP 5.5
if (!function_exists('curl_init')) {
  throw new Exception('Nominal needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Nominal needs the JSON PHP extension.');
}
if (!function_exists('mb_detect_encoding')) {
  throw new Exception('Nominal needs the Multibyte String PHP extension.');
}

// Nominal singleton
require(dirname(__FILE__) . '/Nominal/Nominal.php');

// Utilities
require(dirname(__FILE__) . '/Nominal/Util.php');

// Errors
require(dirname(__FILE__) . '/Nominal/Error.php');

// Plumbing
require(dirname(__FILE__) . '/Nominal/Object.php');
require(dirname(__FILE__) . '/Nominal/Requestor.php');
require(dirname(__FILE__) . '/Nominal/Resource.php');

// Nominal API Resources
require(dirname(__FILE__) . '/Nominal/Invoice.php');
require(dirname(__FILE__) . '/Nominal/Issuer.php');

?>