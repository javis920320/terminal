<?php
session_start();
if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
{

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<link rel="stylesheet" href="../Resources/css/bootstrap.css">
   	<link rel="stylesheet" href="../Resources/css/dataTables.css">
   	<link rel="shortcut icon" href="../Resources/img/favicon.ico">

   	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   	 <link rel="stylesheet" href="/resources/demos/style.css">

	<title>Administrar Usuarios</title>
</head>
<body>
<style>
	.inputs{
	width: 250px;
	height: 50px;
	margin: 6px;
}</style>

	<div class='navbar navbar-inverse' >
		<div  class='container-fluid'>
			<div  class='navbar-header'>
				<a class='navbar-brand'href=''>
					<p>Aplicacion Web</p>
				</a>			
			</div>

<div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $_SESSION['cargo'].' :'.$_SESSION['nombre'].' ' ?><span class="glyphicon glyphicon-cog
"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)" onclick='cerrar();'>Cerrar Sesion</a></li>
                        <li><a  href='configprecios.php'>Configuracion de  precios </a></li>
                    	    
                      
                    </ul>
                    
                    
                    
        
                </li>
                
            </ul>
        </div>
		</div>
	</div>
<br><br><br>

	<ul class="nav nav-tabs ">
		  <li role="presentation" ><a href="viewAdmin.php"><span class='glyphicon glyphicon-book
'></span>Panel de Inicio</a></li>
		  <li role="presentation" class="active"><a href="#">#</a></li>
		 
	</ul>





<!-- Modal -->
<div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Usuario</h4>
      </div>
      <div class="modal-body">
      	<p>Esta Seguro de  eliminar este usuario?</p>
      	 <form id='formeliminar'>
      	 	<input type='hidden' name='id_delet' id='id_delet'>
      	 <button type='submit' class='btn btn-success'>Aceptar</button>	<button  class="btn btn-default" data-dismiss="modal">Cancelar</button>

      	 </form>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar  Usuarios</h4>
      </div>
      <div class="modal-body">
        <form id='formedit'>
        	<input type='text' placeholder='Usuario' id='usuario'  class='inputs' name='usuario' required>
        	<br><br><br>
        	<select id='tipo' name='tipo' class='inputs' required>
        		<option  value=''selected>Selecciona una opcion</option>
        		<option value='invitado'>invitado</option>
        		<option value='Administrador'>Administrador</option>
        	</select>
        	<br><br><br>
        	<input type='number' id='id' class='inputs' name='id' required>
        	<br><br>
        	<input type='text' id='nom_ape' class='inputs' name='nom_ape' required>
        	<br>
        	<input type='hidden' name='id_user'  class='inputs' id='id_user' required>
        	<br><br>

				<fieldset>
				    <legend>Autorizar Permisos: </legend>
				   <select name='perm' class='inputs' required>
				   	<option value=''>Seleccione  una opcion</option>
				   		<option value=1>Activar</option><option value=0>Desactivar</option>

				   </select>
				  </fieldset>
					</div>
					
					</label><br><br>
        	<button type='submit'>Editar</button>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


	<h3>Administrar Usuarios</h3>

		<div class="modal fade" id='new_user'tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	 	 <div class="modal-dialog">
	    	<div class="modal-content">
	    		<div class="modal-header bg-success"><h3>Ingreso de  Usuarios</h3></div>
	    		<div class="modal-body">
	    			<form id='ing_user'>
	    			<input  type='number' placeholder='Numero  Identificacion ' name='identificacion' required>	
	    				<br><br><br>
	    			<input  type='text' placeholder='Nombre y Apellido ' name='nombreApellido' required>
	    			<br><br><br>

	    			<input  type='text' placeholder='usuario' name='usuario' required>
	    			<br><br><br>

	    			<input  type='password' placeholder='contraseña' name='clave' required>
	    			<br><br><br>
	    			<select id='tipouser' name='tipouser' required>
	    			<option value='0' selected name='tipo'>Tipo Usuario</option>
	    			
	    			<option value='Administrador'>Administrador</option>

	    			<option value='invitado'>invitado</option>
	    			</select>
	    			<br><br><br>



	    			<button type='submit'  id='ingresar' class='btn btn-invers'align='center'>Ingresar  Usuario</button>

	    			</form>
	    		</div>
			  </div>
	  		</div>
		</div>
	
	
	      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_user">Ingresar  Usuario</button>
	
	
<br><br><br><br>
			
	
<div id='lista'></div>
<center>
        <ul class="pagination" id="pagination"></ul>
    </center>

<ul class='pagination'></ul>
	<p align='center'><?php echo'Bienvenido  '.$_SESSION['nombre'].'  eres  el  '.$_SESSION['cargo']?></p>
	<script src="../Resources/js/jquery-1.11.2.js"></script>
	<script src="../Resources/js/bootstrap.min.js"></script>
	<script src="../Resources/js/dataTables.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type='text/javascript'>


 



	$('body').on('click','.table .editar',function(event){
      event.preventDefault();
      var id=$(this).attr('href');
      $('#id_user').val(id);
      $('#usuario').val($(this).parent().parent().children('td:eq(0)').text());
      $('#tipo').val($(this).parent().parent().children('td:eq(1)').text());
      $('#id').val($(this).parent().parent().children('td:eq(2)').text());
      $('#nom_ape').val($(this).parent().parent().children('td:eq(3)').text());
      $('.radio').val($(this).parent().parent().children('td:eq(4)').text());

      $('#id_user').val(id);
      //alert(id);
	});


	$('body').on('click','.table .eliminar',function(event){
      event.preventDefault();
      var id=$(this).attr('href');
      $('#id_delet').val(id);
      
  });

  $('#formeliminar').submit(function(){
  	var datos=$('#formeliminar').serialize();
  	//alert(datos);
  			$.ajax({
      		url:'../Controllers/confusuarios.php',
      		type:'POST',
      		data:datos,
      		async:false,
      		success:function(resp){
      			alert(resp);

      		}
      			});
  });


	$('#formedit').submit(function(){
		datos=$('#formedit').serialize();
		$.ajax({
			url:'../Controllers/confusuarios.php',
			type:'POST',
			data:datos,
			async:false,
			success:function(resp){
				alert(resp);

			}

		});
	});

	function listausuario(principal){

		var todo='';
		//
		//alert(principal);
		$.ajax({
			url:'../Controllers/userController.php',
			type:'POST',
			data:'buscar='+todo+'&principal='+principal,
			success:function(resp){
				//alert(resp);
				array=eval(resp);
				$('#lista').html(array[0]);
			$('#pagination').html(array[1]);
					/*contador=0;
				html="<table id='tablauser' border='2'>";
				
				html+="<thead><th>N#</th> <th>Nombre  Usuario</th><th>Identificacion</th> <th>Tipo</th></thead>";
				html+="<tbody>";
				html+="</tbody>";
				
				for (var i =0;i< resultados.length ;i++) {
					contador=contador+1;
					 html+="<tr><td>"+contador+"</td><td>"+resultados[i]['nombre_user']+"</td><td>"+resultados[i]['identificacion']+"</td><td>"+resultados[i]['tipo']+"</td></tr>";
				}

				html+="</table>";

					///$('#tablauser').DataTable();
				$('#lista').html(html);
				*/


			}

				});
	}

 /*function inicio(){
 $('#ingresar').click(validate());
 }
  function validate(){
  valor=get

  }*/

		function cerrar(){
			$.ajax({
				url:'../Controllers/usuario.php',
				type:'POST',
				data:{boton:'cerrar'},
				success:function(resp){
					location.href = '../Views/index.php'

				}

				});
		}
$(document).ready(function(){

//inicio();

listausuario(1),
$( "input" ).checkboxradio();
    $( "fieldset" ).controlgroup();

	$('#ing_user').submit(function(){


	var datos=$('#ing_user').serialize();
			$.ajax({
				url:'../Controllers/userController.php',
				type:'POST',
				data:datos,
				async:false,
				success:function(resp){
					alert(resp);

				}

			});
	});

});

	</script>

</body>
</html>

<?php
}else
  {
    header("location: ./");
  }
  ?>