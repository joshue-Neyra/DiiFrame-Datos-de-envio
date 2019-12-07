function iVoy() {
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
                            "latitude": "19.4147264",
                            "longitude": "-99.18085289999999",
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
                            "latitude": "19.4182726",
                            "longitude": "-99.16175069999997",
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
        success: function (response) {
            console.log(response);
        }
    });

}
function ShowDireccion(){
    //console.log("algo");
    $("#form-carrito").hide();
    $("#form-direccion").show();
}
$( "#target" ).submit(function( event ) {
  alert( "Validado" );
  event.preventDefault();
});
