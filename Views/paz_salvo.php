<?php

//utf8_decode();
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
            $this->Cell(90,12,'PAZ Y SALVO',1,0,'C');
             $this->SetXY(150,15); 
             $this->Cell(50,18,'OFICINA JURIDICA',1,0,'C');
             $this->SetFont('Arial','B',6);
             $this->SetXY(150,33);
             $this->Cell(50,5,'VERSION 0-2010',1,0,'C');
             $this->SetXY(150,38);
             $this->Cell(50,7,'CODIGO:TTP-JUR- 309-02',1,0,'C');

           

          // Line break
          $this->Ln(20); 
           

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
 // paz_salvo.php?nomp='+nomp+'&idp='+idp+'&nomrp='+nomrp+'&idrp='+idrp+'&crp='+crp);
  date_default_timezone_set('UTC');
  $mm=date('m');
$meses = array(   '1' => 'Enero ',
                  '2' => 'Febrero ',
                  '3' => 'Marzo ',
                  '4' =>'Abril ',
                  '5' => 'Mayo ',
                  '6' =>'Julio ',
                  '7' => 'Agosto ',
                  '8' =>'Septiembre',
                  '9' =>'Octubre ',
                  '10' =>'Noviembre',
                  '11' =>  'diciembre');

   $val=intval($mm);

$fecha= $d=date('d').' de '. $meses[$val].' de '.$y=date('Y');

$nombres=$_GET['nomp'];
$cedula=$_GET['idp'];// cambiar  por  el dato   get
$html='LA SUSCRITA JEFE DE OFICINA JURIDICA DEL';
$echo='TERMINAL DE TRANSPORTES DE PASTO S.A';
$echo1='CERTIFICA QUE: ';

$escribir=utf8_decode('Identificado con cedula  de  ciudadanía  No '.$cedula.' se encuentra a  PAZ Y SALVO y sin registros en la');
$escribir1=utf8_decode('base de datos  de SANCIONES PENDIENTES de la Terminal de transportes de  Pasto S.A. ');
$escribir2=utf8_decode('');



 // encuentra a  PAZ Y SALVO y sin registros  en la  base de datos  de SANCIONES PENDIENTES de la Terminal de transportes de  Pasto S.A.');

 $ejemplo=utf8_decode('Este paz y salvo se anulara cuando el usuario infrinja el Manual Operativo Vigente de la Sociedad Terminal');
 $ejemplo1=utf8_decode('de Transportes de Pasto, y no tendrá valides para excusar informes de infracción realizados con una anter-');
 $ejemplo2=utf8_decode('ioridad de quince (15) días hábiles a la fecha de su elaboración, ya que dentro de este término se respetara ');
 $ejemplo3=utf8_decode('el proceso de descargos, descuentos y traslados del Área Técnica a la Oficina Jurídica.');


 /*   descuentos y traslados del Área Técnica a la Oficina Jurídica.
');*/

$parrafo='Para constancia se firma en San Juan de Pasto,el '.utf8_decode('día  ').$fecha.'.';
$responsable='YAMILE  REVELO DEL VALLE';
$cargo='JEFE OFICINA JURIDICA';
$t='S.T.T.P';

$a="<strong>Hola Mundo</strong>";

  $pdf=  new PDf();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',10);
   $pdf->SetXY(70,50); 
  $pdf->Cell(70,20,$html,0,0,'C');
  $pdf->ln(3);
   $pdf->Cell(190,30,$echo,0,0,'C');
   $pdf->ln(20);
   $pdf->Cell(195,30,$echo1,0,0,'C');
   $pdf->ln(30);
 
    $pdf->SetFont('Arial','B',12);
    $pdf->SetXY(75,105);
    
    $pdf->Write(5,$nombres);
    $pdf->SetFont('Arial','I',10);
     $pdf->SetXY(25,120);
     $pdf->Write(5,$escribir);
     $pdf->SetXY(25,125);
     $pdf->Write(5,$escribir1);
     $pdf->SetXY(25,130);
     $pdf->Write(5,$escribir2);


    
      $pdf->SetXY(25,135); 
     $pdf->Write(5,$ejemplo);
     $pdf->SetXY(25,140); 
     $pdf->Write(5,$ejemplo1);
     $pdf->SetXY(25,145); 
     $pdf->Write(5,$ejemplo2);
     $pdf->SetXY(25,150); 
     $pdf->Write(5,$ejemplo3);
      //$pdf->SetXY(25,125); 

     $pdf->SetXY(25,160); 
     $pdf->Cell(225,30,$parrafo,0,0,'L');

      $pdf->SetXY(0.05,200);
      $pdf->SetFont('Arial','B',10);


     $pdf->Cell(225,30,$responsable,0,0,'C');
    
      $pdf->SetXY(0.05,203);
      $pdf->SetFont('Arial','B',10);
     $pdf->Cell(225,35,$cargo,0,0,'C');
      $pdf->SetXY(0.05,205);
      $pdf->SetFont('Arial','B',10);
     $pdf->Cell(225,40,$t,0,0,'C');
    $pdf->Output();



/*



*/


  ?>