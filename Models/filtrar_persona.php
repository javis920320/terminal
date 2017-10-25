<?php 
 class persona{


 function __construct(){
require('conexion.php');
  	$this->conexion= new conexion();
  	$this->conexion->conectar();

}

  function consultapersona($ide){

	  	//$sql="SELECT cedula,nombre,empresa,orden_infraccion,estado FROM datos_infractor where cedula='$ide' and estado='PENDIENTE'";
	  	$sql="SELECT * FROM datos_infractor where cedula='$ide' and estado='PENDIENTE'";


	 $res =	$this->conexion->conexion->query($sql);


	 return $res;


  	
  }

  function cantidaprecio($id)
{

$sql="SELECT sum(precio) FROM datos_infractor WHERE estado='PENDIENTE' AND cedula='$id'";

  $resultado= $this->conexion->conexion->query($sql);

  //return$resultado;

  /*while ($e=$resultado->fetch_array()) {

    $r[]=$e;
  }*/

    return $resultado;  

}


 }



 ?>