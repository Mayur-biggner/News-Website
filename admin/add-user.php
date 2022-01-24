<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN Panel</title>
    <link rel="stylesheet" href="./CSS/add-user-style.css">
</head>

<body>
    <?php include 'Admin-panel-header.php';
    if ($_SESSION['user_role'] == 0) {
        header("Location: {$hostname}/admin/post.php");
    }
    if (isset($_POST['save'])) {
        include 'config.php';

        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $usrname = mysqli_real_escape_string($conn, $_POST['usrname']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        $sql = "SELECT username FROM user WHERE username='{$usrname}'";
        $result = mysqli_query($conn, $sql) or die("Query Failed.");

        if (mysqli_num_rows($result) > 0) {
            echo "<p style='color:red;text-align:center;margin:10px 0px;'>UserName already Exist</p>";
        } else {
            $sql1 = "INSERT INTO user (first_name,last_name,username,password,role) VALUES('{$fname}','{$lname}','{$usrname}','{$password}','{$role}')";
            if (mysqli_query($conn, $sql1)) {
                header("location: {$hostname}/admin/user.php");
            }
        }
    }

    ?>
    <div class="content">
        <h1>Add User</h1>
        <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form">
                    <label for="fname"><b>First Name</b></label>
                    <br>
                    <input type="text" name="fname" id="fname" required>
                    <br>
                    <label for="lname"><b>Last Name</b></b></label>
                    <br>
                    <input type="text" name="lname" id="lname" required>
                    <br>
                    <label for="usrname"><b>User Name</b></label>
                    <br>
                    <input type="text" name="usrname" id="usrname" required>
                    <br>
                    <label for="password"><b>Password</b></label>
                    <br>
                    <input type="password" name="password" id="password" required>
                    <br>
                    <label for="role"><b>User Role</b></label>
                    <br>
                    <select name="role" id="role" required>
                        <option value="0">Normal user</option>
                        <option value="1">Admin</option>
                    </select>
                    <br>
                    <button type="submit" name="save" value="save">Save</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>