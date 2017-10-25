
<?php

require_once('../Models/listainfractores.php');
require_once('../Models/empresas.php');

$i= new empresas();
				$cc=$_POST['cc'];
				$nom=$_POST['nom'];

				
				$e=$i->empresalist($_POST['empresa']);
				$emp=$e[0][0];

				$car=$_POST['car'];
				$num_in=$_POST['num_in'];
				$ordinf=$_POST['ordinf'];
				$fch=$_POST['fch'];
				$cod_infra=$_POST['cod_infra'];
				$codigofn=$_POST['codfn'];


				$precio=$_POST['lst_pre'];
			

				
				$id=$_POST['id'];

				if(empty($_POST['pla'])){
					$pla='No  hay Registro';
				}else{
				$pla=$_POST['pla'];	
				}
				
				
$inst= new  crud();

if($inst->update($cc,$nom,$emp,$car,$pla,$num_in,$ordinf,$fch,$cod_infra,$precio,$codigofn,$id))
{

echo 'Has  modificado  un  Registro';

}else{
	echo 'No se  Ha  podido   Actualizar  el  dato';
}

//echo "los  datos   recibidos   son".$cc.' _'.$nom.'_'.$emp.'_'.$car.'_'.$pla.'_'.$num_in.'_'.$fch.'_'.$ordinf.'_'.$cod_infra.'_'.$codigofn.'_'.$nomfunci;




?>