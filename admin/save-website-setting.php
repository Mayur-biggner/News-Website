<?php
include 'config.php';
if (empty($_FILES['new-logo']['name'])) {
    $file_name = $_POST['old-logo'];
} else {
    $errors = array();

    $file_name = $_FILES['new-logo']['name'];
    $file_size = $_FILES['new-logo']['size'];
    $file_tmp = $_FILES['new-logo']['tmp_name'];
    $file_type = $_FILES['new-logo']['type'];
    $tmp = explode('.', $file_name);
    $file_extension = end($tmp);
    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_extension, $extensions) === false) {
        $errors[] = "This Extension is not allowed, please choose a jpg, jpeg or png files";
    }
    if ($file_size > 2097152) {            /*(1024*1024*2)*/
        $errors[] = "File size must be 2mb or lower.";
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "images/" . $file_name);
    } else {
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
        die();
    }
}
$websitename = $_POST['websitename'];
// $logo   = $_POST['new-logo'];
$footerDescription = $_POST['footerDescription'];
$sql = "UPDATE settings SET websitename='{$websitename}',footerDescription='{$footerDescription}',logo='{$file_name}'";

$result = mysqli_query($conn, $sql) or die("Query Failed.");
if (mysqli_query($conn, $sql)) {
    header("location: {$hostname}/admin/settings.php");
} else {
    echo "Query Failed";
}