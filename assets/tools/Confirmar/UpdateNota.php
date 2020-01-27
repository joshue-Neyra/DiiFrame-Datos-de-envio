<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$Nota_ID=$_POST['Nota_ID'];
$subtotal=$_POST['subtotal'];
$impuestos=$_POST['impuestos'];
$total=$_POST['total'];
$total_Pagado=$_POST['total_Pagado'];
$proceso=$_POST['proceso'];
$status=$_POST['status'];

$sql = "EXEC UpdateNota @ID =?,@subtotal=?,@impuestos=?,@total=?,@total_pagado=?,@proceso=?,@status=?";
$params = array($Nota_ID,$subtotal,$impuestos,$total,$total_Pagado,$proceso,$status);

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

        
