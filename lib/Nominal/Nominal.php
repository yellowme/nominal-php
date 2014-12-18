<?php
abstract class Nominal {
  public static $apiKey;
  public static $privateApiKey;
  public static $apiBase = 'http://api.nominal.dev:3000';
  public static $apiVersion = null;
  const VERSION = '1.0.0';

  /**
   * @return string The API key used for requests.
   */
  public static function getApiKey()
  {
    return self::$apiKey;
  }

  /**
   * Sets the API key to be used for requests.
   *
   * @param string $apiKey
   */
  public static function setApiKey($apiKey)
  {
    self::$apiKey = $apiKey;
  }

  /**
   * @return string The API key used for requests.
   */
  public static function getPrivateApiKey()
  {
    return self::$privateApiKey;
  }

  /**
   * Sets the API key to be used for requests.
   *
   * @param string $privateApiKey
   */
  public static function setPrivateApiKey($privateApiKey)
  {
    self::$privateApiKey = $privateApiKey;
  }

  /**
   * @return string The API version used for requests. null if we're using the
   *    latest version.
   */
  public static function getApiVersion()
  {
    return self::$apiVersion;
  }

  /**
   * @param string $apiVersion The API version to use for requests.
   */
  public static function setApiVersion($apiVersion)
  {
    self::$apiVersion = $apiVersion;
  }
}
?>