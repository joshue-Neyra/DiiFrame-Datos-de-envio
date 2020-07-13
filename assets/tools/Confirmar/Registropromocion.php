<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$Nota_ID=$_POST['Nota_ID'];
$codigo=$_POST['codigo'];
$cantidad=$_POST['cantidad'];
$descuento=$_POST['descuento'];
$fecha=$_POST['fecha'];
$date = date_create($fecha);
$fechanota= date_format($date, 'Y-m-d H:i:s');


$sql = "EXEC Registropromocion @param1 =?,
@param2 =?,
@param3 =?,
@param4 =?,
@param5 =?,
@param6 =?,
@param7 =?,
@param8 =?,
@param9 =?,
@param10 =?,
@param11 =?
";
$params = array($codigo,
               $Nota_ID,
                $cantidad,
                $descuento,
                0,//id producto
                $fechanota,
                $fechanota,
                1,//ejecutivo
                1,//activado
                0,//eliminado
                1//tiponota
               );

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
}
else{
    echo "Exito";
}

        
