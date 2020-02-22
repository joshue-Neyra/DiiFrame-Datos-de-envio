<?php
session_start();
$Cliente_ID=$_SESSION['Id'];

$sql = "SELECT TOP (1) Empresa_ID,RazonSocial, Calle, NoExt, NoInt, CP, Colonia, Delegacion, Estado, Pais, Telefono1, Telefono2, PaginaWeb, Email
FROM     Empresa where ID_Status = 2";
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
