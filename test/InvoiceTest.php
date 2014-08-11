<?php
include 'NominalTest.php';
class Nominal_InvoiceTest extends NominalTest {

  public static $valid_invoice = array(
    'issuer_id' => 'b4a077307fba43a337a04be1',
    'receptor_id' => 'fd09f0adbff6745b0a835957', //7cbc06824645c3d3f9eca580  9b0c50e6a7f7c41416c42630
    'concepts' => [array(
      'description' => 'pues una panzita',
      'quantity' => '1',
      'unit' => 'no aplica',
      'quantity' => '1',
      'unit_value' => 150.00,
      'amount' => 150.00,
    )],
  );

  public function testSuccesfulFindInvoice()
  {
    $id = "8c1548e7057f672d7b401f68";
    $invoice = Nominal_Invoice::find($id);
    $this->assertEquals($id, $invoice->id);
  }

  public function testSuccesfulCreateInvoice()
  {
    //$invoice = Nominal_Invoice::create(self::$valid_invoice);
    //$this->assertNotNull($invoice->id);
  }

  public function testSuccesfulFindAll()
  {
    $invoices = Nominal_Invoice::all();
    foreach ($invoices->invoices as &$invoice) {
      $this->assertNotNull($invoice->id);
    }
    $this->assertEquals($invoices->meta->total, count($invoices->invoices));
  }
}
?>