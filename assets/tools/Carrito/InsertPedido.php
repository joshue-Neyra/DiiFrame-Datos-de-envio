<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
session_start();
$Cliente_ID=$_SESSION['Id'];
$CostoEnvio=$_POST['CostoEnvio'];
$fecha=$_POST['fecha'];
$date = date_create($fecha);
$fechanota= date_format($date, 'Y-m-d H:i:s');

$sql = "EXEC DPedInsertPed 
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
	@param14 =?,
	@param15 =?,
	@param16 =?,
	@param17 =?,
	@param18 =?,
	@param19 =?,
	@param20 =?,
	@param21 =?,
    @param22 =?";
$params = array(
    $fechanota,//Fecha_Recibo
    $fechanota,//Hora_Recibo
    3,//ID_Ejecutivo_Recibe
    $Cliente_ID,
	1,//Status_ID
    1,//Proceso_ID
    0,//TktImpreso
    0,//Facturado
    0,//Afacturar
    3,//TipoServicio_ID
    0,//ConCorteCaja
    1,//Sucursal_ID
    'PedidosWeb',//MetaNotaID
    1,//Activado
    0,//Eliminado
    0,//NoReferenciaWeb
    0,//NoTicket
    'C',//Serie
    0,//Fecha_Entrega
    0,//Hora_Entrega
    2,//ID_Status
    'Web'//Plataforma
);

$stmt = sqlsrv_query( $conn, $sql, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
else{
    $sql = "SELECT Nota_ID,(select Producto_ID from Productos where PrdMeta_ID = 'Envio') as Envio FROM NtaMain where Cliente_ID = $Cliente_ID  and Fecha_Recibo = '$fechanota' ";
    $req =  sqlsrv_query($conn, $sql) or die(print_r(sqlsrv_errors(),true));

    if(sqlsrv_has_rows($req) != 1){
        echo "Error";
    }
    else{
            $resultado=  sqlsrv_fetch_array($req);
            $Nota_ID = $resultado['Nota_ID'];
            $Envio = $resultado['Envio'];
            for($i=0;$i<count($_SESSION['Producto']);$i++){
                
                $producto = $_SESSION['Producto'][$i];
                $productonombre = $_SESSION['Prod_Nombre'][$i];
                $tamano = $_SESSION['Tamano'][$i];
                $tamanoID = $_SESSION['Tamano_ID'][$i];
                $cantidad = $_SESSION['Cantidad'][$i];
                $precio = $_SESSION['Precio'][$i];
                $imglocal=$_SESSION['Imagen'][$i];
                $imagen = "$imglocal";
                $precio_total= $cantidad * $precio;

                $sql = "EXEC NuevoInventario @Serv_ID =?,
                    @Prod_ID =?,
                    @Inv_cant =?,
                    @Inv_pre_unit =?,
                    @Inv_pre_total =?,
                    @Compra_Id =?,
                    @Inv_Fecha =?,
                    @Tipo_Servicio =?,
                    @Cliente_ID =?,
                    @Eliminado =?,
                    @Activado =?,
                    @Inv_descuento =?,
                    @Tamano_ID =?,
                    @Tarifa_ID =?,
                    @RutaImagen=?";
                $params = array(
                    $Nota_ID,
                    $producto,
                    $cantidad,
                    $precio,
                    $precio_total,
                    0,//compraid
                    $fechanota,
                    3,//tiposervicio
                    $Cliente_ID,
                    0,//eliminado
                    1,//activado
                    0,//descuento
                    $tamanoID,
                    0,
                    $imagen);

                $stmt = sqlsrv_query( $conn, $sql, $params);
                if( $stmt === false ) {
                     die( print_r( sqlsrv_errors(), true));
                }
            }
            $sql = "EXEC NuevoInventario @Serv_ID =?,
                        @Prod_ID =?,
                        @Inv_cant =?,
                        @Inv_pre_unit =?,
                        @Inv_pre_total =?,
                        @Compra_Id =?,
                        @Inv_Fecha =?,
                        @Tipo_Servicio =?,
                        @Cliente_ID =?,
                        @Eliminado =?,
                        @Activado =?,
                        @Inv_descuento =?,
                        @Tamano_ID =?,
                        @Tarifa_ID =?,
                        @RutaImagen=?";
                    $params = array(
                        $Nota_ID,
                        $Envio,
                        1,
                        $CostoEnvio,
                        $CostoEnvio,
                        0,//compraid
                        $fechanota,
                        3,//tiposervicio
                        $Cliente_ID,
                        0,//eliminado
                        1,//activado
                        0,//descuento
                        1,//tamano
                        0,
                        '/assets/img/envio.jpg');

                    $stmt = sqlsrv_query( $conn, $sql, $params);
                    if( $stmt === false ) {
                         die( print_r( sqlsrv_errors(), true));
                    }
                    else {echo "$Nota_ID";}
            
    }
    
}
