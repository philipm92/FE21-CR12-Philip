<?php 
require_once '../components/db_connect.php';

if ($_POST) {
    $ISBN = $_POST['ISBN'];
    $picture = $_POST['image'];
    ($picture =="default_image.jpg")?: unlink("../pictures/$picture");

    $db->query("DELETE FROM library WHERE ISBN = ?;", $ISBN);
    $class = "success";
    $message = "Successfully Deleted!";
    $db->close();
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete</title>
        <?php require_once '../components/boot.php'?>  
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Delete request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?=$message;?></p>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>