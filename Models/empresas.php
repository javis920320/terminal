<?php 


class empresas
{
	private $conexion;
	function __construct()
	{
		 include('conexion.php');
		 $this->conexion=new conexion();
		 $this->conexion->conectar();
	}
	 function listaempresas(){

	 	$sql="SELECT *  FROM empresas ORDER BY nom_empresa";


	 	$result=$this->conexion->conexion->query($sql);

	 	while ($res=$result->fetch_array()) {
	 		$arreglo[]=$res;
	 	}

	 	return $arreglo;
	 }

	  function empresalist($id_empresa){

		$sql="SELECT  nom_empresa FROM empresas WHERE id_empresa='$id_empresa'";

		$resp=$this->conexion->conexion->query($sql);

		while($r=$resp->fetch_array()){

			$p[]=$r;
		}

		return $p;
	  }
}

/*$ins= new empresas();
$resp=$ins->empresalist(1);
//print_r($resp);
echo$resp[0][0];*/

 ?>
