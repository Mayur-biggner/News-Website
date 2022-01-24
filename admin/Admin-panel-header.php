<?php
include 'config.php';
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: {$hostname}/admin/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .admin-header {
        margin: 0;
        padding: 0;
        width: 100vw;
        height: 80px;
        display: flex;
        background-color: rgb(0, 96, 205);
        overflow-x: hidden;
        /* align-items: center; */
    }

    .admin-header a img {
        margin-left: 200px;
        margin-top: 5px;
        width: 200px;
        height: 70px;
    }

    div #logout {
        font-size: 22px;
        margin-top: 18px;
        padding: 0px 5px;
        padding-top: 13px;
        width: 110px;
        color: #fff;
        height: 50px;
        text-decoration: none;
    }

    div #logout:hover {
        border-radius: 3px;
        text-align: center;
        cursor: pointer;
        background-color: #fff;
        color: rgb(0, 96, 205);
    }

    div h2 {
        font-size: 22px;
        margin-top: 30px;
    }
    </style>
</head>

<body>
    <div class="admin-header">
        <a href="post.php"> <img src="images/News logo-2.png" alt="NEWS"> </a>
        <h2 href="logout.php" style="text-align: end;width:400px; margin-left:250px;margin-right:5px;color:#fff;">
            <b>Hello, <?php echo $_SESSION['username']; ?></b>
        </h2>
        <a id="logout" style="margin-left:1px;" href="logout.php"><b>LOGOUT</b></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="post.php"><b>POST</b></a></li>
            <?php if ($_SESSION['user_role'] == 1) { ?>
            <li><a href="category.php"><b>CATEGORY</b></a></li>
            <li><a href="user.php"><b>USERS</b></a></li>
            <li><a href="settings.php"><b>SETTINGS</b></a></li>
            <?php } ?>
        </ul>
    </div>

</body>

</html>