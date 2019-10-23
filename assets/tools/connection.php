<?php
$serverName = "3.17.107.84,1433"; //serverName\instanceName
$connectionInfo = array( "Database"=>"AcqCRMDiiFrame", "UID"=>"sa", "PWD"=>"14Acquatronix","CharacterSet"=>"UTF-8" );
$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn ) {
   
}else{
     echo "Conexión no se pudo establecer.";
    
}
