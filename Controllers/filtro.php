<?php

require_once('../Models/consultauser.php');

$inst= new consultasusuario();
$empresa=$_POST['filtro'];
$estado='PENDIENTE';
$resultado=$inst->filtro($empresa,$estado);

echo $resultado;
//sleep(5);

?>