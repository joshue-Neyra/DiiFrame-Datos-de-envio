<?php
session_start();
$_SESSION['Tamano']=$_POST['Tamano'];
$_SESSION['Producto']=$_POST['Producto'];
$_SESSION['Cantidad']=$_POST['Cantidad'];

$Producto= $_SESSION['Producto'];

echo "$Producto";