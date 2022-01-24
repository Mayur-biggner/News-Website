<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="/CSS/style.css">
</head>

<body style="background-color: #eeeeee; overflow-x:hidden;">
    <?php
    include 'header.php';
    ?>
    <div class="container content">
        <div class="row mt-5">
            <div class="col col-7 bg-white ms-5 m-3">
                <?php
                include 'config.php';
                if (isset($_GET['aid'])) {
                    $aid = $_GET['aid'];
                }
                $limit = 3;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;
                //  this below query is used for fetching all record of one user
                $sql = "SELECT post.post_id,post.category,post.description,post.author,post.post_img,post.title,category.category_name,user.username,post.post_date,category.category_id FROM post LEFT JOIN category ON post.category=category.category_id LEFT JOIN user ON post.author=user.user_id WHERE post.author={$aid} ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                //  this below query is only used for fetching the username
                $sql1 = "SELECT post.author,user.username,post.post_id FROM post LEFT JOIN user ON post.author=user.user_id WHERE post.author={$aid}";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed..");
                ?>
                <h1 class="mt-1"><?php echo mysqli_fetch_assoc($result1)['username']; ?></h1>
                <hr>
                <?php
                $result = mysqli_query($conn, $sql) or die("Query Failed");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="row post-content">
                    <div class="col me-1 col-4">
                        <a href="single.php?id=<?php echo $row['post_id']; ?>"> <img class="img-thumbnail"
                                src="admin/upload/<?php echo $row['post_img']; ?>" alt="POST-IMAGE"></a>
                    </div>
                    <div class="col border-1">
                        <h3><a class="text-decoration-none"
                                href="single.php?id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a>
                        </h3>
                        <div class="post-info">
                            <span>
                                <i></i>
                                <a class="text-decoration-none"
                                    href="category.php?cid=<?php echo $row['category']; ?>"><?php echo $row['category_name']; ?></a>
                            </span>
                            <span>
                                <i></i>
                                <a class="text-decoration-none"
                                    href="author.php?aid=<?php echo $row['author'] ?>"><?php echo $row['username']; ?></a>
                            </span>
                            <span>
                                <i></i>
                                <a class="text-decoration-none" href="#"><?php echo $row['post_date']; ?></a>
                            </span>
                        </div>
                        <p class="description"><?php echo substr($row['description'], 0, 130) . "..."; ?></p>
                        <button class="btn p-1 btn-primary"><a class="text-white text-decoration-none"
                                href="single.php?id=<?php echo $row['post_id']; ?>">Read
                                More</a></button>
                    </div>
                </div>
                <hr>
                <?php
                    }
                } else {
                    echo "<h2>No Record Found</h2>";
                } ?>
                <div class="d-flex pb-4 justify-content-center">
                    <div class="w-25 btn-group " role="group">
                        <?php
                        if (mysqli_num_rows($result1) > 0) {
                            $no_record = mysqli_num_rows($result1);
                            // $limit = 3;
                            $total_page = ceil($no_record / $limit);
                            if ($page > 1) {
                                echo  '<button type="button" class=" btn btn-primary"><a class="text-white text-decoration-none" href="author.php?aid=' . $aid . '&page=' . ($page - 1) . '">Prev</a></button>';
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $page) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }
                                echo ' <button type="button" class="btn btn-primary ' . $active . '"><a class="text-white text-decoration-none" href="author.php?aid=' . $aid . '&page=' . $i . '">' . $i . '</a></button>';
                            }
                            if ($total_page > $page) {
                                echo  '<button type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="author.php?aid=' . $aid . '&page=' . ($page + 1) . '">Next</a></button>';
                            }
                        } else {
                            echo "<p>Query Failed.</p>";
                        } ?>
                    </div>
                </div>
            </div>

            <div class="col me-5 m-3">
                <div class="row bg-white mb-3 p-3">
                    <?php include 'sidebar.php'; ?>
                </div>
            </div>
        </div>
        <div class="row bg-primary footer">
            <?php include 'footer.php'; ?>
        </div>

</body>

</html>