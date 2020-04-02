$(document).ready(function () {

    ListaDirecciones();
    DatosCliente(); 
    ListaPedidos();
});

function dosDecimales(n) {
    let t = n.toString();
    let regex = /(\d*.\d{0,2})/;
    return t.match(regex)[0];
}


function DatosCliente() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/Usuario/DatosCliente.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(response);
            $("#inp_cli_nombre").val(DatosJson[0].Clie_Nombre);
            $("#inp_cli_apeliidos").val(DatosJson[0].Clie_Apellidos);
            $("#inp_cli_calle").val(DatosJson[0].Clie_Calle);
            $("#inp_cli_num_ext").val(DatosJson[0].Clie_Num_ext);
            $("#inp_cli_num_int").val(DatosJson[0].Clie_Num_int);
            $("#inp_cli_cp").val(DatosJson[0].CP);
            $("#inp_cli_colonia").val(DatosJson[0].Clie_Colonia);
            $("#inp_cli_delegacion").val(DatosJson[0].Clie_Delegacion);
            $("#inp_cli_estado").val(DatosJson[0].Clie_Estado);
            $("#inp_cli_pais").val(DatosJson[0].Clie_Pais);
            $("#inp_cli_email").val(DatosJson[0].Clie_email);
            $("#inp_cli_rfc").val(DatosJson[0].Clie_RFC);
            $("#inp_cli_tel").val(DatosJson[0].Clie_Tel);
            $("#inp_cli_razonsocial").val(DatosJson[0].RazonSocial);
            $("#inp_cli_cel").val(DatosJson[0].Celular);
        }
    });
}

//UPADATE CLIENTE
$("#form_cliente").submit(function (event) {
    event.preventDefault();
    var parametros = {
        "Clie_Nombre": document.getElementById("inp_cli_nombre").value,
        "Clie_Apellidos": document.getElementById("inp_cli_nombre").value,
        "Calle": document.getElementById("inp_cli_calle").value,
        "Clie_Num_ext": document.getElementById("inp_cli_num_ext").value,
        "Clie_Num_int": document.getElementById("inp_cli_num_int").value,
        "cp": document.getElementById("inp_cli_cp").value,
        "Colonia": document.getElementById("inp_cli_colonia").value,
        "Clie_Delegacion": document.getElementById("inp_cli_delegacion").value,
        "estado": document.getElementById("inp_cli_estado").value,
        "Clie_Pais": document.getElementById("inp_cli_pais").value,
        "Clie_email": document.getElementById("inp_cli_email").value,
        "Clie_RFC": document.getElementById("inp_cli_rfc").value,
        "Celular": document.getElementById("inp_cli_cel").value,
        "Telefono": document.getElementById("inp_cli_tel").value,
        "RazonSocial": document.getElementById("inp_cli_razonsocial").value
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Usuario/EditarCliente.php',
        type: 'post',
        success: function (response) {
            alert(response);
        }
    });

});

function ListaPedidos() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/ListaPedidos.php',
        type: 'post',
        success: function (response) {
            var DatosJson = JSON.parse(response);
            $("#tbl_pedidos").text("");
            for (i = 0; i < DatosJson.length; i++) {
                //$("#form-pedidos").show();
                $("#tbl_pedidos").append('<tr id="Prd_' + i + '">' +
                    '<td>' + DatosJson[i].Nota_ID + '</td>' +
                    '<td>' + DatosJson[i].Prod_Nombre + '</td>' +
                    '<td>' + DatosJson[i].Status + '</td>' +
                    '<td>$' + dosDecimales(DatosJson[i].Nota_Total) + '</td>' +
                    '<td>' + DatosJson[i].Proceso_clave + '</td>' +
                    '<td><a class="btn btn-sm btn-primary text-white" href="/Pedido/?Nota_ID=' + DatosJson[i].Nota_ID + '" >Ver <i class="fas fa-eye"></i></a>' +
                    '</td>' +
                    '</tr>');
            }
        }
    });
}

function ListaDirecciones() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/ListaDirecciones.php',
        type: 'post',
        success: function (response) {
            var DatosJson = JSON.parse(response);
            $("#tbl_direcciones").text("");
            for (i = 0; i < DatosJson.length; i++) {
                $("#tbl_direcciones").append('<tr>' +
                    '<th scope="row">'+DatosJson[i].Direccion_ID+'</th>' +
                    '<td>'+DatosJson[i].Clie_Calle+' '+DatosJson[i].Clie_Num_Ext+' int: '+DatosJson[i].Clie_Num_Int+'</td>' +
                    '<td> C.P. '+DatosJson[i].CP+', '+DatosJson[i].Clie_Colonia+', '+DatosJson[i].Clie_Estado+' '+DatosJson[i].Clie_Pais+'</td>' +
                    '<td>'+DatosJson[i].Celular+'</td>' +
                    //'<td><span class="badge badge-pill badge-success">Ended</span></td>' +
                    '<td><button class="btn btn-danger btn-sm"> Eliminar </button> | <button class="btn btn-primary btn-sm"> Editar </button></td>' +
                    '</tr>'
                );
            }

        }
    });
}

function ShowFormCrear() {
    $("#ClienteDirecciones").hide();
    $("#CrearDireccion").fadeIn("slow");
}

