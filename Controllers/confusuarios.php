<?php
include('../models/login_model.php');
$ins=new  login_model();
if(isset($_POST['usuario'])&& isset($_POST['tipo'])&& isset($_POST['id'])&& isset($_POST['nom_ape'])&& isset($_POST['id_user']))
{
	$nombre=$_POST['usuario'];
	$tipo=$_POST['tipo'];
	$identificacion=$_POST['id'];
	$nom_ape=$_POST['nom_ape'];
	$id_user=$_POST['id_user'];
	$radio=$_POST['perm'];




	
	if($ins->editardatos($nombre,$tipo,$identificacion,$nom_ape,$id_user,$radio))
	{
		echo'Se ha  Modificado  correctamente los datos';

	}else{
		echo'No se a podido  modificar el registro';
	}

}else if(isset($_POST['id_delet'])){

	//$ins=new  login_model();
	$id=$_POST['id_delet'];
	if($ins->eliminaruser($id)){
		echo "Se elimino  correctamente el usuario";
	}
	else{
		echo'Error  no se a logrado eliminar el usuario';
	}

}else{
	echo'Variables no definidas';
}

?>