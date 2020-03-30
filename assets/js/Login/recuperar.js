 $("#form_recuperar").submit(function (event) {
     var parametros = {
         "email": document.getElementById("inp_correo").value,
     }
     $.ajax({
         data: parametros,
         url: '/assets/tools/login/recuperar.php',
         type: 'post',
         success: function (response) {
             alert(response);
         }
     });
     event.preventDefault();
 });

 function Datos() {
     var parametros = {
         "Clie_ID": document.getElementById("Clie_ID").value,
     }
     $.ajax({
         data: parametros,
         url: '/assets/tools/login/Datos.php',
         type: 'post',
         success: function (response) {
             $("#mail").text("Usuario: " + response);
         }
     });
 }

 $("#form_reestablecer").submit(function (event) {
     var psw1 = document.getElementById("inp_psw1").value;
     var psw2 = document.getElementById("inp_psw2").value;
     if (psw1 != psw2) {
         alert("Las contraseñas no coinciden");
     } else {
         var parametros = {
             "Password": psw2,
             "Clie_ID": document.getElementById("Clie_ID").value
         }
         $.ajax({
             data: parametros,
             url: '/assets/tools/login/reestablecer.php',
             type: 'post',
             success: function (response) {
                 if (response == "Registro Exitoso") {
                     alert(response);
                     location.href = "/Login/";
                 } else {
                     console.log(response);
                     alert("Error, intente de nuevo");
                 }

             }
         });
     }

     event.preventDefault();
 });
