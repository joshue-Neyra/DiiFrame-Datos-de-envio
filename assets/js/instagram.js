$(document).ready(function () {
    InstagramGetMedia();
});


function InstagramGetMedia() {
    var at = document.getElementById("ig_access_token").value;
    $.ajax({
        "url": 'https://graph.instagram.com/me/media?fields=id,caption,media_url,media_type&access_token=' + at,
        "method": "GET",
        "headers": {
            "Content-Type": "application/json"
        },
        "processData": false,
        "dataType": 'json',
        "success": function (response) {
            var algo = response.data;
            console.log(response.data);
            console.log(algo[0].media_url);
            for (i = 0; i < algo.length; i++) {
                if (algo[i].media_type != "VIDEO") {
                    $("#Instagram_feed").append(' <div class="col-lg-3 gallery-item hvr-float-shadow">' +
                        '<a href="/build/digitalphoto/InstagramData/ElegirTamano/?Nombre='+algo[i].media_url+'" class="d-block mb-4 h-100 ">' +
                        
                        '<img class="img-fluid" src="' + algo[i].media_url + '" alt="Diiframe">' +
                        '</a>' +
                        '</div>');
                }
            }

            $(".loader").hide();


        }
    });

}
