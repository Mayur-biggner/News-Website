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

        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $usrname = mysqli_real_escape_string($conn, $_POST['usrname']);
        // $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        $sql = "UPDATE user SET first_name='{$fname}',last_name='{$lname}',username='{$usrname}',role='{$role}' WHERE user_id={$user_id}";
        // echo $sql;
        // die("hello fari bharay ne...!!!");
        $result = mysqli_query($conn, $sql) or die("Query Failed.");
        if (mysqli_query($conn, $sql)) {
            header("location: {$hostname}/admin/user.php");
        }
    }
    ?>
    <div class="content">
        <h1>Modify User Details</h1>
        <div class="form">
            <?php
            include 'config.php';
            $user_id = $_GET['id'];
            $sql1 = "SELECT * FROM user WHERE user_id={$user_id}";
            // die("hello bharaya ne...!!");
            $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

            if (mysqli_num_rows($result1) > 0) {
                while ($row = mysqli_fetch_assoc($result1)) {
            ?>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="form" style="padding:60px 30px;">
                    <label for="fname"><b>First Name</b></label>
                    <br>
                    <input type="hidden" name="user_id" id="id" value="<?php echo $row['user_id']; ?>">
                    <input type="text" name="fname" id="fname" value="<?php echo $row['first_name']; ?>" required>
                    <br>
                    <label for="lname">
                        <b>Last Name</b>
                    </label>
                    <br>
                    <input type="text" name="lname" id="lname" value="<?php echo $row['last_name']; ?>" required>
                    <br>
                    <label for="usrname"><b>User Name</b></label>
                    <br>
                    <input type="text" name="usrname" id="usrname" value="<?php echo $row['username']; ?>" required>
                    <br>
                    <label for="role"><b>User Role</b></label>
                    <br>
                    <select name="role" id="role" value="<?php echo $row['role']; ?>" required>
                        <?php if ($row['role'] == 1) {
                                    echo ' <option value="0">Normal user</option>
                        <option value="1" selected>Admin</option>';
                                } else {
                                    echo '<option value="0" selected>Normal user</option>
                        <option value="1">Admin</option>';
                                }
                                ?>
                    </select>
                    <br>
                    <button type="submit" name="save" value="save">MODIFIY</button>
                </div>
            </form>
            <?php
                }
            } ?>
        </div>
    </div>
</body>

</html>