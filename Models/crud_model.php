<?php

	class Crud
	{
		private  $conexion;
		function __construct()
		{
			require('conexion.php');
			$this->conexion= new conexion();
			$this->conexion->conectar();
			# code...
		}

		 function contarregistros(){

			$sql="SELECT * FROM usuarios ";



				$res=$this->conexion->conexion->query($sql);

				if( $result=$res->num_rows)
					{
		 			return $result;
					}else{
						return 0;
				}


			 }




	}

	/*$ins= new Crud();
	 $res=$ins->contarregistrosp();
	 echo $res;
	 */

?>