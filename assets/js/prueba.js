function CotizacioniVoy(LatEmp, LngEmp, LatCli, LngCli) {
    var data = {
        "data": {
            "bOrder": {
                "orderAddresses": [
                    {
                        "isPickup": 1,
                        "isSource": 1,
                        "personApproved": "null",
                        "phone": "null",
                        "address": {
                            "idAddress": null,
                            "externalNumber": null,
                            "internalNumber": null,
                            "latitude": LatEmp,
                            "longitude": LngEmp,
                            "neighborhood": "null",
                            "street": "null",
                            "zipCode": "null"
                        }
        },
                    {
                        "isPickup": 0,
                        "isSource": 0,
                        "address": {
                            "idAddress": null,
                            "externalNumber": "null",
                            "internalNumber": null,
                            "latitude": LatCli,
                            "longitude": LngCli,
                            "neighborhood": "null",
                            "street": "null",
                            "zipCode": "null"
                        }
        }
      ]
            }
        }
    }
    $.ajax({
        "url": "https://api.ivoy.dev/api/order/validZipCode/json/web",
        "method": "POST",
        "headers": {
            "Content-Type": "application/json",
            "Token": "eyJvd25lciI6ImlWb3kiLCJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZFVzZXIiOjQwNjE4LCJuYW1lVXNlciI6Ikd1aWxoZXJtZV81Vjk2OV9jY19jIiwibG9naW5UeXBlIjoyLCJpc3MiOiJURVNUVEVTVCIsImV4cCI6MTUwNzM4ODQzNSwiZGV2aWNlIjoid2ViIiwiZW1haWwiOiJndWlsaGVybWUudHVycmlAaXZveS5teCIsImlkWm9uZSI6MX0.OnbtgnalGUhKFD9qy1JBgDf_3QgMWSnFqE2te-SaptUq0homBI-fWXYbvwbaYqQcrR-LbyU8EzyfflLXMuwNQWtP5CvaAesp9lTgeBHJ01CH0Z5ll2evysZ4n58Dj7FvXqFHVkAf3PVw5k4p6idtpp1zgyUp19YD3_vTHyxBPWMNGHCgejfJzSQ8zkgx--utszKoJZUvNRT5smClk7PYJEdMphiladJiA94P6q7uwCwdLmubq3Q8ZnovdlWROhvUJUnTsBkj2XeozHvHaHnipfy842ArgLymwpna3YVmB0rw6hukh0B95WmkP7Hp-zDvC-WN_F92oyl0QKfgt_KAyw",
        },
        "processData": false,
        "data": JSON.stringify(data),
        success: function (r) {
            var precio = r.data.price;
            //console.log(precio);
            InsertPedido(precio);

        }
    });

}

function ShowDireccion() {
    //console.log("algo");
    $("#form-carrito").hide();
    $("#form-pedidos").hide();
    $("#form-direccion").show();
}
$("#target").submit(function (event) {

    var parametros = {
        "Celular": document.getElementById("inp_cli_cel").value,
        "Telefono": document.getElementById("inp_cli_tel").value,
        "street_number": document.getElementById("street_number").value,
        "Calle": document.getElementById("route").value,
        "ciudad": document.getElementById("locality").value,
        "estado": document.getElementById("administrative_area_level_1").value,
        "cp": document.getElementById("postal_code").value,
        "Country": document.getElementById("country").value,
        "lat": document.getElementById("lat").value,
        "long": document.getElementById("long").value,

    }
    if (parametros.estado != "CDMX") {
        alert("Lo sentimos, por el momento los envios fuera de CDMX no estan disponibles");
    } else {
        $.ajax({
            data: parametros,
            url: '/assets/tools/Carrito/EditarCliente.php',
            type: 'post',
            success: function (response) {
                if (response == "Registro exitoso") {
                    GetCoordenadasEmpresa(parametros.lat, parametros.long);
                } else {
                    alert(response);
                }
            }
        });
    }

    event.preventDefault();
});

function GetCoordenadasEmpresa(LatCli, LngCli) {
    $.ajax({
        url: '/assets/tools/Carrito/CoordenadasEmp.php',
        type: 'post',
        dataType: 'json',
        success: function (r) {
            CotizacioniVoy(r.Lat, r.Long, LatCli, LngCli);
        }
    });
}

function InsertPedido(CostoEnvio) {
    var d = new Date();
    var dia = d.getDate();
    var mes = d.getMonth() + 1;
    var año = d.getFullYear();
    var hora = d.getHours();
    var minuto = d.getMinutes();
    var segundos = d.getSeconds();
    if (mes.toString().length < 2) {
        mes = "0" + mes.toString();
    } else {
        mes = mes.toString();
    }
    if (dia.toString().length < 2) {
        dia = "0" + dia.toString();
    } else {
        dia = dia.toString();
    }
    var fecha = dia + "-" + mes + "-" + año.toString() + " " + hora.toString() + ":" + minuto.toString() + ":" + segundos.toString();
    var parametros = {
        "CostoEnvio": CostoEnvio,
        "fecha": fecha,

    }
    $.ajax({
        url: '/assets/tools/Carrito/InsertPedido.php',
        type: 'post',
        data: parametros,
        success: function (r) {
            location.href = "/Cart/Confirmar/?Nota_ID=" + r;
            console.log(r);
        }
    });


}
