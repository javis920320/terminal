<?php 

if (isset($_POST['dato'])) {

	include('../Models/empresas.php');
	$ins= new empresas();
	$resp=$ins->listaempresas();
	echo json_encode($resp);
}


 ?>