$(document).ready(function () {
    $("#form-direccion").hide();
    $("#form-pedidos").hide();
    Carrito(), ListaPedidos()
});

function Carrito() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/VerCarrito.php',
        type: 'post',
        success: function (response) {
            //console.log(response);
            var DatosJson = JSON.parse(response);
            var suma = 0;
            $("#tbl_carrito").text("");
            for (i = 0; i < DatosJson.length; i++) {
                    $("#tbl_carrito").append('<tr id="Prd_' + i + '">' +
                        '<td><img width="50px" src="' + DatosJson[i].Imagen + '" /> </td>' +
                        '<td>' + DatosJson[i].Prod_Nombre + '</td>' +
                        '<td>' + DatosJson[i].Tamano + '</td>' +
                        '<td><input class="form-control" type="number" value="' + DatosJson[i].Cantidad + '" /></td>' +
                        '<td class="text-right">$ ' + DatosJson[i].Precio + '</td>' +
                        '<td class="text-right"><button class="btn btn-sm btn-danger" onclick="BorrarCarrito(' + i + ')" ><i class="fa fa-trash"></i> </button>' +
                        '</td>' +
                        '</tr>');
                
                suma = parseFloat(DatosJson[i].Precio) + suma;
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
                '<td></td>' +
                '<td>Sub-Total</td>' +
                '<td class="text-right">$' + suma + '</td>' +
                '</tr>');
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
                    '<td><a class="btn btn-sm btn-primary text-white" href="/Pedido/?Nota_ID=' + DatosJson[i].Nota_ID + '" >Ver <i class="fas fa-eye"></i></a>' +
                    '</td>' +
                    '</tr>');
            }
        }
    });
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
            console.log(response);
            Carrito()
        }
    });
}
