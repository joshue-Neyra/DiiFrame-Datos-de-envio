<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 

$fecha=$_SESSION['Fecha'];
$date = date_create($fecha);
$Inv_Fecha= date_format($date, 'Y-m-d H:i:s');

$Ruta=$_SESSION['Nombre'];

$Prod_ID = $_SESSION['Producto'];
$Inv_cant = $_SESSION['Cantidad'];
$Inv_pre_unit = 1;
$Inv_pre_total= 1;
$Compra_Id = 0;
$Tipo_Servicio = 1;
$Cliente_ID = $_SESSION['Id'];
$Eliminado = 0;
$Activado = 1;
$Inv_descuento = 1;
$Cuadro_ID = $_SESSION['Producto'] ;
$Tarifa_ID = 1;
$RutaImagen = "www.diiframe.com.mx/$Ruta";
$Serv_ID=0;

$sql = "EXEC NuevoInventario @Serv_ID=?,
	@Prod_ID=?,
	@Inv_cant=?,
	@Inv_pre_unit=?,
	@Inv_pre_total=?,
	@Compra_Id=?,
	@Inv_Fecha=?,
	@Tipo_Servicio =?,
	@Cliente_ID =?,
	@Eliminado=?,
	@Activado=?,
	@Inv_descuento=?,
	@Cuadro_ID =?,
	@Tarifa_ID=?,
	@RutaImagen=?";
$params = array($Serv_ID,
	$Prod_ID,
	$Inv_cant,
	$Inv_pre_unit,
	$Inv_pre_total,
	$Compra_Id,
	$Inv_Fecha,
	$Tipo_Servicio ,
	$Cliente_ID ,
	$Eliminado,
	$Activado,
	$Inv_descuento,
	$Cuadro_ID ,
	$Tarifa_ID,
	$RutaImagen);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
else{
    echo "Registro exitoso";
}

