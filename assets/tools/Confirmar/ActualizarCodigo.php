<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$codigo=$_POST['codigo'];


$sql = "EXEC ActualizarCodigo @codigo =?";
$params = array($codigo);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
}
else{
    echo "Exito";
}

        
