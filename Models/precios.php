<?php 


class Precios 
{
private $conexion;

function __construct(){
require('conexion.php');
  	$this->conexion= new conexion();
  	$this->conexion->conectar();

}


	function ModicarPrecio($id,$valor){
		$sql="UPDATE precios_com set valor ='$valor 'WHERE id_precio='$id'";


		if($this->conexion->conexion->query($sql)){
			echo'La tarea  Se  realizo  con exito';
		}else{
			 echo'Tarea no realizada ';
		}

	}



	function listaprecios(){


		$sql="SELECT *  FROM precios_com ";
		$array='';

		 $res=$this->conexion->conexion->query($sql);
		  while ($respuesta=$res->fetch_array()) {
		  	$array[]=$respuesta;
		  }
		    return $array;

	}
}
 

 ?>