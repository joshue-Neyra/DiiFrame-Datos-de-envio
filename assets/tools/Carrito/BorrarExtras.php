<?php
session_start();
$identificador=0;
$contador=count($_SESSION['Producto']);
$eliminar=$_POST['id'];
$meta = $_SESSION['Meta'][$eliminar];
if ($meta=="Marialuisa" || $meta=="Vidrio"){
        for($x=0;$x<$contador;$x++){
        if($eliminar<$x){
            $identificador=$identificador+1;
        }
        else{
        $identificador=$identificador;}
    }

    if(($contador-1)==$eliminar){
        array_splice($_SESSION['Producto'],$eliminar);
        array_splice($_SESSION['Prod_Nombre'],$eliminar);
        array_splice($_SESSION['Imagen'],$eliminar);
        array_splice($_SESSION['Tamano_ID'],$eliminar);
        array_splice($_SESSION['Tamano'],$eliminar);
        array_splice($_SESSION['Precio'],$eliminar);
        array_splice($_SESSION['Cantidad'],$eliminar);
        array_splice($_SESSION['Meta'],$eliminar);
        array_splice($_SESSION['inv_descripcion'],$eliminar);

    }
    else{
        array_splice($_SESSION['Producto'],$eliminar,-($identificador));
        array_splice($_SESSION['Prod_Nombre'],$eliminar,-($identificador));
        array_splice($_SESSION['Imagen'],$eliminar,-($identificador));
        array_splice($_SESSION['Tamano_ID'],$eliminar,-($identificador));
        array_splice($_SESSION['Tamano'],$eliminar,-($identificador));
        array_splice($_SESSION['Precio'],$eliminar,-($identificador));
        array_splice($_SESSION['Cantidad'],$eliminar,-($identificador));
        array_splice($_SESSION['Meta'],$eliminar,-($identificador));
        array_splice($_SESSION['inv_descripcion'],$eliminar,-($identificador));

    }
}






  
