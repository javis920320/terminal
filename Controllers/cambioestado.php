<?php

include('../Models/listainfractores.php');

if( isset($_POST['estado']) && isset($_POST['observacion']) && isset($_POST['id_anul'])){

		$estado=$_POST['estado'];

		$obs=$_POST['observacion'];

		$id=$_POST['id_anul'];
		$inst = new crud();

		
		if($inst->anular($estado,$obs,$id)){
  			echo'Se  a  Realizado  Los   Cambios   Satisfactoriamente';
			//return $respuesta;
		}else{
			echo"no se  puedo  realizar  cambios  del  sistema ";
			//return $respuesta;
		}


	
			}else if ( isset($_POST['estado'])  && isset($_POST['id_infractor'])){

					$estado=$_POST['estado'];

					$id=$_POST['id_infractor'];
					$obs='';
					   $ins= new crud();
					   if($ins->anular($estado,$obs,$id)){
					   		echo'SE  HA   REALIZADO  LOS   CAMBIOS ';
					   }else{
					   	echo'HA  OCURRIDO  UN  ERROR ';

					   }


				}else{



				echo 'variables   no definidas';



	}

		//<?php echo $resul  
		
		?>