<?php
		require_once('../Models/listainfractores.php');
$inst = new  crud();


if(isset($_POST['tag']))

   try { 

   $resul=$inst->lista_pagados();
   if($resul->rowCount()>0)
   {
   	$json=array();
   	while($row=$resul->fetch()){
   		$json[]= array(
   			'cedula' =>$row['cedula'] ,
   			'nombre' =>$row['nombre'] ,
   			'empresa' =>$row['empresa'] 



   			 );
   	}
   	$json['success'] = true;
   	echo json_encode($json);
   }


      } catch (mysqli_sql_exception $e) { 
      echo "Erro: ".$e->getMessage();
   } 



?>