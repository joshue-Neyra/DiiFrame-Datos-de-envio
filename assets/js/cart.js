$(document).ready(function () {
    $("#form-direccion").hide();
    $("#form-pedidos").hide();
    $("#address").hide();
    $("#CrearDireccion").hide();
    $(".loader").hide();
    ListaDirecciones();
    Carrito(), ListaPedidos()
});

function dosDecimales(n) {
    let t = n.toString();
    let regex = /(\d*.\d{0,2})/;
    return t.match(regex)[0];
}


function Carrito() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/VerCarrito.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(response);
            var suma = 0;
            var imagen = "";
            $("#tbl_carrito").text("");
            for (i = 0; i < DatosJson.length; i++) {
                if (DatosJson[i].Meta != 'Marialuisa' && DatosJson[i].Meta != 'Vidrio') {
                    imagen = '<img width="50px" src="' + DatosJson[i].Imagen + '" />'
                    var precio = (DatosJson[i].Cantidad * DatosJson[i].Precio)*1.16;
                    $("#tbl_carrito").append('<tr>' +
                        '<td>' + imagen + ' </td>' +
                        '<td>' + DatosJson[i].Prod_Nombre + ' ' + DatosJson[i].Descripcion + '</td>' +
                        '<td><input class="form-control" id="Prd_' + i + '" type="number" value="' + DatosJson[i].Cantidad + '" onchange="UpdateCantidad(' + i + ')" /></td>' +
                        '<td class="text-right">$ ' + dosDecimales(precio.toFixed(2)) + ' MXN</td>' +
                        '<td class="text-right"><button class="btn btn-sm btn-danger" onclick="BorrarCarrito(' + i + ')" ><i class="fa fa-trash"></i> </button>' +
                        '</td>' +
                        '</tr>');

                    suma = parseFloat(precio) + suma;
                }

            }
            if (suma > 0) {
                $("#btn_show").prop("disabled", false);
            } else {
                $("#btn_show").prop("disabled", true);
            }
            $("#tbl_carrito").append('<tr>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td>Sub-Total</td>' +
                '<td class="text-right">$' + suma.toFixed(2) + ' MXN</td>' +
                '</tr>');
        }
    });
}

function UpdateCantidad(i) {
    var parametros = {
        cantidad: document.getElementById("Prd_" + i).value,
        i: i
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/UpdateCantidad.php',
        type: 'post',
        success: function (response) {
            Carrito()
        }
    });
}

function ListaPedidos() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/ListaPedidos.php',
        type: 'post',
        success: function (response) {
            var DatosJson = JSON.parse(response);
            $("#tbl_pedidos").text("");
            for (i = 0; i < DatosJson.length; i++) {
                $("#form-pedidos").show();
                $("#tbl_pedidos").append('<tr id="Prd_' + i + '">' +
                    '<td>' + DatosJson[i].Nota_ID + '</td>' +
                    '<td>' + DatosJson[i].Prod_Nombre + '</td>' +
                    '<td>' + DatosJson[i].Status + '</td>' +
                    '<td>' + DatosJson[i].Nota_Total + '</td>' +
                    '<td>' + DatosJson[i].Proceso_clave + '</td>' +
                    '<td><a class="btn btn-sm btn-primary text-white" href="/Pedido/?Nota_ID=' + DatosJson[i].Nota_ID + '" >Ver <i class="fas fa-eye"></i></a>' +
                    '</td>' +
                    '</tr>');
            }
        }
    });
}

function ListaDirecciones() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/ListaDirecciones.php',
        type: 'post',
        success: function (response) {
            var DatosJson = JSON.parse(response);
            $("#ClienteDirecciones").text("");
            $("#ClienteDirecciones").append('<h2 class="mb-4">¿Donde quieres recibir tu compra?</h2>');
            for (i = 0; i < DatosJson.length; i++) {
                var estado = "'"+DatosJson[i].Clie_Estado+"'";
                $("#ClienteDirecciones").append(
                    '<div class="col-xl-8 col-md-6 mb-4">' +
                    '<div class = "card border-left-warning shadow h-100 py-2">' +
                    '<div class = "card-body">' +
                    '<div class = "row no-gutters align-items-center">' +
                    '<div class = "col-auto mr-2" >' +
                    '<span class = "fa-stack fa-2x" >' +
                    '<i class = "fas fa-circle fa-stack-2x text-primary" > </i>' +
                    '<i class = "fas fa-map-marker-alt fa-stack-1x fa-inverse"> </i> </span>' +
                    '</div>' +
                    '<div class = "col mr-2" >' +
                    '<div class = "text-xs font-weight-bold text-uppercase mb-1">' +
                    DatosJson[i].Clie_Calle + ' ' + DatosJson[i].Clie_Num_Ext + '</div>' +
                    '<div class = " mb-0 font-weight-bold text-muted"> C.P. ' + DatosJson[i].CP + ', ' + DatosJson[i].Clie_Colonia + ', ' + DatosJson[i].Clie_Estado + ', ' + DatosJson[i].Clie_Pais + ', Cel. ' + DatosJson[i].Celular + '</div>' +
                    '</div> <div class = "col-auto">' +
                    '<btn class = "btn btn-sm btn-primary" onclick="GetCoordenadasEmpresa(' + DatosJson[i].Direccion_ID + ',' + estado + ',' + DatosJson[i].Lat + ',' + DatosJson[i].Long + ')"> Elegir </btn>' +
                    '</div></div></div> </div> </div>');
            }
            $("#ClienteDirecciones").append('<div class="col-xl-8 mb-4">' +
                '<center><button class="btn btn-danger" onclick="ShowFormCrear();">Crear Nueva Dirección <i class="fas fa-plus-circle"></i></button></center>' +
                '</div>')
        }
    });
}

function ShowFormCrear() {
    $("#ClienteDirecciones").hide();
    $("#CrearDireccion").fadeIn("slow");

}

function BorrarCarrito(id) {
    var parametros = {
        "id": id
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/BorrarCarrito.php',
        type: 'post',
        success: function (response) {
            //console.log(response);
            var x_id = parametros.id;
            for (var x = 0; x < 2; x++) {
                BorrarExtras(x_id)
            }
            Carrito();
        }
    });
}

function BorrarExtras(id) {
    var parametros = {
        "id": id
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/BorrarExtras.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            Carrito()
        }
    });
}
