<?php
/**
* 
*/
class login_model
{
	private  $conexion;
	function __construct()
	{
		require('conexion.php');
		$this->conexion= new conexion();
		$this->conexion->conectar(); 
	}

	function editardatos($nombre,$tipo,$identificacion,$nom_ape,$id_user,$per){

	$sql="UPDATE  usuarios   set usuario='$nombre' , nombre_user='$nom_ape' , identificacion='$identificacion' , tipo='$tipo',permisos='$per' where  id_user='$id_user' ";


	 if($this->conexion->conexion->query($sql)){

	 	return true;

	 }else{
	 	return false;

	 }
	 $this->conexion->cerrar();

	}


	function eliminaruser($id){

		$sql="DELETE  FROM  usuarios WHERE id_user='$id' ";
		if($this->conexion->conexion->query($sql))
		{
			return true;

		}else{
			return false;

		}
		$this->conexion->cerrar();
	}




	function usuarios($user,$pass){
		$password=sha1($pass);

		$sql="SELECT *  FROM usuarios WHERE usuario='$user' && clave='$password'";

		$resul=$this->conexion->conexion->query($sql);
		
 		if($resul->num_rows>0){
 			$res=$resul->fetch_array();
 			

 		}else{
 			$res[0]=0;
 				

 		}
		
			return $res;
		}


		function listaUsuarios($buscar){
		if ($buscar=='') 
		{
			$sql="SELECT * FROM usuarios";
			$res=$this->conexion->conexion->query($sql);
			$array= array();
				while ($resul=$res->fetch_array()){

					$array[]=$resul;
					# code...
				}
				return $array;
				$this->conexion->cerrar();
				
		}else{
			$sql="SELECT *  FROM usuarios WHERE nombre_user like'$buscar'";
			$res=$this->conexion->conexion->query($sql);
			$array= array();
				while ($resul=$res->fetch_array()){

					$array[]=$resul;
					# code...
				}
				return $array;
				$this->conexion->cerrar();

			  }

		}




		  function ingresarUsuario($id,$usuario,$clave,$nombreApellido,$identificacion,$tipo,$permiso)
		  {
			$sql="INSERT  INTO usuarios VALUES('$id','$usuario','$clave','$nombreApellido','$identificacion','$tipo',$permiso)";

			if($this->conexion->conexion->query($sql)){
				return true;
			}else{
				return false;
			}

			$this->conexion->cerrar();
		  }


		    function contarusuarios(){

		    	$sql="SELECT *  FROM  usuarios";

		    	$res=$this->conexion->conexion->query($sql);

		    	  $contar=$res->num_rows;
		    	  return$contar;


		    }


		      function listuser($limit, $nroLotes ){

		      	$sql="SELECT * FROM usuarios LIMIT $limit, $nroLotes ";
		      		$registro=$this->conexion->conexion->query($sql);

		      			$tabla='';



		      			$tabla = $tabla.'<table id="tabla" class="table table-striped table-condensed table-hover">
			            <tr>
			                <th width="300">usuario</th>
			                <th width="200">Tipo</th>
			                <th width="150">identificacion</th>
			                <th width="150">Nombre y Apellidos</th>
			                 <th width="150">Permisos(1:activ,0:desact)</th>
			                
			            </tr>';

			            while($registro2 = $registro->fetch_array()){
				$tabla = $tabla.'<tr>
							<td>'.$registro2['usuario'].'</td>
							<td>'.$registro2['tipo'].'</td>
							<td>'.$registro2['identificacion'].'</td>
							<td>'.$registro2['nombre_user'].'</td>
							<td>'.$registro2['permisos'].'</td>

							
							<td><a href="'.$registro2['id_user'].'"  data-toggle="modal" data-target="#myModal" class=" editar glyphicon glyphicon-edit"></a> <a href="'.$registro2['id_user'].'"  data-toggle="modal"  data-target="#ventana" class=" eliminar glyphicon glyphicon-remove-circle"></a></td>
						  </tr>';		
	}

	$tabla = $tabla.'</table>';


	return $tabla;



		      }





	}



/*
	$ins= new login_model();
	$array=$ins->usuarios('javier','1234');
	
	echo $array[1];
	/*$ins= new login_model();
	if($ins->ingresarUsuario('','jose','12345','Jose  Adolfo Gomez','1085298221','invitado'))
	{
		echo'Se Ingreso  un Usuario';
	}else{
		echo 'ocurrio un error  con la   conexion';
	}*/
	
	//echo $array[0];


?>