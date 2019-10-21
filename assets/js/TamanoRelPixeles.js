$(document).ready(function () {
	size();
});
function size() {
    
	var parametros = {
		"mp": document.getElementById("mp").value,
	}
	$.ajax({
		data: parametros,
		url: '/assets/tools/tamano/RelacionPixeles.php',
		type: 'post',
		dataType: 'json',
		success: function (response) {

			var DatosJson = JSON.parse(JSON.stringify(response));
			//console.log(DatosJson.length);
			for (i = 0; i < DatosJson.length; i++) {
                //$("#inp_cam_status").append("<option value=" + DatosJson[i].Status_ID + ">" + DatosJson[i].Status + "</option>");
                console.log( DatosJson[i].Resolucion);
			}
		}
	});
}