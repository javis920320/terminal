<?php 
session_start();
  if (isset($_SESSION['ingreso1']) && $_SESSION['ingreso1']=='YES') 
  {
    require_once('../Models/consultauser.php');

            $search='';


            if( isset($_POST['search']) &&  empty($_POST['search'])){

        $buscar='CANCELADO';
        //$buscar = rtrim ($search);
       
        $ins= new consultasusuario();
        
        $resp=$ins->listar($buscar);


        }else if(isset($_POST['search']) &&  !empty($_POST['search'])){

                $search=$_POST['search'];
                $buscar = rtrim ($search);
                $ins= new consultasusuario();
                $resp=$ins->listar($buscar);


        }else{
            
            $buscar='CANCELADO';
            $ins= new consultasusuario();
            $resp=$ins->listar($buscar);
        }

 

       // $ins= new consultasusuario();
       // $resp=$ins->listar();
        

    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplicacion Web</title>
    <link rel="stylesheet" href="../Resources/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../Resources/img/favicon.ico">

</head>
 
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
          <li role="presentation" ><a href="viewforane.php">Home</a></li>
          <li role="presentation"><a href="anulforen.php">Lista  Anulados</a></li>
          <li role="presentation"class="active"><a href="pagaforen.php">Lista  Pagados</a></li>
    </ul>

                                        <div class='row'>

                                        <div class='col-lg-8'></div>   
                                        <div  class='input-group'>
                                            <form method="POST"  action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                            <input type="text" name="search" placeholder="Search" value="<?php echo $search ?>">
                                            <input type="submit" value="Search">
                                            </form>     
                                         </div> 
                                        </div>
                                     

                                        

    
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
                            <tbody>
                               <?php echo $resp;?>
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


    </script>
</body>
</html>

<?php

  }
  else
  {
    header("location: ./");
  }
