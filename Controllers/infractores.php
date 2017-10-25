     <?php require_once('../Models/listainfractores.php');

			
$id='';
//echo $fecha;
$fecha=$_POST['fecha'];
if($fecha <'2014-08-01'){
	$cod_infraccion=$_POST['codigo_infraccion'];
	


if($cod_infraccion<=15){
	$precio=28000;

}else if($cod_infraccion>15 & $cod_infraccion <=24){
	$precio=35000;

}elseif ($cod_infraccion>24 ) {
	$precio=42000;
	# code...
}

$cedula=$_POST['cedula'];
			$nombre=$_POST['nombres'];
			$id_empresa=$_POST['empresa'];
			require_once('../Models/empresas.php');
			$insta= new empresas();
			$em=$insta->empresalist($id_empresa);
			$empresa=$em[0][0];

			$cargo=$_POST['cargo'];
			if(empty($_POST['placa'])){
				$placa='Sin  Registro';
			}else{
			$placa=$_POST['placa'];	
			}

			
			$No_interno=$_POST['numero_interno'];
			$orden_infraccion=$_POST['orden_infraccion'];
			$fecha=$_POST['fecha'];
			$cod_infraccion=$_POST['codigo_infraccion'];

			
			//$precio=$_POST['lst_pre'];
			$codigofn=$_POST['codigo_funcionario'];

			$nomfunc=$_POST['nombre_funcionario'];
			$estado=$_POST['estado'];
			$observacion='';

}
else{

			$cedula=$_POST['cedula'];
			$nombre=$_POST['nombres'];
			
			$id_empresa=$_POST['empresa'];
			require_once('../Models/empresas.php');
			$insta= new empresas();
			$em=$insta->empresalist($id_empresa);
			$empresa=$em[0][0];

			$cargo=$_POST['cargo'];
			if(empty($_POST['placa'])){
				$placa='Sin  Registro';
			}else{
			$placa=$_POST['placa'];	
			}

			
			$No_interno=$_POST['numero_interno'];
			$orden_infraccion=$_POST['orden_infraccion'];
			$fecha=$_POST['fecha'];
			$cod_infraccion=$_POST['codigo_infraccion'];

			
			$precio=$_POST['lst_pre'];
			$codigofn=$_POST['codigo_funcionario'];

			$nomfunc=$_POST['nombre_funcionario'];
			$estado=$_POST['estado'];
			$observacion='';

}




$inst = new crud();
                    

if($inst->ingresar($id,$nombre,$cedula,$empresa,$cargo,$placa,$No_interno,$orden_infraccion,$fecha,$cod_infraccion,$precio,$codigofn,$nomfunc,$estado ,$observacion))

            {
              echo'infractor ingresado';

            }
              else{
              	
                echo'infractor  no ingresado';


                  }






     ?>