let geocoder;
let map;
let marker;
let currentLocation;
let newLocation;
  
function initMap() {
    setCurrentLocation();
    
    const latlng = newLocation === undefined ? currentLocation : newLocation;
    let options = {
        zoom: 15,
        center: latlng,
    };

    map = new google.maps.Map(document.getElementById("map"), options);

    geocoder = new google.maps.Geocoder();

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        position: latlng
    });

    map.addListener('click', function (e) {
        marker.setPosition(new google.maps.LatLng(e.latLng.lat(), e.latLng.lng()));
        getAddress(e.latLng.lat(),e.latLng.lng());
    });

    marker.addListener('drag', function(e){
        getAddress(e.latLng.lat(),e.latLng.lng());
    });

}

    function setCurrentLocation() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){
                currentLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            }, 
            function(error){ 
            alert('Erro ao obter localização!');
                console.log('Erro ao obter localização.', error);
            });
        } else {
            alert('Navegador não suporta Geolocalização!');
        }

    }

    function getAddress(lat,lng){
        let baseUrl = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=';
        let latlng = `${lat},${lng}`;
        let apiKey = 'AIzaSyBBpwGT2QiLTiGmLtEMMg_h4QqnecMtnKw';
        const urlComplete = `${baseUrl}${latlng}&key=${apiKey}`;
        $.ajax({
            url: urlComplete,
            success: function(data) {
              document.getElementById('endereco').value = data.results[0].formatted_address;
              document.getElementById('latitude').value = lat;
              document.getElementById('longitude').value = lng;
            },
          });
    }

    function searchAddress(){
        let baseUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=';
        let endereco = document.getElementById('endereco').value;
        const addressUrl = endereco.replace(' ','+');
        let apiKey = 'AIzaSyBBpwGT2QiLTiGmLtEMMg_h4QqnecMtnKw';
        const urlComplete = `${baseUrl}${addressUrl}&key=${apiKey}`;
        $.ajax({
            url: urlComplete,
            success: function(data) {
              document.getElementById('endereco').value = data.results[0].formatted_address;
              document.getElementById('latitude').value = data.results[0].geometry.location.lat;
              document.getElementById('longitude').value = data.results[0].geometry.location.lng;

                newLocation = new google.maps.LatLng(data.results[0].geometry.location.lat, data.results[0].geometry.location.lat);

                setCurrentLocation();
                
                geocoder = new google.maps.Geocoder();

                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 15,
                    center: { lat: data.results[0].geometry.location.lat, lng: data.results[0].geometry.location.lng }
                });

                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    position: newLocation
                });

                marker.setPosition(newLocation);
            
                map.addListener('click', function (e) {
                    marker.setPosition(new google.maps.LatLng(e.latLng.lat(), e.latLng.lng()));
                    getAddress(e.latLng.lat(),e.latLng.lng());
                });
            
                marker.addListener('drag', function(e){
                    getAddress(e.latLng.lat(),e.latLng.lng());
                });
            

            },
        });
    }