<?php
require_once 'components/db_connect.php';

if ($_GET['ISBN']) {
    $ISBN = $_GET['ISBN'];
    $sql = "SELECT * FROM library WHERE ISBN = ?";
    $result = $db->query($sql, $ISBN);
    $html_status_string = ""; // collect correct status as active
    $html_type_string = ""; // collect correct type as active
    // maybe could've gotten keys from overall table elements' column?
    $status_array = ["available", "reserved"];
    $type_array = ["Book", "CD", "DVD"]; 
    if ($result->numRows() == 1) {
        // image, title, type, short_description as 'description', publish_date as 'published', publisher_name AS 'publisher', publisher_address AS 'address'
        $data = $result->fetchArray();
        $title = $data['title'];
        $type = $data['type'];
        $status = $data['status'];
        $description = $data['short_description'];
        $published = $data['publish_date'];
        $publisher = $data['publisher_name']; 
        $publisher_address = $data['publisher_address']; 
        $picture = $data['image'];
        $author_firstname = $data['author_first_name'];
        $author_lastname = $data['author_last_name'];
        # is there a better way????
        foreach($status_array as $value) {
            $isChecked = ($value == $status) ? "checked" : "";
            $html_status_string .= "<label>".ucfirst($value)."</label> <input type='radio' name='status' value='".$value."' ".$isChecked." /> ";
        }
        
        foreach ($type_array as $value) {
            $isSelected = ($value == $type) ? "selected" : "";
            $html_type_string .= "<option value='".$value."' ".$isSelected.">".$value."</option>";
        }

    } else {
        header("location: error.php");
    }
    $db->close();
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Media</title>
        <?php require_once 'components/boot.php'?>
        <link href="components/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <fieldset>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h2 class="text-center">Update request</h2>
                <img class='img-fluid img-thumbnail m-2' src='pictures/<?php echo $picture ?>' alt="<?php echo $title ?>">
            </div>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <div class="table-responsive mx-auto w-75">
                    <table class='table table-hover table-striped mx-auto'>
                        <tr>
                            <th>ISBN</th>
                            <td><input class="form-control" type="text" name="ISBN" placeholder="ISBN" value="<?php echo $ISBN ?>" /></td>
                        </tr> 
                        
                        <tr>
                            <th>Title</th>
                            <td><input class="form-control" type="text" name="title" placeholder="Media Title" value="<?php echo $title ?>" /></td>
                        </tr> 

                        <tr>
                            <th>Type</th>
                            <td style="text-align:left;">
                                <select name="type">
                                    <?php echo $html_type_string ?>
                                </select>
                            </td>
                        </tr> 

                        <tr>
                            <th>Description</th>
                            <td><input class="form-control" type="text" name="short_description" placeholder="Short description" value="<?php echo $description ?>" /></td>
                        </tr>

                        <tr>
                            <th>Author first name</th>
                            <td><input class="form-control" type="text" name="author_first_name" placeholder="Author first name" value="<?php echo $author_firstname ?>" /></td>
                        </tr> 

                        <tr>
                            <th>Author last name</th>
                            <td><input class="form-control" type="text" name="author_last_name" placeholder="Author last name" value="<?php echo $author_lastname ?>" /></td>
                        </tr> 

                        <tr>
                            <th>Publish Date</th>
                            <td><input class="form-control" type="date" name="publish_date" placeholder="Publish date" value="<?php echo $published ?>" /></td>
                        </tr> 

                        <tr>
                            <th>Publisher</th>
                            <td><input class="form-control" type="text" name="publisher_name" placeholder="Publisher name" value="<?php echo $publisher ?>" /></td>
                        </tr> 

                        <tr>
                            <th>Publisher Address</th>
                            <td><input class="form-control" type="text" name="publisher_address" placeholder="Publisher address" value="<?php echo $publisher_address ?>" /></td>
                        </tr>
                        
                        <tr>
                            <th>Availability</th>
                            <td style="text-align:left;">
                                <?php echo $html_status_string; ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Picture</th>
                            <td><input class="form-control" type="file" name= "image" /></td>
                        </tr>
                        <tr>
                            <input type= "hidden" name= "ISBN" value = "<?php echo $data['ISBN'] ?>" />
                            <input type= "hidden" name= "image" value = "<?php echo $data['image'] ?>" />
                            <td><a href= "index.php"><button class="btn btn-warning" type="button"><< Go Back</button></a></td>
                            <td><button class="btn btn-success" type= "submit">Save Changes</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </fieldset>
    </body>
</html>