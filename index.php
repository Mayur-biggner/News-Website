<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/bootstrap.min.css" media="screen">
    <script src="https://kit.fontawesome.com/1446174b95.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body style="background-color: #eeeeee; overflow-x:hidden;">
    <?php
    include 'header.php';
    ?>
    <div class="container content">
        <div class="row mt-5">
            <div class="col col-7 bg-white ms-5 m-3">
                <?php include 'config.php';
                $limit = 7;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;

                $sql = "SELECT post.post_id,post.category,post.description,post.author,post.post_img,post.title,category.category_name,user.username,post.post_date,category.category_id FROM post LEFT JOIN category ON post.category=category.category_id LEFT JOIN user ON post.author=user.user_id ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";

                $result = mysqli_query($conn, $sql) or die("Query Failed");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="row mt-4 post-content">
                    <div class="col me-1 col-4">
                        <a href="single.php?id=<?php echo $row['post_id']; ?>"> <img class="img-thumbnail"
                                src="admin/upload/<?php echo $row['post_img']; ?>" alt="POST-IMAGE"></a>
                    </div>
                    <div class="col p-2 border-1">
                        <h3><a class="text-decoration-none"
                                href="single.php?id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a>
                        </h3>
                        <div class="post-info">
                            <span>
                                <i class="fa fa-tags text-primary" aria-hidden="true"></i>
                                <a class="text-decoration-none"
                                    href="category.php?cid=<?php echo $row['category']; ?>"><?php echo $row['category_name']; ?></a>
                            </span>
                            &nbsp;
                            <span>
                                <i class="fas fa-user text-primary"></i>
                                <a class="text-decoration-none"
                                    href="author.php?aid=<?php echo $row['author'] ?>"><?php echo $row['username']; ?></a>
                            </span>
                            &nbsp;
                            <span>
                                <i class="far fa-calendar-alt text-primary"></i>
                                <a class="text-decoration-none" href="#"><?php echo $row['post_date']; ?></a>
                            </span>
                        </div>
                        <p class="description"><?php echo substr($row['description'], 0, 130) . "..."; ?></p>
                        <button class="btn p-1 btn-primary"><a class="text-white button text-decoration-none"
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
                        $sql1 = "SELECT * FROM post";
                        $result1 = mysqli_query($conn, $sql1) or die("Query Failed..");
                        if (mysqli_num_rows($result1) > 0) {
                            $no_record = mysqli_num_rows($result1);
                            // $limit = 3;
                            $total_page = ceil($no_record / $limit);
                            if ($page > 1) {
                                echo  '<button type="button" class=" btn btn-primary"><a class="text-white text-decoration-none" href="index.php?page=' . ($page - 1) . '">Prev</a></button>';
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i == $page) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }
                                echo ' <button type="button" class="btn btn-primary ' . $active . '"><a class="text-white text-decoration-none" href="index.php?page=' . $i . '">' . $i . '</a></button>';
                            }
                            if ($total_page > $page) {
                                echo  '<button type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="index.php?page=' . ($page + 1) . '">Next</a></button>';
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