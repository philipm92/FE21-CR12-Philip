<?php 
require_once 'components/db_connect.php';

if ($_GET) {
    $ISBN = $_GET['ISBN'];   
    $sql = "SELECT * FROM library WHERE ISBN = ?;";
    $result = $db->query($sql,$ISBN);
    if ($result->numRows() == 1) {
        $data = $result->fetchArray();
        $title = $data["title"];
        $publisher = $data["publisher_name"];
        $author = $data["author_first_name"]. " " . $data["author_last_name"];
        $picture = $data['image'];
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
        <title>Delete Product</title>
        <?php require_once 'components/boot.php'?>
        <link href="components/style.css" rel="stylesheet" type= "text/css">
    </head>
    <body>
        <fieldset>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <legend class='h2 mb-3 text-center'>Delete request</legend>
                <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $title ?>">
                <h5>You have selected the data below:</h5>
                <div class="table-responsive w-75 mx-auto">
                    <table class='table table-hover table-striped mx-auto'>
                        <tr>
                            <td><?php echo $title ?></td>
                            <td><?php echo $ISBN ?></td>
                            <td><?php echo $publisher ?></td>
                            <td><?php echo $author ?></td>
                        </tr>
                    </table>
                </div>

                <h3 class="mb-4">Do you really want to delete this product?</h3>
                <form action ="actions/a_delete.php" method="post">
                    <input type="hidden" name="ISBN" value="<?php echo $ISBN ?>" />
                    <input type="hidden" name="image" value="<?php echo $picture ?>" />
                    <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                    <a href="index.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
                </form>

            </div> 
        </fieldset>
    </body>
</html>