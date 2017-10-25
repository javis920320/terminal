
<?php 
session_start();
  if (isset($_SESSION['ingreso1']) && $_SESSION['ingreso1']=='YES') 
  {
    require_once('../Models/consultauser.php');
    require_once('../Models/listainfractores.php');
    

            $search='';


            if( isset($_POST['search']) &&  empty($_POST['search'])){

        $buscar='Pendiente';
        //$buscar = rtrim ($search);
       
        $ins= new consultasusuario();
        
        $resp=$ins->listar($buscar);


        }else if(isset($_POST['search']) &&  !empty($_POST['search'])){

                $search=$_POST['search'];
                $buscar = rtrim ($search);
                $ins= new consultasusuario();
                $resp=$ins->listar($buscar);


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
            $ins= new consultasusuario();
            $resp=$ins->listar($buscar);
        }

 /*if  {
   // echo 'hay q    filtrar';
     # code...
    $empresa=$_POST['filtro'];
    $estado='PENDIENTE';

    $fil=  new consultasusuario();
    $resp=$fil->filtro($empresa,$estado);
    echo $resp;

 }*/

       // $ins= new consultasusuario();
       // $resp=$ins->listar();
        

    ?>
    <!DOCTYPE html>
<html lang="en">
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
    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">AplicacionWeb</a>
        </div>


        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?></a>
                     <ul class="dropdown-menu">
                        <li><a href="javascript: void(0)" onclick='cerrar();'>Cerrar Session</a></li>
                     
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>

    <ul class="nav nav-tabs ">
          <li role="presentation" class="active"><a href="#">Home</a></li>
          <li role="presentation"><a href="anulforen.php">Lista  Anulados</a></li>
          <li role="presentation"><a href="pagaforen.php">Lista  Pagados</a></li>
    </ul>

                                     
    
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Bienvenido</div>
                    <div class="panel-body">                     
                      <p>Bienvenido  a la plataforma   de control  de   infracciones .
                        Para Realizar   cambios  en el Sistema  por Favor   consulte a  el Usuario  Administrador.

                      </p>

                    </div>
                
                </div>
            </div>
        </div>
    </div>
        <br>
                    <br>                
                    <br>
                    <br>
                    <div class="jumbotron">

                 
            <div class="col-xs-3">
          <h3 class="demo-panel-title">Acciones</h3>

          <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Lista de acciones <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu">
              
              <li><a href="#" type="button"  id='paz'  data-toggle='modal' data-target='#paz_salvo' class="btn btn-danger">Paz y salvo</a></li>
              <li><a href="#"type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal9">Reporte persona</a></li>
              <li class="divider"></li>
              <li><a href="#"></a></li>
            </ul>
          </div><!-- /btn-group -->
        </div>

        

     <div class="col-xs-5">


        <form method='POST' id="filtrar" action="viewforane.php">
        <div id='filtroemp'></div>

          <!--  <select name="filtro" id="filtro"  class="btn btn-info">
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
                                
                        
                    </select>-->
 
    
    <button  id='ver'  class='btn btn-success'type="submit"> <span  class="glyphicon glyphicon-eye-open
"></span>Ver</button>
<button type="submit" class="btn btn-primary" name='btn_imprimir'  id='btn_imprimir'><span  class='glyphicon glyphicon-print'></span>  Imprimir empresa</button>

</form>
<!--<a class="btn btn-primary" name='btn_imprimir'  id='btn_imprimir' href="#" role="button">Imprimir</a>-->


     </div>
     <div class="col-xs-3">
     <div  class='input-group'>
                                            <form method="POST"  action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                            <input type="text" name="search" placeholder="Search" value="<?php echo $search ?>">
                                            <input type="submit" value="Search">
                                            </form>     
                                         </div></div>


<br><br><br><br><br><br>
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

                    <!--Aqui   tenemos   el   formulario de filtrado q    nos   va  a servir  como   guia  en la  estractura de Administraor-->











                        
                    <table class="table "  border="2">
                        <thead class="navbar-inverse"style='color: white;'>
                            <tr>
                          <th>Nombre:</th>
                          <th>Cedula:</th>
                          <th>Empresa:</th>
                          <th>Cargo</th>
                          <th>Placa</th>
                          <th>No Interno</th>
                          <th>Orden  de  infraccion</th>
                          <th>fecha  de  infraccion</th>
                          <th>Codigo infraccion</th>
                          <th>Auxiliar Tecnico</th>
                          <th>Estado</th>    

                            </tr>
                        </thead>
                            <tbody class="">
                               <?php echo $resul;?>
                           </tbody>
                    </table>
<table>
    
    <thead></thead>
    <tbody id='cuerpo'>
        
    </tbody>
</table>

                    </div>

                    
                      
    <script src="../Resources/js/jquery-1.11.2.js"></script>
    <script src="../Resources/js/bootstrap.min.js"></script>
    <script>
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

                    function listaemp(){
              datos='';
              $.ajax({
                url:'../Controllers/listaem.php',
                type:'POST',
                data:{dato:datos},
                success:function(resp){
                  //alert(resp);
                  valor=eval(resp);

                  html="<select name='empresa' id='filtro'  class='inputs ' required>";
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

          $(document).ready(function(){
            //alert();

            listaemp();
            $('#formpaz').submit(function(){

              nomp=$('#nomp').val();
              idp=$('#idp').val();
              nomrp=$('#nomrp').val();
              idrp=$('#idrp').val();
              crp=$('#crp').val();
              window.open('paz_salvo.php?nomp='+nomp+'&idp='+idp+'&nomrp='+nomrp+'&idrp='+idrp+'&crp='+crp);
            });

            $('#formper').submit(function(){
              alert();
               var identificacion=$('#idper').val();

               window.open('consultper.php?iden='+identificacion);
              });
            var td=$(" tr td")[2].innerHTML;

              $('#exportar').val(td);
              //alert(td);
//alert('vamos  bien');
            $('#filtro').on('change',function(){
          /* var  dato = $('#filtro').val();
                $('#exportar').val(dato);*/
 
            });
            $('#ver').on('click',function(){
            var  dato = $('#filtro').val();
                $('#exportar').val(dato);

                var  dato = $('#filtro').val();
                var td=$(" tr td")[2].innerHTML;
                //alert(td);
            });
            

$('#btn_imprimir').on('click',function(){
 var  dato = $('#filtro').val();
 var td=$(" tr td")[3].innerHTML;
 $('#exportar').val(td);

 window.open('exportar.php? dato='+td);

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
