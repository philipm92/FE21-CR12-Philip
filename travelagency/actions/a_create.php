<?php
require_once '../components/db_connect.php';
require_once 'file_upload.php';

if ($_POST) {   
    $author_firstname = $_POST["author_firstname"];
    $author_lastname = $_POST["author_lastname"];
    $publisher = $_POST["publisher"];
    $publisher_address = $_POST["publisher_address"];
    $ISBN = $_POST["ISBN"];
    $title = $_POST["title"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $publish_date = $_POST["publish_date"];
    //this function exists in the service file upload.
    $picture = file_upload($_FILES["image"]);
    $availability = $_POST["availability"];
    $uploadError = '';
    $sql = "INSERT INTO `library` (`ISBN`, `title`, `type`, `short_description`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`, `image`)  VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $result = $db->query($sql, array($ISBN,$title,$type,$description,$author_firstname,$author_lastname,$publisher,$publisher_address,$publish_date,$availability,$picture->fileName));
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
        <title>Update</title>
        <?php require_once '../components/boot.php'?>
    </head>
    <body>
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
    </body>
</html>