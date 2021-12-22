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
    <title>Halaman Verifikasi</title>
</head>

<body>
    <?php
    require("essensial/connection.php");
    ?>
    <div class="d-flex w-100">
        <?php
        require("layout/sidebar.php");
        ?>
        <div class="flex-grow-1">
            <div class="container mb-5">
                <?php
                if (isset($_SESSION["berhasil"])) {
                    echo "<div class='alert alert-success d-flex justify-content-between' role='alert'>", $_SESSION['berhasil'],
                    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    unset($_SESSION['berhasil']);
                }
                if (isset($_SESSION["gagal"])) {
                    echo "<div class='alert alert-danger d-flex justify-content-between' role='alert'>", $_SESSION['gagal'],
                    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    unset($_SESSION['gagal']);
                }
                ?>
                <div class="display-6">
                    Verifikasi Data Mentoring
                </div>
                <?php
                require("essensial/connection.php");
                $queryPendaftar = "SELECT mentoring.nama_mentoring AS nama_mentoring, user_mentoring.status AS status, 
                user_mentoring.id_user AS id_user, user_mentoring.id AS id 
                FROM mentoring INNER JOIN user_Mentoring ON mentoring.id = user_mentoring.id_mentoring";
                $hasil = mysqli_query($koneksi, $queryPendaftar);
                ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID User</th>
                            <th scope="col">Nama Mentoring</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_array($hasil)) {
                        ?>
                            <tr>
                                <td><?= $data["id_user"] ?></td>
                                <td><?= $data["nama_mentoring"] ?></td>
                                <td><?= $data["status"] ?></td>
                                <td>
                                    <form action="query/verifyQuery.php" method="POST">
                                        <input type="number" name="id" id="" value="<?= $data['id'] ?>" hidden>
                                        <input type="submit" value="Verify" class="btn btn-success" name="submit">
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    require("modal_insert_mentoring.php");
    ?>
    <script src="layout/sidebars.js"></script>
</body>

</html>