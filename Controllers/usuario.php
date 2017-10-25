<?php
	
	require_once('../Models/usuario.php');
	
		if($_POST['boton']=='cerrar'){

		 	session_start();
			session_destroy();
            header('Location:../Views/index.php');

 }else{
 		 $ins = new login_model();
		 $user=$_POST['email'];
		 $pass=$_POST['password'];
	
//email

		$array=$ins->usuarios($user,$pass);
		 if($array[0]==0){
		 	//echo 'usuario  no encontrado intentelo   nuevamente';

		 
		 	session_start();
			session_destroy();
            header('Location:../Views/index.php');

		 }else if($array[5]=='Administrador'){

		 	session_start();
		 	$_SESSION['ingreso']='YES';
		 	$_SESSION['nombre']=$array[3];
		 	$_SESSION['cargo']=$array[5];
		 	header('Location:../Views/viewAdmin.php');
		 }else if ($array[5]=='invitado') {
		 	# code...
		 	if($array[6]==0){

		 			session_start();
				 	$_SESSION['ingreso1']='YES';
				 	$_SESSION['nombre']=$array[3];
				 	$_SESSION['cargo']=$array[5];
				 	header('Location:../Views/viewforane.php');
			}else{


		 	

		 	session_start();
		 	$_SESSION['ingreso1']='YES';
		 	$_SESSION['nombre']=$array[3];
		 	$_SESSION['cargo']=$array[5];
		 	header('Location:../Views/principal.php');
		 	}
		 }else{
		 	echo 'Ocurro un error  en el sistema  por   Favor  comunicate  con el desarrollador';
		 }


 }
	
	//}



?>