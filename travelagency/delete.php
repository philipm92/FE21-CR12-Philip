<?php
session_start(); 
require_once 'components/db_connect.php';
$TABLE = $_SESSION["TABLE"];

if ($_GET) {
    $id = $_GET['id'];   
    $sql = "SELECT * FROM `$TABLE` WHERE id = ?;";
    $result = $db->query($sql,$id);
    if ($result->numRows() == 1) {
        $data = $result->fetchArray();
        $location_name = $data['location_name'];
        $description = $data['description'];
        $price = $data['price'];
        $longitude = $data['longitude']; 
        $latitude = $data['latitude']; 
        $picture = $data["picture"];        
    } else {
        header("location: error.php");
    }
    $db->close();
} else {
    header("location: error.php");
}  

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete <?php $location_name ?></title>
        <?php require_once 'components/bootcss.php'?>
        <link href="components/style.css" rel="stylesheet" type= "text/css">
    </head>
<body class="d-flex flex-column min-vh-100 bg-white"> <!-- Soome stuff for footer handling-->
    <fieldset>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <legend class='h2 mb-3 text-center'>Delete request</legend>
            <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $title ?>">
            <h5>You have selected the data below:</h5>
            <div class="table-responsive w-75 mx-auto">
                <table class='table table-hover table-striped mx-auto'>
                    <tr>
                        <td><?php echo $location_name ?></td>
                        <td><q><?php echo $description ?></q></td>
                        <td><?php echo $price ?>&euro;</td>
                        <td><?php echo $latitude."lat. / ".$longitude ?>long.</td>
                    </tr>
                </table>
            </div>

            <h3 class="mb-4">Do you really want to delete this product?</h3>
            <form action ="actions/a_delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                <a href="index.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
            </form>

        </div> 
    </fieldset>
    <!-- Keep Footer down! -->
    <?php require_once 'components/footer.php' ?>

    <!-- Bootstrap JS -->
    <?php require_once 'components/bootjs.php'?>
</body>
</html>