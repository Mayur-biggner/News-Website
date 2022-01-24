<?php
include 'config.php';
if (isset($_FILES['file'])) {
    $errors = array();

    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $tmp = explode('.', $file_name);
    $file_extension = end($tmp);
    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_extension, $extensions) === false) {
        $errors[] = "This Extension is not allowed, please choose a jpg, jpeg or png files";
    }
    if ($file_size > 2097152) {            /*(1024*1024*2)*/
        $errors[] = "File size must be 2mb or lower.";
    }
    $target = time() . "-" . basename($file_name);
    $imgpath = "upload/" . $target;
    $imgname = $target;
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $imgpath);
    } else {
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
    }

    session_start();
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['discription']);
    $date = date("d M, Y");
    $author = $_SESSION['user_id'];

    $sql = "INSERT INTO post (title,description,category,post_date,author,post_img) VALUES ('{$title}','{$description}',{$category},'{$date}',{$author},'{$imgname}')";
    $sql1 = "UPDATE category SET post=post+1 WHERE category_id={$category}";
    mysqli_query($conn, $sql1);

    if (mysqli_query($conn, $sql)) {
        header("location: {$hostname}/admin/post.php");
    } else {
        echo "<div>Query Failed.</div>";
    }
}