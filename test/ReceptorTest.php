<?php
class Nominal_ReceptorTest extends NominalTest {

  public function testSuccesfulCreateAndFindReceptor()
  {
    $valid_receptor = array(
      'name' => 'Generico',
      'rfc' => 'XAXX010101000',
      'email' => 'admin@admin.com',
      'issuer_id' => '4cb956a2f11d6cc89c7b43de',
      'address' => array(
        'country' => 'México',
      ),
    );
    //$receptor = Nominal_Receptor::create($valid_receptor);
    //$found = Nominal_Receptor::find($receptor->id);
    //echo $found->id;
    //$this->assertEquals($receptor->id, $found->id);
  }

  public function testSuccesfulFindAll()
  {
    //$receptors = Nominal_Receptor::all();
    //var_dump($receptors);
    //foreach ($receptors->receptors as &$receptor) {
    //  $this->assertNotNull($receptor->id);
    //}
    //$this->assertEquals($receptors->meta->total, count($receptors->receptors));
  }

  public function testSuccesfulFind()
  {
    //$id = "6d783c6ae2196d5ca4efb530";
    //$receptor = Nominal_Receptor::find($id);
    //$this->assertEquals($id, $receptor->id);
  }

  public function testSuccesfulDelete()
  {
    //$id = "5e6dfa55e53a598acb3fb535";
    //Nominal_Receptor::delete($id);
    //try {
    //  $receptor = Nominal_Receptor::find($id);
    //  $this->assertEquals($id, "");
    //} catch (Nominal_ResourceNotFoundError $e) {
    //}
  }
}
?>