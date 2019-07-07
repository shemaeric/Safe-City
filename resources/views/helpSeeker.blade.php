<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Marker Labels</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>

</head>
<body>
<div id="map" style="width:400px;height:400px"></div>
<input type="hidden" id="latitude" value="-1.9150095">
<input type="hidden" id="longitude" value="30.066268199999968">
</body>
</html>
<script>
    // In the following example, markers appear when the user clicks on the map.
    // Each marker is labeled with a single alphabetical character.
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var labelIndex = 0;
    var latitude = document.getElementById('latitude').value;
    var longitude  = document.getElementById('longitude').value;
    function initialize() {
        var bangalore = { lat: parseFloat(latitude), lng: parseFloat(longitude) };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: bangalore
        });

        // This event listener calls addMarker() when the map is clicked.
        // google.maps.event.addListener(map, 'click', function(event) {
        //     addMarker(event.latLng, map);
        // });

        // Add a marker at the center of the map.
        addMarker(bangalore, map);
    }

    // Adds a marker to the map.
    function addMarker(location, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
            position: location,
            label: labels[labelIndex++ % labels.length],
            map: map
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>