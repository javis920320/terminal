<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplicacion Web</title>

    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Resources/css/estilo.css">
        <link rel="stylesheet" href="../Resources/css/animate.css">
        <link rel="shortcut icon" href="../Resources/img/favicon.ico">

</head>
 
<body>
 <form action="">
 <fieldset class="jumbotron"><span class="label label-info">N.Infraccion

					
        </span>
        <select id='codigo_infraccion' name="codigo_infraccion">
					<option value='0' select>Numero  de  Infraccion</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					<option value="32">32</option>
					<option value="33">33</option>
					<option value="34">34</option>
					<option value="35">35</option>
					<option value="36">36</option>
					<option value="37">37</option>
					
					</select>
 <input  id='precio' type='text' disabled>
		</fieldset>
 	
 </form>
 <script src="../Resources/js/jquery-1.11.2.js"></script><script src="../Resources/js/bootstrap.min.js"></script>
<script  type='text/javascript'>
	$(document).ready(function(){
		$('#codigo_infraccion').on('change',function(){
		 var valor=$('#codigo_infraccion').val();
		 var a=parseInt(valor);


	 if(a<=15)
	 {
	 	alert('tienes  una  falta leve');
	 	$('#precio').val('$123.000');

	 }else if(a>15 && a<=24){
	 	alert('tienes  una    falta  grave');
	 		 	$('#precio').val('$184.000');
	 }else if(a>25 && a<=37){

	 		 	alert('tienes  una  falta muy  grave');
	 	$('#precio').val('246.000');
	 }
});	});
</script>
</body>
</hl>