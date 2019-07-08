@extends('layouts')
@section('content')
    <div class="col-lg-4 col-md-6 my-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Help Seeker Details  {{  $details->emergency_title?$details->emergency_title:''}}</h3>
            </div>
            <div class="card-body" style="{{$details->attached_file}}">
                <img src="{{$details->attached_file}}" class="img-responsive">
                <h3 class="text-center">{{$details->emergency_title}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="h6">First name</div>
                    </div>
                    <div class="col-6">
                        <p>{{$details->help_seeker->first_name}}</p>
                    </div>
                    <div class="col-6">
                        <div class="h6">Last name</div>
                    </div>
                    <div class="col-6">
                        <p>{{$details->help_seeker->last_name}}</p>
                    </div>
                    <div class="col-6">
                        <div class="h6">Seeker phone number</div>
                    </div>
                    <div class="col-6">
                        <p>{{$details->help_seeker->my_phone_number}}</p>
                    </div>
                    <div class="col-6">
                        <div class="h6">Referee phone number</div>
                    </div>
                    <div class="col-6">
                        <p>{{$details->help_seeker->referee_phone_number}}</p>
                    </div>
                </div>
                <div class="h6 {{$details->description_of_attached_file?'visible':'invisible'}}">Description</div>
                <p class="{{$details->description_of_attached_file?'visible':'invisible'}}">{{$details->description_of_attached_file?$details->description_of_attached_file:''}}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-6 my-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Help Seeker Destination</h3>
            </div>
            <div class="card-body">
                <div id="map" style="width:957px;min-height:500px;"></div>
                <input type="hidden" id="latitude" value="{{$details->latitude}}">
                <input type="hidden" id="longitude" value="{{$details->longitude}}">
            </div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
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
                    zoom: 17,
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
    </div>
@endsection


