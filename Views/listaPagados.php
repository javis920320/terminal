<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'){



require_once('../Models/listainfractores.php');
/*$inst = new  crud();
$lista=$inst->lista_pagados();*/
		$search='';
		
		if( isset($_POST['search']) &&  empty($_POST['search'])){

		$buscar='CANCELADO';
		//$buscar = rtrim ($search);
		$imprimir = new crud();
		
		$lista=$imprimir->lista_pagados($buscar);


		}else if(isset($_POST['search']) &&  !empty($_POST['search'])){

				$search=$_POST['search'];
				$buscar = rtrim ($search);
				$imprimir = new crud();
				$lista=$imprimir->lista_pagados($buscar);


		}else{
			
			$buscar='CANCELADO';
			$imprimir = new crud();
			$lista=$imprimir->lista_pagados($buscar);
		}
        


?>
<!DOCTYPE html>

<html>
	
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	   	<meta name="viewport" content="width=device-width, initial-scale=1">
	   	<link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
	   	 <link rel="stylesheet" href="../Resources/css/hoja.css">
	   	  <link rel="stylesheet" href="../Resources/css/dataTables.css">
	   	  <link rel="shortcut icon" href="../Resources/img/favicon.ico">

		<title>Lista Exonerados </title>


	</head>
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
		  <li role="presentation" ><a href="lista_Anulados.php">Lista  Anulados</a></li>
		  <li role="presentation" class="active"><a href="#">Lista  Pagados</a></li>
	</ul>


		<h4>Recientemente Pagados</h4>





									 <div class='row'>

									 <div class='col-lg-8'></div>	
											 <div  class='input-group'>


											<form method="POST"  action="<?php echo $_SERVER["PHP_SELF"] ?>">
							                <input type="text"  name="search" placeholder="Search" value="<?php echo $search ?>">
							                <input type="submit" value="Search">
							                </form>		
											
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

													      <a href="#" class="btn  btn-warning" id="btnanular">Anular </a>
													       <button class="btn btn-success" id="pendiente">Pendiente</button>
													         
															

													      <form action="#" id='cambio_estado'  class='hide'title='Anular  Infraccion  Infractores'>
													      			<h3>Deseas  anular  este  registro??</h3>
													      			<input  type="hidden" id='id_anul'  name="id_anul"></input>
															       <label>Nombre:</label>  <input  type="text" name='nom_anul'id='nom_anul' disabled="">
															       <label>Infraccion:</label> <input type="text"  id='infra_anul' disabled="">
															         <label>Observacion de  Anulacion:</label><br><textarea  name="observacion" id='observacion'  required="true"></textarea>
																	 <button> Aceptar</button>
													  	  </form>


													  	    <form action="" class="hide" id='form_pendiente'>
 															 <p> <strong>Estas  Seguro  de   Cambiar  El  Estado..?</strong></p>
 															 <input  type="hidden" id='id_infractor' name="id_infractor">
																<button  type="submit" class="btn btn-default">aceptar</button>
																<button type="button"  id='cancel'class="btn btn-default" data-dismiss="modal">Cancelar</button>

  	
  															</form>


													      </div>
													      <div class="modal-footer">
													        
													        
													      </div>
													    </div>
													  </div>
													</div>



		<div class="modal fade" id="modal-1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title">EDITAR  DATOS!!!</h4>
					</div>
					<div class="modal-body">
						
									<form action=""id='formUpdate'  class='form'title='editar'><br>
     				
     				<br>
     				<input type="text" id='id' name='id' class='hide'>
     				<label for=""> Cedula:<br> <input name='cc' id='cc'type="text"pattern="^[0-9]+$" title='POR FAVOR INGRESA  SOLO  NUMEROS' class='form-control' placeholder='Numero Cedula'required></label>
						&nbsp	&nbsp	&nbsp 	&nbsp 	&nbsp 	&nbsp<label for=""> Nombre:<br><input name='nom' id='nom' type="text"  pattern="[a-zA-ZÑÁÉÍÓÚáéíóú][a-zA-Zñáéíóú ]{1,}" title='POR FAVOR INGRESE  SOLO  CARACTERES' class='form-control'placeholder='Nombre  Infractor' required></label> <br>




						<label for="">Empresa: <br>
						<select name="emp" id="emp" class='form-control'>
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
						
							
		
						<label for=""> Placa:<br> <input name='pla'id='pla'type="text"  class='form-control' placeholder='Numero  De  Placa' required></label>
						&nbsp	&nbsp 	&nbsp 	&nbsp 	&nbsp &nbsp<label for=""> No.Interno:<br><input name='num_in' id='num_in'type="text"  class='form-control'class='form-control'placeholder='No.interno' required></label>
						<label for=""> Orden de  Infraccion:  <br><input  name='ordinf' id='ordinf'type="text"class='form-control' placeholder='Orden de infraccion '></label>
						&nbsp	&nbsp 	&nbsp 	&nbsp 	&nbsp &nbsp	<label for=""> Fecha Infraccion:<br><input  name='fch'id='fch'type='date' class='form-control' placeholder='Ingrese la  fecha 'required ></label><br>
						<label>Infraccion<input name='cod_infra'type='text' id='cod_infra' class='form-control' placeholder='Codigo de  Infraccion'></label><br>
						<br>
						<br><br>
						<label for="">AUXILIAR  TECNICO:  </label><br> <br><br>

			<label>Nombre  Funcionario:<input name='nom_funci' id='nom_funci'type="text"   class='form-control' placeholder='nombre Funcionario'></label>	
						<button class="btn btn-success  btn-block" id='btnedit' align='center'>Guardar</button>

     			</form>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
											




		<table class="table table-condensed table-responsive"  border="2">

			              <thead class='bg-primary' >
			 					<tr>
								<th >Cedula </th><th >Nombres </th><th>Empresa</th> <th>Cargo </th> <th>Placa</th> <th>No.interno</th> <th>Orden De  Infraccion </th> <th>Fecha De  Infraccion</th><th>Codigo Infraccion</th><th>Auxiliar Tecnico</th><th>estado</th> <th>Actualizar Datos</th> </tr>
						</thead>


											<tbody id='respuesta'>
														<?php  echo $lista ?>
										
											</tbody>


		</table>	
		<script src="../Resources/js/jquery-1.11.2.js"></script>
		<script src="../Resources/js/bootstrap.min.js"></script>
		<script src="../Resources/js/dataTables.js"></script>

		<script type="text/javascript">
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

	$(document).ready(function(){



		$('.anul').on('click',function(){

		    var id_infractor=$(this).attr('href');
		    $('#id_infractor').val(id_infractor);
		    $('#id_exonerar').val(id_infractor);
		    $('#id_anul').val(id_infractor);
		    
		    $('#nom_anul').val($(this).parent().parent().children('td:eq(0)').text());
			$('#infra_anul').val($(this).parent().parent().children('td:eq(8)').text());


			$('#pendiente').on('click',  function(){
				$('#form_pendiente').removeClass('hide');
				$('#cambio_estado').addClass('hide');
				$('#id_infractor').val(id_infractor);

			});


				$('#form_pendiente').submit(function(){
				 var datos=$('#form_pendiente').serialize();
				 $.ajax({
				 	url:'../Controllers/cambioestado.php',
				 	type:'POST',
				 	data:datos+'&estado=Pendiente',
				 	async:false


				 }).done(function(resp){
				 	alert(resp);

				 })


				
});


				$('#btnanular').on('click',function(){
						$('#form_pendiente').addClass('hide');
						$('#cambio_estado').removeClass('hide');

				});

				$('#cambio_estado').submit(function(){

				var  datos=$('#cambio_estado').serialize();
				
				$.ajax({
					url:'../Controllers/cambioestado.php',
					type:'POST',
					async:false,
					data:datos+'&estado=Anulado'

				}).done(function(resp){
					alert(resp);


				})	


							});

	});

$('.close').on('click',function(){
		$('#cambio_estado').addClass('hide');
		$('#form_pendiente').addClass('hide');

});










$('.editar').on('click',function(){
//alert('Piensa  Editar  Algo?');

var id_infractor=$(this).attr('href');

//var accion_Ok='editar';
$('#id').val(id_infractor);

$('#nom_funci').val($(this).parent().parent().children('td:eq(9)').text());


$('#nom').val($(this).parent().parent().children('td:eq(1)').text());//NOMBRE

$('#cc').val($(this).parent().parent().children('td:eq(0)').text());//CEDULA
$('#emp').val($(this).parent().parent().children('td:eq(2)').text());//EMPRESA

$('#car').val($(this).parent().parent().children('td:eq(3)').text());
$('#pla').val($(this).parent().parent().children('td:eq(4)').text());

$('#num_in').val($(this).parent().parent().children('td:eq(5)').text());

$('#ordinf').val($(this).parent().parent().children('td:eq(6)').text());
$('#fch').val($(this).parent().parent().children('td:eq(7)').text());
$('#cod_infra').val($(this).parent().parent().children('td:eq(8)').text());







});

$('#formUpdate').on('submit',function(){


var datos=$('#formUpdate').serialize();

//alert(datos);

$.ajax({
	url:'../Controllers/editar2.php',
	type:'POST',
	data:datos,
	async: false

}).done(function(resp){

	alert(resp);
});
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
