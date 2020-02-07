<?php
session_start();
try {
    $lista=array();
    for($i=0;$i<count($_SESSION['Producto']);$i++){
        if($_SESSION['Producto'][$i]!=0){
            $producto = $_SESSION['Producto'][$i];
            $productonombre = $_SESSION['Prod_Nombre'][$i];
            $tamano = $_SESSION['Tamano'][$i];
            $tamanoID = $_SESSION['Tamano_ID'][$i];
            $cantidad = $_SESSION['Cantidad'][$i];
            $precio = $_SESSION['Precio'][$i];
            $imagen = $_SESSION['Imagen'][$i];
            $Meta = $_SESSION['Meta'][$i];

            $lista[] = array('Producto' => $producto, 'Prod_Nombre' => $productonombre, 'Tamano' => $tamano, 'Tamano_ID' => $tamanoID, 'Cantidad' => $cantidad, 'Precio' => $precio, 'Imagen' => $imagen, 'Meta' => $Meta);
        }
        else{
            array_splice($_SESSION['Producto'],0);
            array_splice($_SESSION['Prod_Nombre'],0);
            array_splice($_SESSION['Imagen'],0);
            array_splice($_SESSION['Tamano_ID'],0);
            array_splice($_SESSION['Tamano'],0);
            array_splice($_SESSION['Precio'],0);
            array_splice($_SESSION['Cantidad'],0);
        }
    }
    echo json_encode($lista);
}
catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

