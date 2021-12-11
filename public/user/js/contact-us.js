var locations = [
    [21.02887553204874, 105.78228356624905],
    [21.02515038738213, 105.85336863411058],
    [21.003160651868146, 105.81529707503702],
    [21.02338571087775, 105.80967324359955],
    [21.042695109693536, 105.83846096333164]
]

function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: {lat: 21.029966983060163, lng: 105.81728106147014},
    });
    let marker, i;
    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            map,
            draggable: true,
            animation: google.maps.Animation.DROP,
            position: {lat: locations[i][0], lng: locations[i][1]},
        });
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                map.setZoom(16);
                map.setCenter(marker.getPosition());
            }
        })(marker, i));
    }
}
