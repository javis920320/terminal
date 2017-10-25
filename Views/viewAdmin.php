<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'){



  
	# code...


		require_once('../Models/listainfractores.php');
		$search='';



        	if( isset($_POST['search']) &&  empty($_POST['search'])){

		$buscar='PENDIENTE';
		//$buscar = rtrim ($search);
		$imprimir = new crud();
		
		$resul=$imprimir->listar($buscar);


		}else if(isset($_POST['search']) &&  !empty($_POST['search'])){

				$search=$_POST['search'];
				$buscar = rtrim ($search);
				$imprimir = new crud();
				$resul=$imprimir->listar($buscar);


		}else if(isset($_POST['empresa'])){

			$variable=$_POST['empresa'];
      include_once('../Models/empresas.php');

      if($variable=='0'){


        $var='PENDIENTE';
        $e= new empresas();
         $l=$e->empresalist($variable); 
         $em=$l[0][0];
        $imprimir = new crud();
        $resul=$imprimir->listar($em);


      }else{
        $e= new empresas();
         $l=$e->empresalist($variable); 
         $em=$l[0][0];
        $estado='PENDIENTE';
        $inst= new crud();
        echo $variable;
        
        $resul= $inst->filtro($em,$estado);

			}

			


			}else{
			
			$buscar='Pendiente';
			$imprimir = new crud();
			$resul=$imprimir->listar($buscar);
		}

	
?>



<html lang="es">

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
  <title>Control de  infracciones   Administrador</title>

<body>
<style>
	.inputs{
	width: 250px;
	height: 50px;
	margin: 6px;
}


.ltsempresa{


display:inline-block	
}
</style>


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
                          <li><a  href='adminUser.php'>Administrador Usuarios</a></li>
                     
                    </ul>
                </li>

                
            </ul>
        </div>
		</div>
	</div>
<br><br><br>

	<ul class="nav nav-tabs ">
		  <li role="presentation" class="active"><a href="#">Home</a></li>
		  <li role="presentation"><a href="lista_Anulados.php">Lista  Anulados</a></li>
		  <li role="presentation"><a href="listaPagados.php">Lista  Pagados</a></li>
	</ul>
	
<br><br>





<!-- ********VENTANA  MODAL 
inicio   ventana  ingreso********** -->
<div class="modal fade" id='formIng'tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ingreso De  Infractores</h4>
        </div>  
                  <form action="" id='formIn' class='form' title='Ingreso  Infractores'><br>
                    <h4 class="modal-title">Ingreso De  Infractores</h4>
                    <br>
                      <label for=""> Cedula:<br> <input name='cedula'  class='inputs' id='num_cedula' type='text' pattern="^[0-9]+$" title='POR FAVOR INGRESA  SOLO  NUMEROS' class='form-control' placeholder='Numero Cedula'required></label>
                
                    <label for="">Nombre: <br><input  name='nombres' id='nombre' type="text"  pattern="[a-zA-ZÑÁÉÍÓÚáéíóú][a-zA-Zñáéíóú ]{1,}" title='POR FAVOR INGRESE  SOLO  CARACTERES' class='form-control inputs'placeholder='Nombre  Infractor' required></label> <br>
                  <label for="">Empresa: <br>
                  <div  class='listaemp'></div>
                    
                  </label>  
                                 
                  <label for=""> Cargo<br> 
                    <select name="cargo" id="cargo" class='form-control inputs'>
                      <option  selected value="0">Seleccione  Su Cargo</option>
                      <option value="TAQUILLERO">TAQUILLERO</option>
                      <option value="CONDUCTOR">CONDUCTOR</option>
                    </select>
                  </label>
                
                  <label for=""> Placa:<br> <input  name='placa'id='placa'type="text"  class='form-control inputs' placeholder='Numero  De  Placa' required></label>
                
                  <label for=""> N.Interno:<br><input  name='numero_interno'id='num_interno'type="text"  class='form-control inputs'class='form-control'placeholder='No.interno' required></label>
                
                  <label for=""> Orden Infraccion: <br><input name='orden_infraccion'  id='ordinfrac'type="text" class='form-control inputs' placeholder='Orden de infraccion '></label>
                
                  <label for="">Fecha Infraccion: <br> <input name='fecha'id='fecha'type='date' class='form-control inputs' placeholder='Ingrese la  fecha 'required ></label><br>
                

                
                  <label>Numero Infraccion: 
                    <select  class='form-control inputs' id='codigo_infraccion' name="codigo_infraccion" required>
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
                  </label>

                <label>Nivel de Falta:

                <div id='listaprecio'></div>

                </label>

                <br><br><br>
                <label for="">  Codigo  Funcionario:<br><input name='codigo_funcionario'  id='codigofn' type="text" placeholder='Codigo'  class='form-control inputs'></label> 
                
                <label> Nombre Funcionario:<input name='nombre_funcionario' id='nomfunc' type="text"   class='form-control inputs' placeholder='nombre Funcionario'></label>
          

                <button class="btn btn-success  btn-block" id='btningreso' align='center'>Guardar</button>

                 </form>
            </div>
        </div>
