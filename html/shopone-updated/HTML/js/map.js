/*------------------------------------------------------------------
[Table of contents]

- Project:  ShopOne - Furniture Store HTML Template
- Version:  1.1
- Author:   Andrey Sokoltsov
- Profile:  http://themeforest.net/user/andreysokoltsov
--*/

function initialize() {
    var Options = {
        center: new google.maps.LatLng(56, 37),
        zoom: 8,
        scrollwheel: false,
        navigationControl: false,
        mapTypeControl: false,
        scaleControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("contactMap"), Options);
}
if ($('#contactMap').length) {
    google.maps.event.addDomListener(window, 'load', initialize);
}

function initializeBigMap() {
    // Create an array of styles.
    var styles = [
        {"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}
    ];

    var myLatLng = new google.maps.LatLng(47.701830, 7.336047);
    var styledMap = new google.maps.StyledMapType(styles,
        {name: "Styled Map"});

    var mapOptions = {
        zoom: 11,
        scrollwheel: false,
        center: myLatLng,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
        }
    };
    var map = new google.maps.Map(document.getElementById('bigMap'),
            mapOptions);
    var image = 'images/google-marker.png';

    var myMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image
    });
    map.mapTypes.set('map_style', styledMap);
    map.setMapTypeId('map_style');
}
if ($('#bigMap').length) {
    google.maps.event.addDomListener(window, 'load', initializeBigMap);
}