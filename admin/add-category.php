<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="./CSS/add-user-style.css">
</head>

<body>
    <?php include 'Admin-panel-header.php';
    if ($_SESSION['user_role'] == 0) {
        header("Location: {$hostname}/admin/post.php");
    }
    if (isset($_POST['save'])) {
        include 'config.php';

        $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
        $sql1 = "INSERT INTO category (category_name) VALUES('{$category_name}')";
        if (mysqli_query($conn, $sql1)) {
            header("location: {$hostname}/admin/category.php");
        } else {
            echo "Query Failed.";
        }
    }
    ?>
    <div class="content">
        <h1>Add Category</h1>
        <div class="form">
            <form style="height: fit-content;" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form">
                    <label for="category_name"><b>Category Name</b></label>
                    <br>
                    <input type="text" name="category_name" id="category_name" required>
                    <br>
                    <button type="submit" name="save" value="save">Add</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>