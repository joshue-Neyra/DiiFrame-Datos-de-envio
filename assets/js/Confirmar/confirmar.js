$(document).ready(function () {
    VerPedido();

    $("#form_pago").hide();
    $(".loader").hide();

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
                //alert(DatosJson[i].PrdMeta_ID);
                if (DatosJson[i].PrdMeta_ID == 'Producto' || DatosJson[i].PrdMeta_ID == 'ArteOriginal') {
                    $("#tbl_confirmar").append('<tr class="rounded  bg-white ">' +
                        '<td>' + '<img width="50px" src="' + DatosJson[i].RutaImagen + '" />' + ' </td>' +
                        '<td>' + DatosJson[i].Prod_Nombre + ' - ' + DatosJson[i].Descripcion + '</td>' +
                        '<td><input class="form-control" ' + disabled + ' type="number" value="' + DatosJson[i].Inv_cant + '" /></td>' +
                        '<td class="text-right">$' + Math.round10(DatosJson[i].Inv_pre_total, -2).toFixed(2) + '</td>' +
                        '<td class="text-right"><button class="btn btn-sm btn-danger" onclick="BorrarInventario(' + DatosJson[i].Inv_ID + ')"><i class="fa fa-trash"></i> </button>' +
                        '</td>' +
                        '</tr>');
                    exit = 0;
                    sumaprod = parseFloat(sumaprod) + parseFloat(DatosJson[i].Inv_pre_total);
                } else if (DatosJson[i].PrdMeta_ID == 'Envio') {
                    var envio = Math.round10(DatosJson[i].Inv_pre_total, -2)
                    $("#envio").html("$" + envio.toFixed(2));
                    $("#inp_envio").val(envio);
                }
                suma = parseFloat(DatosJson[i].Inv_pre_total) + suma;
            }
            sumaprod = Math.round10(sumaprod, -2);
            $("#subtotal").html("$" + sumaprod.toFixed(2));
            $("#inp_subtotal").val(sumaprod);
            var iva = suma * 0.16;
            var total = suma * 1.16;
            var monto = suma;
            $("#inp_monto").val(monto);
            total = Math.round10(total, -2);
            $("#iva").html("$" + iva);
            $("#inp_iva").val(iva);
            $("#total").html("$" + total + ' (MXN)');
            $("#inp_total").val(total);
            //Actializar NtaMain, noata_id, monto, iva,total,total_pagado_proceso,status
            UpdateNota(parametros.id, monto, iva, total, 0, 0, 3);
            if (exit == 1) {
                location.href = "/cart/";
            }

        }
    });
}

function dosDecimales(n) {
    let t = n.toString();
    let regex = /(\d*.\d{0,2})/;
    return t.match(regex)[0];
}

$('#Pay').submit(function (event) {
    $("#form_productos").fadeOut("slow");
    $("#form_pago").fadeIn("slow");
    $("#step3").removeClass("active");
    $("#step4").removeClass("disabled");
    $("#step3").addClass("complete");
    $("#step4").addClass("active");
    event.preventDefault();
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
            VerPedido();
        }
    });
}

$(document).ready(function () {

    OpenPay.setId('mw8d97ek1oeitzkxg8cm');
    OpenPay.setApiKey('pk_6e0269d2baea4b78a48c9b12e7edd7a0');
    OpenPay.setSandboxMode(true);
    //Se genera el id de dispositivo
    var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

    $('#payment-form').submit(function (event) {
        event.preventDefault();
        $("#pay-button").prop("disabled", true);
        OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);
        $(".loader").show();
    });

    var sucess_callbak = function (response) {
        var token_id = response.data.id;
        $('#token_id').val(token_id);
        Pago(deviceSessionId);
    };

    var error_callbak = function (response) {
        var desc = response.data.description != undefined ? response.data.description : response.message;
        alert("ERROR [" + response.status + "] " + desc);
        $("#pay-button").prop("disabled", false);
    };

});

