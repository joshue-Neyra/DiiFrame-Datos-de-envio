<?php
session_start();
include 'Carrito.php';
for($i=0;$i<count($_SESSION['Producto']);$i++)
    {
    
    
    $producto = $_SESSION['Producto'][$i];
    $productonombre = $_SESSION['Prod_Nombre'][$i];
    $tamano = $_SESSION['Tamano'][$i];
    $tamanoID = $_SESSION['Tamano_ID'][$i];
    $cantidad = $_SESSION['Cantidad'][$i];
    $precio = $_SESSION['Precio'][$i];
    $imagen = $_SESSION['Imagen'][$i];
    
    $carrito = new Carrito();
    $carrito->setProducto($producto);
    $carrito->setProductonombre($productonombre);
    $carrito->setTamano($tamano);
    $carrito->setTamanoID($tamanoID);
    $carrito->setCantidad($cantidad);
    $carrito->setPrecio($precio);
    $carrito->setImagen($imagen);
    echo json_encode($carrito);
    }