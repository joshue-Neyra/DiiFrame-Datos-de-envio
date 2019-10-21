<?php
$mp = $_POST["mp"];

$sql = "SELECT  IdRel, Resolucion, Pixeles, [2x3] as t1, [3x5]  as t2, [4x6]  as t3, [5x7]  as t4, [6x8]  as t5,
 [8x10]  as t6, [11x14]  as t7, [13x19] as t8 , [16x20]  as t9, [24x36]  as t10
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