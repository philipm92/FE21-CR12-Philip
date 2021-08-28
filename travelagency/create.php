<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/bootcss.php'?>
    <title>PHP CRUD  |  Add Location</title>
    <link href="components/style.css" rel="stylesheet" type= "text/css">
</head>
<body class="d-flex flex-column min-vh-100 bg-white">
    <?php require_once "components/navbar.php" ?>
    <fieldset>
        <h2 class="text-center">Add Location</h2>
        <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
            <!-- `location_name`, `price`, `description`, `longitude`, `latitude` -->
            <div class="table-responsive mx-auto w-75">
                <table class='table table-sm table-hover table-striped mx-auto'>
                    <tr>
                        <div class="form-floating mb-3">
                            <input type="text" name="location_name" class="form-control" id="floatingLName" placeholder="Location Name">
                            <label for="floatingLName">Location Name</label>
                        </div>
                    </tr> 

                    <tr>
                        <div class="form-floating mb-3">
                            <input type="text" name="description" class="form-control" id="floatingDesc" placeholder="Description">
                            <label for="floatingDesc">Description</label>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-floating mb-3">
                            <input type="number" step=0.01 name="price" class="form-control" id="floatingPrice" placeholder="Price">
                            <label for="floatingPrice">Price</label>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-floating mb-3">
                            <input type="text" name="latitude" class="form-control" id="floatingLat" placeholder="Latitude">
                            <label for="floatingLat">Latitude</label>
                        </div>
                    </tr>

                    <tr>
                        <div class="form-floating mb-3">
                            <input type="text" name="longitude" class="form-control" id="floatingLong" placeholder="Longitude">
                            <label for="floatingLong">Longitude</label>
                        </div>
                    </tr>

                    <tr>
                        <input class='form-control' type="file" name="image" id="floatingImg" />
                    </tr>
                </table>
                <div class="text-center my-2"><button class='btn btn-success' type="submit">Insert Media</button></div>   
            </div>
        </form>
    </fieldset>

    <?php require_once 'components/footer.php'?>
    
    <?php require_once 'components/bootjs.php'?>
</body>
</html>