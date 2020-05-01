<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$razonsocial=$_POST['razonsocial'];
$rfc=$_POST['rfc'];
session_start();
$Cliente_ID=$_SESSION['Id'];

$sql = "EXEC UpdateRFC @ID =?,@RFC=?,@RazonSocial=?";
$params = array($Cliente_ID,$rfc,$razonsocial);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
}
else{

    echo "Datos actualizados";
}

        
