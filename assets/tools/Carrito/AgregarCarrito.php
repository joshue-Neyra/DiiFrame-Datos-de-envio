<?php
session_start();
$_SESSION['Tamano']=$_POST['Tamano'];
$_SESSION['Producto']=$_POST['Producto'];
$_SESSION['Cantidad']=$_POST['Cantidad'];
$fecha=$_POST['Fecha'];
$_SESSION['Fecha'] = $fecha;


if ($_SESSION['Id'] == "" || $_SESSION['Id'] == NULL){
	//echo $_SESSION['Usuario'];
	echo "Sin Usuario";
	
}
else {
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/Carrito/AgregarNotaPedido.php'; 
    
}
