<div class="section dark bottommargin-lg p-0">
    <div class="container-fluid position-relative p-0" style="height:500px;">
        <!-- Search Box -->
        <input id="pac-input" class="controls" type="text" placeholder="Search Box" 
               style="position:absolute; top:15px; left:50%; transform:translateX(-50%);
                      z-index:5; width:300px; padding:10px 15px; border-radius:8px; 
                      border:none; box-shadow:0 2px 6px rgba(0,0,0,0.3); font-size:14px;">

        <!-- Map -->
        <div id="map" style="width:100%; height:100%; border-radius:0;"></div>
    </div>
</div>

<!-- Google Maps JS -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script>
<script>
function initMap() {
    // Initial map center
    var cairo = { lat: 30.0444, lng: 31.2357 };

    var map = new google.maps.Map(document.getElementById('map'), {
        center: cairo,
        zoom: 6,
        styles: [ // Dark theme
            { elementType: 'geometry', stylers: [{color: '#212121'}]},
            { elementType: 'labels.icon', stylers: [{visibility: 'off'}]},
            { elementType: 'labels.text.fill', stylers: [{color: '#757575'}]},
            { elementType: 'labels.text.stroke', stylers: [{color: '#212121'}]},
            { featureType: 'administrative', elementType: 'geometry', stylers: [{color: '#757575'}]},
            { featureType: 'poi', elementType: 'labels.text.fill', stylers: [{color: '#757575'}]},
            { featureType: 'road', elementType: 'geometry', stylers: [{color: '#383838'}]},
            { featureType: 'road', elementType: 'labels.text.fill', stylers: [{color: '#8a8a8a'}]},
            { featureType: 'transit', elementType: 'geometry', stylers: [{color: '#2f2f2f'}]},
            { featureType: 'water', elementType: 'geometry', stylers: [{color: '#0f1626'}]},
            { featureType: 'water', elementType: 'labels.text.fill', stylers: [{color: '#3d3d3d'}]}
        ]
    });

    // Marker at initial location
    var marker = new google.maps.Marker({
        position: cairo,
        map: map,
        title: 'Cairo, Egypt'
    });

    // Search Box
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);

    // Bias search results to map viewport
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    // Handle search selection
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        if (!places.length) return;

        // Clear old marker
        marker.setMap(null);

        // Add marker for first result
        var place = places[0];
        if (!place.geometry) return;

        marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
            title: place.name
        });

        map.setCenter(place.geometry.location);
        map.setZoom(12);
    });
}

google.maps.event.addDomListener(window, 'load', initMap);
</script>
