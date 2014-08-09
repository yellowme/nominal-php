<?php
class Nominal_IssuerTest extends NominalTest {

  public $cer_file = 'test/certs/AAD990814BP7/aad990814bp7.cer';
  public $key_file = 'test/certs/AAD990814BP7/aad990814bp7.key';
      
  public function testSuccesfulCreateIssuer()
  {
    $valid_issuer = array(
      'name' => 'Empresa',
      'rfc' => 'AAD990814BP7',
      'person_type' => 'Some desc',
      'email' => 'admin@admin.com',
      'regime' => 'Persona moral',
      'serie' => '',
      'initial_folio' => '1',
      'private_key_password' => '12345678a',
      'fiscal_address' => array(
        'street' => 'calle 1',
        'locality' => 'merida',
        'municipality' => 'merida',
        'state' => 'yucatan',
        'country' => 'Mexico',
        'postal_code' => '11211',
      ),
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
    );
    $issuer = Nominal_Issuer::create($valid_issuer);
    $this->assertTrue(strpos(get_class($issuer), "Nominal_Issuer") !== false);
  }
  public function testSuccesfulFindIssuer()
  {
    //$issuer = Nominal_Issuer::find("3796fba145cb02c8b003ce2c");
    //$this->assertTrue(strpos(get_class($issuer), "Nominal_Issuer") !== false);
  }
}
?>