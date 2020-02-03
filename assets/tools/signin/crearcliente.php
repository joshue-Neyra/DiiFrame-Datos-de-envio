<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
$Clie_Nombre=$_POST['nombre'];
$Clie_Apellidos=$_POST['apellido'];
$Clie_email=$_POST['email'];
$PasswordInternet=$_POST['contrasena'];
$fecha=$_POST['fecha'];
$date = date_create($fecha);
$FechaAlta= date_format($date, 'Y-m-d H:i:s');

$EsVentaFacturacion=1;
$DescuentoActivado=0;
$EsClieLavanderiaInd=0;
$MetaClieID='Prospecto';
$ID_Status=2;
$Ejecutivo_ID=1;


$sql = "SELECT ID_Cliente FROM Clientes WHERE  Clie_email ='$Clie_email' and Clie_Nombre != '' ";
$req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));

if(sqlsrv_has_rows($req) != 1){
    $sql = "EXEC DCliInsertCli @param1 =?,
            @param2 =?,
            @param3 =?,
            @param4 =?,
            @param5 =?,
            @param6 =?,
            @param7 =?,
            @param8 =?,
            @param9 =?,
            @param11 =?,
            @param12 =?";
        $params = array($Clie_Nombre, $Clie_Apellidos, $FechaAlta,$EsVentaFacturacion,$DescuentoActivado,
                $EsClieLavanderiaInd,$MetaClieID,$ID_Status,$Ejecutivo_ID,$Clie_email, $PasswordInternet);

        $stmt = sqlsrv_query( $conn, $sql, $params);
        if( $stmt === false ) {
             die( print_r( sqlsrv_errors(), true));
        }
        else{
            
            
            $sql = "SELECT ID_Cliente, Clie_Nombre, Clie_Apellidos FROM Clientes WHERE Clie_email ='$Clie_email'";
            $req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));

            if(sqlsrv_has_rows($req) != 1){
                echo "Error";
            }
            else{
                session_start();
                $_SESSION['News'] = true;
                $_SESSION['Usuario'] = $Clie_email;
                $resultado=  sqlsrv_fetch_array($req);
                $_SESSION['Id'] = $resultado['ID_Cliente'];
                $_SESSION['Nombre_Cliente'] = $resultado['Clie_Nombre'];
            }
            echo "Registro exitoso";
        }
}
else{
     echo  "El correo electronico ya ha sido registrado previamente";
	
}


        
