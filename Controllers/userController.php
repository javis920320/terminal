<?php
include('../models/login_model.php');
include('../models/crud_model.php');
if(isset($_POST['buscar'])){
	$buscar=$_POST['buscar'];
	
///include('../models/conexion1.php');

	   

		$paginaActual=$_POST['principal'];//pagina actual
		$nroLotes=5;

		$ins= new login_model();

		$nroProductos = $ins->contarusuarios();//mysql_num_rows(mysql_query("SELECT * FROM usuarios"));
		  $nroPaginas = ceil($nroProductos/$nroLotes);
		  $lista = '';
    	  $tabla = '';
		//$ins= new login_model();

		//$res=$ins->listaUsuarios($buscar);

if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:listausuario('.($paginaActual-1).');">Anterior</a></li>';
    }
     for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:listausuario('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:listausuario('.$i.');">'.$i.'</a></li>';
        }
    }

    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:listausuario('.($paginaActual+1).');">Siguiente</a></li>';
    }
    if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}
  	$tabla = $ins->listuser($limit, $nroLotes );//mysql_query("SELECT * FROM usuarios LIMIT $limit, $nroLotes ");


  
 $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);


		//echo json_encode($res);


	}else if(isset($_POST['identificacion'] )&& isset($_POST['nombreApellido']) && isset($_POST['usuario']) && isset($_POST['clave']) && isset($_POST['tipouser'])){
		
		$identificacion=$_POST['identificacion'];
		$nombreApellido=$_POST['nombreApellido'];
		$usuario=$_POST['usuario'];
		$clave1=$_POST['clave'];
		$clave=sha1($clave1);
		$tipouser=$_POST['tipouser'];
		$id='';

		$ins = new login_model();
		if($ins->ingresarUsuario($id,$usuario,$clave,$nombreApellido,$identificacion,$tipouser,0)){
			 echo'Usuario registrado  correctamente';
		}else{
			echo'Usuario  no   registrado';
		}
		
	}else if (isset($_POST['valor'])){
		$valor=$_POST['valor'];
		
		$ins= new Crud();
		if($ins->validarid($valor)){
			echo 1;
		}else{
			echo 0;
		}


	}else{
		echo'variables no  definidas';
	}

?>