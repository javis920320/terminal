<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'){


		require_once('../Models/listainfractores.php');
		$search='';
		
		if( isset($_POST['search']) &&  empty($_POST['search'])){

		$buscar='anulado';
		//$buscar = rtrim ($search);
		$imprimir = new crud();
		
		$lista=$imprimir->lista_anulados($buscar);


		}else if(isset($_POST['search']) &&  !empty($_POST['search'])){

				$search=$_POST['search'];
				$buscar = rtrim ($search);
				$imprimir = new crud();
				$lista=$imprimir->lista_anulados($buscar);


		}else{
			
			$buscar='anulado';
			$imprimir = new crud();
			$lista=$imprimir->lista_anulados($buscar);
		}
        



//$inst = new  crud();
//$lista=$inst->lista_anulados();

?>



<!DOCTYPE html>

<html>
	
	<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
     <link rel="stylesheet" href="../Resources/css/dataTables.css">
     <link rel="shortcut icon" href="../Resources/img/favicon.ico">
     <link href="../Resources/css/flat-ui.css" rel="stylesheet">
    <link href="../Resources/css/demo.css" rel="stylesheet">

    <link rel="stylesheet" href="../Resources/css/estilo.css">
  <title>Control de  infracciones   Administrador</title></head>
	<body>



		<div class='navbar navbar-default' >
		<div  class='container-fluid'>
			<div  class='navbar-header'>
				<a class='navbar-brand'href='viewAdmin.php'>
					<img alt'Brand' width='200' height='50' src='../Resources/img/LOGO TERMINAL.png'></img>
						</a>
					
			</div>


