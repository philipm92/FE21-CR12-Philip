<?php
session_start();
$_SESSION["TABLE"] = "travel";
$TABLE = $_SESSION["TABLE"];
require_once 'components/db_connect.php';

$sql = "SELECT * FROM `$TABLE`;";
$result = $db->query($sql);
$n = $result->numRows();
$rows = $result->fetchAll();
$query_data = GetQueryData($rows); // testing new function, though not really necessary



$cards_string = ''; //this variable will hold the data for the cards
$data_body = $query_data->body;
if($n  > 0) {
    $card = '';
    foreach($data_body as $row) {
        $card .= "
        <div class='col'>
            <div class='card h-100'>
                <div class='card-header h5 text-center'>$row[location_name]</div>
                <img src='pictures/$row[picture]' class='img-fluid d-none d-md-inline' alt='$row[location_name]'>
                <div class='card-body d-flex flex-column justify-content-evenly'>
                    <p class='card-text text-center'><q>$row[description]</q></p>
                    <p class='card-text text-center'>Price: $row[price]&euro;</p>
                    <div class='text-center'><a href='details.php?id=$row[id]'><button class='btn btn-success btn-sm' type='button'>More info</button></a></div>
                </div>
                <div class='card-footer h6 text-center text-muted'>
                    <a href='update.php?id=$row[id]'><button class='btn btn-primary btn-sm m-1' type='button'>Edit</button></a>
                    <a href='delete.php?id=$row[id]'><button class='btn btn-danger btn-sm m-1' type='button'>Delete</button></a>
                </div>                                   
            </div>
        </div>         
        ";
    }
    $cards_string .= $card;
} 
#else $tbody_string =  "<tr><td colspan='".(count($data_head)+1)."'><center>No Data Available </center></td></tr>";


$db->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Philip Mahlberg - Code Review 12</title>
        <?php require_once 'components/bootcss.php'?>
        <link href="components/style.css" rel="stylesheet" type= "text/css">
    </head>
<body class="d-flex flex-column min-vh-100 bg-white"> <!-- Soome stuff for footer handling-->
    <div class="managaTravel my-2 my-md-4">    
        <div class='d-flex flex-column justify-content-center align-items-center flex-md-row justify-content-md-evenly'>
            <a href= "create.php"><button class='btn btn-primary my-2' type="button" >Add new location</button></a>
            <a href= "apidata.php"><button class='btn btn-primary my-2' type="button" >Show API</button></a>
        </div>
        <h2 class="text-center mt-3 mt-md-4 mb-2 mb-mb-3">Travel Location</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 g-lg-2 w-75 mx-auto">
            <?= $cards_string ?>
        </div>
    </div>
    
    <!-- Keep Footer down! -->
    <?php require_once 'components/footer.php' ?>

    <!-- Bootstrap JS -->
    <?php require_once 'components/bootjs.php'?>
</body>
</html>