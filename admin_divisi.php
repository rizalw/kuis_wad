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
                <div class="display-6">
                    Data Divisi
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Divisi</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 1;
                        while ($data = mysqli_fetch_array($hasil)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $x ?></th>
                                <td><?php echo $data["nama_divisi"] ?></td>
                                <td><?php echo $data["deskripsi"] ?></td>
                                <td>
                                    <form action="query/DeleteDivisiQuery.php" method="post">
                                        <div class="d-flex">
                                            <input type="number" name="id_divisi" id="" value="<?php echo $data['id'] ?>" hidden>
                                            <a href="updateDivisi.php?id=<?php echo $data['id'] ?>">
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
                <div class="text-center">
                    Kapasitas Database
                </div>
                <div class="container-for-progress p-4 mt-2">
                    <div class="progress">
                        <?php
                        $rowcount = mysqli_num_rows($hasil);
                        $value = round(($rowcount / 10) * 100);
                        ?>
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: <?php echo $value ?>%"><?php echo $value ?>%</div>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Divisi</button>
            </div>
        </div>
    </div>
    <?php
    require("modal_insert_divisi.php");
    ?>
    <script src="layout/sidebars.js"></script>
</body>

</html>