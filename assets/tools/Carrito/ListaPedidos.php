<?php
session_start();
$Cliente_ID=$_SESSION['Id'];

$sql = "SELECT  dbo.NtaMain.Nota_ID, dbo.Inventario.Prod_ID, dbo.Productos.Prod_Nombre, dbo.SysStatus.Status, dbo.Procesos.Proceso_clave, dbo.NtaMain.Nota_Total,dbo.NtaMain.Proceso_ID
FROM     dbo.NtaMain left JOIN
                  dbo.SysStatus ON dbo.NtaMain.Status_ID = dbo.SysStatus.Status_ID LEFT JOIN
                  dbo.Procesos ON dbo.NtaMain.Proceso_ID = dbo.Procesos.Proces_ID LEFT JOIN
                  dbo.Inventario ON dbo.NtaMain.Nota_ID = dbo.Inventario.Serv_ID LEFT JOIN
                  dbo.Productos ON dbo.Inventario.Prod_ID = dbo.Productos.Producto_ID
Where NtaMain.Status_ID = 2 and dbo.Productos.PrdMeta_ID = 'Producto'
and dbo.Inventario.Activado = 'True' and NtaMain.Cliente_ID = $Cliente_ID";
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