<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
    <link rel="stylesheet" href="./CSS/add-user-style.css">
</head>

<body>
    <?php
    include 'Admin-panel-header.php';
    if ($_SESSION["user_role"] == 0) {

        $post_id = $_GET['id'];
        include 'config.php';
        $sql2 = "SELECT * FROM post WHERE post_id={$post_id}";
        $result2 = mysqli_query($conn, $sql2) or die("Query Failed");
        $row2 = mysqli_fetch_assoc($result2);

        if ($row2['author'] != $_SESSION['user_id']) {
            header("location: {$hostname}/admin/post.php");
        }
    }
    include 'config.php';
    $post_id = $_GET['id'];

    $sql1 = "SELECT post.post_id,post.title,post.description,post.category,category.category_name,post.post_date,post.post_img FROM post LEFT JOIN category ON post.category=category.category_id LEFT JOIN user ON post.author=user.user_id WHERE post.post_id={$post_id}";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
    ?>
    <div class="content">
        <h1>Update Post</h1>
        <div class="form">
            <form style="height: fit-content;" action="save-update-post.php" method="post"
                enctype="multipart/form-data">
                <div class="form">
                    <label for="title"><b>Title</b></label>
                    <br>
                    <input required style="margin-top:5px;" type="hidden" name="post_id" id="fname"
                        value="<?php echo $row1['post_id'] ?>" required>
                    <input required style="margin-top:5px;" type="text" name="title" id="fname"
                        value="<?php echo $row1['title'] ?>" required>
                    <br>
                    <label for="lname"><b>Decription</b></b></label>
                    <br>
                    <textarea required style="margin-top:5px;" id="discription" name="discription" rows="8"
                        cols="52"><?php echo $row1['description'] ?></textarea>
                    <br>
                    <label for="category"><b>Category</b></label>
                    <br>
                    <select required style="margin-top:5px;" name="category" id="category" required>
                        <option disabled>Select Category</option>
                        <?php
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql) or die("Query Failed..");
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['category_id'] == $row1['category']) {
                                            echo '<option selected value=' . $row['category_id'] . '>' . $row['category_name'] . '</option>';
                                        } else {
                                            echo '<option value=' . $row['category_id'] . '>' . $row['category_name'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                    </select>
                    <input required type="hidden" name="old-category" id="old-category"
                        value="<?php echo $row1['category']; ?>">
                    <br>
                    <input style="margin-top:5px;" type="file" name="new-file" id="file">
                    <input style="margin-top:5px;" type="hidden" name="old-file" id="file"
                        value="<?php echo $row1['post_img'] ?>">
                    <br>
                    <img style="width:300px;height:200px;margin:0;" src="upload/<?php echo $row1['post_img'] ?>"
                        alt="Image">
                    <br>
                    <button type="submit" name="save" value="save">Update</button>
                </div>
            </form>
        </div>
    </div>
    <?php
        }
    } else {
        echo "Result Not Found";
    } ?>
</body>

</html>