<?php
$Codigo=$_POST["codigo"];
$sql = "SELECT PrmCodigo_ID, CodigoPromocional, PorcentajeDescuento, Contador, Status_ID, FechaAlta, UsuarioAlta
FROM            PrmCodigoPromo
WHERE CodigoPromocional = '$Codigo' and Status_ID = 2 ";
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