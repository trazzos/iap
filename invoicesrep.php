<?php
//
require_once('./pdf/fpdf.php');
include_once('config.php');
include_once(DOC_ROOT.'/libraries.php');
//require(DOC_ROOT.'/libs/pdf/fpdi.php');
class PDFI extends FPDF
{
function cargando($lines)
{
    // Leer las líneas del fichero
     $this->SetFont('Arial','B',15);
   $this->Cell(10,7,count($lines),1,0,'C',true);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
}

function Header()
{
    // Logo
    $this->Image('./images/logos/iapcompleto.jpg',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Control de pagos',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

 function ordenar($fecha)
	   {
	   list($dia,$mes,$year) = explode("-",$fecha);
        $resultado=$year."-".$mes."-".$dia;	
       return $resultado;
	   	   
	   }
//VAMOS A IMPRIMIR LA FECHA
function imprimir_fecha($fecha){
      list($dia, $mes, $year) = explode("-",$fecha);
   
//   if($dia<10)
      //  $dia="0".$dia;
		          
			 
			 $cero="0";
             if($mes==$cero.'1')
             $mes='ENE';

             if($mes==$cero.'2')
             $mes='FEB';

             if($mes==$cero.'3')
             $mes='MAR';

             if($mes==$cero.'4')
             $mes='ABRIL';

              if($mes==$cero.'5')
              $mes='MAYO';

              if($mes==$cero.'6')
              $mes='JUN';

              if($mes==$cero.'7')
              $mes='JUL';

              if($mes==$cero.'8')
              $mes='AGOS';

              if($mes==$cero.'9')
              $mes='SEPT';

             if($mes=='10')
             $mes='OCT';

             if($mes=='11')
             $mes='NOV';

             if($mes=='12')
              $mes='DIC';
 
         $mensaje=$dia.'-'.$mes.'-'.$year;
     
return $mensaje;
}	   

// Tabla coloreada
function FancyTable($quees,$pagado,$status,$total,$header2,$header, $data,$nombre,$id_alumno,$control,$fecha_final,$invoiceId)
{
	 $this->Ln(); $this->Ln();
	 $fecha=date("d-m-y");
	 	 $pendiente=$total-$pagado;


	
         $this->SetFillColor(226,226,226);
			$this->SetTextColor(000);
			$this->SetDrawColor(128,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('Arial','B',10);
			
			
				$this->Cell(15,10,'',0);
						$this->Cell(165,10,$quees,'RLBT',0,'L',true);
						$this->Ln();
				$this->Cell(15,10,'',0);
					   // $this->Cell(30,10,'Id Alumno: '.$id_alumno,'RLT',0,'L',true);
						$this->Cell(55,10,'Num. Control: '.$control,'RLT',0,'L',true);
						$this->Cell(55,10,'Fecha limite de : '.$this->ordenar($fecha_final),'RLT',0,'L',true);
						$this->Cell(55,10,'Num Pago : '.$invoiceId,'RLT',0,'L',true);
						$this->Ln();
							$this->Cell(15,10,'',0);
						$this->Cell(165,10,'Nombre: '.$nombre,'RLBT',0,'L',true);
						
						
						
						
						

   $this->Cell(115,4,'',0,'R');
	
	$this->Ln();	 $this->Ln(); 
	
		$this->Ln();	 $this->Ln(); 
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(28,195,12);
    $this->SetTextColor(000);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
     $this->SetFont('Arial','B',24);
    
	   if($status=="Pagada")
	     {
		 	$this->Cell(85,10,'',0);
		    $this->Cell(85,10,'Pagada','RLT',0,'C',true);
				 $this->Ln(); 
			$this->SetFont('Arial','B',16);
			$this->Cell(85,10,'',0);
		    $this->Cell(85,10,'Total pagado: '."\$".$total,'RLB',0,'C',true);
		 }else{
		 
		         $this->SetFillColor(240,78,97);
			$this->SetTextColor(000);
			$this->SetDrawColor(128,0,0);
			$this->SetLineWidth(.3);
			$this->SetFont('Arial','B',24);
		 	
			$this->Cell(85,10,'',0);
		    $this->Cell(85,10,'Por Pagar','RLT',0,'C',true);
				 $this->Ln(); 
			$this->SetFont('Arial','B',16);
			$this->Cell(85,10,'',0);
		    $this->Cell(85,10,'Pendiente : '."\$".$pendiente,'RLB',0,'C',true);
		 
		 
		 }
		 
		 
	
		 
		 $this->Ln(); $this->Ln();
	// Cabecera
    $w = array(15,20, 20,20,25,30,35);
	
	$this->SetFont('Arial','B',12);
	$this->Cell(15,4,'',0);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],5,$header[$i],'RLT',0,'C',true);
    $this->Ln();

	$this->Cell(15,4,'',0);
	for($i=0;$i<count($header2);$i++)
        $this->Cell($w[$i],5,$header2[$i],'RL',0,'C',true);
    $this->Ln();
	
    // Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
   $this->SetFont('Arial','',8);
    // Datos
    $fill = false;
	
    foreach($data as $row)
    {
	     if($row[6]==NULL || $row[6]==''){
		      $row[6]="N/A";
		 }
	  
	    $this->Cell($w[0],6,'',0);
        $this->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
        $this->Cell($w[1],6,$this->imprimir_fecha($this->ordenar($row[1])),'LR',0,'C',$fill);
        $this->Cell($w[2],6,"\$".$row[2],'LR',0,'C',$fill);
        $this->Cell($w[3],6,"\$".$row[3],'LR',0,'L',$fill);
		$this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
		$this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
		$this->Cell($w[6],6,$row[6],'LR',0,'C',$fill);
	
		
        $this->Ln();
		
        $fill = !$fill;
    }
    // Línea de cierre
	$this->Cell(15,4,'',0);
    $this->Cell(array_sum($w),0,'','T');
	$this->Ln();
	$this->Cell(185,10,'Archivo PDF generado el '.$fecha,0,0,'C');
	    
}
}

$pdf = new PDFI();


$datos=array();
$invoiceId=$_GET['invoiceId'];
$paymentsdata = $payments->Config($invoiceId);
$payments->setInvoiceId($invoiceId);
$datos_user=$payments->InvoiceInfo();






$nombre_nombre=$util->ConvertStringToCSV($datos_user['name']);
$subjectId=$datos_user['subjectId'];
$subject->setSubjectId($subjectId);
$datos_subject=$subject->Enumerate_p();
$quees=$datos_subject['majorName']." ".$nombre_nombre;




$status=$datos_user['status'];
$nombre=$datos_user['lastNamePaterno']." ".$datos_user['lastNamePaterno']." ".$datos_user['names'];
$id_alumno=$datos_user['userId'];
$control=$datos_user['controlNumber'];
$fecha_final=$datos_user['dueDate'];



$invoicedata=$invoice->Config($invoiceId);
$total=$invoicedata['amount'];

