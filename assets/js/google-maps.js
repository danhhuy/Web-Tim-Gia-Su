function initMap() {
    var myLatLng = {lat: 21.0056045, lng: 105.8428018};

    var map = new google.maps.Map(document.getElementById('myMap'), {
        zoom: 17,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Bách khoa' // Title Location
    });
}
