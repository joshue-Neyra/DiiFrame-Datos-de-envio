<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$Clie_ID=$_POST['Clie_ID'];
$decodeString = base64_decode($Clie_ID);

$sql = "SELECT ID_Cliente, Clie_email
                  
FROM     Clientes WHERE  ID_Cliente ='$decodeString' AND ID_Status =2";
$req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));

if(sqlsrv_has_rows($req) != 1){
    echo "Usuario o contraseña incorrectos";
}
else{
	
	$resultado=  sqlsrv_fetch_array($req);
	$Clie_email = $resultado['Clie_email'];
    echo  $Clie_email;
	
}
