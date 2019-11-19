<?php
session_start();
    $_SESSION['Producto_ID'][]=$_POST['Producto'];
    $_SESSION['Tamano'][]=$_POST['Tamano'];
    $_SESSION['Cantidad'][]=$_POST['Cantidad'];
    $_SESSION['Precio'][]=$_POST['Precio'];
    $_SESSION['Imagen'][]=$_POST['Imagen'];
    echo count($_SESSION['Producto_ID']);
