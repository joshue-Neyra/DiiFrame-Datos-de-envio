<?php
$mp = $_POST["mp"];

$sql = "SELECT dbo.PixelesRelTamano.Tamano_ID, dbo.PixelesRelTamano.Calidad, dbo.PixelesRelTamano.Status_ID,
dbo.Pixeles.Pixeles, dbo.PixelesRelTamano.Pixeles_ID, dbo.TamanosImpresion.Tamano
FROM     dbo.PixelesRelTamano INNER JOIN
                  dbo.Pixeles ON dbo.PixelesRelTamano.Pixeles_ID = dbo.Pixeles.Pixeles_ID INNER JOIN
                  dbo.TamanosImpresion ON dbo.PixelesRelTamano.Tamano_ID = dbo.TamanosImpresion.Tamano_ID
				  where dbo.Pixeles.Pixeles = $mp and dbo.PixelesRelTamano.Status_ID = 2";
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
