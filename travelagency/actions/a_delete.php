<?php 
session_start();
$TABLE = $_SESSION["TABLE"];
require_once '../components/db_connect.php';
header("refresh:5; location: ../index.php");

if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture =="default_image.jpg")?: unlink("../pictures/$picture");

    $db->query("DELETE FROM `$TABLE` WHERE id = ?;", $id);
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
        <?php require_once '../components/bootcss.php'?>
        <link href="../components/style.css" rel="stylesheet" type= "text/css">
    </head>
<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Delete request response</h1>
        </div>
        <div class="alert alert-<?=$class;?>" role="alert">
            <p><?=$message;?></p>
            <p>You will be redirected to "home" in <strong><span id="counter">3</span></strong> second(s).</p>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>

    <script type="text/javascript">
        function countdown() {
            var i = document.getElementById('counter');
            if (parseInt(i.innerHTML)<=0) {
                location.href = '../index.php';  // header of php not required
            }
        if (parseInt(i.innerHTML)!=0) {
            i.innerHTML = parseInt(i.innerHTML)-1;
        }
        }
        setInterval(function(){ countdown(); },1000);
    </script>   
    <!-- Keep Footer down! -->
    <?php require_once '../components/footer.php' ?>

    <!-- Bootstrap JS -->
    <?php require_once '../components/bootjs.php'?>    
</body>
</html>