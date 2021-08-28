<?php
session_start();
require_once 'components/db_connect.php';
require_once 'components/RESTful.php';
$TABLE = $_SESSION["TABLE"];
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `$TABLE` WHERE id = ?";
    $result = $db->query($sql, $id);
    if ($result->numRows() == 1) {
        $data = $result->fetchArray();
        $location_name = $data['location_name'];
        $description = $data['description'];
        $price = $data['price'];
        $longitude = $data['longitude']; 
        $latitude = $data['latitude']; 
        $picture = $data["picture"];
        $price_formated = ($price == (int)$price) ? (int)$price : (float)$price;
    } else {
        header("location: error.php");
    }

    $db->close();
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Show "<?php echo $location_name ?>" Data</title>
        <?php require_once 'components/bootcss.php'?>
        <link href="components/style.css" rel="stylesheet" type="text/css">
        <style>
            th, td {
                text-align: left;
            }

            html, body {
                height: 100%;
            }

            #map {
                margin: 0 auto;
                width: 75vw;
                height: 50%;
            }
        </style>         
    </head>

<body class="min-vh-100 bg-white">
    <?php require_once "components/navbar.php" ?>
    <fieldset class="mt-2 mb-3">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h2 class="text-center">Show "<?php echo $location_name ?>" Data</h2>
                <img class='img-fluid img-thumbnail m-2' src='pictures/<?php echo $picture ?>' alt="<?php echo $title ?>">
            </div>
            <div class="table-responsive mx-auto w-75">
                <table class='table table-sm table-hover table-striped mx-auto'>
                    <tr>
                        <th>Location Name</th>
                        <td><?php echo $location_name ?></td>
                    </tr> 

                    <tr>
                        <th>Description</th>
                        <td><?php echo $description ?></td>
                    </tr> 

                    <tr>
                        <th>Price</th>
                        <td><?php echo (($price_formated===0) ? "<em><strong>*FREE*</strong></em>" : "$price_formated&euro;") ?></td>
                    </tr>
                    
                    <tr>
                        <th>Latitude</th>
                        <td><?php echo $latitude ?></td>
                    </tr>

                    <tr>
                        <th>Longitude</th>
                        <td><?php echo $longitude ?></td>
                    </tr>                                       
                </table>

            </div>
            
    </fieldset>
    <div id="map" class="mx-auto my-2"></div>
    <div class="mx-auto p-0 container mx-auto my-4 w-50">
        <div class="text-center">
            <button type="button" class="btn btn-primary mt-2 mb-4" id="weatherBtn">Show Weather</button>
            <div id="weatherCard"></div>
            </div>
    </div>

    <?php require_once 'components/footer.php'?>
    
    <?php require_once 'components/bootjs.php'?>

    <script>
        document.getElementById("weatherBtn").addEventListener("click", loadData);
        function loadData() {
            var xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if (this.status == 200) {
                    console.log(this.responseText);
                    if (this.status == 200) document.getElementById("weatherCard").innerHTML = this.responseText;
                    //const weather = JSON.parse(this.responseText);
                    //document.getElementById('content').innerHTML = `${weather.car_name} ${weather.price}`;
                }
            }
            let weather_url = "external_weather.php?lat=" + <?php echo $latitude ?> + "&long=" + <?php echo $longitude ?>;
            // console.log(weather_url);
            xhttp.open("GET", weather_url, true);
            xhttp.send();
        }
        
    </script>

    <!-- MAPS PART -->
    <script>
            var map;
            function initMap() {
                var var_location = {lat: <?php echo $latitude ?>, lng: <?php echo $longitude ?>};
                map = new google.maps.Map(document.getElementById('map'), {center: var_location, zoom: 16});
                var pinpoint = new google.maps.Marker({position: var_location,map: map, title:"<?php echo $location_name ?>"});
                //console.log(map.setCenter(var_location));
            }
    </script>  

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
    </body>
</html>