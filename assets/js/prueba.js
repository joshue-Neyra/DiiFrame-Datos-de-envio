function CotizacioniVoy(LatEmp, LngEmp, LatCli, LngCli,Direccion_ID) {
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
            InsertPedido(precio,Direccion_ID);

        }
    });

}

function ShowDireccion() {
    //console.log("algo");
    $("#form-carrito").hide();
    $("#form-pedidos").hide();
    $("#form-direccion").show();
    $("#step1").removeClass("active");
    $("#step2").removeClass("disabled");
    $("#step1").addClass("complete");
    $("#step2").addClass("active");
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
        "Colonia": document.getElementById("administrative_area_level_2").value,
        "Referencia": document.getElementById("inp_referencias").value,

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
                    ListaDirecciones();
                    $("#ClienteDirecciones").fadeIn("slow");
                    $("#CrearDireccion").hide();
                   
                } else {
                    alert(response);
                }
            }
        });
    }
    event.preventDefault();
});

$("#reset").click(function (event) {
    $("#ClienteDirecciones").fadeIn("slow");
    $("#CrearDireccion").hide();
    event.preventDefault();
});

function GetCoordenadasEmpresa(Direccion_ID,LatCli, LngCli) {
    $.ajax({
        url: '/assets/tools/Carrito/CoordenadasEmp.php',
        type: 'post',
        dataType: 'json',
        success: function (r) {
            CotizacioniVoy(r.Lat, r.Long, LatCli, LngCli, Direccion_ID);
        }
    });
}

function InsertPedido(CostoEnvio,Direccion_ID) {

    var parametros = {
        "CostoEnvio": CostoEnvio,
        "fecha": document.getElementById("date").value,
        "Direccion_ID":Direccion_ID

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
