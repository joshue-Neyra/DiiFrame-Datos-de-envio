<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$Nota_ID=$_POST['Nota_ID'];
$monto=$_POST['monto'];
$tipo=$_POST['tipo'];
$fecha=$_POST['fecha'];
$date = date_create($fecha);
$fechapago= date_format($date, 'Y-m-d H:i:s');


$sql = "EXEC PagoNota      @param1=?,
      @param2=?,
      @param3=?,
      @param4=?,
      @param5=?,
      @param6=?,
      @param7=?,
      @param8=?,
      @param9=?,
      @param10=?,
      @param11=?,
      @param12=?,
      @param13=?,
      @param14=?,
      @param15=?";
$params = array(
    $fechapago,//,[Pag_Fecha]
    $monto,//,[Pag_monto]
    1,//,[ID_Ejecutivo]
    $Nota_ID,//,[Serv_ID]
    3,//,[Tipo_serv]
    $monto,//,[Entregado]
    0,//,[Cambio]
    '',//,[Pag_TC]
    '',//,[Pag_aut]
    $tipo,//,[Tipo_Pago_ID]
    1,//,[Activado]
    0,//,[Eliminado]
    0,//,[Caja_ID]
    0,//,[ConCorteCaja]
    0//,[Cuenta_ID]
    );

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
}
else{
    session_start();
     array_splice($_SESSION['Producto'],0);
    array_splice($_SESSION['Prod_Nombre'],0);
    array_splice($_SESSION['Imagen'],0);
    array_splice($_SESSION['Tamano_ID'],0);
    array_splice($_SESSION['Tamano'],0);
    array_splice($_SESSION['Precio'],0);
    array_splice($_SESSION['Cantidad'],0);
    echo "Exito";
}

        
