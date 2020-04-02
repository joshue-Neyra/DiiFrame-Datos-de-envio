<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
session_start();
$Cliente_ID=$_SESSION['Id'];

$Clie_Nombre=$_POST['Clie_Nombre'];
$Clie_Apellidos=$_POST['Clie_Apellidos'];
$Calle=$_POST['Calle'];
$Street_number=$_POST['Clie_Num_ext'];
$Clie_Num_int=$_POST['Clie_Num_int'];
$Cp=$_POST['cp'];
$Colonia=$_POST['Colonia'];
$Ciudad=$_POST['Clie_Delegacion'];
$Estado=$_POST['estado'];
$Clie_Pais=$_POST['Clie_Pais'];
$Clie_email=$_POST['Clie_email'];
$Clie_RFC=$_POST['Clie_RFC'];
$Celular=$_POST['Celular'];
$Telefono=$_POST['Telefono'];
$RazonSocial=$_POST['RazonSocial'];

$sql = "EXEC DCliUpdateCli 
    @Cliente_ID=?,
    @Clie_Nombre=?,
    @Clie_Apellidos=?,
    @Calle=?,
    @Street_number=?,
    @Clie_Num_int=?,
    @Cp=?,
    @Colonia=?,
    @Ciudad=?,
    @Estado=?,
    @Clie_Pais=?,
    @Clie_email=?,
    @Clie_RFC=?,
    @Celular=?,
    @Telefono=?,
    @RazonSocial=?";
$params = array(
    $Cliente_ID,
    $Clie_Nombre,
    $Clie_Apellidos,
    $Calle,
    $Street_number,
    $Clie_Num_int,
    $Cp,
    $Colonia,
    $Ciudad,
    $Estado,
    $Clie_Pais,
    $Clie_email,
    $Clie_RFC,
    $Celular,
    $Telefono,
    $RazonSocial
    );

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
else{

        echo "Registro exitoso";
    
}
