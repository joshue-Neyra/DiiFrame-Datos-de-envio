<?php
session_start();
$i=$_POST['id'];
 array_splice($_SESSION['Producto'],$i);
    array_splice($_SESSION['Prod_Nombre'],$i);
    array_splice($_SESSION['Imagen'],$i);
    array_splice($_SESSION['Tamano_ID'],$i);
    array_splice($_SESSION['Tamano'],$i);
    array_splice($_SESSION['Precio'],$i);
    array_splice($_SESSION['Cantidad'],$i);
  