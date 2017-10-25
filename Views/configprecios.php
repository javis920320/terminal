<?php 
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'){


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

   	<link rel="stylesheet" href="../Resources/css/estilo.css">
	<title>Configuracion de  precios </title>
	
</head>
<body>
<div class='navbar navbar-inverse' >
		<div  class='container-fluid'>
			<div  class='navbar-header'>
				<a class='navbar-brand'href=''>
					<img alt'Brand' width='200' height='100' src='../Resources/img/LOGO TERMINAL.png'></img>
				</a>			
			</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-cog
				"></span><?php echo $_SESSION['nombre']; ?></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a></li>
                         <li><a  href='configprecios.php'>Configuracion de  precios </a></li>
                     
                    </ul>
                </li>

                
            </ul>
        </div>
		</div>
	</div>
	<br><br><br><br>
	 		<!-- Button trigger modal -->


	<ul class="nav nav-tabs ">
		  <li role="presentation" ><a href="viewAdmin.php">Principal</a></li>
		  <li role="presentation"><a href="lista_Anulados.php">Lista  Anulados</a></li>
		  <li role="presentation"><a href="listaPagados.php">Lista  Pagados</a></li>
	</ul>
	
<br><br>
	
	 
	 <!-- Modal -->
	 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	   <div class="modal-dialog" role="document">
	     <div class="modal-content">
	       <div class="modal-header bg bg-success">
	         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	         <h4 class="modal-title" id="myModalLabel">Editar Precios</h4>
	       </div>
	       <div class="modal-body">
	         <form id='formedit' class='formedit' name='formedit'>
	         	 <lable for='txtprecio'> Precio :  $</lable><input type='text' id='txtprecio' class='tx' name='txtprecio'>
	         	 <input type='hidden' id='id_precio' name='id_precio'>
	         	 <button type="submit" class="btn btn-primary">Actualizar</button>

	         </form>
	       </div>
	       <div class="modal-footer">
	         <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	         
	       </div>
	     </div>
	   </div>
	 </div>


	<div id='mitabla'></div>
	

<script src="../Resources/js/jquery-1.11.2.js"></script>
<script src="../Resources/js/bootstrap.min.js"></script>
<script src="../Resources/js/dataTables.js"></script>
	
	<script type='text/javascript'>
	
		

		function cargarregistros(){
			var da='lita';
			
					$.ajax({
						url:'../Controllers/configprecios.php',
						type:'POST',
						data:{dato:da},
						success:function(resp){
							 valor =eval(resp);

							 	contador=0;
							html="<table class='table' border='2'>";
							
							html+="<thead class='bg bg-primary'><th>Tipo de  Falta</th> <th>Precio</th><th>Editar</th></thead>";
							html+="<tbody>";
							html+="</tbody>";
				
								for (var i =0;i< valor.length ;i++) {
									contador=contador+1;
									 html+="<tr><td class='active'>falta "+valor[i]['faltanombre']+"</td><td class='active'>"+valor[i]['valor']+"</td><td><button class='btn btnedit' data="+valor[i]['id_precio']+" data-toggle='modal' data-target='#myModal'>editar</button></td> </tr>";
								}

										html+="</table>";

							 $('#mitabla').html(html);



						}

					});

		};

		$('#formedit').submit(function(){
			datos=$('#formedit').serialize();


			$.ajax({
				url:'../Controllers/configprecios.php',
				type:'POST',
				data:datos,
				async:false,
				success:function(resp){
					alert(resp);

				}
			});
		});
		

		$(document).ready(function(){
			
			cargarregistros();

				$('body').on('click','.table .btnedit',function(event){
					//alert();
				   event.preventDefault();
				   	    
				   var id=$(this).attr('data');
				  // alert(id);
				   $('#id_precio').val(id);
				   $('#txtprecio').val($(this).parent().parent().children('td:eq(1)').text());
				   
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