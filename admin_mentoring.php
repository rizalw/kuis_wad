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
    <title>Halaman Mentoring</title>
</head>

<body>
    <?php
    require("essensial/connection.php");
    // $queryDivisi = "SELECT * FROM division";
    // $hasil = mysqli_query($koneksi, $queryDivisi);
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
                if (isset($_SESSION["gagal_input"])) {
                    echo "<div class='alert alert-danger d-flex justify-content-between' role='alert'>", $_SESSION['gagal_input'],
                    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    unset($_SESSION['gagal_input']);
                }
                if (isset($_SESSION["berhasil_update"])) {
                    echo "<div class='alert alert-success d-flex justify-content-between' role='alert'>", $_SESSION['berhasil_update'],
                    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    unset($_SESSION['berhasil_update']);
                }
                if (isset($_SESSION["gagal_update"])) {
                    echo "<div class='alert alert-danger d-flex justify-content-between' role='alert'>", $_SESSION['gagal_update'],
                    "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    unset($_SESSION['gagal_update']);
                }
                ?>
                <div class="display-6">
                    Data Mentoring
                </div>
                <?php
                require("essensial/connection.php");
                $queryMentoring = "SELECT * FROM mentoring";
                $hasil = mysqli_query($koneksi, $queryMentoring);
                ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Mentoring</th>
                            <th scope="col">Tanggal, Waktu Mentoring</th>
                            <th scope="col">Link Mentoring</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 1;
                        while ($data = mysqli_fetch_array($hasil)) {
                        ?>
                            <tr>
                                <td><?= $x ?></td>
                                <td><?= $data["nama_mentoring"] ?></td>
                                <td><?= $data["tanggal"] ?></td>
                                <td><a href="<?= $data["link"] ?>"><?= $data["link"] ?></a></td>
                                <td>
                                    <form action="query/DeleteMentoringQuery.php" method="post">
                                        <div class="d-flex">
                                            <input type="number" name="id_mentoring" id="" value="<?= $data['id'] ?>" hidden>
                                            <a href="updateMentoring.php?id=<?php echo $data['id'] ?>">
                                                <input type="button" value="Update" name="update" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#updateModal">
                                            </a>
                                            <input type="submit" value="Delete" name="delete" class="btn btn-danger">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $x++;
                        }
                        ?>
                    </tbody>
                </table>

                <button class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data Mentoring</button>
            </div>
        </div>
    </div>
    <?php
    require("modal_insert_mentoring.php");
    ?>
    <script src="layout/sidebars.js"></script>
</body>

</html>