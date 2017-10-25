<?php 

include('../fpdf/fpdf.php');
class PDF extends FPDF
  {


         function Header()
        {
         

         $this->SetXY(0,15); 
          /*$this->SetY(15);
          $this->SetX(0);*/

        // Select Arial bold 15
          $this->SetFont('Arial','',7);
          // Move to the right
          $this->Cell(20);
          // Framed title
          $this->Image('../Resources/img/LOGO TERMINAL.png',20,20,-350);

          $this->Cell(40,30 ,'',1,0,'C');
           $this->SetXY(60,15); 
           $this->Cell(90,18,'TERMINAL DE  TRANSPORTES DE',1,0,'C');

           $this->SetXY(60,16); 
           $this->Cell(100,25,'PASTO  S.A',0,0,'C');
           $this->SetXY(60,17); 
            $this->Cell(100,30,'Nit. 800.057.019-7',0,0,'C');
            $this->SetXY(60,33); 
            $this->SetFont('Arial','B',10);
            $this->Cell(90,12,'CONSULTA PERSONAL',1,0,'C');
             $this->SetXY(150,15); 
             $this->Cell(50,18,'OFICINA JURIDICA',1,0,'C');
             $this->SetFont('Arial','B',6);
             $this->SetXY(150,33);
             $this->Cell(50,5,'VERSION 0-2010',1,0,'C');
             $this->SetXY(150,38);
             $this->Cell(50,7,'CODIGO:TTP-JUR- 309-02',1,0,'C');

           

          // Line break
          $this->Ln(20); 
        }

         function Footer()
        {
            // Go to 1.5 cm from bottom
            $this->SetY(-40);
            // Select Arial italic 8
           
            $this->SetFont('Arial','B',8);
            // Print centered page number
            $this->Cell(50,15,' ELABORADO POR :SGC',1,0,'C');
            $this->Cell(50,15,' REVISADO POR:GERENTE',1,0,'C');
            $this->Cell(50,15,' APROBADO POR:GERENTE',1,0,'C');
            $this->Cell(40,15,'',1,0,'C');
            $this->Image('../Resources/img/v.png',170,259,-220);

          $this->ln(25);


            $this->Cell(0,10,'Page '.$this->PageNo(),0,1,'C');
        }



  }


if ($_GET['iden']) {

   require_once('../Models/filtrar_persona.php');

   $ins= new persona();

  $datos= $ins->consultapersona($_GET['iden']);
  $r='';

  $echo='LISTA DE COMPARENDOS PENDIENTES';
  $pdf=  new PDf();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(15,1,$echo,0,0,'L');
    $pdf->Ln(8);

  
$pdf->Cell(25, 8, 'Identificacion', 1);
//$pdf->Cell(40, 8, 'Empresa', 1);
$pdf->Cell(75, 8, 'Nombres ', 1);
$pdf->Cell(15, 8, 'Orden', 1);
$pdf->Cell(15, 8, 'Cod_inf', 1);
$pdf->Cell(25, 8, 'Precio', 1);
$pdf->Cell(25, 8, 'Estado', 1);

  $pdf->Ln(8);
  
  
  while ($p=$datos->fetch_array()) {
  	 
  	$pdf->cell(25,8,$p['cedula'],1);
  	$pdf->cell(75,8,$p['nombre'],1);
  	//$pdf->cell(65,8,$p['empresa'],1);
  	$pdf->cell(15,8,$p['orden_infraccion'],1);
    $pdf->cell(15,8,$p['codigo_infraccion'],1);

  	$pdf->cell(25,8,$p['precio'],1);
  	$pdf->cell(25,8,$p['estado'],1);
  	$pdf->Ln(8);
  }
  # code...

  $pdf->Ln(8);
  $pdf->Cell(35, 8, 'Valor Acumulado:', 1);
  $v=$ins->cantidaprecio($_GET['iden']);

  while ($l=$v->fetch_array()) {
  $dat=(float)$l[0];
   

   $pdf->cell(35,8,'$'.$dat,1);
 }

  //$pdf->Cell(35, 8, 'Valor Acumulado:', 1);
  ;
}
    $pdf->Output();


 ?>