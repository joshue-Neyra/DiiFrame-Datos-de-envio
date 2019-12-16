<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 

$id=$_POST['id'];

$sql = "EXEC BorrarInventario @param1 =?";
$params = array($id);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
else{
    echo "Eliminacion exitosa";
}
