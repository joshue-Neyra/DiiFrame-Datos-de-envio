$(document).ready(function () {
    VerPedido()
    $("#form_pago").hide();
});

function VerPedido() {
    var parametros = {
        "id": document.getElementById("Nota_ID").value
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/VerPedido.php',
        type: 'post',
        success: function (response) {
            var disabled = "";
            var btnDel = "";
            var Tamaño = "";

            var DatosJson = JSON.parse(response);
            var suma = 0;
            var sumaprod = 0;
            var exit = 1;
            $("#tbl_confirmar").text("");

            for (i = 0; i < DatosJson.length; i++) {
                if (DatosJson[i].PrdMeta_ID == 'Producto') {
                    $("#tbl_confirmar").append('<tr>' +
                        '<td>' + '<img width="50px" src="' + DatosJson[i].RutaImagen + '" />' + ' </td>' +
                        '<td>' + DatosJson[i].Prod_Nombre + '</td>' +
                        '<td>' + DatosJson[i].Tamano + '</td>' +
                        '<td><input class="form-control" ' + disabled + ' type="number" value="' + DatosJson[i].Inv_cant + '" /></td>' +
                        '<td class="text-right">$ ' + Math.round10(DatosJson[i].Inv_pre_total, -2) + '</td>' +
                        '<td class="text-right"><button class="btn btn-sm btn-danger" onclick="BorrarInventario(' + DatosJson[i].Inv_ID + ')"><i class="fa fa-trash"></i> </button>' +
                        '</td>' +
                        '</tr>');
                    exit = 0;
                    sumaprod = parseFloat(sumaprod) + parseFloat(DatosJson[i].Inv_pre_total);
                } else if (DatosJson[i].PrdMeta_ID == 'Envio') {
                    var envio = Math.round10(DatosJson[i].Inv_pre_total, -2)
                    $("#envio").html("$" + envio);
                }
                suma = parseFloat(DatosJson[i].Inv_pre_total) + suma;
            }
            sumaprod = Math.round10(sumaprod, -2);
            $("#subtotal").html("$" + sumaprod);
            var iva = suma * 0.16;
            var total = suma * 1.16;
            total = Math.round10(total, -2);
            $("#iva").html("$" + iva);
            $("#total").html("$" + total);
            if (exit == 1) {
                location.href = "/cart/";
            }
        }
    });
}
$("#btn_resumen").click(function () {
    $("#form_productos").fadeOut("slow");
    $("#form_pago").fadeIn("slow");

});

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

function BorrarInventario(id) {
    var parametros = {
        "id": id
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/BorrarInventario.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            VerPedido()
        }
    });
}

$(document).ready(function () {

    OpenPay.setId('mzdtln0bmtms6o3kck8f');
    OpenPay.setApiKey('pk_f0660ad5a39f4912872e24a7a660370c');
    OpenPay.setSandboxMode(true);
    //Se genera el id de dispositivo
    var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

    $('#payment-form').submit(function (event) {
        event.preventDefault();
        $("#pay-button").prop("disabled", true);
        OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);
    });

    var sucess_callbak = function (response) {
        var token_id = response.data.id;
        $('#token_id').val(token_id);

        //console.log(response);
        //alert(response.data);
        Pago(deviceSessionId);
    };

    var error_callbak = function (response) {
        var desc = response.data.description != undefined ? response.data.description : response.message;
        alert("ERROR [" + response.status + "] " + desc);
        $("#pay-button").prop("disabled", false);
    };

});

function Pago(deviceSessionId) {
    var parametros = {
        "token_id": document.getElementById("token_id").value,
        "deviceIdHiddenFieldName": deviceSessionId,
        "description": "Prueba",
        "amount": 1
    }
    //alert(parametros.deviceIdHiddenFieldName)
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/CargoTarjeta.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            //VerPedido()
        }
    });

}
