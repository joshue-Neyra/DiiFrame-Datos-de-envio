<?php
session_start();
$Cliente_ID=$_SESSION['Id'];

$sql = "SELECT  Direccion_ID, Cliente_ID, Clie_Calle, Clie_Num_Ext, Clie_Num_Int, CP, Clie_Colonia, Clie_Delegacion, Clie_Estado, Clie_Pais, Indicaciones, Celular, Clie_Tel, Status_ID, Lat, Long
FROM     Clie_Direcciones
WHERE  (Cliente_ID  = $Cliente_ID) and Status_ID =2";
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