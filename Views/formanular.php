<?php

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
   	<link rel="shortcut icon" href="../Resources/img/favicon.ico">
   	 <link rel="stylesheet" href="../Resources/css/dataTables.css">
   	    	 <link rel="stylesheet" href="../Resources/css/estilo.css">

   	<link rel="stylesheet" href="../Resources/css/hoja.css">

	<title>Formulario  de  Anulacion</title>
</head>
<body>

<div class='navbar navbar-default ' >
		<div  class='container-fluid'>
			<div  class='navbar-header'>
				<a class='navbar-brand'href=''>
					<img alt'Brand' width='200' height='50' src='../Resources/img/LOGO TERMINAL.png'></img>
				</a>			
			</div>
		</div>
	</div>
<h3 align="center">Formulario  de  Anulacion de Infraccion</h3>
<div class="contenedor" >
<div class="jumbotron">
<div class="container">

<form id='form_anular'>
	
	<input type="text"  value='9' disabled></input>
	<textarea></textarea>
</form>
</div>
</div>
</div>

<script src="../Resources/js/jquery-1.11.2.js"></script>
<script src="../Resources/js/bootstrap.min.js"></script>
<script src="../Resources/js/dataTables.js"></script>


<script type="text/javascript">
	
	$('form_anular').on('submit',function(){
		alert('se  envio  el  formulario');
	});
</script>
</body>
</html>