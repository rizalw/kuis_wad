<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <?php require("essensial/important.php") ?>
    <style>
        body {
            background-color: #FCE5C9 !important;
        }
    </style>
</head>

<body>
    <?php
    require("layout/navbar.php");
    require("essensial/connection.php");
    $id = $_GET['id'];
    $queryMentoring = "SELECT * FROM mentoring WHERE id = $id";
    $hasil = mysqli_query($koneksi, $queryMentoring);
    ?>
    <main class="container w-50">
        <div class="display-5 text-center mt-5">
            Data Mentoring
        </div>
        <form action="query/updateMentoringQuery.php" method="post">
            <?php
            while ($data = mysqli_fetch_array($hasil)) {
                $datetime = new DateTime($data['tanggal']);
                $date = $datetime->format('Y-m-d');
                $time = $datetime->format('H:i:s');
            ?>
                <label for="" class="form-text">Nama Mentoring</label>
                <input type="text" name="nama_mentoring" id="" class="form-control" value="<?= $data['nama_mentoring'] ?>">
                <label for="" class="form-text">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="<?= $date ?>">
                <label for="" class="form-text">Waktu</label>
                <input type="time" class="form-control" name="waktu" value="<?= $time ?>">
                <label for="" class="form-text">Link Pertemuan</label>
                <input type="text" name="link" id="" class="form-control" value="<?= $data['link'] ?>">
                <input type="number" name="id_mentoring" id="" value="<?= $data['id'] ?>" hidden>
                <div class="row mt-4">
                    <div class="col">
                        <a href="admin.php">
                            <input type="button" value="Kembali" name="kembali" class="btn btn-danger w-100">
                        </a>
                    </div>
                    <div class="col">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary w-100">
                    </div>
                </div>
            <?php
            }
            ?>
        </form>
    </main>
    <?php require("layout/footer.php"); ?>
</body>

</html>