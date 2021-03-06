$(document).ready(function () {
    GetIVA();
    VerPedido();
    $("#form_pago").hide();
    $("#tr_descuento").hide();
    $(".loader").hide();


});

function SoloNumeros(evt) {
    if (window.event) {
        keynum = evt.keyCode;
    } else {
        keynum = evt.which;
    }
    if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 || keynum == 45) {
        return true;
    } else {
        return false;
    }
}

$("#card_number, #expiration_month, #expiration_year, #cvv2").keypress(function () {
    return SoloNumeros(event);
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

function VerPedido() {
    var parametros = {
        "id": document.getElementById("Nota_ID").value
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/VerPedido.php',
        type: 'post',
        success: function (response) {
            var disabled = "disabled";
            var btnDel = "";
            var Tamaño = "";

            var DatosJson = JSON.parse(response);
            var suma = 0;
            var sumaprod = 0;
            var exit = 1;
            $("#tbl_confirmar").text("");
            $("#tbl_correo").text("");

            for (i = 0; i < DatosJson.length; i++) {
                if (DatosJson[i].PrdMeta_ID == 'Producto' || DatosJson[i].PrdMeta_ID == 'ArteOriginal') {
                    $("#tbl_correo").append('<tr class="rounded  bg-white ">' +
                        '<td>' + '<img width="50px" src="' + DatosJson[i].RutaImagen + '" />' + ' </td>' +
                        '<td>' + DatosJson[i].Prod_Nombre + ' - ' + DatosJson[i].Descripcion + '</td>' +
                        '<td>' + DatosJson[i].Inv_cant + '</td>' +
                        '<td class="text-right">$' + Math.round10(DatosJson[i].Inv_pre_total, -2).toFixed(2) + '</td>' +

                        '</tr>');
                }
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

            var iva_porcentaje = document.getElementById("inp_iva").value;
            var descuento = document.getElementById("inp_descuento").value;

            var iva_116 = parseFloat(1) + parseFloat(iva_porcentaje);
            var iva = (suma - descuento) * iva_porcentaje;
            var total = (suma - descuento) * iva_116;
            var monto = (suma - descuento);
            $("#inp_monto").val(monto);
            total = Math.round10(total, -2);
            $("#iva").html("$" + Math.round10(iva, -2));
            $("#inp_ivanota").val(iva);
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

    OpenPay.setId('mnyeni3tgymyscsrc823');
    OpenPay.setApiKey('pk_6557ab10001e460796c221f00d5823d3');
    OpenPay.setSandboxMode(false);
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
        //alert("ERROR [" + response.status + "] " + desc);
        alert("Tarjeta declinada");
        location.reload();
        $("#pay-button").prop("disabled", false);
    };

});

function Pago(deviceSessionId) {
    var envio = document.getElementById("inp_envio").value;
    var monto = document.getElementById("inp_monto").value;
    var iva = document.getElementById("inp_ivanota").value;
    var total = document.getElementById("inp_total").value;
    var parametros = {
        "token_id": document.getElementById("token_id").value,
        "Nota_ID": document.getElementById("Nota_ID").value,
        "deviceIdHiddenFieldName": deviceSessionId,
        "description": "Prueba",
        "amount": total,

    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/CargoTarjeta.php',
        type: 'post',
        success: function (response) {

            if (response == "debit" || response == "credit") {
                CorreoCliente(parametros.Nota_ID);
                var descuento = document.getElementById("inp_descuento").value;
                //alert("1: " + descuento);
                if (descuento > 0) {
                    RegistroPromocion(parametros.Nota_ID);
                    Actualizarcodigo();
                }
                //Actializar NtaMain, noata_id, monto, iva,total,total_pagado_proceso,status
                UpdateNota(parametros.Nota_ID, monto, iva, total, total, 1, 1);

                PagoCRM(parametros.Nota_ID, total, response),
                CorreoVentas(parametros.Nota_ID);
                var factura = document.getElementById("inp_factura").checked;
                if (factura == true) {
                    facturar(parametros.Nota_ID);
                }

                location.href = '/Pedido/?Nota_ID=' + parametros.Nota_ID + '';
            } else {
                alert("Tarjeta declinada");
                location.reload();
            }

        }
    });

}

function Actualizarcodigo() {
    var parametros = {
        "codigo": document.getElementById("codigo_voucher").value

    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/ActualizarCodigo.php',
        type: 'post',
        success: function (response) {
            console.log(response);
        }
    });
}

function RegistroPromocion(Nota_ID) {
    var parametros = {
        "codigo": document.getElementById("codigo_voucher").value,
        "Nota_ID": Nota_ID,
        "fecha": document.getElementById("date").value,
        "cantidad": 1,
        "descuento": document.getElementById("inp_descuento").value

    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/Registropromocion.php',
        type: 'post',
        success: function (response) {
            
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
        "descuento": document.getElementById("inp_descuento").value
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
        success: function (response) {}
    });
}

$("#inp_factura").click(function () {
    if ($('#inp_factura').is(':checked')) {
        $('#ModalFacturacion').modal('show');
        $.ajax({
            url: '/assets/tools/Confirmar/BuscarFacturacion.php',
            type: 'post',
            success: function (response) {
                var DatosJson = JSON.parse(response);
                $("#inp_razon_social").val(DatosJson[0].RazonSocial);
                $("#inp_rfc").val(DatosJson[0].Clie_RFC);
            }
        });
    } else {
        $('#ModalFacturacion').modal('hide');
        $('#inp_factura').prop("checked", false);
    }
});

$("#cancelar_facturacion").click(function () {
    $('#inp_factura').prop("checked", false);
    $('#ModalFacturacion').modal('hide');


});

$('#form_facturacion').submit(function (event) {
    var parametros = {
        rfc: document.getElementById("inp_rfc").value,
        razonsocial: document.getElementById("inp_razon_social").value
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/UpdateFacturacion.php',
        type: 'post',
        success: function (response) {
            $('#ModalFacturacion').modal('hide');

        }
    });
    event.preventDefault();
});

