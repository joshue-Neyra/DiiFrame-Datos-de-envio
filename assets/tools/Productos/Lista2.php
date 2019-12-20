<?php

$sql = "SELECT  Producto_ID, Prod_Nombre, Prod_Marca, Prod_Unidad_Medida, Prod_Precio, Prod_Fila, Inv_Productos, UnionProducto, UnionCon, Prod_Descripcion, Linea_ID, Fabricante_ID, Impuesto_ID, Ubicacion_ID, Prod_Costo, Prod_Peso, 
Prod_Precio2, Prod_Precio3, Imagen, Informacion, Familia_ID, SubFamilia_ID, Prod_PrecioUSD, Prod_CostoUSD, Prod_Puntos, Proveedor_ID, PorRecibir, PorSurtir, Prod_Oferta, Prod_Mod_Precio, Activo, FechaAlta, ValidoDesde, 
ValidoHasta, Existencia, Eliminado, Nombre_Fact, NoCancelarNota, CantidadMaxOrdenar, ActivarCantidadMaxOrdenar, BotonPaq_ID, Cliente_ID, TieneLogistica, ActivarManejoPrecioUSD, CodigoBarras, BloquearProdVenta, 
ProdBajaExistencia, ID_ClaveProdServ, ID_ClaveUnidad, PrdMeta_ID, ID_Status, Almacen_ID, ID_Ejecutivo_Alta, Hora_Alta, RutaImagen1, RutaImagen2, RutaImagen3,(select Precio from TamanosImpresion where Tamano_ID=1) as Precio
FROM     Productos
WHERE   ID_Status = 2 and PrdMeta_ID = 'Producto'";
function getArraySQL($sql){
    //Creamos la conexión con la función anterior
    require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; 

    if(!$result = sqlsrv_query($conn, $sql)) die(); //si la conexión cancelar programa

    $rawdata = array(); //creamos un array

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;

    while($row = sqlsrv_fetch_array($result))
    {
        $rawdata[$i] = $row;
        $i++;
    }
    return $rawdata; //devolvemos el array
}

        $myArray = getArraySQL($sql);
        echo json_encode($myArray);