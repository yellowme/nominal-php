<?php
class Nominal_Error extends Exception
{
  public function __construct($message=null) {
    parent::__construct($message);
    $this->message = $message;
  }
  
  public static function errorHandler($response, $code) {
    $response = json_decode($response, true);
    $message = isset($response['message']) ? $response['message'] : null;
    $params = isset($response['param']) ? $response['param'] : null;
    if (isset($code) != true) {
      throw new Nominal_NoConnectionError("No connection", $code, $params);
    }
    switch ($code) {
      case 400:
        throw new Nominal_MalformedRequestError($message, $code, $params);
      case 401:
        throw new Nominal_AuthenticationError($message, $code, $params);
      case 404:
        throw new Nominal_ResourceNotFoundError($message, $code, $params);
      case 422:
        throw new Nominal_ParameterValidationError($message, $code, $params);
      case 500:
        throw new Nominal_ApiError($message, $code, $params);
      default:
        throw new Nominal_Error($message, $code, $params);
    }
  }
}

class Nominal_ApiError extends Nominal_Error {
}

class Nominal_NoConnectionError extends Nominal_Error {
}

class Nominal_AuthenticationError extends Nominal_Error {
}

class Nominal_ParameterValidationError extends Nominal_Error {
}

class Nominal_ProcessingError extends Nominal_Error {
}

class Nominal_ResourceNotFoundError extends Nominal_Error {
}

class Nominal_MalformedRequestError extends Nominal_Error {
}
?>