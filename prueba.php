<?php 



if(isset($_POST["validar"])) 

{ 


// capturamos los datos en una variable desde la caja de texto de nuestro formulario 

	


$fecha=$_POST["fechas"]; 
echo $fecha;
$fecha2=date("d-m-Y",strtotime($fecha));



//usamos la funcion explode y ponemos como cortador / 

$partes= explode("-", $fecha2); 




//vemos si la fecha es correcta recuerden que aki la funcion es mes/dia/año 
//pero en la caja de texto dia/mes/año para no complicar al usuario  

If (checkdate ($partes[0],$partes[1],$partes[2])) 
{ 

	if($partes[2]<=2014){

		$faltaLeve='5000';
		$faltaGrave='6000';
		$faltaGravisima='5000';


	}else if ($partes[2]<=2017){
			$faltaLeve='6000';
			$faltaGrave='8000';
			$faltaGravisima='9000';

	}

	echo "la  infraccion  corresponde  al año :".$partes[2]."el  precio  es  de  : ".$faltaGrave;
//echo "La fecha es correcta".$partes[0].$partes[1].$partes[2]; 
} 


} 
?> 
<html> 
<head> 
</head> 
<body> 
<form method="post" action="prueba.php" > 
<input type="date" name="fechas" /> 
<input type="submit" value="Validar Fecha" name="validar" /> 
</form> 
</body> 
</html> 



