<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css' rel='stylesheet' />
    <title>Current Bus Location</title>
</head>
<body>
<div>
    <button onclick="updatePosition(-79.4512,42.6598)">Update Position</button>
</div>
<div id='map' style='width: 800px; height: 800px;'></div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    let map;
    mapboxgl.accessToken = 'pk.eyJ1IjoibWRoYWZpenVycmFobWFuIiwiYSI6ImNsN3hrNGZmbjA5cjgzcHA1bGI3MXdjdnoifQ.KhHG3AwXtjjg0jNYM5Z29w';
    map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [-74.5, 40], // starting position [lng, lat]
        zoom: 9, // starting zoom
        projection: 'globe' // display the map as a 3D globe
    });
    map.on('style.load', () => {
        map.setFog({}); // Set the default atmosphere style
    });

    const marker = new mapboxgl.Marker({
        color: "rgba(255,3,3,0.95)",
        draggable: true
    }).setLngLat([-74.5, 40])
        .addTo(map);
    //taking data from pusher
    Echo.channel('updateTracker')
        .listen('BusMoved', (e) => {
            // console.log(e);
            if (e.bid==2){
                updatePosition(e.lng,e.lat );
            }
        });
    function updatePosition($lng, $lat ){
        let langLat=[$lng,$lat];
        // alert('ads');
        // marker.setCenter(langLat);
        marker.setLngLat(langLat)
            .addTo(map);
        map.setCenter(langLat);
    }


</script>
</body>
</html>
