<?php
$Tamano_Impresion=$_POST['Tamano_Impresion'];
$Tamano_Marialuisa=$_POST['Tamano_Marialuisa'];
$Marialuisa_ID=$_POST['Marialuisa_ID'];
$sql = "SELECT TamanosImpresion.ancho as Marialuisa_cm,
        (SELECT Ancho FROM TamanosImpresion WHERE TamanosImpresion.Tamano_ID = $Tamano_Impresion) as Ancho_Impresion,
		(SELECT Alto FROM TamanosImpresion WHERE TamanosImpresion.Tamano_ID = $Tamano_Impresion) as Alto_Impresion,
		(SELECT Prod_Precio FROM Productos WHERE Producto_ID = $Marialuisa_ID) as CostoMarialuisa
FROM TamanosImpresion 
WHERE TamanosImpresion.Tamano_ID = $Tamano_Marialuisa ";
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