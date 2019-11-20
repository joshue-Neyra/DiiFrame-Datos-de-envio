<?php
session_start();
include 'Carrito.php';
for($i=0;$i<count($_SESSION['src']);$i++)
    {
    $producto = $_SESSION['name'][$i];
    $tamano = $_SESSION['src'][$i];
    $cantidad = $_SESSION['src'][$i];
    $precio = $_SESSION['price'][$i];
    $imagen = $_SESSION['src'][$i];
    
    $carrito = new Carrito();
    $carrito->setProducto($producto);
    $carrito->setTamano($tamano);
    $carrito->setCantidad($cantidad);
    $carrito->setPrecio($precio);
    $carrito->setImagen($imagen);
    
    //echo "<tr>" ;
    //echo "<td><img width='50px' src='".$_SESSION['src'][$i]."' /> </td>" ;
    //echo "<td>".$_SESSION['name'][$i]."</td>";
    //echo "<td>".$_SESSION['price'][$i]."</td>";
    //echo "<td><input class='form-control' type='number' value='1'/></td>" ;
    //echo "<td>$ </td>" ;
    //echo "<td class='text-right'><button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i></button>" ;
    //echo "</td>" ;
    //echo "</tr>";
    echo json_encode($carrito);
    }