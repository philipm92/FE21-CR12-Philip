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

        // get weather data
        $city = "$latitude,$longitude";
        $url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/' . $city . '?exclude=minutely,hourly,daily,alerts,flags';
        $result = curl_get($url);
        $weather = json_decode($result); //it turns the json into an object
        $fahrenheit= $weather->currently->temperature; //fetch the value from the temperature option
        $celsius = round(($fahrenheit - 32) * (5 / 9), 2); //convert fahrenheit into celsius
        $weather_output = "
        <div class='card text-center text-dark bg-lighty'>
            <p class='card-title h5'>Weather: {$weather->timezone} </p>
            <div class='card-body'>
                <p class='card-text'> {$weather->currently->summary} </p>
                <p class='card-text'>{$celsius}&deg;C <strong><em>/</em></strong> {$fahrenheit}&deg;F</p>
            </div>
        </div>";

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
        <title>Show Media Data</title>
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
                height: 50%;
                width: 50%;
            }
        </style>         
    </head>

<body>
    <fieldset class="mt-2 mb-3">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h2 class="text-center">Show "<?php echo $location_name ?>" Data</h2>
                <img class='img-fluid img-thumbnail m-2' src='pictures/<?php echo $picture ?>' alt="<?php echo $title ?>">
            </div>
            <div class="table-responsive mx-auto w-75">
                <table class='table table-hover table-striped mx-auto'>
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
                        <td><?php echo $price ?>&euro;</td>
                    </tr>
                </table>

            </div>
            <a href= "index.php"><button class="btn btn-warning text-center" type="button"><< Go Back</button></a>

    </fieldset>
    <div id="map" class="mx-auto my-4"></div>
    <div class="mx-0 p-0 container mx-auto my-4 w-50">
        <?= $weather_output ?>
    </div>

    <?php require_once 'components/footer.php'?>
    
    <?php require_once 'components/bootjs.php'?>
    <!-- MAPS PART -->
    <script>
            var map;
            function initMap() {
                var var_location = {lat: <?php echo $latitude ?>, lng: <?php echo $longitude ?>};
                map = new google.maps.Map(document.getElementById('map'), {center: var_location, zoom: 18});
                var pinpoint = new google.maps.Marker({position: var_location,map: map, title:"<?php echo $location_name ?>"});
                //console.log(map.setCenter(var_location));
            }
    </script>  

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
    </body>
</html>