<div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog
"><?php echo $_SESSION['nombre']; ?></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a></li>
                        <li><a  href='configprecios.php'>Configuracion de  precios </a></li>
                     
                    </ul>
                </li>
                
            </ul>
        </div>

		</div>

	
	</div>
		
		<ul class="nav nav-tabs">

		  <li role="presentation" ><a href="viewAdmin.php">Home</a></li>
		  <li role="presentation" class="active"><a href="lista_Anulados.php">Lista  Anulados</a></li>
		  <li role="presentation"><a href="listaPagados.php">Lista  Pagados</a></li>
	</ul>


	<div  class=' modal fade'id="formedit" tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	<div class="modal-dialog"  role='document'>
		<div class="modal-content">
			<div class="modal-header">
				<button  type='button' class="close" data-dismiss='modal' aria-label='close' >
					<span aria-hidden='true'>&times;</span></button>
					<h4 class="modal-title" id='myModalLabel'>Actualizar  Datos</h4>
			</div>

				<div class="modal-body">
				<!--++++++++++++++++++++++++FORMULARIO DE   ACTUALIZACION++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

				<form action=""id='formUpdate'  class='form'title='Ingreso  Infractores'><br>
     				
     				<br>
     				<input type="text" id='id' name='id' class='hide'>
     				<label for=""> Cedula:<br> <input name='cc' id='cc'type="text"pattern="^[0-9]+$" title='POR FAVOR INGRESA  SOLO  NUMEROS' class='form-control' placeholder='Numero Cedula'required></label>
						&nbsp	&nbsp	&nbsp 	&nbsp 	&nbsp 	&nbsp<label for=""> Nombre:<br><input name='nom' id='nom' type="text"  pattern="[a-zA-ZÑÁÉÍÓÚáéíóú][a-zA-Zñáéíóú ]{1,}" title='POR FAVOR INGRESE  SOLO  CARACTERES' class='form-control'placeholder='Nombre  Infractor' required></label> <br>




						<label for="">Empresa: <br>
						<select name="emp" id="emp" class='form-control' required="true">
							<option  selected value="">Nombre de  Empresas</option>
										<option value="AUTO PANAMERICANA">AUTO PANAMERICANA</option>
										<option value="COOCHACHAGUI">COOCHACHAGUI</option>
										<option value='EXPRESO BOLIVARIANO'>EXPRESO  BOLIVARIANO</option>
										<option value="COTAXLUJO">COTAXLUJO</option>
										<option value="COOTAXTUQUERRES">COOTAXTUQUERRES</option>
										<option value="COOTRANSCUMBAL">COOTRANSCUMBAL</option>
										<option value="COOTAXTAMBO">COOTAXTAMBO</option>
										<option value="TRANSTIMBIO">TRANSTIMBIO</option>
										<option value="EXPRESOJUANAMBU">EXPRESOJUANAMBU</option>
										<option value="COOPEXTAN">COOPEXTAN</option>
										<option value="COOTRANSIBUNDOY">COOTRANSIBUNDOY</option>
										<option value="COOTRASTAN">COOTRASTAN</option>
										<option value="COOTRANSCOL">COOTRANSCOL</option>
										<option value="COOTRANDES">COOTRANDES</option>	
										<option value="TRANSOCEANICA">TRANSOCEANICA</option>
										<option value="SUPERTAXIS">SUPERTAXIS</option>
										<option value="FLOTA GUAITARA">FLOTA GUAITARA</option>
										<option value="TRANSNEIRA">TRANSNEIRA</option>
										<option value="EXPRESO  SAN  JUAN DE  PASTO">EXPRESO  SAN  JUAN DE  PASTO</option>
										<option value="RUTAS DEL SUR">RUTAS DEL SUR</option>
										<option value="TRANSANDONA">TRANSANDONA</option>
										<option value="COOTRANAR">COOTRANAR</option>
										<option value="TAXIS DE LA SABANA">TAXIS DE LA SABANA</option>
										<option value="COOTRANSCORDOBA">COOTRANSCORDOBA</option>
										<option value="COTRANS GUACHUCAL">COTRANS GUACHUCAL</option>
										<option value="COTRANS CARLOSAMA">COTRANS CARLOSAMA</option>
										<option value="EXPRESO LAS LAJAS">EXPRESO LAS LAJAS</option>
										<option value="COOTRANSMAYO">COOTRANSMAYO</option>
										<option value="TRANSIPIALES">TRANSIPIALES</option>
										<option value="RUTAS DEL  SUR  EXPRESO">RUTAS DEL  SUR  EXPRESO</option>
										
										<option value="CONTINENTAL BUS FRONTERAS">CONTINENTAL BUS FRONTERAS </option>
										<option value="EXPRESO VALLE DE ATRIZ">EXPRESO VALLE DE ATRIZ</option>
										<option value="TRANSOTOMAYOR">TRANSOTOMAYOR</option>
										<option value="FLOTA MAGDALENA">FLOTA MAGDALENA</option>
										<option value="COOTRANSMAYO">COOTRANSMAYO</option>
										<option value="TRANSANDONA">TRANSANDONA</option>
										<option value="TAXBELALCAZAR">TAXBELALCAZAR</option>
							
						</select>



						</label>  
							&nbsp	&nbsp	&nbsp 	&nbsp 	&nbsp 	&nbsp &nbsp&nbsp

						<label for="">Cargo : <br> <select name="car" id="car" class='form-control'>
							<option  selected value="0">Seleccione  Su Cargo</option>
							<option value="TAQUILLERO">TAQUILLERO</option>

							<option value="CONDUCTOR">CONDUCTOR</option>
						</select>
						</label>
						
						
						&nbsp	&nbsp 	&nbsp 	&nbsp 	&nbsp &nbsp	<label for=""> Fecha Infraccion:<br><input  name='fch'id='fch'type='date' class='form-control' placeholder='Ingrese la  fecha 'required ></label><br>
						<label>Codigo Infraccion<input name='cod_infra'type='text' id='cod_infra' class='form-control' placeholder='Codigo de  Infraccion'></label><br>
						<br>
						<br><br>
						<label align='center'for=""  class="bg bg-primary">INFORMACION  AUXILIAR  TECNICO  </label><br> <br><br>

						<label>Nombre  Funcionario:<input name='nom_funci' id='nom_funci'type="text"   class='form-control' placeholder='nombre Funcionario'></label>	
						<br>
						<label for="">OBSERVACION: </label>
						<br>	


					<textarea  rows="5" cols="40" id='obs'  name="obs"></textarea>
						<button class="btn btn-success  btn-block" id='btnedit' align='center'>Guardar</button>

     			</form>
   
	
			</div>		

		<div class="modal-footer">
             <button class="btn btn-default" data-dismiss='modal'>Cerrar</button></div>
		</div>
	</div>

