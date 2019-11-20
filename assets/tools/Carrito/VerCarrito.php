<?php
session_start();
$lista=array();
for($i=0;$i<count($_SESSION['Producto']);$i++)
    {
    $producto = $_SESSION['Producto'][$i];
    $productonombre = $_SESSION['Prod_Nombre'][$i];
    $tamano = $_SESSION['Tamano'][$i];
    $tamanoID = $_SESSION['Tamano_ID'][$i];
    $cantidad = $_SESSION['Cantidad'][$i];
    $precio = $_SESSION['Precio'][$i];
    $imagen = $_SESSION['Imagen'][$i];
    
    $lista[] = array('Producto' => $producto, 'Prod_Nombre' => $productonombre, 'Tamano' => $tamano, 'Tamano_ID' => $tamanoID, 'Cantidad' => $cantidad, 'Precio' => $precio, 'Imagen' => $imagen);
   
    
    }
echo json_encode($lista);