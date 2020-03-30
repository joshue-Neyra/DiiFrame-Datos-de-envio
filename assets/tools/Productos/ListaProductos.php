<?php
session_start();
$imagen = $_SESSION['Nombre'];
$Tamano=$_POST['Tamano'];
$Orientacion = $_SESSION['Orientacion'];
$sql = "SELECT dbo.TamanoRelProducto.Tamano_ID, dbo.Productos.Producto_ID, dbo.Productos.Prod_Nombre, dbo.TamanoRelProducto.Precio, dbo.Productos.Familia_ID, dbo.Productos.PrdMeta_ID, dbo.Productos.ID_Status,  '$imagen' as ImagenUsuario,$Orientacion as Orientacion, 
dbo.Productos.RutaImagen1, dbo.Productos.RutaImagen2, dbo.Productos.RutaImagen3, dbo.Productos.RutaImagen4
FROM  dbo.TamanoRelProducto
INNER JOIN dbo.Productos ON dbo.TamanoRelProducto.Producto_ID = dbo.Productos.Producto_ID
WHERE    dbo.Productos.ID_Status = 2 and  dbo.Productos.PrdMeta_ID = 'Producto' and Tamano_ID = '$Tamano'";
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