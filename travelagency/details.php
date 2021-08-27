<?php
session_start();
require_once 'components/db_connect.php';
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
        echo $latitude." ".$longitude." ";

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
                height: 90%;
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
    <div id="map" class="mx-auto my-2"></div>


    <?php require_once 'components/footer.php'?>
    
    <?php require_once 'components/bootjs.php'?>
    <!-- MAPS PART -->
    <script>
            var map;
            function initMap() {
                var var_location = {lat: <?php echo $latitude ?>, lng: <?php echo $longitude ?>};
                map = new google.maps.Map(document.getElementById('map'), {center: var_location, zoom: 8});
                var pinpoint = new google.maps.Marker({position: var_location,map: map});
            }
    </script>  

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
    </body>
</html>