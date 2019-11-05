$(document).ready(function () {
    Carrito();
});

function Carrito() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/VerCarrito.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            for (i = 0; i < DatosJson.length; i++) {
                console.log(DatosJson[i].ImagenUsuario);
                $("#tbl_carrito").append('<tr>' +
                    '<td><img width="50px" src="' + DatosJson[i].ImagenUsuario + '" /> </td>' +
                    '<td>' + DatosJson[i].Prod_Nombre + '</td>' +
                    '<td>' + DatosJson[i].Tamano + '</td>' +
                    '<td><input class="form-control" type="number" value="' + DatosJson[i].Cantidad + '" /></td>' +
                    '<td class="text-right">$ ' + DatosJson[i].Precio + '</td>' +
                    '<td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button>' +
                    '</td>' +
                    '</tr>');
            }
            $("#tbl_carrito").append('<tr>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td></td>' +
                '<td>Sub-Total</td>' +
                '<td class="text-right">$</td>' +
                '</tr>');
        }
    });
}
