<?php
require_once '../components/db_connect.php';
require_once 'file_upload.php';

if ($_POST) {    
    $ISBN = $_POST['ISBN'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $description = $_POST['short_description'];
    $published = $_POST['publish_date'];
    $publisher = $_POST['publisher_name']; 
    $publisher_address = $_POST['publisher_address']; 
    $author_firstname = $_POST['author_first_name'];
    $author_lastname = $_POST['author_last_name'];    
    //variable for upload pictures errors is initialized
    $uploadError = '';
    $picture = file_upload($_FILES['image']); //file_upload() called  

    if($picture->error===0){
        ($_POST["image"]=="default_image.png") ?: unlink("../pictures/$_POST[image]");
        $sql = "UPDATE `library` SET `ISBN`=?,`title`=?,`type`=?,`short_description`=?, `author_first_name`=?,`author_last_name`=?,`publisher_name`=?, `publisher_address`=?,`publish_date`=?,`status`=?,`image`=? WHERE `ISBN`=?;";
        $params = [$ISBN,$title,$type,$description,$author_firstname,$author_lastname,$publisher,$publisher_address,$published,$status,$picture->fileName, $ISBN];
    } else {
        $sql = "UPDATE `library` SET `ISBN`=?,`title`=?,`type`=?,`short_description`=?, `author_first_name`=?,`author_last_name`=?,`publisher_name`=?, `publisher_address`=?,`publish_date`=?,`status`=? WHERE `ISBN`=?;";
        $params = [$ISBN,$title,$type,$description,$author_firstname,$author_lastname,$publisher,$publisher_address,$published,$status,$ISBN];
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
        <?php require_once '../components/boot.php'?> 
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?ISBN=<?=$ISBN;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>