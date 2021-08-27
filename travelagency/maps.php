<!DOCTYPE html>
<html>

    <head>

        <title>Simple Google Map</title>

        <meta name="viewport" content="initial-scale=1.0">

        <meta charset="utf-8">

        <?php require_once 'components/bootcss.php'?>
        <link href="components/style.css" rel="stylesheet" type= "text/css">
        <style>
            #map {
                width: 30%;
                height: 30%;
            }
            html, body {height: 100%; }
        </style>

    </head>

    <body>
        
        <div id="map" class="mx-auto my-2"></div>

        

         <script>
            var map;
            function initMap() {
                // 16.3126 48.1134
                var var_location = {lat: 48.1134,lng: 16.3126};
                map = new google.maps.Map(document.getElementById('map'), {center: var_location,zoom: 8});
                var pinpoint = new google.maps.Marker({position: var_location,map: map, title: "New York"});
            }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>

    </body>
</html>