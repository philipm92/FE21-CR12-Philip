<?php
session_start();
require_once '../components/db_connect.php';
require_once 'file_upload.php';
$TABLE = $_SESSION["TABLE"];

if ($_POST) {  
    $id = $_POST['id'];
    $location_name = $_POST['location_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    //variable for upload pictures errors is initialized
    $uploadError = '';
    $picture = file_upload($_FILES['picture']); //file_upload() called  
    # $picture->fileName
    if($picture->error===0){
        ($_POST["picture"]=="default_image.png") ?: unlink("../pictures/$_POST[picture]");
        $sql = "UPDATE `$TABLE` SET `picture`=?, `location_name`=?, `price`=?, `description`=?, `longitude`=?, `latitude`=? WHERE `id` = ?";
        $params = [$picture->fileName, $location_name, $price, $description, $longitude, $latitude, $id];
    } else {
        $sql = "UPDATE `$TABLE` SET `location_name`=?, `price`=?,`description`=?, `longitude`=?, `latitude`=? WHERE `id` = ?";
        $params = [$location_name, $price, $description, $longitude, $latitude, $id];
    }
    $db->query($sql, $params);
    
    
    $class = "success";
    $message = "The record was successfully updated";
    $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';

    $db->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/bootcss.php'?>
        <link href="components/style.css" rel="stylesheet" type="text/css">
    </head>
<body class="d-flex flex-column min-vh-100 bg-white"> <!-- Soome stuff for footer handling-->
    <div class="container">
        <div class="mt-3 mb-3">
                <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class;?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
    <!-- Keep Footer down! -->
    <?php require_once '../components/footer.php' ?>
    <!-- Bootstrap JS -->
    <?php require_once '../components/bootjs.php'?>
</body>
</html>