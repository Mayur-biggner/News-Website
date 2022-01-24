<?php
include 'config.php';
if (empty($_FILES['new-file']['name'])) {
    $imgname = $_POST['old-file'];
} else {
    $errors = array();

    $file_name = $_FILES['new-file']['name'];
    $file_size = $_FILES['new-file']['size'];
    $file_tmp = $_FILES['new-file']['tmp_name'];
    $file_type = $_FILES['new-file']['type'];
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
}
$post_id = $_POST['post_id'];
$title   = $_POST['title'];
$description = $_POST['discription'];
$category = $_POST['category'];

$sql = "UPDATE post SET title='{$title}',description='{$description}',category={$category},post_img='{$imgname}' WHERE post_id={$post_id};";
if ($category != $_POST['old-category']) {
    $sql .= " UPDATE category SET post = post - 1 WHERE category_id = {$_POST['old-category']};";
    $sql .= " UPDATE category SET post = post + 1 WHERE category_id = {$category};";
}

$result = mysqli_multi_query($conn, $sql) or die("Query Failed.");
if ($result) {
    header("location: {$hostname}/admin/post.php");
}