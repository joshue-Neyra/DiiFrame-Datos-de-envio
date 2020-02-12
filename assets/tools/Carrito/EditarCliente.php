<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
session_start();
$Cliente_ID=$_SESSION['Id'];
$Celular=$_POST['Celular'];
$Telefono=$_POST['Telefono'];
$Street_number=$_POST['street_number'];
$Calle=$_POST['Calle'];
$Ciudad=$_POST['ciudad'];
$Estado=$_POST['estado'];
$Cp=$_POST['cp'];
$Country=$_POST['Country'];
$lat=$_POST['lat'];
$long=$_POST['long'];
$Colonia=$_POST['Colonia'];
$Referencia=$_POST['Referencia'];

$sql = "EXEC DCliUpdateCli 
@param1 =?,
	@param2 =?,
	@param3 =?,
	@param4 =?,
	@param5 =?,
	@param6 =?,
	@param7 =?,
	@param8 =?,
	@param9 =?,
	@param10 =?,
	@param11 =?,
	@param12 =?,
    @param13 =?,
    @param14 =?";
$params = array(
    $Calle,
    $Street_number,
    0,
    $Cp,
    $Colonia,
	$Ciudad,
    $Estado,
    $Country,
    $Telefono,
    $lat,
    $long,
    $Cliente_ID,
    $Celular,
    'Cliente'//Meta
    );

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
else{
        $sql = "EXEC InsertCliDirecciones 
    @param1 =?,
        @param3 =?,
        @param4 =?,
        @param5 =?,
        @param6 =?,
        @param7 =?,
        @param8 =?,
        @param9 =?,
        @param10 =?,
        @param11 =?,
        @param12 =?,
        @param13 =?,
        @param14 =?,
        @param15 =?,
        @param16 =?
        ";
    $params = array(
        $Cliente_ID,
        $Calle,
        $Street_number,
        0,//EXTERIOR
        $Cp,
        $Colonia,
        $Ciudad,
        $Estado,
        $Country,
        $Referencia,
        $Celular,
        $Telefono,
        2,
        $lat,
        $long,//ESTATUS
        );

    $stmt = sqlsrv_query( $conn, $sql, $params);
    if( $stmt === false ) {
         die( print_r( sqlsrv_errors(), true));
    }
    else{
        echo "Registro exitoso";
    }
}
