<?php
session_start();
require_once '../components/db_connect.php';
require_once 'file_upload.php';
$TABLE = $_SESSION["TABLE"];

if ($_POST) {   
    $location_name = $_POST["location_name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $location_name = $_POST["location_name"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    //this function exists in the service file upload.
    $picture = file_upload($_FILES["image"]);
    $uploadError = '';
    $sql = "INSERT INTO `travel`(`id`, `picture`, `location_name`, `price`, `description`, `longitude`, `latitude`) VALUES (?,?,?,?,?,?,?)";

    $result = $db->query($sql, array(NULL,$picture->fileName, $location_name, $price, $description, $longitude, $latitude));
    $class = "success";
    $message = "<p class='text-center'>The entry below was successfully created</p>
    <div class='table-responsive'>
        <table class='table table-hover table-striped w-50 mx-auto'>
        <tr>";
    foreach($_POST as $key => $value) $message .= "<td>$value</td>";
    $message .= "
        </tr>
        </table>
    </div><hr>";            

    $uploadError = ($picture->error != 0) ? $picture->ErrorMessage :'';

    $db->close();

} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create <?php echo $location_name ?></title>
        <?php require_once '../components/bootcss.php'?>
    </head>
<body class="d-flex flex-column min-vh-100 bg-white">
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?=$class;?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>

    <?php require_once '../components/footer.php'?>
    <?php require_once '../components/bootjs.php'?>
</body>
</html>