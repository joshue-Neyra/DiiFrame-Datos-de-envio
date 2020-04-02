<?php
session_start();
$Cliente_ID=$_SESSION['Id'];

$sql = "SELECT  ID_Cliente, Clie_Nombre, Clie_Apellidos, Clie_Calle, Clie_Num_ext, Clie_Num_int, CP, Clie_Colonia, Clie_Delegacion, Clie_Estado, Clie_Pais, Clie_email, Clie_RFC, Clie_Tel, Clasificacion, Zona, Observaciones, Imagen, Puntos, 
                  DiasCredito, LimiteCredito, ListaPrecios, Descuento, DescuentoActivado, FechaAlta, DesdeDescuento, HastaDescuento, Activado, Eliminado, EsVentaFacturacion, RazonSocial, Sucursal, EsClieLavanderiaInd, PasswordInternet, 
                  MetaClieID, FechaCambioStatus, Ejecutivo_ID, ActivarLimCredito, NumCuenta, ID_Status, Celular
FROM     Clientes
WHERE  (ID_Cliente  = $Cliente_ID) and ID_Status =2";
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