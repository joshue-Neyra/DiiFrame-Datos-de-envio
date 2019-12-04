function iVoy() {
    var Token = "eyJvd25lciI6ImlWb3kiLCJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZFVzZXIiOjQwNjE4LCJuYW1lVXNlciI6Ikd1aWxoZXJtZV81Vjk2OV9jY19jIiwibG9naW5UeXBlIjoyLCJpc3MiOiJURVNUVEVTVCIsImV4cCI6MTUwNzM4ODQzNSwiZGV2aWNlIjoid2ViIiwiZW1haWwiOiJndWlsaGVybWUudHVycmlAaXZveS5teCIsImlkWm9uZSI6MX0.OnbtgnalGUhKFD9qy1JBgDf_3QgMWSnFqE2te-SaptUq0homBI-fWXYbvwbaYqQcrR-LbyU8EzyfflLXMuwNQWtP5CvaAesp9lTgeBHJ01CH0Z5ll2evysZ4n58Dj7FvXqFHVkAf3PVw5k4p6idtpp1zgyUp19YD3_vTHyxBPWMNGHCgejfJzSQ8zkgx--utszKoJZUvNRT5smClk7PYJEdMphiladJiA94P6q7uwCwdLmubq3Q8ZnovdlWROhvUJUnTsBkj2XeozHvHaHnipfy842ArgLymwpna3YVmB0rw6hukh0B95WmkP7Hp-zDvC-WN_F92oyl0QKfgt_KAyw";
    var data = {
        data: {
            "systemRequest": {
                "user": "integracion-express@ivoy.mx",
                "password": "sandbox"
            }
        }
    }
    $.ajax({
        url: 'https://api.ivoy.dev/api/login/loginClient/json/web',
        type: 'POST',
        contentType: 'application/json',
        Authorization: 'Basic QUxCT01YU0Q6aVhuSkN2YW5BdjViaWc5eTc5eHdaVUlMNHdocWNlcE',
        Token: Token,
        data: JSON.stringify({
            "data": {
                "systemRequest": {
                    "user": " fernando.zarate@masarte.mx",
                    "password": "12345"
                }
            }
        }),
        success: function (response) {
            console.log(response);
        }
    });

}
