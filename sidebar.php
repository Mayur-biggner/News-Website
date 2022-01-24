<html>

<head>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <label class=" ms-3 border-start border-primary border-3" for="SEARCH"><b>SEARCH</b></label>
    <br>
    <div class="input-group m-3">
        <form class="input-group m-2 me-1" action="search.php" method="get">
            <input placeholder="Search.." required class="p-1 ps-3 w-40 border border-2 rounded-start" type="text"
                name="search" id="search">
            <button type="submit"
                class=" border-0 rounded-end bg-primary p-1 text-white text-center text-decoration-none">SEARCH</button>
        </form>
    </div>
    </div>
    <div class="row bg-white p-3">
        <label class="ms-3 border-start border-primary border-3" for="RECENT POST"><b>RECENT
                POST</b></label>
        <div class="recent-post">
            <?php include 'config.php';
            $limit = 3;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $offset = ($page - 1) * $limit;

            $sql = "SELECT post.post_id,post.category,post.description,post.author,post.post_img,post.title,category.category_name,user.username,post.post_date,category.category_id FROM post LEFT JOIN category ON post.category=category.category_id LEFT JOIN user ON post.author=user.user_id ORDER BY post.post_id DESC LIMIT 5";

            $result = mysqli_query($conn, $sql) or die("Query Failed");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="row mt-4 post-content">
                <div class="col col-4">
                    <a href="single.php?id=<?php echo $row['post_id']; ?>"> <img class="img-thumbnail"
                            src="admin/upload/<?php echo $row['post_img']; ?>" alt="POST-IMAGE"></a>
                </div>
                <div class="col border-1">
                    <h5><a class="text-decoration-none"
                            href="single.php?id=<?php echo $row['post_id']; ?>"><?php echo $row['title']; ?></a>
                    </h5>
                    <div class="post-info">
                        <span>
                            <i class="fa fa-tags text-primary" aria-hidden="true"></i>
                            <a class="text-decoration-none"
                                href="category.php?cid=<?php echo $row['category']; ?>"><?php echo $row['category_name']; ?></a>
                        </span>
                        <span>
                            <i class="fa fa-user text-primary"></i>
                            <a class="text-decoration-none"
                                href="author.php?aid=<?php echo $row['author'] ?>"><?php echo $row['username']; ?></a>
                        </span>
                        <span>
                            <i class="far fa-calendar-alt text-primary"></i>
                            <a class="text-decoration-none" href="#"><?php echo $row['post_date']; ?></a>
                        </span>
                    </div>
                    <p class="description"><?php echo substr($row['description'], 0, 30) . "..."; ?></p>
                    <!-- <button class="btn p-1 btn-primary">
                            <a class="text-white button text-decoration-none"
                                href="single.php?id=<?php echo $row['post_id']; ?>">Read
                                More</a>
                            </button> -->
                </div>
            </div>
            <hr>
            <?php
                }
            } else {
                echo "<h2>No Record Found</h2>";
            } ?>
        </div>
    </div>
</body>

</html>