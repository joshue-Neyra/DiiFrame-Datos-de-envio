<?php
require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 
session_start();
$Cliente_ID=$_SESSION['Id'];
$CostoEnvio=$_POST['CostoEnvio'];
$Direccion_ID=$_POST['Direccion_ID'];
$ivoy=$_POST['ivoy'];
$regalo=$_POST['regalo'];
$mensaje=$_POST['mensaje'];
$fecha=$_POST['fecha'];
$fechaEntrega= date('Y-m-d', strtotime($fecha. ' + 7 days'));
$date = date_create($fecha);
$fechanota= date_format($date, 'Y-m-d H:i:s');

$date2 = date_create($fechaEntrega);
$fechaentrega= date_format($date2, 'Y-m-d H:i:s');


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
    @param22 =?,
    @param23 =?,
    @param24 =?,
    @param25 =?,
    @param26 =?";
$params = array(
    $fechanota,//Fecha_Recibo
    $fechanota,//Hora_Recibo
    3,//ID_Ejecutivo_Recibe
    $Cliente_ID,
	3,//Status_ID
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
    $fechaentrega,//Fecha_Entrega
    0,//Hora_Entrega
    2,//ID_Status
    'Web',//Plataforma,
    $Direccion_ID,
    $ivoy,
    $regalo,
    $mensaje
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
                $Meta=$_SESSION['Meta'][$i];
                if ($Meta != 'Marialuisa' &&  $Meta != 'Vidrio'&&  $Meta != 'ArteOriginal'){
                    $inv_descripcion=$_SESSION['inv_descripcion'][$i];
                }
                else {
                    $inv_descripcion='';
                }
                if ($Meta == 'Impresion'){
                    $srcfile = $_SERVER['DOCUMENT_ROOT'].'/assets/tools/imageupload/'.$_SESSION['Imagen'][$i]; 
                    $destfile =$_SERVER['DOCUMENT_ROOT'].'/assets/tools/imageupload/ImagenesPedidos/'.$Nota_ID.$_SESSION['Imagen'][$i];
                    $nuevo_nombre = '/assets/tools/imageupload/ImagenesPedidos/'.$Nota_ID.$_SESSION['Imagen'][$i];
                    if (!copy($srcfile, $destfile)) { 
                    echo "File cannot be copied! \n"; 
                        $errors= error_get_last();
                    echo "COPY ERROR: ".$errors['type'];
                    echo "<br />\n".$errors['message'];
                    }
                    $imagen = "$nuevo_nombre";
                }
                    else if($Meta == 'ArteOriginal' || $Meta == 'SoloMarco'){
                        $imagen =$imglocal;
                    }
                    else{
                        $imagen = "";
                    }
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
                    @RutaImagen=?,
                    @inv_descripcion=?,
                    @Meta=?";
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
                    $imagen,
                    $inv_descripcion,
                    $Meta);

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
                        @RutaImagen=?,
                        @inv_descripcion=?,
                        @Meta=?";
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
                        '/assets/img/envio.jpg',
                        '',
                        'Envio');

                    $stmt = sqlsrv_query( $conn, $sql, $params);
                    if( $stmt === false ) {
                         die( print_r( sqlsrv_errors(), true));
                    }
                    else {echo "$Nota_ID";}
            
    }
    
}
