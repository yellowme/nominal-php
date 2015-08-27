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

  public function testSuccesfulCreateInvoiceFromJSON()
  {
    $valid_invoice = array(
      'issuer' => array(
        'id' => 'c777346a768c37168bf925c8',
        'address' => array(
          'street' => 'calle',
          'exterior_number' => '3232',
          'interior_number' => '3',
          'neighborhood' => 'francisco montejo',
          'locality' => 'localidad',
          'reference' => 'a la vuelta',
          'municipality' => 'municipio',
          'state' => 'quintana roo',
          'country' => 'mexico',
          'postal_code' => '12345',
        )
      ),
      'receptor' => array(
        'name' => 'GENERICO',
        'rfc' => 'AAD990814BP2',
        'email' => 'admin@admin.com',
        'phone' => '818181818',
        'address' => array(
          'street' => 'calle',
          'exterior_number' => '3232',
          'interior_number' => '3',
          'neighborhood' => 'francisco montejo',
          'locality' => 'localidad',
          'reference' => 'a la vuelta',
          'municipality' => 'municipio',
          'state' => 'quintana roo',
          'country' => 'mexico',
          'postal_code' => '12345',
        )
      ),
      'folio' => '2',
      'subtotal' => '10',
      'total' => '11.60',
      'expedition_place' => 'Cancun',
      'concepts' => [array(
        'description' => 'pues una panzita',
        'quantity' => '1',
        'unit' => 'no aplica',
        'unit_value' => 160.00,
        'amount' => 160.00,
      )],
      'tax' => array(
        'transfers' => [array(
          'tax' => 0,
          'rate' => 16.00,
          'amount' => 160.00,
        )],
      ),
    );
    //$response = Nominal_Invoice::create($valid_invoice);
    //var_dump($response);
    //$this->assertNotNull($response->invoice->id);
  }

  public function testSuccesfulDelete()
  {
    //$id = "1";
    //$response = Nominal_Invoice::delete($id);
    //$this->assertEquals('220', $response->code);
  }

  public function testSuccesfulFiles()
  {
    //$id = 'c226e02900792f0f7e2d0b83';
    //$invoice = Nominal_Invoice::files($id);
    //var_dump($invoice);
  }

  public function testSuccesfulStampXML()
  {
    //$certificate_number = "20001000000200000293";
    //$certificate = "test/files/certs/AAD990814BP7/aad990814bp7.cer";
    //$private_key = "test/files/certs/AAD990814BP7/aad990814bp7.key.pem";
    //$xml = $this->buildXML();
    //$xml = Nominal_Invoice::sealXML($xml, $certificate_number, $certificate, $private_key);
    //$invoice = Nominal_Invoice::stamp_xml($xml);
    //var_dump($invoice);
  }

  public function testSuccesfulCancel()
  {
    //$id = "851319adf6852bc0941a34a9";
    //$invoice = Nominal_Invoice::cancel($id);
    //var_dump($invoice);
    //$this->assertEquals($id, $invoice->id);
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

  public function buildXML(){
    $fecha_actual = substr( date('c'), 0, 19);
    $cfdi = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<cfdi:Comprobante xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv32.xsd" xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xs="http://www.w3.org/2001/XMLSchema" version="3.2" fecha="$fecha_actual" tipoDeComprobante="ingreso" noCertificado="" certificado="" sello="" formaDePago="Pago en una sola exhibición" metodoDePago="Transferencia Electrónica" NumCtaPago="No identificado" LugarExpedicion="MERIDA" subTotal="10.00" total="11.60">
<cfdi:Emisor nombre="EMPRESA DEMO" rfc="AAD990814BP7">
  <cfdi:RegimenFiscal Regimen="No aplica"/>
</cfdi:Emisor>
<cfdi:Receptor nombre="PUBLICO EN GENERAL" rfc="XAXX010101000"></cfdi:Receptor>
<cfdi:Conceptos>
  <cfdi:Concepto cantidad="1" unidad="NO APLICA" descripcion="PERAS Y MANZANAS" valorUnitario="1.00" importe="10.00">
  </cfdi:Concepto>  
</cfdi:Conceptos>
<cfdi:Impuestos totalImpuestosTrasladados="1.60">
  <cfdi:Traslados>
    <cfdi:Traslado impuesto="IVA" tasa="16.00" importe="1.6"></cfdi:Traslado>
  </cfdi:Traslados>
</cfdi:Impuestos>
</cfdi:Comprobante>
XML;
    return $cfdi;
  }

}

?>