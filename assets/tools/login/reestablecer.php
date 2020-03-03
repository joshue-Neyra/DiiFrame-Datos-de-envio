<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 

$Cliente_ID=$_POST['Clie_ID'];
$Password=sha1($_POST['Password']);
$decodeString = base64_decode($Cliente_ID);

$sql = "EXEC ReestablecerPSW @param1 =?, @param2 =?";
$params = array(
    $decodeString,
    $Password);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
else{
    echo "Registro Exitoso";
}