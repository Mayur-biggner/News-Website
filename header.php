<?php
include 'config.php';
$page = basename($_SERVER['PHP_SELF']);
$page_title = "";
switch ($page) {
    case "single.php":
        if (isset($_GET['id'])) {
            $sql_title = "SELECT * FROM post WHERE post_id={$_GET['id']}";
            $result_title = mysqli_query($conn, $sql_title) or die("Title Query Failed");
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['title'];
        } else {
            $page_title = "No Post Found";
        }
        break;
    case "category.php":
        if (isset($_GET['cid'])) {
            $sql_title = "SELECT * FROM category WHERE category_id={$_GET['cid']}";
            $result_title = mysqli_query($conn, $sql_title) or die("Title Query Failed");
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = $row_title['category_name'] . " News";
        } else {
            $page_title = "No Post Found";
        }
        break;
    case "author.php":
        if (isset($_GET['aid'])) {
            $sql_title = "SELECT * FROM user WHERE user_id={$_GET['aid']}";
            $result_title = mysqli_query($conn, $sql_title) or die("Title Query Failed");
            $row_title = mysqli_fetch_assoc($result_title);
            $page_title = "News by " . $row_title['first_name'] . " " . $row_title['last_name'];
        } else {
            $page_title = "No Post Found";
        }
        break;
    case "search.php":
        if (isset($_GET['search'])) {
            $page_title = $_GET['search'];
        } else {
            $page_title = "No Search Result Found";
        }
        break;
    default:
        $page_title = "News Site";
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1446174b95.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/CSS/bootstrap.min.css" media="screen">

    <link rel="stylesheet" href="./CSS/style.css">
    <title><?php echo $page_title; ?></title>
    <style>
    ul {
        /* border: 2px solid green; */
        margin: 0;
        padding: 5px;
    }

    li a {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande';
        font-size: 20px;
        padding: 5px;
        margin: 5px;
    }

    li a:hover {
        background-color: #1266F1;
    }
    </style>
</head>

<body>
    <div class="container-fluid h-25">
        <div class="row w-auto h-25 bg-primary d-flex justify-content-center logo">
            <?php //dynamic logo Showing
            include 'config.php';
            $sql1 = "SELECT * FROM settings";
            $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    if ($row1['logo'] == "") {
                        echo '<a class="rounded w-25 mx-auto d-block" href="index.php"><h1>' . $row1['websitename'] . '</h1></a>';
                    } else {
                        echo ' <a class="rounded w-25 mx-auto d-block" href="index.php"><img src="./images/' . $row1['logo'] . '"
                        alt="Website-logo"></a>';
                    }
                }
            }
            ?>
        </div>
        <div class="row h-auto menu">
            <div class="col-md-12 h-auto d-flex justify-content-center">
                <?php
                include 'config.php';
                $sql = "SELECT * FROM category WHERE post > 0";
                $result = mysqli_query($conn, $sql) or die("Query Failed : category");
                echo "<ul class='justify-content-center'>";
                echo '<li class="d-inline"><a class="text-white text-decoration-none" href=' . $hostname . '>HOME</a> </li>';
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li class="d-inline"><a class="text-white text-decoration-none" href="category.php?cid=' . $row['category_id'] . '">' . $row['category_name'] . '</a></li>';
                    }
                    echo "</ul>";
                }


                ?>
            </div>
        </div>
    </div>

</body>

</html>