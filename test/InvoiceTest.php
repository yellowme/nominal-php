<?php
include 'NominalTest.php';
class Nominal_InvoiceTest extends NominalTest {

  public function testSuccesfulFindInvoice()
  {
    //$id = "0bc4d6d415c165d5570a2464";
    //$invoice = Nominal_Invoice::find($id);
    //var_dump($invoice);
    //$this->assertEquals($id, $invoice->id);
  }

  public function testSuccesfulCreateInvoice()
  {
    $valid_invoice = array(
      'issuer_id' => '4cb956a2f11d6cc89c7b43de',
      'receptor_id' => 'c3c7d3a90eb2fc9ad1fed49d',
      'api_reference' => '1',
      'concepts' => [array(
        'description' => 'pues una panzita',
        'quantity' => '1',
        'unit' => 'no aplica',
        'unit_value' => 160.00,
        'amount' => 160.00,
      )],
    );
    //$invoice = Nominal_Invoice::create($valid_invoice);
    //echo $invoice->id;
    //$this->assertNotNull($invoice->id);
  }

  public function testSuccesfulFindAll()
  {
    //$invoices = Nominal_Invoice::all();
    //foreach ($invoices->invoices as &$invoice) {
    //  $this->assertNotNull($invoice->id);
    //}
    //$this->assertEquals($invoices->meta->total, count($invoices->invoices));
  }

  public function testSuccesfulFind()
  {
    //$id = "e5a4ca14f37c1eaf8147b6b9";
    //$invoice = Nominal_Invoice::find($id);
    //var_dump($invoice);
    //$this->assertEquals($id, $invoice->id);
  }

  public function testSuccesfulFindReference()
  {
    //$id = "1";
    //$invoice = Nominal_Invoice::find($id);
    //var_dump($invoice);
    //$this->assertEquals($id, $invoice->api_reference);
  }

}
?>