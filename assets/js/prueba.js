function iVoy() {
    $.ajax({
        "url": "https://api.ivoy.dev/api/login/loginClient/json/web",
        "method": "POST",
        "headers": {
            "Content-Type": "application/json",
            "Authorization": "Basic VEVTVFRFU1Q6UEFTU1BBU1M="
        },
        "processData": false,
        "data": "{\n    \"data\": {\n        \"systemRequest\": {\n            \"user\": \"integracion-express@ivoy.mx\",\n            \"password\": \"sandbox\"\n        }\n    }\n}",
        success: function (response) {
            console.log(response);
        }
    });

}
