<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 

$user=$_POST['usuario'];
$psw=$_POST['contrasena'];
$Pedido=$_POST['Pedido'];


$sql = "SELECT ID_Cliente, Clie_Nombre, Clie_Apellidos, Clie_Calle, Clie_Num_ext, Clie_Num_int, CP, Clie_Colonia, Clie_Delegacion, Clie_Estado, Clie_Pais, Clie_email,  PasswordInternet
                  
FROM     Clientes WHERE PasswordInternet='$psw' AND Clie_email ='$user' AND ID_Status =2";
$req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));

if(sqlsrv_has_rows($req) != 1){
    echo "Usuario o contraseña incorrectos";
}
else{
	session_start();
	$_SESSION['Usuario'] = $user;
	$resultado=  sqlsrv_fetch_array($req);
	$_SESSION['Id'] = $resultado['ID_Cliente'];
	$_SESSION['Nombre_Cliente'] = $resultado['Clie_Nombre'];
     echo  $resultado['ID_Cliente'];
    
    
    if ($Pedido == '1'){
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/Carrito/AgregarNotaPedido.php'; 
    }
	
}