function Correo() {
    var parametros = {
        "Nota_ID": '12345'
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/mail/correocliente.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            //location.href='/Pedido/?Nota_ID='+ parametros.Nota_ID+'';
        }
    });
}