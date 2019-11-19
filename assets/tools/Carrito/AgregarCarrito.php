<?php
include 'Carrito.php';

session_start();

$producto = $_POST['Producto'];
$tamano = $_POST['Tamano'];
$cantidad = $_POST['Cantidad'];
$precio = $_POST['Precio'];
$imagen = $_POST['Imagen'];

$carrito = new Carrito();
$carrito->setProducto($producto);
$carrito->setTamano($tamano);
$carrito->setCantidad($cantidad);
$carrito->setPrecio($precio);
$carrito->setImagen($imagen);

$_SESSION['Producto_ID'][] = $producto;
$_SESSION['Tamano'][] = $tamano;
$_SESSION['Cantidad'][] = $cantidad;
$_SESSION['Precio'][] = $precio;
$_SESSION['Imagen'][] = $imagen;

echo json_encode($carrito);