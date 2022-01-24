<?php
include 'config.php';
session_start();
if (isset($_SESSION["username"])) {
    header("Location: {$hostname}/admin/post.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/add-user-style.css">
    <title>Login</title>
    <style>
    .img {
        margin-top: 170px;
        padding: 12px;
        background-color: #fff;
        border-radius: 3px;
    }

    img {
        height: fit-content;
        width: fit-content;
        /* margin-top: 200px; */
        margin-bottom: 10px;
    }

    form {
        display: inline-block;
        height: fit-content;
        width: fit-content;
        margin-left: 0px;
    }

    form input {
        width: 300px;
        margin-top: 10px;
    }

    .form-in {
        padding: 15px;
    }

    .form-in a {
        color: #fff;
        text-decoration: none;
    }

    .form-in #login {
        border: 0;
        background-color: #2c91f0;
        color: #fff;
        border-radius: 3px;
        cursor: pointer;
    }

    .form-in #login:hover {
        background-color: #236fb6;
    }

    h2 {
        margin: 0px;
        margin-bottom: 5px;
        font-family: serif;
    }
    </style>
</head>

<body>
    <div class="img">
        <img src="../images/News logo-2.png" alt="WebSite logo">
    </div>
    <div class="form">
        <h2>Admin</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-in">
                <label for="usrname"><b>Username</b></label>
                <br>
                <input required type="text" name="usrname" id="usrname">
                <br>
                <label for="password"><b>Password</b></label>
                <br>
                <input required type="password" name="password" id="password">
                <br>

                <input type="submit" name="login" value="Login" id="login">
            </div>
        </form>
        <?php
        if (isset($_POST['login'])) {
            include 'config.php';
            $usrname = mysqli_real_escape_string($conn, $_POST['usrname']);
            $password = md5($_POST['password']);
            $sql = "SELECT user_id,username,role FROM user WHERE username='{$usrname}' AND password='{$password}'";
            // echo $sql;
            // die();
            $result = mysqli_query($conn, $sql) or die("Query Failed");

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    session_start();
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["user_id"] = $row['user_id'];
                    $_SESSION["user_role"] = $row['role'];

                    header("Location: {$hostname}/admin/post.php");
                }
            } else {
                echo '<div>Username and Password not matched.</div>';
            }
        }


        ?>
    </div>

</body>

</html>