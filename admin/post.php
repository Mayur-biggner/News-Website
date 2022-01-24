<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include 'Admin-panel-header.php';
    ?>
    <div class="heading">
        <h1 style="margin-top:15px;">All Posts</h1>
        <a style="margin-bottom:15px;" href="add-post.php"><b>ADD POST</b></a>
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
        if ($_SESSION['user_role'] == 1) {
            $sql = "SELECT post.post_id,post.title,category.category_name,user.username,post.post_date,category.category_id FROM post LEFT JOIN category ON post.category=category.category_id LEFT JOIN user ON post.author=user.user_id ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
        } elseif ($_SESSION['user_role'] == 0) {
            $sql = "SELECT post.post_id,post.title,category.category_name,user.username,post.post_date,category.category_id FROM post LEFT JOIN category ON post.category=category.category_id LEFT JOIN user ON post.author=user.user_id WHERE post.author={$_SESSION['user_id']} ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
        }

        $result = mysqli_query($conn, $sql) or die("Query Failed");
        if (mysqli_num_rows($result) > 0) {
            $num = 1;
        ?>
        <table>
            <tr>
                <th>S.NO.</th>
                <th>TITLE</th>
                <th>CATEGORY</th>
                <th>DATE</th>
                <th>AUTHOR</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            <?php $num = $offset + 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $num ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['category_name']; ?></td>
                <!--here is the name of user who uploded-->
                <td><?php echo $row['post_date']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <!--here is the name of author-->
                <td><a href="update-post.php?id=<?php echo $row['post_id']; ?>">UPDATE</a>
                </td>
                <td><a
                        href="delete-post.php?id=<?php echo $row['post_id']; ?>&catid=<?php echo $row['category_id']; ?>">DELETE</a>
                </td>

            </tr>
            <?php $num = $num + 1;
                } ?>
        </table>
        <?php
        } ?>
    </div>
    <div class="page">
        <?php
        $sql1 = "SELECT * FROM post";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed..");
        if (mysqli_num_rows($result1) > 0) {
            $no_record = mysqli_num_rows($result1);
            // $limit = 3;
            $total_page = ceil($no_record / $limit);
            if ($page > 1) {
                echo  '<a href="post.php?page=' . ($page - 1) . '">Prev</a>';
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page) {
                    $active = "active";
                } else {
                    $active = "";
                }
                echo ' <a class="' . $active . '" href="post.php?page=' . $i . '">' . $i . '</a>';
            }
            if ($total_page > $page) {
                echo  '<a href="post.php?page=' . ($page + 1) . '">Next</a>';
            }
        } else {
            echo "<p>Query Failed.</p>";
        }
        ?>
    </div>

</body>

</html>