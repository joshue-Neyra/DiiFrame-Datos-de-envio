$(document).ready(function () {
    GetIVA();
    DatosCliente();
    DatosEmpresa();
    VerPedido();
});

function GetIVA() {
    $.ajax({
        type: 'post',
        url: '/assets/tools/Productos/GetIva.php',
        dataType: "json",
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            $("#inp_iva").val(DatosJson[0].TasaOCuota);
        }
    });
}

$('#printInvoice').click(function () {
    $(".toolbar").hide();
    Popup($('.invoice')[0].outerHTML);

    function Popup(data) {
        window.print();
        return true;
    }
});

function DatosCliente() {
    var parametros = {
        "Nota_ID": document.getElementById("Nota_ID").value
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Pedido/DatosCliente.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(response);
            for (i = 0; i < DatosJson.length; i++) {
                $(".to").text(DatosJson[i].Clie_Nombre + ' ' + DatosJson[i].Clie_Apellidos);
                $(".address").text(DatosJson[i].Clie_Calle + ' ' + DatosJson[i].Clie_Num_Ext + ', ' + DatosJson[i].CP +
                    ' ' + DatosJson[i].Clie_Estado + ', ' + DatosJson[i].Clie_Pais);
                $(".email").text(DatosJson[i].Clie_email);
                $(".celular").text(DatosJson[i].Celular);
            }
        }

    });
}

function DatosEmpresa() {
    $.ajax({
        url: '/assets/tools/Pedido/DatosEmpresa.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(response);
            for (i = 0; i < DatosJson.length; i++) {
                $(".name").text(DatosJson[i].RazonSocial);
                $("#phonenumber").text(DatosJson[i].Telefono1);
                $("#email").text(DatosJson[i].Email);
                $("#Address").text(DatosJson[i].Calle + ' ' + DatosJson[i].NoExt + ', C.P. ' + DatosJson[i].CP + ', ' + DatosJson[i].Estado + ', ' + DatosJson[i].Pais);
            }
        }

    });
}


function VerPedido() {
    var parametros = {
        "id": document.getElementById("Nota_ID").value
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/VerPedidoPagado.php',
        type: 'post',
        success: function (response) {
            var disabled = "";
            var btnDel = "";
            var Tamaño = "";

            var DatosJson = JSON.parse(response);
            var subtotal = 0;
            var nombre = "";
            var tamano = "";
            $("#tbl_Pedido").text("");
            var d = new Date(DatosJson[0].Fecha_Recibo.date);
            var Dia1 = d.getDate();
            var Mes1 = d.getMonth() + 1;
            var Año1 = d.getFullYear();
            var d2 = new Date(DatosJson[0].Fecha_Entrega.date);
            var Dia2 = d2.getDate();
            var Mes2 = d2.getMonth() + 1;
            var Año2 = d2.getFullYear();
            $("#date1").text("Fecha de recibo: " + Dia1 + '/' + Mes1 + '/' + Año1);
            $("#date2").text("Fecha estimada de entrega: " + Dia2 + '/' + Mes2 + '/' + Año2);

            for (i = 0; i < DatosJson.length; i++) {
                if (DatosJson[i].PrdMeta_ID == "Marialuisa") {
                    nombre = 'Marialuisa ';
                    tamano = DatosJson[i].Tamano;
                } else if (DatosJson[i].PrdMeta_ID == "Envio") {
                    nombre = DatosJson[i].Prod_Nombre;
                    tamano = "";
                } else {
                    nombre = DatosJson[i].Prod_Nombre;
                    tamano = DatosJson[i].Tamano;
                }
                $("#tbl_Pedido").append('<tr>' +
                    '<td class="no"> 0' + (parseInt(i) + 1) + ' </td>' +
                    '<td class="text-left"><h3>' + nombre + '</h3> </td>' +
                    '<td class = "unit" > ' + tamano + ' </td>' +
                    '<td class = "qty" > ' + DatosJson[i].Inv_cant + ' </td> ' +
                    '<td class = "total" > $' + Math.round10(DatosJson[i].Inv_pre_total, -2) + ' </td>' +
                    '</tr > ');
                subtotal = Math.round10(DatosJson[i].Nota_Monto);
                var descuento = Math.round10(DatosJson[i].Nota_Descuento, -2);
                var Impuesto = Math.round10(DatosJson[i].Nota_Impuesto, -2);
                var Total = Math.round10(DatosJson[i].Nota_Total, -2);
                 
                
            }
            $("#subtotal").text('$' + subtotal);
            $("#descuento").text('$ -' + descuento);
            $("#impuestos").text('$' + Impuesto);
            $("#total").text('$' + Total);

        }
    });
}

(function () {
    /**
     * Ajuste decimal de un número.
     *
     * @param {String}  tipo  El tipo de ajuste.
     * @param {Number}  valor El numero.
     * @param {Integer} exp   El exponente (el logaritmo 10 del ajuste base).
     * @returns {Number} El valor ajustado.
     */
    function decimalAdjust(type, value, exp) {
        // Si el exp no está definido o es cero...
        if (typeof exp === 'undefined' || +exp === 0) {
            return Math[type](value);
        }
        value = +value;
        exp = +exp;
        // Si el valor no es un número o el exp no es un entero...
        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
            return NaN;
        }
        // Shift
        value = value.toString().split('e');
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
    }

    // Decimal round
    if (!Math.round10) {
        Math.round10 = function (value, exp) {
            return decimalAdjust('round', value, exp);
        };
    }
    // Decimal floor
    if (!Math.floor10) {
        Math.floor10 = function (value, exp) {
            return decimalAdjust('floor', value, exp);
        };
    }
    // Decimal ceil
    if (!Math.ceil10) {
        Math.ceil10 = function (value, exp) {
            return decimalAdjust('ceil', value, exp);
        };
    }
})();
