<?php
session_start();
$imagen = $_SESSION['Nombre'];
$Tamano=$_POST['Tamano'];
$Producto=$_POST['Producto'];
$Orientacion = $_SESSION['Orientacion'];
$sql = "SELECT  Producto_ID, Prod_Nombre, Prod_Marca,Prod_Descripcion, RutaImagen1, RutaImagen2, RutaImagen3,'$imagen' as ImagenUsuario,
(select Precio from TamanosImpresion where Tamano_ID='$Tamano') as Precio,(select Tamano from TamanosImpresion where Tamano_ID='$Tamano') as Tamano,$Tamano as Tamano_ID,$Orientacion as Orientacion
FROM     Productos
WHERE   ID_Status = 2 and Producto_ID= $Producto";
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