</div>


<!--fin fomr ingreso-->

<!--formulario update  aqui-->

<div  class=' modal fade' id="formedit" tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class="modal-dialog"  role='document'>
    <div class="modal-content">
        <div class="modal-header bg bg-success">
            <button  type='button' class="close" data-dismiss='modal' aria-label='close' >
            <span aria-hidden='true'>&times;</span></button>
            <h4 class="modal-title" id='myModalLabel'>Actualizar  Datos</h4>
        </div>

        <div class="modal-body">
        <!--++++++++++++++++++++++++FORMULARIO DE   ACTUALIZACION++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

          <form action="" id='formUpdate'  class='form'title='Ingreso  Infractores'><br>
            
              <br>
                <input type="text" id='id' name='id' class='hide'>
                  <label for=""> Cedula:<br> <input name='cc' id='cc'type="text"pattern="^[0-9]+$" title='POR FAVOR INGRESA  SOLO  NUMEROS' class='form-control inputs' placeholder='Numero Cedula'required></label>

                <label for=""> Nombre:<br><input name='nom' id='nom' type="text"  pattern="[a-zA-ZÑÁÉÍÓÚáéíóú][a-zA-Zñáéíóú ]{1,}" title='POR FAVOR INGRESE  SOLO  CARACTERES' class='form-control inputs'placeholder='Nombre  Infractor' required></label> <br>
                
                    <label for="">Empresa: <br>
                    <div id='empre'></div>
                
                </label>  
              

                <label for="">Cargo : <br> 
                <select name="car" id="car" class='form-control inputs' required>
                  <option  selected value="0">Seleccione  Su Cargo</option>
                  <option value="TAQUILLERO">TAQUILLERO</option>
                  <option value="CONDUCTOR">CONDUCTOR</option>
                </select>
                </label>
            
              
    
                <label for=""> Placa:<br> <input name='pla'id='pla'type="text"  class='form-control inputs' placeholder='Numero  De  Placa' required></label>
                <label for=""> No.Interno:<br><input name='num_in' id='num_in'type="text"  class='form-control inputs'class='form-control'placeholder='No.interno' required></label>
                <label for=""> Orden de  Infraccion:  <br><input  name='ordinf' id='ordinf' type="text" class=' form-control inputs' placeholder='Orden de infraccion '></label>
                <label for=""> Fecha Infraccion:<br><input  name='fch'id='fch'type='date' class='form-control inputs' placeholder='Ingrese la  fecha 'required ></label><br>
                  <br>

                <label for='cod_infra'>Codigo Infraccion:</label><select  class='form-control inputs' id='cod_infra' name="cod_infra" required>
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

                   <label for='lista2'>Nivel de  Falta:</label><div  id='lista2'></div>
                <br><br>
                  <label for="">AUXILIAR  TECNICO:  </label><br> <br><br>

                  <label>Codigo Auxiliar:<input name='codfn' id='codfn'type="text" placeholder='Codigo'  class='form-control inputs'> </label><button class="btn btn-success  btn-block" id='btnedit' align='center'>Guardar</button>
                  </form>
   
  
            </div>    
          <div class="modal-footer">
              <button class="btn btn-default" data-dismiss='modal'>Cerrar</button></div>
      </div>
    </div>

</div>

