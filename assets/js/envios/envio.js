$(document).ready(function () {
    DatosEnvioCliente();
});

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
            }
            else{
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
