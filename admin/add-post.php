<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="./CSS/add-user-style.css">
</head>

<body>
    <?php
    include 'config.php';
    include 'Admin-panel-header.php';
    // if ($_SESSION['user_role'] == 0) {
    //     header("Location: {$hostname}/admin/post.php");
    // }
    ?>
    <div class="content">
        <h1>Add New Post</h1>
        <div class="form">
            <form action="save-post.php" method="post" enctype="multipart/form-data">
                <div class="form">
                    <label for="title"><b>Title</b></label>
                    <br>
                    <input style="margin-top:5px;" type="text" name="title" id="fname" required>
                    <br>
                    <label for="lname"><b>Decription</b></b></label>
                    <br>
                    <textarea required style="margin-top:5px;" id="discription" name="discription" rows="8" cols="52">

                    </textarea>
                    <br>
                    <label for="category"><b>Category</b></label>
                    <br>
                    <select style="margin-top:5px;" name="category" id="category" required>
                        <option disabled>Select Category</option>
                        <?php
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($conn, $sql) or die("Query Failed..");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value=' . $row['category_id'] . '>' . $row['category_name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <input required style="margin-top:5px;" type="file" name="file" id="file">
                    <br>
                    <button type="submit" name="save" value="save">Save</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>