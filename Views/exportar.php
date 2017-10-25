<?php


require('../FPDF/fpdf.php');
/**
$
* 
*/

//require('../Models/conexion2.php');


class PDF extends FPDF
{
// Cabecera de página



function Header()
{
	
    // Logo
    $this->Image('../Resources/img/LOGO TERMINAL.png',10,8,33);
     $this->Ln(20);

    // Arial bold 15
    $this->SetFont('Arial','B',11);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'REGISTRO DE  INFRACCIONES - BASE  DE   DATOS   TERMINAL',0,2,'C');
    $this->Cell(30,11,'Pasto',0,2,'C');
     
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'  Page '.$this->PageNo().'/{nb}',0,0,'C');

    $this->Ln(1);

    $this->Cell(0,10,'',0,'C');

}
}







if(strlen($_GET['dato'])){

$var=$_GET['dato'];
//$var1='aqui  esta';
//$sql="SELECT *  FROM datos_infractor WHERE empresa='$var' AND  estado='pendiente'";

 require_once('../Models/consultauser.php');
 $inst=  new consultasusuario();
 $resultado=$inst->exportar($var);
 $arreglo=$inst->cantidaprecio($var);

  //echo  $resultado;

 //echo  'paso  algo';


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',9);
$pdf->Cell(10,8,'REGISTRO  DE  INFRACCIONES   '.$var,'C');
$pdf->ln();
$pdf->Cell(15, 8, 'N', 1);
$pdf->Cell(70, 8, 'Nombre', 1);
//$pdf->Cell(40, 8, 'Empresa', 1);
$pdf->Cell(25, 8, 'Cedula', 1);
$pdf->Cell(25, 8, 'N.orden', 1);
$pdf->Cell(25, 8, 'Precio', 1);
$pdf->Cell(25, 8, 'Fech. Registro', 1);
$pdf->Ln(8);
$item=0;
//$i=70;
  while($fila=$resultado->fetch_array()){
  	$item=$item+1;
  	//$i=$i+$i;


  	$pdf->cell(15,8,$item,1);
 	$pdf->Cell(70,8,$fila['nombre'],1);
 	//$pdf->Cell(40,8,$fila['empresa'],1);
 	$pdf->cell(25,8,$fila['cedula'],1);
 	$pdf->cell(25,8,$fila['orden_infraccion'],1);
  $pdf->cell(25,8,$fila['precio'],1);
 	$pdf->cell(25,8,$fila['fecha_infra'],1);
 	$pdf->Ln(8);


 }

 while ($arr=$arreglo->fetch_array()) {
  $dat=(float)$arr[0];
   

   $pdf->cell(50,8,'   VALOR ACUMULADO :'.$dat,1);
 }


	# code...


/*?$pdf->Cell(0,8,$var,'C');
for($i=1;$i<=20;$i++)
    $pdf->Cell(0,10,$var.$i,0,1);*/
$pdf->Output('REPORTE  '.$var.'.pdf','i');




}else{ 
	
	$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(0,8,'No OBTUVO   NIGUN   VALOR ','C');
for($i=1;$i<=20;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
$pdf->Output();
	
	//echo "no   esta llegando las   variables";
}	

// Creación del objeto de la clase heredada



    ?>