$("#imagen").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
(function() {
    function filePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').text("");
                $('#preview').append('<img id="target" class="card-img-top" src="' + e.target.result + '" alt="build">');
                $('#btn_submit').removeClass("d-none");
                $('#btn_instagram').hide();

                /////
                $(function() {
                    $("#target").cropper({
                        zoomable: false
                    });
                });

                ///////
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#imagen').change(function() {
        $('#preview').text("");
        $('#preview').append('<img class="card-img-top" src="/assets/img/loading.gif" style=""-webkit-filter: grayscale(100%);filter: grayscale(100%);  alt="build">');
        filePreview(this);
    });
})();

function crop() {
    $("#target").cropper("getCroppedCanvas").toBlob(function(blob) {
        var formData = new FormData();
        formData.append("croppedImage", blob);
        var medidas = $('#target').cropper('getData', true);
        var fileName = $('#imagen').val().split("\\").pop();
        var alto = medidas.height;
        var ancho = medidas.width;
        var calculo = (alto * ancho)/100000
        var mp = parseInt(calculo);
        //alert(ancho+"x"+alto+"-"+fileName+"- MPX: "+mp);
        
        formData.append("croppedImage", blob,fileName);
        $.ajax({
            url: "/assets/tools/imageupload/upload.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response != "Image has been uploaded") {
                    console.log(response);
                    alert("La imagen excede el limite de 8 MB");
                }
                else if(response == "Image has been uploaded"){
                    location.href = "/build/digitalphoto/ElegirTamano/index.php?Nombre="+fileName+"&Mp="+mp;
                }

            },
            error: function(xhr, status, error) {
                console.log(status, error);
            }
        });
    });
}