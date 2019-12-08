<?php
session_start();
$Cliente_ID=$_SESSION['Id'];
$Nota_ID = $_POST['id'];

$sql = "SELECT  Inventario.Inv_ID, Inventario.Serv_ID, Inventario.Prod_ID, Inventario.Inv_cant, Inventario.Inv_pre_unit, Inventario.Inv_pre_total,   Inventario.Tamano_ID,  Inventario.RutaImagen, Productos.PrdMeta_ID,Productos.Prod_Nombre ,TamanosImpresion.Tamano
FROM     Inventario INNER JOIN Productos on Prod_ID = Producto_ID
inner join TamanosImpresion on Inventario.Tamano_ID = TamanosImpresion.Tamano_ID
where Inventario.Cliente_ID = $Cliente_ID AND Inventario.Serv_ID = $Nota_ID";
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