<?php

class  consultasusuario{
private $conexion;

function __construct(){
require('conexion.php');
  	$this->conexion= new conexion();
  	$this->conexion->conectar();

}
  
function   exportar($consulta){

  $sql="SELECT *  FROM datos_infractor WHERE estado='PENDIENTE' AND empresa='$consulta' ORDER BY fecha_infra DESC";

  $resultado= $this->conexion->conexion->query($sql);

    return $resultado;  

}

function cantidaprecio($consulta)
{

$sql="SELECT sum(precio) FROM datos_infractor WHERE estado='PENDIENTE' AND empresa='$consulta'";

  $resultado= $this->conexion->conexion->query($sql);

  //return$resultado;

  /*while ($e=$resultado->fetch_array()) {

    $r[]=$e;
  }*/

    return $resultado;  

}




  	function listar($buscar){

//para   migrar  datos  a   el  sistema...http://www.puntogeek.com/2011/06/24/de-excel-a-mysql-facilmente-y-sin-romperte-la-cabeza/
$sql="SELECT * FROM datos_infractor WHERE   estado ='Pendiente' AND nombre like '%".$buscar."%' OR cedula LIKE '%".$buscar."%' OR empresa LIKE '%".$buscar."%' OR cargo LIKE '%".$buscar."%' OR placa LIKE '%".$buscar."%' OR No_interno  LIKE '%".$buscar."%'
OR orden_infraccion LIKE '%".$buscar."%' OR fecha_infra LIKE '%".$buscar."%' OR codigo_infraccion LIKE '%".$buscar."%' OR  estado LIKE '%".$buscar."%' ORDER BY fecha_infra DESC";


//$sql='SELECT * FROM datos_infractor  WHERE  estado="PENDIENTE"';


      $resultado= $this->conexion->conexion->query($sql);

      if($resultado->num_rows>0){
      
         // $array= new array();        
       while($fila=$resultado->fetch_array())

        {
          


          @$array.='<tr>
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
                    <td> <button class="estado btn btn-info" disabled>'.$fila['estado'].'</button> <a  href="'.$fila['id'].'"class="anul bnt btn-default" data-toggle="modal" data-target="#myModal"></a></td>
  
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



  	function listaPagados($buscar){

//para   migrar  datos  a   el  sistema...http://www.puntogeek.com/2011/06/24/de-excel-a-mysql-facilmente-y-sin-romperte-la-cabeza/
$sql="SELECT * FROM datos_infractor WHERE   estado ='EXONERADOS' AND nombre like '%".$buscar."%' OR cedula LIKE '%".$buscar."%' OR empresa LIKE '%".$buscar."%' OR cargo LIKE '%".$buscar."%' OR placa LIKE '%".$buscar."%' OR No_interno  LIKE '%".$buscar."%'
OR orden_infraccion LIKE '%".$buscar."%' OR fecha_infra LIKE '%".$buscar."%' OR codigo_infraccion LIKE '%".$buscar."%' OR  estado LIKE '%".$buscar."%' ORDER BY fecha_infra DESC";


//$sql='SELECT * FROM datos_infractor  WHERE  estado="PENDIENTE"';


      $resultado= $this->conexion->conexion->query($sql);

      if($resultado->num_rows>0){
      
         // $array= new array();        
       while($fila=$resultado->fetch_array())

        {
          


          @$array.='<tr>
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
                    <td> <button class="estado btn btn-success" disabled>'.$fila['estado'].'</button> <a  href="'.$fila['id'].'"class="anul bnt btn-default" data-toggle="modal" data-target="#myModal"><span  class="glyphicon glyphicon-cog"></span></a></td>
  
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


  	function listaAnulados($buscar){

//para   migrar  datos  a   el  sistema...http://www.puntogeek.com/2011/06/24/de-excel-a-mysql-facilmente-y-sin-romperte-la-cabeza/
$sql="SELECT * FROM datos_infractor WHERE   estado ='ANULADOS' AND nombre like '%".$buscar."%' OR cedula LIKE '%".$buscar."%' OR empresa LIKE '%".$buscar."%' OR cargo LIKE '%".$buscar."%' OR placa LIKE '%".$buscar."%' OR No_interno  LIKE '%".$buscar."%'
OR orden_infraccion LIKE '%".$buscar."%' OR fecha_infra LIKE '%".$buscar."%' OR codigo_infraccion LIKE '%".$buscar."%' OR  estado LIKE '%".$buscar."%' ORDER BY fecha_infra DESC";


//$sql='SELECT * FROM datos_infractor  WHERE  estado="PENDIENTE"';


      $resultado= $this->conexion->conexion->query($sql);

      if($resultado->num_rows>0){
      
         // $array= new array();        
       while($fila=$resultado->fetch_array())

        {
          


          @$array.='<tr>
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
                    <td> <button class="estado btn btn-success" disabled>'.$fila['estado'].'</button> <a  href="'.$fila['id'].'"class="anul bnt btn-default" data-toggle="modal" data-target="#myModal"><span  class="glyphicon glyphicon-cog"></span></a></td>
  
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


    function filtro($empresa,$estado){

      $sql = "SELECT * FROM `datos_infractor` WHERE empresa='$empresa' AND estado='$estado' ORDER BY fecha_infra DESC";


  //  $sql='SELECT *  FROM datos_infractor WHERE estado="$estado" AND empresa="$empresa"';

    $resultado=$this->conexion->conexion->query($sql);
    if ($resultado->num_rows>0) {
      while ($fila=$resultado->fetch_array()) {

        # code...
        @$array.='<tr>
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
                  <td>'.$fila['estado'].'</td>


                    <tr>';
      }
      
    }else{
      $array='<tr>
              <td><p>NO SE  HAN   ENCONTRADO   DATOS </p></td>


      <tr>';

    }
    return $array;
    $this->conexion->cerrar();
    }

  }/*
 $inst=  new consultasusuario();
 $resultado=$inst->cantidaprecio('COTAXLUJO');
 print_r($resultado);
echo $resultado[0];*/


?>