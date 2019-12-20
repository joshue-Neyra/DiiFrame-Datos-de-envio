$(document).ready(function () {
    $("#form-direccion").hide();
    Carrito()
});

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
            $("#tbl_carrito").text("");
            for (i = 0; i < DatosJson.length; i++) {
                if (DatosJson[i].Imagen != "MariaLuisa") {
                    $("#tbl_carrito").append('<tr id="Prd_' + i + '">' +
                        '<td><img width="50px" src="' + DatosJson[i].Imagen + '" /> </td>' +
                        '<td>' + DatosJson[i].Prod_Nombre + '</td>' +
                        '<td>' + DatosJson[i].Tamano + '</td>' +
                        '<td><input class="form-control" type="number" value="' + DatosJson[i].Cantidad + '" /></td>' +
                        '<td class="text-right">$ ' + DatosJson[i].Precio + '</td>' +
                        '<td class="text-right"><button class="btn btn-sm btn-danger" onclick="BorrarCarrito(' + i + ')" ><i class="fa fa-trash"></i> </button>' +
                        '</td>' +
                        '</tr>');
                }
                else{}
                suma = parseFloat(DatosJson[i].Precio) + suma;
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
