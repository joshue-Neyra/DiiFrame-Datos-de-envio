<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 

$email=$_POST['email'];

$sql = "SELECT ID_Cliente, Clie_email FROM Clientes WHERE Clie_email ='$email' AND ID_Status =2";
$req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));

if(sqlsrv_has_rows($req) != 1){
    echo "Usuario o contraseña incorrectos";
}
else{
	$resultado=  sqlsrv_fetch_array($req);
	$Clie_email=$resultado['Clie_email'];
	$ID_Cliente=$resultado['ID_Cliente'];
    $str = "$ID_Cliente";
    // Encode the string
    $encodeString = base64_encode($str);
    
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/mail/mailrecuperar.php';
}