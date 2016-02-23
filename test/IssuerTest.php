<?php
include 'NominalTest.php';
class Nominal_IssuerTest extends NominalTest {

  public $cer_file = 'test/files/certs/AAD990814BP7/aad990814bp7.cer';
  public $key_file = 'test/files/certs/AAD990814BP7/aad990814bp7.key';
  public $logo_file = 'test/files/logo.png';
  
  public function testSuccesfulCreateAndFindIssuer()
  {
    $valid_issuer = array(
      'name' => 'Empresa',
      'rfc' => 'AAD990814BP7',
      'person_type' => 'moral',
      'regime' => 'RÉGIMEN GENERAL DE LEY PERSONAS MORALES',
      'certificate' => array(
        'file_data' => base64_encode(file_get_contents($this->cer_file)),
        'filename' => basename($this->cer_file),
        'content_type' => mime_content_type($this->cer_file),
      ),
      'private_key' => array(
        'file_data' => base64_encode(file_get_contents($this->key_file)),
        'filename' => basename($this->key_file),
        'content_type' => mime_content_type($this->key_file),
      ),
      'private_key_password' => '12345678a',
      'logo' => array(
        'file_data' => base64_encode(file_get_contents($this->logo_file)),
        'filename' => basename($this->logo_file),
        'content_type' => mime_content_type($this->logo_file),
      ),
    );
    //$response = Nominal_Issuer::create($valid_issuer);
    //$find_response = Nominal_Issuer::find($response->issuer->id);
    //$this->assertEquals($response->issuer->id, $find_response->issuer->id);
  }

  public function testSuccesfulUpdate()
  {
    $id = "4cb956a2f11d6cc89c7b43de";
    $name = "Empresa 234";
    $valid_issuer = array(
      'name' => $name,
    );
    //$response = Nominal_Issuer::update($id, $valid_issuer);
    //$find_response = Nominal_Issuer::find($id);
    //$this->assertEquals($name, $find_response->issuer->name);
  }

  public function testSuccesfulFind()
  {
    $id = "4cb956a2f11d6cc89c7b43de";
    $response = Nominal_Issuer::find($id);
    var_dump($response);
    $this->assertEquals($id, $response->issuer->id);
  }
  
}
?>