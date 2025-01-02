@extends('layouts.admin')
@section('page-title')
    {{__('Employee_Tracking')}}
@endsection
@section('content')

    <div class="row">
        <div id="map" class="col-lg-12" style="width:100%; height:500px;"></div>
    </div>

    <script>
      function initMap() {
        var service = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'));
        var marker;

        // list of points
        var stations = {!! json_encode($employee_tracks,true) !!};

        // Zoom and center map automatically by stations (each station will be in visible map area)
        var lngs = stations.map(function(station) { return station.lng; });
        var lats = stations.map(function(station) { return station.lat; });
        map.fitBounds({
            west: Math.min.apply(null, lngs),
            east: Math.max.apply(null, lngs),
            north: Math.min.apply(null, lats),
            south: Math.max.apply(null, lats),
        });

        // Show stations on the map as markers
        for (var i = 0; i < stations.length; i++) {
           marker = new google.maps.Marker({
                position: stations[i],
                map: map,
                title: stations[i].name
            });
            if(stations[i].company_range == 0)
            {
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/red-dot.png');
            }else
            {
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
            }
        }

        // Divide route to several parts because max stations limit is 25 (23 waypoints + 1 origin + 1 destination)
        for (var i = 0, parts = [], max = 25 - 1; i < stations.length; i = i + max)
            parts.push(stations.slice(i, i + max + 1));

        // Service callback to process service results
        var service_callback = function(response, status) {
            if (status != 'OK') {
                console.log('Directions request failed due to ' + status);
                return;
            }
            var renderer = new google.maps.DirectionsRenderer;
            renderer.setMap(map);
            renderer.setOptions({ suppressMarkers: true, preserveViewport: true });
            renderer.setDirections(response);
        };

        // Send requests to service to get route (for stations count <= 25 only one request will be sent)
        for (var i = 0; i < parts.length; i++) {
            // Waypoints does not include first station (origin) and last station (destination)
            var waypoints = [];
            for (var j = 1; j < parts[i].length - 1; j++)
                waypoints.push({location: parts[i][j], stopover: false});
            // Service options
            var service_options = {
                origin: parts[i][0],
                destination: parts[i][parts[i].length - 1],
                waypoints: waypoints,
                travelMode: 'WALKING'
            };
            // Send request
            service.route(service_options, service_callback);
        }
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_foD6VvulHSpxKYjtgehkQ_UoVGHH64Y&callback=initMap"></script>
@endsection