<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="/CSS/style.css">
</head>

<body style="background-color: #eeeeee; overflow-x:hidden;">

    <?php include 'header.php' ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col bg-white col-7 ms-3">
                <?php include 'config.php';
                $id = $_GET['id'];
                $sql = "SELECT post.post_id,post.description,post.post_img,post.title,category.category_name,user.username,post.post_date,category.category_id FROM post LEFT JOIN category ON post.category=category.category_id LEFT JOIN user ON post.author=user.user_id WHERE post.post_id={$id}";

                $result = mysqli_query($conn, $sql) or die("Query Failed");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <h1 class="mt-2"><?php echo $row['title']; ?></h1>
                <span class="mt-2">
                    <i class="fa fa-tags text-primary"></i>
                    <?php echo $row['category_name']; ?>
                </span>
                <span class="mt-2">
                    <i class="fa fa-user text-primary"></i>
                    <?php echo $row['username']; ?>
                </span class="mt-2">
                <span>
                    <i class="far fa-calendar-alt text-primary"></i>
                    <?php echo $row['post_date']; ?>
                </span>
                <img style="width:500px;height:350px;" src="admin/upload/<?php echo $row['post_img']; ?>"
                    class="rounded w-40 h-30 mx-auto d-block mt-5" alt="IMAGE">
                <p class="mt-3"><?php echo $row['description']; ?></p>
                <?php }
                } else {
                    echo "<h2>No Record Found</h2>";
                } ?>
            </div>
            <div class="col me-5 ms-3">
                <div class="row bg-white mb-3 p-3">
                    <?php include 'sidebar.php'; ?>
                </div>
            </div>

        </div>
    </div>
    <div class="row bg-primary footer">
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>