<?php
$mp = $_POST["mp"];

$sql = "SELECT TOP IdRel, Resolucion, Pixeles, [2x3], [3x5], [4x6], [5x7], [6x8], [8x10], [11x14], [13x19], [16x20], [24x36]
FROM     PixelesRelTamano
WHERE  (Pixeles = $mp) and  Status_ID = 2";
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