<!--*********************************************TABLA INFRACTORES************************************************************-->

   <div >

   <div class="col-xs-3">
          <h3 class="demo-panel-title">Acciones</h3>

          <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Listado <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu">
              <li><a href="#" type="button" class="" data-toggle="modal" data-target="#formIng">Ingresar Infractor</a></li>
              <li><a href="#" type="button"  id='paz'  data-toggle='modal' data-target='#paz_salvo' class="">Paz y salvo</a></li>
              <li><a href="#"type="button" class="" data-toggle="modal" data-target="#myModal9">Reporte persona</a></li>
              <li class="divider"></li>
              <li><a href="#"></a></li>
            </ul>
          </div><!-- /btn-group -->
        </div>

       <div class='container'>
        <div class="row  col-md-4">
           
          <div class="navbar">
          
      
             
  
          </div>
          


        </div>
          <div class="row col-md-4">
            
                <!-- Button trigger modal -->
            
            
            <!-- Modal -->
            <div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">CONSULTA COMPARENDOS</h4>
                  </div>
                  <div class="modal-body">
                    <form id='formper'>
                      <input type='text' placeholder='Identificacion'  id='idper'required></input><input type='submit' ><span class='glyphicon glyphicon-search'></span> Consultar</input>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

      <div class="row col-md-4">

        <div class="navbar   navbar-inverse">
          
           <form  class='form-inline'  method='POST' id='form_filtro' action='viewAdmin.php'>
              <div id="filtroemp">
              </div>
                            
                            <button type="submit" class="btn btn-default btn-lg|sm"><span class='glyphicon glyphicon-eye-open'></span></button>
                            </form>
                            <button id='btn_print' type="button" class="btn btn-success btn-lg|sm">Lista Empresa <span class='glyphicon glyphicon-print'></span></button>
                            </div>

      </div>

       </div>
       

<!-- Modal -->
<div class="modal fade" id="paz_salvo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">FORMULARIO  PAZ Y SALVO</h4>
      </div>
      <div class="modal-body">
        <form id='formpaz'>
           <input type='text'  class='inputs' name='nomp' id='nomp' placeholder='Nombres y Apellidos' required>
           <input type='text' class='inputs' name='idp'   id='idp' placeholder='Identificacion' required>
           
          

            <button  type='submit' class='btn btn-success'>crear paz y Salvo</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>

   </div>
   

   <div class='row'>

      <div class='col-lg-8'></div>  
        <div  class='input-group'>

        <form method="POST"  action="<?php echo $_SERVER["PHP_SELF"] ?>">
                <input type="text" name="search" placeholder="Search" value="<?php echo $search ?>">
                <input type="submit" value="Search">
              </form>   
      
        </div>  
       </div>
   

                   <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">Cambio   De Estado!!!!</h4>
                                </div>
                                <div class="modal-body">

                                <a href="#" class="btn  btn-info" id="anular">Anular </a>
                                 <button class="btn btn-success" id="exonerar">Cancelado</button>
                                   


                                <form action="#" id='cambio_estado'  class='hide'title='Anular  Infraccion  Infractores'>
                                      <h3>Deseas  anular  este  registro??</h3>
                                      <input  type="hidden" id='id_anul'  name="id_anul"></input>
                                     <label>Nombre:</label>  <input  type="text" name='nom_anul'id='nom_anul' disabled="">
                                     <label>Infraccion:</label> <input type="text"  id='infra_anul' disabled="">
                                       <label>Observacion de  Anulacion:</label><br><textarea  name="observacion" id='observacion'  required="true"></textarea>
                                   <button> Aceptar</button>
                                </form>


                                <form action="" id="form_exonerar" class="hide"  title="Exonerar">
                                  <h3>Estas  seguro de cambiar de  estado ?</h3>
                                  <input  type="hidden" name="id_exonerar" id='id_exonerar'></input>
                                  <button class="btn btn-default">Aceptar</button>
                                          <button type="button"  id='cancel'class="btn btn-default" data-dismiss="modal">Cancelar</button>

                                </form>
                      

                                </div>
                                <div class="modal-footer">
                                  
                                  
                                </div>
                              </div>
                            </div>
                          </div>

                          
                           
                                      <p id="mensajeanul" class=" hide bg-info" ><strong align='center'>  ha  realizado  el Cambio  de  estado  correctamente</strong></p>              

                   <div id='tamano'>
                        <table border='2' class='table table-responsive' id='tabla'>

                        <thead class='bg-primary' >
                          <tr>
                                <th >No. </th><th >Nombre </th><th >Cedula </th><th>Empresa</th> <th>Cargo </th> <th>Placa</th> <th>No.interno</th> <th>Orden De  Infraccion </th> <th>Fecha De  Infraccion</th><th>Codigo Infraccion</th><th>Auxiliar Tecnico</th> <th>Precio</th><th>estado</th> <th>Actualizar Datos</th> </tr>
                        </thead>


                      <tbody id='respuesta'>
                        <?php echo$resul?>
                          
                      </tbody>

                      </table>


