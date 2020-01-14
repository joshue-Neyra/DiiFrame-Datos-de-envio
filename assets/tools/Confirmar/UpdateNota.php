<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$Nota_ID=$_POST['Nota_ID'];
$subtotal=$_POST['subtotal'];
$impuestos=$_POST['impuestos'];
$total=$_POST['total'];

$sql = "EXEC UpdateNota @ID =?,@subtotal=?,@impuestos=?,@total=?";
$params = array($Nota_ID,$subtotal,$impuestos,$total);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
    die( print_r( sqlsrv_errors(), true));
}
else{
     array_splice($_SESSION['Producto'],0);
    array_splice($_SESSION['Prod_Nombre'],0);
    array_splice($_SESSION['Imagen'],0);
    array_splice($_SESSION['Tamano_ID'],0);
    array_splice($_SESSION['Tamano'],0);
    array_splice($_SESSION['Precio'],0);
    array_splice($_SESSION['Cantidad'],0);
    echo "Exito";
}

        
