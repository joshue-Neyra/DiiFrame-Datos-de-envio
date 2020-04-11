<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$Nota_ID=$_POST['Nota_ID'];
$Envio_ID=$_POST['Orden_ID'];


$sql = "EXEC UpdateNotaEnvio @Nota_ID =?,@Orden_ID=?";
$params = array($Nota_ID,$Envio_ID);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
}
else{
    echo "Exito";
}

        
