$(document).ready(function () {
    Carrito()
});

function Carrito() {

    $.ajax({
        url: '/assets/tools/Carrito/VerCarrito.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            
             var DatosJson = JSON.stringify(response);
            var count = Object.keys(DatosJson).length;
            console.log(DatosJson.length);
            
            for (i = 0; i < DatosJson.length; i++) {
                $("#tbl_carrito").append('<tr>' +
                    '<td><img width="50px" src="' + DatosJson[i].Imagen + '" /> </td>' +
                    '<td>' + DatosJson[i].Imagen + '</td>' +
                    '<td>' + DatosJson[i].Imagen + '</td>' +
                    '<td><input class="form-control" type="number" value="' + DatosJson[i].Imagen + '" /></td>' +
                    '<td class="text-right">$ ' + DatosJson[i].Imagen + '</td>' +
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

function show_cart() {
    $.ajax({
        type: 'post',
        url: '/assets/tools/Carrito/VerCarrito.php',
        success: function (response) {
            console.log(response);
            document.getElementById("tbl_carrito").innerHTML = response;
        }
    });

}
