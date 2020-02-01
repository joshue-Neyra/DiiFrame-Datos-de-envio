<?php

$Producto_ID=$_POST['Producto_ID'];
$sql = "SELECT  Producto_ID, Prod_Nombre, Prod_Marca,Prod_Descripcion, RutaImagen1, RutaImagen2, RutaImagen3
FROM     Productos
WHERE   ID_Status = 2 and Producto_ID= $Producto_ID";
function getArraySQL($sql){
    //Creamos la conexión con la función anterior
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 

    if(!$result = sqlsrv_query($conn, $sql)) die(); //si la conexión cancelar programa

    $rawdata = array(); //creamos un array

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;

    while($row = sqlsrv_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }
    return $rawdata; //devolvemos el array
}

        $myArray = getArraySQL($sql);
        echo json_encode($myArray);