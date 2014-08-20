<?php
class Nominal_IssuerTest extends NominalTest {

  public $cer_file = 'test/certs/AAD990814BP7/aad990814bp7.cer';
  public $key_file = 'test/certs/AAD990814BP7/aad990814bp7.key';
      
  public function testSuccesfulCreateAndFindIssuer()
  {
    $valid_issuer = array(
      'name' => 'Empresa',
      'rfc' => 'AAD990814BP7',
      'person_type' => 'moral',
      'email' => 'admin@admin.com',
      'regime' => 'RÉGIMEN GENERAL DE LEY PERSONAS MORALES',
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
    //$issuer = Nominal_Issuer::create($valid_issuer);
    //$found = Nominal_Issuer::find($issuer->id);
    //echo $issuer->id;
    //$this->assertEquals($issuer->rfc, $found->rfc);
  }

  public function testSuccesfulFindAll()
  {
    //$issuers = Nominal_Issuer::all();
    //foreach ($issuers->issuers as &$issuer) {
    //  $this->assertNotNull($issuer->id);
    //}
    //$this->assertEquals($issuers->meta->total, count($issuers->issuers));
  }

  public function testSuccesfulFind()
  {
    //$id = "39ba91365fe86ce5a10b28a7";
    //$issuer = Nominal_Issuer::find($id);
    //$this->assertEquals($id, $issuer->id);
  }
  
}
?>