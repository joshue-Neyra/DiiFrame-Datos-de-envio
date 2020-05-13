<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
session_start();
$Cliente_ID=$_SESSION['Id'];

$Direccion_ID=$_POST['Direccion_ID'];

$sql = "EXEC EliminarDireccion @Cliente_ID=?,@Direccion_ID=?";
$params = array($Cliente_ID,$Direccion_ID);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
else{
    echo "Registro eliminado";
}