function Pago(deviceSessionId) {
    var envio = document.getElementById("inp_envio").value;
    var monto = document.getElementById("inp_monto").value;
    var iva = document.getElementById("inp_iva").value;
    var total = document.getElementById("inp_total").value;
    var parametros = {
        "token_id": document.getElementById("token_id").value,
        "Nota_ID": document.getElementById("Nota_ID").value,
        "deviceIdHiddenFieldName": deviceSessionId,
        "description": "Prueba",
        "amount": total,

    }
    //alert(parametros.deviceIdHiddenFieldName)
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/CargoTarjeta.php',
        type: 'post',
        success: function (response) {
            CorreoCliente(parametros.Nota_ID)
            $(".loader").hide();
            
            if (response == "debit" || response == "credit") {
                //Actializar NtaMain, noata_id, monto, iva,total,total_pagado_proceso,status
                UpdateNota(parametros.Nota_ID, monto, iva, total, total, 1, 1);
                PagoCRM(parametros.Nota_ID, total, response),
                CorreoVentas(parametros.Nota_ID);
                var factura = document.getElementById("inp_factura").checked;
                if (factura == true) {
                    facturar(parametros.Nota_ID);
                }

                location.href = '/Pedido/?Nota_ID=' + parametros.Nota_ID + '';
                //alert("Pago Aceptado");
            } else {
                alert(response);
                location.reload();
            }
        }
    });

}

function UpdateNota(id, monto, iva, total, total_pagado, proceso, status) {
    var parametros = {
        "Nota_ID": id,
        "subtotal": monto,
        "impuestos": iva,
        "total": total,
        "total_Pagado": total_pagado,
        "proceso": proceso,
        "status": status,
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/UpdateNota.php',
        type: 'post',
        success: function (response) {
            //console.log(response);
        }
    });
}

function CorreoVentas(Nota_ID) {
    var parametros = {
        "Nota_ID": Nota_ID
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/mail/correoventas.php',
        type: 'post',
        success: function (response) {
        }
    });
}

$("#MyButton").click(function() {
    var Nota_ID = document.getElementById("Nota_ID").value;
    CorreoCliente(Nota_ID)
});

function CorreoCliente(Nota_ID) {
    var tables = document.getElementsByTagName("table");
    var firstTable = tables[0];
    var tableAttr = firstTable.attributes;
    // get the tag name 'table'
    var tableString = "<" + firstTable.nodeName.toLowerCase();
    // get the tag attributes
    for (var i = 0; i < tableAttr.length; i++) {
        tableString += " " + tableAttr[i].name + "='" + tableAttr[i].value + "'";
    }

    // use innerHTML to get the contents of the table, then close the tag
    tableString += ">" + firstTable.innerHTML + "</" + firstTable.nodeName.toLowerCase() + ">";

    //alert(tableString);
    var parametros = {
        Nota_ID: Nota_ID,
        Contenido: tableString
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/mail/correocliente.php',
        type: 'POST',
        success: function (response) {
            //alert(response);
        }
    });
}

function facturar(Nota_ID) {
    var parametros = {
        "Nota_ID": Nota_ID
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/UpdateNotaFactura.php',
        type: 'post',
        success: function (response) {
            //console.log(response);
            //location.href='/Pedido/?Nota_ID='+ parametros.Nota_ID+'';
        }
    });
}

function PagoCRM(Nota_ID, total, tipo) {

    if (tipo == 'credit') {
        tipo = 2;
    } else if (tipo == 'debit') {
        tipo = 19;
    } else {
        tipo = 0;
    }
    var parametros = {
        "Nota_ID": Nota_ID,
        "monto": total,
        "tipo": tipo,
        "fecha": document.getElementById("date").value
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/PagoCRM.php',
        type: 'post',
        success: function (response) {
            //console.log(response);
        }
    });
}