<!--*********************************************************************************************************-->
                        <footer id='pie'  align='center'  class="navbar-fixed-bottom  navbar-inverse">
          Powered by Javier  Alexander  Lopez || 2016  <a href="">javis9203@gmail.com</a>
          <br>
          
    </footer>
</div>


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

            $('.form-control').on('change',function(){


              dato=$('.form-control').val();
              //alert(dato);
              if(dato<=15){
                 valor=123000;
                 $(".lst_pre option[value="+ valor +"]").attr("selected",true);
              }else if(dato >15 & dato<=24){
                valor=184000;
                $(".lst_pre option[value="+ valor +"]").attr("selected",true);

              }else if(dato>25){
                valor=246000;
                $(".lst_pre option[value="+ valor +"]").attr("selected",true);
              }
              //$("#lst_pre option[value="+ valor +"]").attr("selected",true);


            });

            function listaemp(){
              datos='';
              $.ajax({
                url:'../Controllers/listaem.php',
                type:'POST',
                data:{dato:datos},
                success:function(resp){
                  //alert(resp);
                  valor=eval(resp);

                  html="<select name='empresa' id='emp'  class='inputs ' required>";
                  html+="<option value=''>Lista de Empresas</option>";
                  for (var i =0;i< valor.length ; i++) {

                    html+="<option value="+valor[i]['id_empresa']+">"+valor[i]['nom_empresa']+"</option>";
                  }

                  html+="</select>";

                  $('.listaemp').html(html);

                 $('#filtroemp').html(html); 
                 $('#empre').html(html); 
                  //$(".empresas option[value='1']").attr("selected",true);

                }
              });

            }


            function listaprecio(){
              lista='';

              $.ajax({

                  url:'../Controllers/configprecios.php',
                  type:'POST',
                  data:{lista:lista},
                  success:function(resp){
                    //alert(resp);

                  var datos=eval(resp);

                  html="<select   name='lst_pre'class='form-control lst_pre inputs'  required>";
                  for (var i = 0;i<datos.length ; i ++) {
                    html+="<option class='ons'value="+datos[i]['valor']+">"+datos[i]['faltanombre'];+"</option>";
                  }
                    html+="</select>";


                    $('#listaprecio').html(html);
                    $('#lista2').html(html);


                  }
              });
            }


         

  $(document).ready(function(){
    listaprecio();
    listaemp();
    
$('#formper').submit(function(){
alert();
 var identificacion=$('#idper').val();

 window.open('consultper.php?iden='+identificacion);
});

 $('#formpaz').submit(function(){
        nomp=$('#nomp').val();
        idp=$('#idp').val();
        nomrp=$('#nomrp').val();
        idrp=$('#idrp').val();
        crp=$('#crp').val();




                  /* <input type='text'  class='inputs' name='nomp' id='nomp' placeholder='Nombres y Apellidos'>
                   <input type='text' class='inputs' name='idp' placeholder='Identificacion'>
                           <input type='text'  class='inputs' name='nomrp' placeholder='Nombre Responsable'>
                           <input  type='text'  class='inputs'  name='idrp' placeholder='identificacion'>
                          <input type='text' class='inputs'  name='crp' placeholder='cargo'>*/

        
        alert(datos);
        window.open('paz_salvo.php?nomp='+nomp+'&idp='+idp+'&nomrp='+nomrp+'&idrp='+idrp+'&crp='+crp);
      });



    $('#btn_print').on('click',function(){
      //alert('vamos  a  imprimir');
      var td=$(" tr td")[3].innerHTML;
      
       window.open('exportar.php? dato='+td);

    });

    $('#cargo').on('change',function(){

    cargo=$('#cargo').val();

    

    if(cargo=='TAQUILLERO'){
      $('#placa').val('No  registra');

      $('#placa').prop('disabled',true);

    }else{

      $('#placa').prop('disabled',false);
    }
//$('#placa').val();
    
    });





    $('#car').on('change',function(){

    cargo=$('#car').val();

    

    if(cargo=='TAQUILLERO'){
      $('#pla').val('No  registra');

      $('#pla').prop('disabled',true);

    }else{

      $('#pla').prop('disabled',false);
    }
//$('#placa').val();
    
    });

///
      $('.anul').on('click',function(){

        var id_infractor=$(this).attr('href');
        $('#id_anul').val(id_infractor);
        $('#id_exonerar').val(id_infractor);
        $('#nom_anul').val($(this).parent().parent().children('td:eq(0)').text());
      $('#infra_anul').val($(this).parent().parent().children('td:eq(8)').text());

  });

  $('#anular').on('click',function(){

      $('#cambio_estado').removeClass('hide');  
        $('#form_exonerar').addClass('hide');

  });
          


  $('#cambio_estado').on('submit', function(){

    var  datos= $('#cambio_estado').serialize();
      $.ajax({  
      url:'../Controllers/cambioestado.php',
      type:'POST',
      async: false,

      data:datos+'&estado=anulado'
      }).done(function(resp){
        alert(resp);
  
      $('#mensajeanul').removeClass('hide');
    

    });
      
            });


  $('#form_exonerar').submit(function(){
  var datos=$('#form_exonerar').serialize();
  
  $.ajax({
    url:'../Controllers/exonerar.php',
    type:'POST',
    data: datos+'&estado=CANCELADO',
    async:false

  }).done(function(resp){

alert(resp);
  });


  });
  

$('#exonerar').on('click',  function(){

  $('#cambio_estado').addClass('hide');
  $('#form_exonerar').removeClass('hide');
   
  
});


$('#cancel').on('click',function(){
  $('#form_exonerar').addClass('hide');
});


$('.Close').on('click',function(){
    $('#cambio_estado').addClass('hide');
            $('#form_exonerar').addClass('hide');

});
  
  
$('#formIn').on('submit', function(){

  var ingresar=$('#formIn').serialize();
  //alert(ingresar);


    $.ajax({
      url:'../controllers/infractores.php',
      type:'POST',
      data:ingresar+'&estado=PENDIENTE',
      async:false
      
    }).done(function(resp){

      alert(resp);
    });


//aqui   realizaremos  el   envio de  los  datos   al  seridor


});



$('.editar').on('click',function(){
//alert('Piensa  Editar  Algo?');

var id_infractor=$(this).attr('href');
$('#id').val(id_infractor);
//alert(id_infractor);

//var accion_Ok='editar';


$('#nom_funci').val($(this).parent().parent().children('td input:eq(0)').text());


$('#nom').val($(this).parent().parent().children('td:eq(1)').text());//NOMBRE

$('#cc').val($(this).parent().parent().children('td:eq(2)').text());//CEDULA
$('.prueba').val($(this).parent().parent().children('td:eq(3)').text());//EMPRESA

$('#car').val($(this).parent().parent().children('td:eq(4)').text());
$('#pla').val($(this).parent().parent().children('td:eq(5)').text());

$('#num_in').val($(this).parent().parent().children('td:eq(6)').text());

$('#ordinf').val($(this).parent().parent().children('td:eq(7)').text());
$('#fch').val($(this).parent().parent().children('td:eq(8)').text());
$('#cod_infra').val($(this).parent().parent().children('td:eq(9)').text());
$('#codfn').val($(this).parent().parent().children('td:eq(10)').text());
dato=$('#cod_infra').val();
empresa=$('#emp').val();
              
              if(dato<=15){
                 valor=123000;
                 $(".lst_pre option[value="+ valor +"]").attr("selected",true);
              }else if(dato >15 & dato<=24){
                valor=184000;
                $(".lst_pre option[value="+ valor +"]").attr("selected",true);

              }else if(dato>25){
                valor=246000;
                $(".lst_pre option[value="+ valor +"]").attr("selected",true);
              }






});


$('#formUpdate').on('submit',function(){


var datos=$('#formUpdate').serialize();



$.ajax({
  url:'../controllers/updateInfractores.php',
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
