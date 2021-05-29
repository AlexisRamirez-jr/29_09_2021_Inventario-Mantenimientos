<?php

		require_once "../../../controladores/ventas.controlador.php";
		require_once "../../../modelos/ventas.modelo.php";

		require_once "../../../controladores/clientes.controlador.php";
		require_once "../../../modelos/clientes.modelo.php";

		require_once "../../../controladores/usuarios.controlador.php";
		require_once "../../../modelos/usuarios.modelo.php";

		require_once "../../../controladores/productos.controlador.php";
		require_once "../../../modelos/productos.modelo.php";


		

		class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "id";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);
		$id = $respuestaVenta["id"];
		$matricula = $respuestaVenta["matricula"];
        $tipo = $respuestaVenta["tipo"];
        $modelo = $respuestaVenta["modelo"];
        $anio = $respuestaVenta["anio"];
        $preciocompra =number_format($respuestaVenta["precioadquisicion"], 2);
        $fechacompra = substr($respuestaVenta["fechaadquirido"],0,10);
        $fecharegistro = substr($respuestaVenta["fecharegistro"],0,-8);
    //    $precioTotal = number_format($item["fechaadquirido"], 2);
        //   $valorUnitario =json_decode($respuestaVenta["matricula"]);
       //    $valorCliente = $respuestaVenta["tipo"];
	
		 

		// Include the main TCPDF library (search for installation path).
		require_once('tcpdf_include.php');

//foreach ($respuestaVenta as $key => $item) {

  		//$fecha = substr($item["fecharegistro"],0,-8);
      //  $matricula = $item["matricula"];
//$valorUnitario = number_format($item["precio"], 2);

//$precioTotal = number_format($item["total"], 2);

//}

		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Jorge & Martinez');
		$pdf->SetTitle('Reporte del vehiculo');
		//$pdf->SetSubject('TCPDF Tutorial');
		//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 005', PDF_HEADER_STRING);

		// set header and footer fonts
		//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		    require_once(dirname(__FILE__).'/lang/eng.php');
		    $pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('times', '', 10);

		// add a page
		$pdf->AddPage();
		$titulo = '       DETALLES  DEL  VEHICULO       ';
		$pdf->SetFillColor(220, 235, 235);
		$pdf->SetFont('helvetica', '', 14);

		// Vertical alignment
		$pdf->MultiCell(180, 10, ''.$titulo, 1, 'J', 1, 1, '', '', true, 0, false, true, 40, 'T');
		//$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - MIDDLE] '.$txt, 1, 'J', 1, 0, '', '', true, 0, false, true, 40, 'M');
		//$pdf->MultiCell(55, 40, '[VERTICAL ALIGNMENT - BOTTOM] '.$txt, 1, 'J', 1, 1, '', '', true, 0, false, true, 40, 'B');
		$pdf->Ln(8);
			

		// set cell padding
		$pdf->setCellPaddings(1, 1, 1, 1);

		// set cell margins
		$pdf->setCellMargins(1, 1, 1, 1);

		// set color for background
		$pdf->SetFillColor(255, 255, 127);

		// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

		// set some text for example
		
		$txt = '';
		$prueba = 'AÑO';

		$pdf->Ln(4);
		// set color for background
		
		$pdf->SetFillColor(220, 255, 220);
		$pdf->SetFont('helvetica', '', 12);
		// Multicell test


		$pdf->MultiCell(89, 5, '    CODIGO REGISTRO: '.$txt, 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(89, 5, ' '.$id,  1, '', 0, 1, '', '', true);
		$pdf->Ln(4);

		$pdf->MultiCell(89, 5, '    MATRICULA: '.$txt, 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(89, 5, ' '.$matricula,  1, '', 0, 1, '', '', true);
		//$pdf->MultiCell(55, 5, '[CENTER] '.$txt, 1, 'C', 0, 0, '', '', true);
		//$pdf->MultiCell(55, 5, '[JUSTIFY] '.$txt."\n", 1, 'J', 1, 2, '' ,'', true);
		//$pdf->MultiCell(55, 5, '[DEFAULT] '.$txt, 1, '', 0, 1, '', '', true);

		$pdf->Ln(4);
		$pdf->MultiCell(89, 5, '    TIPO: '.$txt, 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(89, 5, ' '.$tipo,  1, '', 0, 1, '', '', true);
		//$pdf->MultiCell(55, 5, '[CENTER] '.$txt, 1, 'C', 0, 0, '', '', true);
		//$pdf->MultiCell(55, 5, '[JUSTIFY] '.$txt."\n", 1, 'J', 1, 2, '' ,'', true);
		//$pdf->MultiCell(55, 5, '[DEFAULT] '.$txt, 1, '', 0, 1, '', '', true);
		$pdf->Ln(4);
		$pdf->MultiCell(89, 5, '    MODELO: '.$txt, 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(89, 5, ' '.$modelo,  1, '', 0, 1, '', '', true);

		$pdf->Ln(4);
		$pdf->MultiCell(89, 5, '    AÑO: '.$txt, 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(89, 5, ' '.$anio, 1, '', 0, 1, '', '', true);


		$pdf->Ln(4);
		$pdf->MultiCell(89, 5, '    PRECIO: '.$txt, 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(89, 5, ' '.$preciocompra,  1, '', 0, 1, '', '', true);


		$pdf->Ln(4);
		$pdf->MultiCell(89, 5, '    FECHA ADQUIRIDO: '.$txt, 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(89, 5, ' '.$fechacompra,  1, '', 0, 1, '', '', true);

		$pdf->Ln(4);
		$pdf->MultiCell(89, 5, '    INGRESO AL SISTEMA: '.$txt, 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(89, 5, ' '.$fecharegistro,  1, '', 0, 1, '', '', true);
		//$pdf->Ln(4);

	
		//$pdf->SetFillColor(220, 255, 220);
		//$pdf->MultiCell(55, 40, '[--] '.$prueba, 0, 'J', 1, 1, '', '', true, 0, false, true, 40, 'T');
	
		//$pdf->Ln(4);
		

		// set color for background
		//$pdf->SetFillColor(215, 235, 215);

		// set some text for example
		//$txt = ' Informacion del vehiculo.

		//';

		// print a blox of text using multicell()
		//$pdf->MultiCell(80, 5, $txt."\n", 1, 'J', 1, 1, '' ,'', true);
		//$pdf->Ln(4);

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// AUTO-FITTING

		// set color for background
	//	$pdf->SetFillColor(255, 235, 235);

		// Fit text on cell by reducing font size
	//	$pdf->MultiCell(55, 60, '[FIT CELL] '.$txt."\n", 1, 'J', 1, 1, 125, 145, true, 0, false, true, 60, 'M', true);

		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

		// CUSTOM PADDING

		// set color for background
	//	$pdf->SetFillColor(255, 255, 215);

		// set font
	//	$pdf->SetFont('helvetica', '', 8);

		// set cell padding
	//	$pdf->setCellPaddings(2, 4, 6, 8);

		//$txt = "CUSTOM PADDING: Left=2, Top=4, Right=6, Bottom=8 Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue.\n";

		//$pdf->MultiCell(55, 5, $txt, 1, '', 1, 2, 125, 210, true);

		// move pointer to last page
		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('detallesvehiculo.pdf', 'I');

}

}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>