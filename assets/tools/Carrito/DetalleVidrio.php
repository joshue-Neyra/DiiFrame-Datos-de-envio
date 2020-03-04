<?php
$Producto_ID=$_POST['Producto_ID'];
$Tamano_ID=$_POST['Tamano_ID'];

$sql = "SELECT dbo.TamanoRelProducto.Tamano_ID,dbo.TamanosImpresion.Tamano, dbo.Productos.Producto_ID, dbo.Productos.Prod_Nombre, dbo.TamanoRelProducto.Precio, dbo.Productos.PrdMeta_ID, dbo.Productos.ID_Status,   dbo.Productos.Prod_Descripcion, 'Vidrio' as Imagen
FROM  dbo.TamanoRelProducto
INNER JOIN dbo.Productos ON dbo.TamanoRelProducto.Producto_ID = dbo.Productos.Producto_ID 
INNER JOIN dbo.TamanosImpresion on dbo.TamanoRelProducto.Tamano_ID = dbo.TamanosImpresion.Tamano_ID
WHERE    dbo.Productos.ID_Status = 2 and  dbo.Productos.PrdMeta_ID = 'Vidrio' and TamanoRelProducto.Tamano_ID = '$Tamano_ID' and Productos.Producto_ID = '$Producto_ID'";
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