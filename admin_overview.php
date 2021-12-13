<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("essensial/important.php") ?>
    <link rel="stylesheet" href="./assets/style/admin.css">
    <link rel="stylesheet" href="./assets/style/admin_ext.css">
    <title>Admin Page</title>
</head>

<body>
    <?php
    require("essensial/connection.php");
    $queryDivisi = "SELECT * FROM division";
    $hasil = mysqli_query($koneksi, $queryDivisi);
    ?>
    <div class="d-flex w-100">
    <?php 
    require("layout/sidebar.php");
    ?>
        <div class="flex-grow-1">
            <div class="container mb-5">
                <?php
                if (isset($_SESSION["is_login"])) {
                    echo "<div class='alert alert-success d-flex justify-content-between' role='alert'>", $_SESSION['is_login'],
                    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
                    unset($_SESSION['is_login']);
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    require("modal_insert.php");
    ?>
    <script src="layout/sidebars.js"></script>
</body>

</html>