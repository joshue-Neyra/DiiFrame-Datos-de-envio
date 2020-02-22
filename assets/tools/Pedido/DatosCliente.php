<?php
session_start();
$Cliente_ID=$_SESSION['Id'];
$Nota_ID=$_POST["Nota_ID"];
$sql = "SELECT dbo.NtaMain.Direccion_ID, dbo.Clie_Direcciones.Clie_Calle, dbo.Clie_Direcciones.Cliente_ID, dbo.Clie_Direcciones.Clie_Num_Ext, dbo.Clie_Direcciones.Clie_Num_Int, dbo.Clie_Direcciones.CP, dbo.Clie_Direcciones.Clie_Colonia, 
                  dbo.Clie_Direcciones.Clie_Delegacion, dbo.Clie_Direcciones.Clie_Estado, dbo.Clie_Direcciones.Clie_Pais, dbo.Clie_Direcciones.Indicaciones, dbo.Clie_Direcciones.Celular, dbo.Clie_Direcciones.Clie_Tel, dbo.Clientes.Clie_Nombre, 
                  dbo.Clientes.Clie_Apellidos, dbo.NtaMain.Nota_ID
FROM     dbo.NtaMain INNER JOIN
                  dbo.Clie_Direcciones ON dbo.NtaMain.Direccion_ID = dbo.Clie_Direcciones.Direccion_ID INNER JOIN
                  dbo.Clientes ON dbo.Clie_Direcciones.Cliente_ID = dbo.Clientes.ID_Cliente
				  where dbo.NtaMain.Nota_ID = $Nota_ID and NtaMain.Cliente_ID = $Cliente_ID";
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
