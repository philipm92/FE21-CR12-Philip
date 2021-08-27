<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'components/boot.php'?>
        <title>PHP CRUD  |  Add Media</title>
        <link href="components/style.css" rel="stylesheet" type= "text/css">
    </head>
    <body>
        <fieldset>
            <h2 class="text-center">Add Media</h2>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <!-- ISBN, image, title, type, description, 'author', 'published', 'publisher', 'publisher_address', available -->
                <div class="table-responsive mx-auto w-75">
                    <table class='table table-hover table-striped mx-auto'>
                        <tr>
                            <th>ISBN</th>
                            <td><input class='form-control' type="text" name="ISBN" placeholder="ISBN" /></td>
                        </tr> 
                        
                        <tr>
                            <th>Title</th>
                            <td><input class='form-control' type="text" name="title" placeholder="Media Title" /></td>
                        </tr> 

                        <tr>
                            <th>Type</th>
                            <td style="text-align:left;">
                                <select name="type">
                                    <option value = "Book" selected>Book</option>
                                    <option value = "CD">CD</option>
                                    <option value = "DVD">DVD</option>
                                </select>
                            </td>
                        </tr> 

                        <tr>
                            <th>Description</th>
                            <td><input class='form-control' type="text" name= "description" placeholder="Description" /></td>
                        </tr>

                        <tr>
                            <th>Author first name</th>
                            <td><input class='form-control' type="text" name= "author_firstname" placeholder="Author first name" /></td>
                        </tr> 

                        <tr>
                            <th>Author last name</th>
                            <td><input class='form-control' type="text" name= "author_lastname" placeholder="Author last name" /></td>
                        </tr> 

                        <tr>
                            <th>Publish Date</th>
                            <td><input class='form-control' type="date" name= "publish_date" placeholder="Publish Date" /></td>
                        </tr> 

                        <tr>
                            <th>Publisher</th>
                            <td><input class='form-control' type="text" name= "publisher" placeholder="Publisher" /></td>
                        </tr> 

                        <tr>
                            <th>Publisher Address</th>
                            <td><input class='form-control' type="text" name= "publisher_address" placeholder="Publisher Address" /></td>
                        </tr>
                        
                        <tr>
                            <th>Availability</th>
                            <td style="text-align:left;">
                                <label>Available</label> <input type="radio" name="availability" value='available' checked="checked" />
                                <label>Reserved</label> <input type="radio" name="availability" value='reserved' />
                            </td>
                        </tr>

                        <tr>
                            <th>Image</th>
                            <td><input class='form-control' type="file" name="image" /></td>
                        </tr>
                        <tr>
                            <td><a href="index.php"><button class='btn btn-warning' type="button"><< Home</button></a></td>
                            <td><button class='btn btn-success' type="submit">Insert Media</button></td>
                            
                        </tr>
                    </table>
                </div>
            </form>
        </fieldset>
    </body>
</html>