function calcularpreciodesceunto() {
    var subtotal = document.getElementById("inp_subtotal").value;
    var envio = document.getElementById("inp_envio").value;
    var suma = parseFloat(subtotal) + parseFloat(envio);
    var iva_porcentaje = document.getElementById("inp_iva").value;
    var descuento = document.getElementById("inp_descuento").value;
    //alert(descuento);
    var monto = (suma - descuento);
    $("#inp_monto").val(monto);
    var iva_116 = parseFloat(1) + parseFloat(iva_porcentaje);
    var iva = monto * iva_porcentaje;
    var total = monto * iva_116;

    total = Math.round10(total, -2);
    $("#iva").html("$" + Math.round10(iva, -2));
    $("#inp_ivanota").val(iva);
    $("#total").html("$" + total + ' (MXN)');
    $("#inp_total").val(total);
}

$('#form_voucher').submit(function (event) {
    var parametros = {
        codigo: document.getElementById("codigo_voucher").value
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/ValidarVoucher.php',
        type: 'post',
        dataType: 'json',
        success: function (r) {
            console.log(r);
            var DatosJson = JSON.parse(JSON.stringify(r));
            var subtotal = document.getElementById("inp_subtotal").value;
            var porcentaje = "0." + DatosJson[0].PorcentajeDescuento;
            var descuento = parseFloat(subtotal) * parseFloat(porcentaje);
            $('#inp_descuento').val(descuento);
            $("#tr_descuento").show();
            $("#descuento").html("- $" + descuento + ' (MXN)');
            calcularpreciodesceunto();
            $('#btn_voucher').attr('disabled', 'disabled');

        }
    });
    event.preventDefault();
});

function CorreoCliente(Nota_ID) {
    var tables = document.getElementsByTagName("table");
    var firstTable = tables[1];
    var tableAttr = firstTable.attributes;
    // get the tag name 'table'
    var tableString = "<" + firstTable.nodeName.toLowerCase();
    // get the tag attributes
    for (var i = 0; i < tableAttr.length; i++) {
        tableString += " " + tableAttr[i].name + "='" + tableAttr[i].value + "'";
    }

    // use innerHTML to get the contents of the table, then close the tag
    tableString += ">" + firstTable.innerHTML + "</" + firstTable.nodeName.toLowerCase() + ">";

    var parametros = {
        Nota_ID: Nota_ID,
        Contenido: tableString
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/mail/correocliente.php',
        type: 'POST',
        success: function (response) {}
    });
}

function facturar(Nota_ID) {
    var rfc = document.getElementById("inp_rfc").value;
    var razonsocial = document.getElementById("inp_razon_social").value;
    if (rfc == "" || razonsocial == "") {
        $('#ModalFacturacion').modal('show');
    } else {
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
