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
    <title>Admin Page</title>
    <style>
        html,
        body {
            width: 100%;
        }

        body {
            background-color: #FCE5C9 !important;
        }

        .container {
            margin-top: 50px;
        }

        .container-for-progress {
            background-color: #FFA077;
            border-radius: 28px;
        }

        .flex-shrink-0 * {
            color: white !important;
        }

        .btn-toggle::before {
            color: white;
        }

        a.link-dark.text-decoration-none.border-bottom:hover {
            background-color: #FF8C00 !important;
        }

        .btn-toggle:hover,
        .btn-toggle:focus,
        a.link-dark:hover,
        a.link-dark:focus {
            background-color: #ffff;
            color: black !important;
        }
    </style>
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