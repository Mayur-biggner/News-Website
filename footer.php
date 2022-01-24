<html>

<head>

</head>

<body>
    <!-- <p class="text-center text-white m-1">@ Copyright 2021 | Powered By MAYUR</p> -->
    <footer class="footer mt-auto py-3 bg-primary ">
        <div class="container">
            <?php
            include 'config.php';
            $sql1 = "SELECT * FROM settings";
            $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    echo '  <p class="text-white text-center">' . $row1['footerDescription'] . '</p>';
                }
            }
            ?>
        </div>
    </footer>
</body>

</html>