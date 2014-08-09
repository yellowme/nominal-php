<?php
include 'NominalTest.php';
class Nominal_InvoiceTest extends NominalTest {

  public static $valid_invoice = array(
    'issuer_id' => 'd070ede1ce28828808a28d71',
    'receptor_id' => 'c39f991109cbf8eb096c3233',
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
    //$invoice = Nominal_Invoice::find("eeeafbaf1dbe636c2d549afd");
    //$this->assertTrue(strpos(get_class($invoice), "Nominal_Invoice") !== false);
  }

  public function testSuccesfulCreateInvoice()
  {
    //$invoice = Nominal_Invoice::create(self::$valid_invoice);
    //$this->assertTrue(strpos(get_class($invoice), "Nominal_Invoice") !== false);
  }
}
?>