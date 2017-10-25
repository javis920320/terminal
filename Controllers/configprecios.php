<?php 


if (isset($_POST['dato'])) {

	
 	include('../Models/precios.php');
 	$resp='';
 	$inst= new Precios();
 	$resp=$inst->listaprecios();
 	echo json_encode($resp);
 }else if( isset($_POST['lista'])){

 include('../Models/precios.php');
 	$resp='';
 	$inst= new Precios();
 	$resp=$inst->listaprecios();
 	echo json_encode($resp);

 } else if( isset($_POST['txtprecio']) && isset($_POST['id_precio']) ){
 	include('../Models/precios.php');
 	$resp='';
 	$inst= new Precios();
 	$resp=$inst->ModicarPrecio($_POST['id_precio'],$_POST['txtprecio']);
 	echo $resp;

 }else{

 	echo'Variables  indefinidas';
 }


 ?>