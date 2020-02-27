<?php
session_start();
 if(isset($_POST['Producto']))
  {
    $_SESSION['Producto'][]=$_POST['Producto'];
    $_SESSION['Prod_Nombre'][]=$_POST['Prod_Nombre'];
    $_SESSION['Imagen'][]=$_POST['Imagen'];
    $_SESSION['Tamano_ID'][]=$_POST['Tamano_ID'];
    $_SESSION['Tamano'][]=$_POST['Tamano'];
    $_SESSION['Precio'][]=$_POST['Precio'];
    $_SESSION['Cantidad'][]=$_POST['Cantidad'];
    $_SESSION['Meta'][]=$_POST['Meta'];
    $_SESSION['inv_descripcion'][]=$_POST['inv_descripcion'];
    echo count($_SESSION['Producto']);
    exit();
  }