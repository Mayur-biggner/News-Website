<?php
// session_start();
// if (!isset($_SESSION["username"])) {
//     header("Location :{$hostname}/admin/");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>

<body>
    <?php
    include 'config.php';
    include 'Admin-panel-header.php';
    if ($_SESSION['user_role'] == 0) {
        header("Location: {$hostname}/admin/post.php");
    }

    ?>
    <div class="heading">
        <h1 style="margin-top:15px;">All Category</h1>
        <a style="margin-bottom:15px;" href="add-category.php"><b>ADD CATEGORY</b></a>
    </div>
    <div class="table">
        <?php
        include 'config.php'; //databse configuration
        //calculation of offset code.
        $limit = 3;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM category ORDER BY category_id DESC LIMIT {$offset},{$limit}";
        $result = mysqli_query($conn, $sql) or die("Query Failed");
        if (mysqli_num_rows($result) > 0) {
            $num = 1;
        ?>
        <table>
            <tr>
                <th>S.NO.</th>
                <th>CATEGORY_Name</th>
                <th>NO. OF POSTS</th>
                <!-- <th>EDIT</th>
                <th>DELETE</th> -->
            </tr>
            <?php $num = $offset + 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $num ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <td><?php echo $row['post']; ?></td>
                <!-- <td><a href="update-category.php?id=<?php // echo $row['category_id']; 
                                                                    ?>">UPDATE</a>
                </td>
                <td><a href="delete-category.php?id=<?php // echo $row['category_id']; 
                                                    ?>">DELETE</a></td> -->
            </tr>
            <?php $num = $num + 1;
                } ?>
        </table>
        <?php
        } ?>
    </div>
    <div class="page">
        <?php
        $sql1 = "SELECT * FROM category";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed..");
        if (mysqli_num_rows($result1) > 0) {
            $no_record = mysqli_num_rows($result1);
            // $limit = 3;
            $total_page = ceil($no_record / $limit);
            if ($page > 1) {
                echo  '<a href="category.php?page=' . ($page - 1) . '">Prev</a>';
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page) {
                    $active = "active";
                } else {
                    $active = "";
                }
                echo ' <a class="' . $active . '" href="category.php?page=' . $i . '">' . $i . '</a>';
            }
            if ($total_page > $page) {
                echo  '<a href="category.php?page=' . ($page + 1) . '">Next</a>';
            }
        } else {
            echo "<p>Query Failed.</p>";
        }
        ?>
    </div>


</body>

</html>