 $datos=array();
 $pagado=0;
 $i=0;
 foreach($paymentsdata as $row)
 {
 $pagado=$row[3]+$pagado;
         if($i==0)
           {
		        $anticipo=0;
				$pago_ant=$row[3];
		   }else{
		
		          
		          
						$anticipo=$anticipo+$pago_ant;
				        $pago_ant=$row[3];
				  
				   
				   
		      }
     if($invoicedata['amount']>$row[3])
	   $saldo_favor=0;
	 else
	   $saldo_favor=$row[3]-$invoicedata['amount'];
	   
	   
	 
 // $datos[]=$row[0].";".$row[1].";".$row[2].";".$row[3].";".$row[8].";".$saldo_favor.";".$anticipo;
  $datos[]=$row[0].";".$row[1].";".$row[3].";".$row[8].";".$row[4].";".$row[5].";".$row[11];
 $i++;
 
 }
 
 $status=$datos_user['status'];
$nombre=$datos_user['lastNamePaterno']." ".$datos_user['lastNamePaterno']." ".$datos_user['names'];
$id_alumno=$datos_user['userId'];
$control=$datos_user['controlNumber'];
$fecha_final=$datos_user['dueDate'];

 
 

$data = $pdf->Cargando($datos);

// Títulos de las columnas
$header = array('Folio', 'Fecha', 'Importe', 'aplicado','Forma ','comentarios','Autorizacion');
$header2 = array('', '', ' Pago', '','de pago','','Bancaria');
// Carga de datos
//$data = array($paymentsdata, 'df', '3333', '2222');
$pdf->SetFont('Arial','',14);
$pdf->AddPage('P','Letter');

$pdf->FancyTable($quees,$pagado,$status,$total,$header2,$header,$data,$nombre,$id_alumno,$control,$fecha_final,$invoiceId);
$pdf->Output();
?>