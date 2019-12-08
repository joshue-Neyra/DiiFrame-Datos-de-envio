<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 

$sql = "Select Lat,Long from Empresa where Activado = 'True' and Eliminado = 'False'";
$req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));

if(sqlsrv_has_rows($req) != 1){
    echo "Error";
}
else{
	
	$resultado=  sqlsrv_fetch_array($req);
       $edit = json_encode($resultado);
    echo $edit;
}