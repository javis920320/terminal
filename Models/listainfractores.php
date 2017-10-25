<?php
  
  class crud 
  {
  	private$conexion;
  	function __construct()

  	{
  	require_once('conexion.php');
  	$this->conexion= new conexion();
  	$this->conexion->conectar();
  		# code...
  	}




  	function listar($buscar){

//para   migrar  datos  a   el  sistema...http://www.puntogeek.com/2011/06/24/de-excel-a-mysql-facilmente-y-sin-romperte-la-cabeza/
$sql="SELECT * FROM datos_infractor WHERE   estado ='Pendiente' AND nombre like '%".$buscar."%' OR cedula LIKE '%".$buscar."%' OR empresa LIKE '%".$buscar."%' OR cargo LIKE '%".$buscar."%' OR placa LIKE '%".$buscar."%' OR No_interno  LIKE '%".$buscar."%'
OR orden_infraccion LIKE '%".$buscar."%' OR fecha_infra LIKE '%".$buscar."%' OR codigo_infraccion LIKE '%".$buscar."%' OR  estado LIKE '%".$buscar."%' ORDER BY fecha_infra DESC";


/*$sql="SELECT * FROM datos_infractor WHERE estado='pendiente' AND nombre like '%".$buscar."%' OR cedula LIKE '%".$buscar."%' OR empresa LIKE '%".$buscar."%' OR cargo LIKE '%".$buscar."%' OR placa LIKE '%".$buscar."%' OR No_interno  LIKE '%".$buscar."%'
OR orden_infraccion LIKE '%".$buscar."%' OR fecha_infra LIKE '%".$buscar."%' OR codigo_infraccion LIKE '%".$buscar."%'";*/




//$sql="SELECT * FROM libros WHERE titulo_libro like '%".$valor."%' or autor_libro like '%".$valor."%'";
  		//$sql = "SELECT * FROM `datos_infractor` WHERE 1 ORDER BY `fecha_infra` LIMIT 0, 30 ";
      $resultado= $this->conexion->conexion->query($sql);

      if($resultado->num_rows>0){

      
         // $array= new array();        
       while($fila=$resultado->fetch_array())

        {
          
 @$i=$i+1;

          @$array.='<tr>
                    <td>'.$i.'</td>
                    <td>'.$fila['nombre'].'</td>
                    <td>'.$fila['cedula'].'</td>
                    <td>'.$fila['empresa'].'</td>
                    <td>'.$fila['cargo'].'</td>
                    <td>'.$fila['placa'].'</td>
                    <td>'.$fila['No_interno'].'</td>
                    <td>'.$fila['orden_infraccion'].'</td>
                    <td>'.$fila['fecha_infra'].'</td>
                    <td>'.$fila['codigo_infraccion'].'</td>
                    <td>'.$fila['cod_auxiliar'].'</td>
                    <td>'.'$'.$fila['precio'].'</td>
                    <td> <button class="estado btn btn-success" disabled>'.$fila['estado'].'</button> <a  href="'.$fila['id'].'"class="anul bnt btn-default" data-toggle="modal" data-target="#myModal"><span  class="glyphicon glyphicon-cog"></span></a></td>
                    
                    <td>  <input type="hidden" class="oculedit" name="nombre_fun"  value="'.$fila['nombre_fun'].'" >  </input><a href="'.$fila['id'].'"class="editar btn btn-primary"  data-toggle="modal" data-target="#formedit">editar</a></td>
                  
  
                  <tr>';
        }
        
      }else{
         
$array='<tr>
                                <td colspan="12" align="center">NO  SE    HA  ENCONTRADO   DATOS!!!</td>

                              <tr>';
                           
      }
      return $array;
      $this->conexion->cerrar();
  	}

//$sql = "INSERT INTO `terminal_pasto`.`datos_infractor` (`id`, `cedula`, `nombre`, `empresa`, `cargo`, `placa`, `No_interno`, `orden_infraccion`, `fecha_infra`, `codigo_infraccion`, `cod_auxiliar`, `nombre_fun`, `estado`) VALUES (NULL, \'1202554587\', \'Lorena Delgado\', \'trasipiales\', \'conductor\', \'f444f\', \'10001\', \'56565\', \'2016-01-12\', \'9\', \'t5\', \'carlitos el sapito\', \'pendiente\');";                 
                   

                function ingresar($id,$nombre,$cedula,$empresa,$cargo,$placa,$No_interno,$orden_infraccion,$fecha,$cod_infraccion,$precio,$codigofn,$nomfunc,$estado,$observacion)
                {
                  //$sql="INSERT INTO datos_infractor ('cedula','nombre','empresa','cargo','No_interno','orden_infraccion','fecha_infra','codigo_infraccion','cod_auxiliar','nombre_fun','estado') VALUES('$cedula','$nombre','$empresa','$cargo','$placa','$No_interno','$orden_infraccion','$fecha','$cod_infraccion','$codigofn','$nomfunc','$estado')";

                $sql="INSERT INTO datos_infractor VALUES('$id','$cedula','$nombre','$empresa','$cargo','$placa','$No_interno','$orden_infraccion','$fecha','$cod_infraccion','$codigofn','$precio','$nomfunc','$estado','$observacion')";

                      if($this->conexion->conexion->query($sql))
                      {
                          return true;

                      }else{

                        return  false;
                      }
                        $this->conexion->cerrar();
                     }


     function update($cc,$nom,$emp,$car,$pla,$num_in,$ordinf,$fch,$cod_infra,$precio,$codigofn,$id)

     {

    $sql="UPDATE datos_infractor SET cedula='$cc',nombre='$nom',empresa='$emp',cargo='$car',placa='$pla',No_interno='$num_in',orden_infraccion='$ordinf',fecha_infra='$fch',codigo_infraccion ='$cod_infra',precio='$precio', cod_auxiliar ='$codigofn' WHERE id ='$id'";


            if($this->conexion->conexion->query($sql))
            {

              return true;
            }else

            {
              return  false;
            }

          $this->conexion->cerrar();
            }


                    
function updateAnul($cc,$nom,$emp,$car,$fch,$cod_infra,$nomfunci,$obs,$id)

     {

    $sql="UPDATE datos_infractor SET cedula='$cc',nombre='$nom',empresa='$emp',cargo='$car',fecha_infra='$fch',codigo_infraccion ='$cod_infra', nombre_fun ='$nomfunci' ,observacion='$obs' WHERE id ='$id'";


            if($this->conexion->conexion->query($sql))
            {

              return true;
            }else

            {
              return  false;
            }

          $this->conexion->cerrar();
            }



function updatePagados($cc,$nom,$emp,$car,$pla,$num_in,$fch,$ordinf,$cod_infra,$nom_funci,$id)

     {

    $sql="UPDATE datos_infractor SET cedula='$cc',nombre='$nom',empresa='$emp',cargo='$car',placa='$pla',No_interno='$num_in',fecha_infra ='$fch', orden_infraccion ='$ordinf', codigo_infraccion='$cod_infra',nombre_fun='$nom_funci' WHERE id ='$id'";


            if($this->conexion->conexion->query($sql))
            {

              return true;
            }else

            {
              return  false;
            }

          $this->conexion->cerrar();
            }

         /*   function lista_pagados(){

              $sql="SELECT * FROM datos_infractor";
              if($this->conexion->conexion->query($sql))
            {

              return true;
            }else

            {
              return  false;
            }

          $this->conexion->cerrar();
             
            }*/


               function lista_anulados($buscar){
/*$sql="SELECT * FROM datos_infractor WHERE nombre like '%".$buscar."%' OR cedula LIKE '%".$buscar."%' OR empresa LIKE '%".$buscar."%' OR cargo LIKE '%".$buscar."%' OR placa LIKE '%".$buscar."%' OR No_interno  LIKE '%".$buscar."%'
OR orden_infraccion LIKE '%".$buscar."%' OR fecha_infra LIKE '%".$buscar."%' OR codigo_infraccion LIKE '%".$buscar."%' AND estado='anulado'";
*/
$sql="SELECT *  FROM  datos_infractor WHERE  estado='anulado' AND nombre  like '%".$buscar."%' OR estado like '%".$buscar."%'  OR cedula like'%".$buscar."%' OR empresa like '%".$buscar."%'  OR cargo like '%".$buscar."%'  OR codigo_infraccion like '%".$buscar."%'  OR nombre_fun like '%".$buscar."%'";
              $resultado=$this->conexion->conexion->query($sql);

                  if($resultado->num_rows>0){
                   while ($fila=$resultado->fetch_array()) {
                    

                     @$array.='<tr>
                     <td>'.$fila['cedula'].'</td>
                    <td>'.$fila['nombre'].'</td>
                    <td>'.$fila['empresa'].'</td>
                    <td>'.$fila['cargo'].'</td>
                    <td>'.$fila['fecha_infra'].'</td>
                      <td>'.$fila['codigo_infraccion'].'</td>
                      <td>'.$fila['nombre_fun'].'</td>
                      <td>'.$fila['orden_infraccion'].'</td>
                    <td>'.$fila['observacion'].'</td>
                    <td> <button class="estado btn btn-danger" disabled>'.$fila['estado'].'</button> <a  href="'.$fila['id'].'"class="anul bnt btn-default" data-toggle="modal" data-target="#myModal"><span  class="glyphicon glyphicon-cog"></span></a></td>
                    
                    <td>  <input type="hidden" class="oculedit" name="nombre_fun"  value="'.$fila['nombre_fun'].'" >  </input><a href="'.$fila['id'].'"class="editar btn btn-primary"  data-toggle="modal" data-target="#formedit">editar</a></td>
  
                  <tr>';
                      # code...
                    } 

                  }else{

                    $array='<tr>
                                <td colspan="12" align="center">NO  SE    HA  ENCONTRADO   DATOS!!!</td>

                              <tr>';
                              
                  } 
                  return $array;
                             $this->conexion->cerrar();
                             
            }



              function lista_pagados($buscar){

              //$sql="SELECT * FROM datos_infractor WHERE estado='exonerado'";
                $sql="SELECT *  FROM  datos_infractor WHERE  estado='CANCELADO' AND nombre  like '%".$buscar."%' OR estado like '%".$buscar."%'  OR cedula like'%".$buscar."%' OR empresa like '%".$buscar."%'  OR cargo like '%".$buscar."%'  OR  placa  like '%".$buscar."%'  OR No_interno  like'%".$buscar."%' OR orden_infraccion like '%".$buscar."%' OR codigo_infraccion like '%".$buscar."%'  OR nombre_fun like '%".$buscar."%' OR fecha_infra like '%".$buscar."%'";

              $resultado=$this->conexion->conexion->query($sql);

                  if($resultado->num_rows>0){
                   while ($fila=$resultado->fetch_array()) {
                    

                     @$array.='<tr>
                    <td>'.$fila['cedula'].'</td>
                    <td>'.$fila['nombre'].'</td>
                    <td>'.$fila['empresa'].'</td>
                    <td>'.$fila['cargo'].'</td>
                    <td>'.$fila['placa'].'</td>
                    <td>'.$fila['No_interno'].'</td>
                    <td>'.$fila['orden_infraccion'].'</td>
                    <td>'.$fila['fecha_infra'].'</td>
                    <td>'.$fila['codigo_infraccion'].'</td>
                    <td>'.$fila['nombre_fun'].'</td>
              
                    <td> <button class="estado btn btn-info" disabled>'.$fila['estado'].'</button> <a  href="'.$fila['id'].'"class="anul bnt btn-default" data-toggle="modal" data-target="#myModal"><span  class="glyphicon glyphicon-cog"></span></a></td>
                    
                    <td>  <input type="hidden" class="oculedit" name="nombre_fun"  value="'.$fila['nombre_fun'].'" >  </input><a href="'.$fila['id'].'"class="editar btn btn-primary"  data-toggle="modal" data-target="#modal-1">editar</a></td>
  
                  <tr>';
                      # code...
                    } 

                  }else{

                    $array='<tr>
                                <td colspan="12" align="center">NO  SE    HA  ENCONTRADO   DATOS!!!</td>

                              <tr>';
                              
                  } 
                  return $array;
                             $this->conexion->cerrar();
                             
            }


                  function anular($estado,$obs,$id)
                  {
                      $sql="UPDATE datos_infractor SET estado='$estado',observacion='$obs' WHERE id=$id";
                      if($this->conexion->conexion->query($sql))
                      { 
                      //$resp='paso  algo'; 
                        return  true;
                      //return $resp;

                      }else
                        {

                          //$resp=' no paso  nada';
                          return  false;
                        }

                  }


                    function  exonerar($id,$estado){

                        $sql="UPDATE datos_infractor SET estado='$estado' WHERE id=$id";
                      if($this->conexion->conexion->query($sql))
                      { 
                      //$resp='paso  algo'; 
                        return  true;
                      //return $resp;

                      }else
                        {

                          //$resp=' no paso  nada';
                          return  false;
                        }


                    }




                    function filtro($variable,$estado){

                $sql = "SELECT * FROM `datos_infractor` WHERE empresa='$variable' AND estado='$estado' ORDER BY fecha_infra DESC";


            //  $sql='SELECT *  FROM datos_infractor WHERE estado="$estado" AND empresa="$empresa"';

              $resultado=$this->conexion->conexion->query($sql);
              if ($resultado->num_rows>0) {
                while ($fila=$resultado->fetch_array()) {

                  # code...
@$i=$i+1;
                  @$array.='<tr>
                            <td>'.$i.'</td>
                            <td>'.$fila['nombre'].'</td>
                            <td>'.$fila['cedula'].'</td>
                            <td>'.$fila['empresa'].'</td>
                            <td>'.$fila['cargo'].'</td>
                            <td>'.$fila['placa'].'</td>
                            <td>'.$fila['No_interno'].'</td>
                            <td>'.$fila['orden_infraccion'].'</td>
                            <td>'.$fila['fecha_infra'].'</td>
                            <td>'.$fila['codigo_infraccion'].'</td>
                            <td>'.$fila['cod_auxiliar'].'</td>
                            <td>'.$fila['precio'].'</td>
                            
                            <td>'.$fila['estado'].'</td>


                              <tr>';
                                                }
                                        }

                                        return $array;
                                        $this->conexion->cerrar();
                            }





          }
