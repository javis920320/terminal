
<?php



?>





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

</head>
 
<body id='principal'>

<div id='prueba'></div>
    <!--Barra de Navegacion-->
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"></a><img alt'Brand' width='200' height='50' src='../Resources/img/LOGO TERMINAL.png'></img>
        </div>

         </nav>



<!--DESARROLLO DE   CARUCEL-->

    <div  id='Login'class="container option animated bounceInDown">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Iniciar Sesion</div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                            <p>Usuario o Password no identificados</p>
                        </div>       

                         <div class="alert alert-danger text-center" style="display:none;" id="errorselec">
                            <p>Seleccione  el tipo de Usuario</p>
                        </div>                  
                        <form  action='../Controllers/usuario.php' role="form" id='form_login' method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" id="email" name='email'placeholder="Usuario" >
                                </div>
                            </div>

                            <!-- EN  DESARROLLO -->
                   <input type="hidden" value=''name='boton' id='boton'>




                            <!-- EN  DESARROLLO -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" id="password" name='password' placeholder="Password">
                                </div>
                            </div>  



                            <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-lock"></span> Entrar</button>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="resul"></div>
      
      <footer  class="navbar-fixed-bottom  bg bg-default"> <div   class="container">
        <div class="panel panel-default"></div>
    

      </div ><p  id='pie'align='center'>Powered by Javier Alexander Lopez || 2016 javis9203@gmail.com </p> </footer>
	<script src="../Resources/js/jquery-1.11.2.js"></script>
	<script src="../Resources/js/bootstrap.min.js"></script>
    <script type='text/javascript'>
    
    </script>
</body>
</html>