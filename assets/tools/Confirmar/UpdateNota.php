<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$Nota_ID=$_POST['Nota_ID'];

$sql = "EXEC UpdateNota @ID =?";
$params = array($Nota_ID,);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
}
else{
    echo "Exito";
}

        
