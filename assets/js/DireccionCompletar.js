 function initMap() {
     var map = new google.maps.Map(document.getElementById('map'), {
         center: {
             lat: 19.4326018,
             lng: -99.1353936
         },
         zoom: 12
     });
     var card = document.getElementById('pac-card');
     var input = document.getElementById('pac-input');
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
         country: 'long_name',
         postal_code: 'short_name'
     };
     autocomplete.addListener('place_changed', function () {
         var place = autocomplete.getPlace();

         for (var component in componentForm) {
             document.getElementById(component).value = '';
             document.getElementById(component).disabled = false;
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
                 //console.log(cor.lat);
                 //console.log(cor.lng);
             }
         });

     });
 }
