$(document).ready(function () {
    
    DatosEnvioCliente();
    VerPedido();
});

function dosDecimales(n) {
    let t = n.toString();
    let regex = /(\d*.\d{0,2})/;
    return t.match(regex)[0];
}

function DatosEnvioCliente() {
    var parametros = {
        Nota_ID: document.getElementById("inp_Nota_ID").value
    }
    $.ajax({
        url: '/assets/tools/envios/DatosEnvioCliente.php',
        type: 'post',
        data: parametros,
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            if (DatosJson[0].Envio_Ivoy_ID == 0) {
                $("#Cli_Indicaciones").val(DatosJson[0].Indicaciones);
                $("#Cli_Nombre").val(DatosJson[0].Clie_Nombre + ' ' + DatosJson[0].Clie_Apellidos);
                $("#Cli_Celular").val(DatosJson[0].Celular);
                $("#Cli_Num_Exterior").val(DatosJson[0].Clie_Num_Ext);
                $("#Cli_Num_Interior").val(DatosJson[0].Clie_Num_Int);
                $("#Cli_Lat").val(DatosJson[0].Lat);
                $("#Cli_Long").val(DatosJson[0].Long);
                $("#Cli_Colonia").val(DatosJson[0].Clie_Colonia);
                $("#Cli_Calle").val(DatosJson[0].Clie_Calle);
                $("#Cli_CP").val(DatosJson[0].CP);
                DatosEnvioEmpresa();
            } else {
                alert("Esta nota ya cuenta con una orden generada");
            }
        }
    });
}

function DatosEnvioEmpresa() {
    $.ajax({
        url: '/assets/tools/envios/DatosEnvioEmpresa.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            $("#Emp_Tel").val(DatosJson[0].Telefono1);
            $("#Emp_Num_Exterior").val(DatosJson[0].NoExt);
            $("#Emp_Num_Interior").val(DatosJson[0].NoInt);
            $("#Emp_Lat").val(DatosJson[0].Lat);
            $("#Emp_Long").val(DatosJson[0].Long);
            $("#Emp_Colonia").val(DatosJson[0].Colonia);
            $("#Emp_Calle").val(DatosJson[0].Calle);
            $("#Emp_CP").val(DatosJson[0].CP);
            loginIvoy();
        }
    });
}

function loginIvoy() {
    var data = {
        "data": {
            "systemRequest": {
                "user": "integracion-express@ivoy.mx",
                "password": "sandbox"
            }
        }
    }
    $.ajax({
        "url": "https://api.ivoy.dev/api/login/loginClient/json/web",
        "method": "POST",
        "headers": {
            "Content-Type": "application/json",
            "Authorization": "Basic VEVTVFRFU1Q6UEFTU1BBU1M=",
        },
        "processData": false,
        "data": JSON.stringify(data),
        success: function (r) {
            var accesstoken = r.token.access_token;
            Orden_Put(accesstoken);
        }
    });

}

function Orden_Put(accesstoken) {
    var Nota_ID = document.getElementById("inp_Nota_ID").value;

    var data = {
        "data": {
            "bOrder": {
                "device": "api",
                "orderType": {
                    "idOrderType": 1
                },
                "packageType": {
                    "idPackageType": 4
                },
                "paymentMethod": {
                    "idPaymentMethod": 4
                },
                "orderAddresses": [
                    {
                        //datos Empresa
                        "isPickup": 1,
                        "isSource": 1,
                        "comment": 'Recoger proyecto: ' + Nota_ID,
                        "personApproved": "DiiFrame",
                        "phone": document.getElementById("Emp_Tel").value,
                        "address": {
                            "externalNumber": document.getElementById("Emp_Num_Exterior").value,
                            "internalNumber": document.getElementById("Emp_Num_Interior").valuel,
                            "latitude": document.getElementById("Emp_Lat").value,
                            "longitude": document.getElementById("Emp_Long").value,
                            "neighborhood": document.getElementById("Emp_Colonia").value,
                            "street": document.getElementById("Emp_Calle").value,
                            "zipCode": document.getElementById("Emp_CP").value
                        }
        },
                    {
                        //datos cliente
                        "isPickup": 0,
                        "isSource": 0,
                        "comment": document.getElementById("Cli_Indicaciones").value,
                        "personApproved": document.getElementById("Cli_Nombre").value,
                        "phone": document.getElementById("Cli_Celular").value,
                        "address": {
                            "externalNumber": document.getElementById("Cli_Num_Exterior").value,
                            "internalNumber": document.getElementById("Cli_Num_Interior").value,
                            "latitude": document.getElementById("Cli_Lat").value,
                            "longitude": document.getElementById("Cli_Long").value,
                            "neighborhood": document.getElementById("Cli_Colonia").value,
                            "street": document.getElementById("Cli_Calle").value,
                            "zipCode": document.getElementById("Cli_CP").value
                        }
        }
      ]
            }
        }
    }
    $.ajax({
        "url": "https://api.ivoy.dev/api/order/newOrder/json/web",
        "method": "PUT",
        "headers": {
            "Content-Type": "application/json",
            "Token": accesstoken,
        },
        "processData": false,
        "data": JSON.stringify(data),
        success: function (r) {
            console.log(r);
            var Nota_ID = document.getElementById("inp_Nota_ID").value;
            CorreoCliente(Nota_ID);
            var Orden_ID = r.data.idOrder;
            alert("Se genero la orden: " + Orden_ID);
            $("#OrdenID").val(Orden_ID);
            UpdateNtaMain(Orden_ID)
            $(".loader").hide();
            //console.log(precio);
        }
    });
}

function UpdateNtaMain(Orden_ID) {
    var parametros = {
        Nota_ID: document.getElementById("inp_Nota_ID").value,
        Orden_ID: Orden_ID
    }
    $.ajax({
        url: '/assets/tools/envios/UpdateNtaMain.php',
        type: 'post',
        data: parametros,
        success: function (response) {
            alert(response);
        }
    });
}

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
        url: '/assets/tools/mail/correocliente_envio.php',
        type: 'POST',
        success: function (response) {
            //alert(response);
        }
    });
}

function VerPedido() {
    var parametros = {
        "id": document.getElementById("inp_Nota_ID").value
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Confirmar/VerPedido.php',
        type: 'post',
        success: function (response) {


            var DatosJson = JSON.parse(response);
            var suma = 0;
            var sumaprod = 0;
            var exit = 1;
            $("#tbl_correo").text("");

            for (i = 0; i < DatosJson.length; i++) {
                //alert(DatosJson[i].PrdMeta_ID);
                if (DatosJson[i].PrdMeta_ID == 'Producto' || DatosJson[i].PrdMeta_ID == 'ArteOriginal') {
                    $("#tbl_correo").append('<tr class="rounded  bg-white ">' +
                        '<td>' + '<img width="50px" src="' + DatosJson[i].RutaImagen + '" />' + ' </td>' +
                        '<td>' + DatosJson[i].Prod_Nombre + ' - ' + DatosJson[i].Descripcion + '</td>' +
                        '<td>' + DatosJson[i].Inv_cant + '</td>' +
                        '<td class="text-right">$' + dosDecimales(DatosJson[i].Inv_pre_total) + '</td>' +
                        '</tr>');
                    sumaprod = parseFloat(sumaprod) + parseFloat(DatosJson[i].Inv_pre_total);
                }

                suma = parseFloat(DatosJson[i].Inv_pre_total) + suma;
            }
        }
    });
}
