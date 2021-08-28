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
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
        $picture = $data['picture'];
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
        <title>Edit <?php echo $location_name ?></title>
        <?php require_once 'components/bootcss.php'?>
        <link href="components/style.css" rel="stylesheet" type="text/css">
    </head>
<body class="d-flex flex-column min-vh-100 bg-white"> <!-- Soome stuff for footer handling-->
    <?php require_once "components/navbar.php" ?>
    <fieldset>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-center">Update request</h2>
            <img class='img-fluid img-thumbnail m-2' src='pictures/<?php echo $picture ?>' alt="<?php echo $location_name ?>">
        </div>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <div class="table-responsive mx-auto w-75">
                    <table class='table table-sm table-hover table-striped mx-auto'>
                        <tr>
                            <div class="form-floating mb-3">
                                <input type="text" name="location_name" class="form-control" id="floatingLName" placeholder="Location Name" value="<?php echo $location_name ?>" />
                                <label for="floatingLName">Location Name</label>
                            </div>
                        </tr> 

                        <tr>
                            <div class="form-floating mb-3">
                                <input type="text" name="description" class="form-control" id="floatingDesc" placeholder="Description" value="<?php echo $description ?>" />
                                <label for="floatingDesc">Description</label>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-floating mb-3">
                                <input type="number" step=0.01 name="price" class="form-control" id="floatingPrice" placeholder="Price" value="<?php echo $price ?>" />
                                <label for="floatingPrice">Price</label>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-floating mb-3">
                                <input type="text" name="latitude" class="form-control" id="floatingLat" placeholder="Latitude" value="<?php echo $latitude ?>" />
                                <label for="floatingLat">Latitude</label>
                            </div>
                        </tr>

                        <tr>
                            <div class="form-floating mb-3">
                                <input type="text" name="longitude" class="form-control" id="floatingLong" placeholder="Longitude" value="<?php echo $longitude ?>" />
                                <label for="floatingLong">Longitude</label>
                            </div>
                        </tr>

                        <tr>
                            <input class='form-control' type="file" name="picture" />
                        </tr>

                        <tr>
                            <input type= "hidden" name= "id" value = "<?php echo $data['id'] ?>" />
                            <input type= "hidden" name= "picture" value = "<?php echo $data['picture'] ?>" />
                        </tr>
                    </table>
                </div>
                <div class="text-center"><button class="btn btn-success" type= "submit">Save Changes</button></div>
            </form>
    </fieldset>

    <!-- Keep Footer down! -->
    <?php require_once 'components/footer.php' ?>
    <!-- Bootstrap JS -->
    <?php require_once 'components/bootjs.php'?>
</body>
</html>