</div>



		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-header">
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													        <h4 class="modal-title" id="myModalLabel">Cambio   De Estado!!!!</h4>
													      </div>
													      <div class="modal-body">

													      <a href="#" class="btn  btn-warning" id="btn_exonerar">Cancelado </a>
													       <button class="btn btn-success" id="bnt_pendiente">Pendiente</button>
													         
															

													      <form action="" class="hide" id='form_pendiente'>
 															 <p> <strong>Piensas  Cambiar  a  estado:"PENDIENTE"..?</strong></p>
 															 <input  type="hidden" id='id_pendiente' name="id_infractor">
																<button  type="submit" class="btn btn-default">aceptar</button>
																<button type="button"  id='cancel'class="btn btn-default" data-dismiss="modal">Cancelar</button>

  	
  															</form>


													  	    <form action="" class="hide" id='form_exoneracion'>
 															 <p> <strong>Piensas  Cambiar  a  estado:"CANCELADO"..?</strong></p>
 															 <input  type="hidden" id='id_exonerar' name="id_infractor">
																<button  type="submit" class="btn btn-default">aceptar</button>
																<button type="button"  id='cancel'class="btn btn-default" data-dismiss="modal">Cancelar</button>

  	
  															</form>


													      </div>
													      <div class="modal-footer">
													        
													        
													      </div>
													    </div>
													  </div>
													</div>



									 <div class='row'>

									 <div class='col-lg-8'></div>	
											 <div  class='input-group'>


											<form method="POST"  action="<?php echo $_SERVER["PHP_SELF"] ?>">
							                <input type="text"  name="search" placeholder="Search" value="<?php echo $search ?>">
							                <input type="submit" value="Search">
							                </form>		
											
											 </div>	
											 </div>


		<h4>Usuarios  Anulados</h4>
				<table class="table table-condensed table-responsive"  border="2">
		<thead class='bg-primary'>
		<tr><th>CEDULA</th><th>NOMBRE</th><th>EMPRESA</th><th>CARGO</th><th>FECHA INFRACCION</th><th>CODIGO INFRACCION</th><th>FUNCIONARIO</th><th>ORDEN INFRACCION</th><th>OBSERVACION</th><th>ESTADO</th></tr>	
		</thead>		
		<tbody>
			<?php  echo $lista ?>
		</tbody>

				</table>
		<script src="../Resources/js/jquery-1.11.2.js"></script>
		<script src="../Resources/js/bootstrap.min.js"></script>
		<script  type="text/javascript">
			$(document).ready(function(){
				function cerrar()
        {
            $.ajax({
                url:'../Controllers/usuario.php',
                type:'POST',
                data:"boton=cerrar"
            }).done(function(resp){
                location.href = '../Views/'
            });
        }


$('.anul').on('click',function(){

	var id_infractor=$(this).attr('href');
		    $('#id_pendiente').val(id_infractor);
		    $('#id_exonerar').val(id_infractor);
		    $('#id_anul').val(id_infractor);
		    

					$('#btn_exonerar').on('click',function(){
						$('#form_pendiente').addClass('hide');
						$('#form_exoneracion').removeClass('hide');
							
					});



					$('#form_exoneracion').submit(function(){
					var  datos=$('#form_exoneracion').serialize();

					$.ajax({

						url:'../Controllers/cambioestado.php',
						type:'POST',
						async:false,
						data:datos+'&estado=CANCELADO'


							}).done(function(resp){
								alert(resp);

						});
					});

					$('#form_pendiente').submit(function(){
					var datos=$('#form_pendiente').serialize()
					$.ajax({

						url:'../Controllers/cambioestado.php',
						type:'POST',
						async:false,
						data:datos+'&estado=Pendiente'

					}).done(function(resp){


						alert(resp);
					});
					});

					$('#bnt_pendiente').on('click',function(){
						$('#form_exoneracion').addClass('hide');
						$('#form_pendiente').removeClass('hide');
						
					});
			
})


$('.close').on('click',function(){
		$('#form_exoneracion').addClass('hide');
		$('#form_pendiente').addClass('hide');

});



$('.editar').on('click',function(){
//alert('Piensa  Editar  Algo?');

var id_infractor=$(this).attr('href');

//var accion_Ok='editar';
$('#id').val(id_infractor);


$('#nom_funci').val($(this).parent().parent().children('td input:eq(0)').text());


$('#nom').val($(this).parent().parent().children('td:eq(1)').text());//NOMBRE

$('#cc').val($(this).parent().parent().children('td:eq(0)').text());//CEDULA
$('#emp').val($(this).parent().parent().children('td:eq(2)').text());//EMPRESA

$('#car').val($(this).parent().parent().children('td:eq(3)').text());
$('#fch').val($(this).parent().parent().children('td:eq(4)').text());


$('#cod_infra').val($(this).parent().parent().children('td:eq(5)').text());
$('#nom_funci').val($(this).parent().parent().children('td:eq(6)').text());

$('#obs').val($(this).parent().parent().children('td:eq(8)').text());







});
$('#formUpdate').submit(function(){

var  datos=$('#formUpdate').serialize();

$.ajax({
	url:'../Controllers/editar2.php',
	type:'POST',
	async:false,
	data:datos


}).done(function(resp){
	alert(resp);

})

});



				});
		</script>
	</body>
</html>
<?php

  }
  else
  {
    header("location: ./");
  }
 ?>

