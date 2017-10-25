<?php
include_once('../Models/listainfractores.php');
$estado=$_POST['estado'];
$id=$_POST['id_exonerar'];
$ins= new crud();
if($ins->exonerar($id,$estado)){
  echo'Se  a  Realizado  Los   Cambios   Satisfactoriamente';
}else{
 
  echo'No  se  Ha  podido  Realizar  cambios   Intente  De nuevo';
}

  //echo 'Se  Va   a   realizar   cambios   a '.$id.'  con  estado = '.$estado.''; 


?>