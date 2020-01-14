function Correo() {
    $.ajax({
        url: '/assets/tools/mail/correo.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            //location.href='/Pedido/?Nota_ID='+ parametros.Nota_ID+'';
        }
    });
}