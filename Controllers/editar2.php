<?php
include_once('../Models/listainfractores.php');
if(isset($_POST['cc']) && isset($_POST['nom']) && isset($_POST['car']) && isset($_POST['fch']) && isset($_POST['cod_infra'])&& isset($_POST['nom_funci']) && isset($_POST['obs']) && isset($_POST['id'])){
				$cc=$_POST['cc'];
				$nom=$_POST['nom'];
				$emp=$_POST['emp'];
				$car=$_POST['car'];
				$fch=$_POST['fch'];
				$cod_infra=$_POST['cod_infra'];
				$nomfunci=$_POST['nom_funci'];
				$id=$_POST['id'];
				$obs=$_POST['obs'];


//echo' Los    datos   son('.$cc.')('.$nom.')('.$emp.')('.$car.')('.$fch.')('.$cod_infra.')('.$nomfunci.')('.$id;
				$ins=  new crud();
				if($ins->updateAnul($cc,$nom,$emp,$car,$fch,$cod_infra,$nomfunci,$obs,$id)){
						echo 'SE  HAN   REALZADO  LOS   CAMBIOS  SATISFACTOREAMENTE ';
				}else{
						echo 'NO SE  HA  PODIDO    REALIZAR  LA  TAREA';
				}
			

}else  if(isset($_POST['cc']) && isset($_POST['nom']) && isset($_POST['emp'])&& isset($_POST['car']) && isset($_POST['pla']) && isset($_POST['num_in'])&& isset($_POST['ordinf']) && isset($_POST['fch']) && isset($_POST['cod_infra']) && isset($_POST['nom_funci']) && isset($_POST['id'])){

       			$cc=$_POST['cc'];
				$nom=$_POST['nom'];
				$emp=$_POST['emp'];
				$car=$_POST['car'];
				$pla=$_POST['pla'];
				$num_in=$_POST['num_in'];
				$fch=$_POST['fch'];
				$ordinf=$_POST['ordinf'];
				$cod_infra=$_POST['cod_infra'];
				$nom_funci=$_POST['nom_funci'];
				$id=$_POST['id'];


				$ins= new   crud();
				if ($ins->updatePagados($cc,$nom,$emp,$car,$pla,$num_in,$fch,$ordinf,$cod_infra,$nom_funci,$id)) {
					# code...

					echo'LOS  CAMBIOS   SE  HAN  REALIZADO  SATISFACTOREAMENTE';
				}else{
					echo'NO SE  HA  PODIDO   REALIZAR  LOS   CAMBIOS ';

				}


}else{
		echo "No   han  llegado  las   variables";

}


?>