const calle = document.getElementById('calle');
const numero_ext = document.getElementById('num_ext');
const num_int = document.getElementById('num_int');
const colonia = document.getElementById('colonia');
const alcaldia = document.getElementById('alcaldia');
const estado = document.getElementById('estado');
const pais = document.getElementById('pais');
const cp = document.getElementById('cp');
const celular = document.getElementById('celular');
const telefono = document.getElementById('telefono');
const referencias = document.getElementById('inp_referencias');
const boton_aceptar = document.getElementById('button_aceptar');
const boton_reiniciar = document.getElementById('resetBTN');
const formulario = document.getElementById('form_principal');
const input = document.getElementById('pac-input');

// event listeners

eventListener();
function eventListener(){
    // inabilitar el boton de "aceptar" al cargar la pagina:
    document.addEventListener('DOMContentLoaded', btnAceptar);

    // validar los campos del formulario:
    calle.addEventListener('input', validarCampo);
    numero_ext.addEventListener('input', validarCampo);
    num_int.addEventListener('input', validarCampo);
    colonia.addEventListener('input', validarCampo);
    alcaldia.addEventListener('input', validarCampo);
    estado.addEventListener('input', validarCampo);
    pais.addEventListener('input', validarCampo);
    cp.addEventListener('input', validarCampo);
    celular.addEventListener('input', validarCampo);
    telefono.addEventListener('input', validarCampo);
    referencias.addEventListener('input', validarCampo);

    // enviar el formulario:
    formulario.addEventListener('submit', agregarDireccion);
    
    // reiniciar el form:
    boton_reiniciar.addEventListener('click', reset);

}


// funciones:

// desactivar el boton de aceptar
function btnAceptar(e){
    e.preventDefault();
    let aceptar = boton_aceptar;
    aceptar.disabled = true;
}

// validacion de los campos del formulario:
function validarCampo(){
    if(calle.value.length > 0 && numero_ext.value.length > 0 && num_int.value.length > 0 && colonia.value.length > 0 && alcaldia.value.length > 0 && estado.value.length > 0 && pais.value.length > 0 && cp.value.length > 0 && celular.value.length > 0 && telefono.value.length > 0 && referencias.value.length > 0){
        let aceptar = boton_aceptar;
        aceptar.disabled = false;
    } else {
        // alert('Todos los campos son obligatorios');
    }
}

// agregar la direccion:
function agregarDireccion(e){
    e.preventDefault();
    // leer los datos del formulario para formar la direccion de entrega:
    let calle = document.getElementById('calle').value;
    let num_ext = document.getElementById('num_ext').value;
    let colonia = document.getElementById('colonia').value;
    let alc = document.getElementById('alcaldia').value;
    let estado = document.getElementById('estado').value;
    let pais = document.getElementById('pais').value;

    // crear la estructura de la direccion:
    let direccion_entrega = `Calle ${calle} ${num_ext}, ${colonia}, ${alc}, ${estado}, ${pais}`;

    // agregar el input con la direccion al documento:
    const mostrarDirecion = document.getElementById('pac-input');   //input para mostrar la direccion
    mostrarDirecion.value = direccion_entrega;

}


// reiniciar el formulario.
function reset(e){
    e.preventDefault();
    formulario.reset();
}


// google api:
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 19.4326018,
            lng: -99.1353936
        },
        zoom: 12
    });
    var card = document.getElementById('pac-card');
    var input = document.getElementById('pac-input');   //input con el valor de la direccion
    var types = document.getElementById('type-selector');
    var strictBounds = document.getElementById('strict-bounds-selector');

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

    var autocomplete = new google.maps.places.Autocomplete(input);

    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    autocomplete.bindTo('bounds', map);

    // Set the data fields to return when the user selects a place.
    autocomplete.setFields(
                           ['address_components', 'geometry', 'icon', 'name']);

    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function () {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
                                   (place.address_components[0] && place.address_components[0].short_name || ''),
                                   (place.address_components[1] && place.address_components[1].short_name || ''),
                                   (place.address_components[2] && place.address_components[2].short_name || '')
                               ].join(' ');
        }

        infowindowContent.children['place-icon'].src = place.icon;
        infowindowContent.children['place-name'].textContent = place.name;
        infowindowContent.children['place-address'].textContent = address;
        infowindow.open(map, marker);
    });

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    function setupClickListener(id, types) {
        var radioButton = document.getElementById(id);
        radioButton.addEventListener('click', function () {
            autocomplete.setTypes(types);
        });
    }

    setupClickListener('changetype-address', ['address']);
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        administrative_area_level_2: 'long_name',
        country: 'long_name',
        postal_code: 'short_name'
    };
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
        }
        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }

    });
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        var direccion = " ";
        for (var i = 0; i < place.address_components.length; i++) {
            if(i==2){
                $("#administrative_area_level_2").val(place.address_components[i].long_name);
            }
           direccion = direccion + place.address_components[i].long_name + " ";
        } 
        //alert (direccion);
        $.ajax({
            "url": "https://maps.googleapis.com/maps/api/geocode/json?address=" + direccion + "&key=AIzaSyDZUUeX_yN1WG82W6v4ZyqF9UeygP0gSME",
            "method": "POST",
            success: function (r) {
                var cor=r.results[0].geometry.location;
                $("#lat").val(cor.lat);
                $("#long").val(cor.lng);
                $("#address").show();
                
                //console.log(cor.lat);
                //console.log(cor.lng);
            }
        });

    });
}
