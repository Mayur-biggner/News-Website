<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website settings</title>
    <link rel="stylesheet" href="./CSS/add-user-style.css">
</head>

<body>
    <?php
    include 'config.php';
    include 'Admin-panel-header.php';
    if ($_SESSION['user_role'] == 0) {
        header("Location: {$hostname}/admin/post.php");
    }

    $sql1 = "SELECT * FROM settings";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
    if (mysqli_num_rows($result1) > 0) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
    ?>
    <div class="content">
        <h1>Website Settings</h1>
        <div class="form">
            <form style="height: fit-content;" action="save-website-setting.php" method="post"
                enctype="multipart/form-data">
                <div class="form">
                    <label for="websitename"><b>Website Name</b></label>
                    <br>
                    <input required style="margin-top:5px;" type="text" name="websitename" id="websitename"
                        value="<?php echo $row1['websitename']; ?>" required>
                    <br>
                    <label>Website Logo</label>
                    <input style="margin-top:5px;" type="file" name="new-logo" id="file">
                    <input style="margin:5px 0px;" type="hidden" name="old-logo" id="file"
                        value="<?php echo $row1['logo']; ?>">
                    <br>
                    <div>
                        <img style="margin:0px;" src="images/<?php echo $row1['logo']; ?>" alt="Image">
                    </div>
                    <br>
                    <label for="footerDescription"><b>Footer Decription</b></b></label>
                    <br>
                    <textarea required style="margin-top:5px;" id="discription" name="footerDescription" rows="8"
                        cols="52"><?php echo $row1['footerDescription']; ?>                   
                    </textarea>
                    <br>
                    <button type="submit" name="add" value="add">Add</button>
                </div>
            </form>
        </div>
    </div>
    <?php
        }
    } else {
        echo "Result Not Found";
    }
    ?>
</body>

</html>