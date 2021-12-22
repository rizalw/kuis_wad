<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentoring Just Code It</title>
    <?php require("essensial/important.php") ?>
</head>

<body style="overflow-x:hidden">
    <?php
    require("layout/navbar.php");
    require("essensial/connection.php");
    if (isset($_SESSION["berhasil_submit"])) {
        echo "<div class='alert alert-success d-flex justify-content-between' role='alert'>", $_SESSION['berhasil_submit'],
        "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
        unset($_SESSION['berhasil_submit']);
    }
    ?>

    <div style="background-color: #FCE5C9;" id="content" class="py-5">
        <div class="container py-4">
            <div id="mentoringmu" class="mb-5">
                <h1 class="fs-3">Mentoring Yang Terdaftar</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Mentoring</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Akses Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id_user = $_SESSION["id"];
                        $query_user_mentoring = "SELECT mentoring.nama_mentoring AS nama_mentoring, mentoring.tanggal AS tanggal, 
                        user_mentoring.status AS status, user_mentoring.id_user AS id_user, mentoring.link AS link FROM mentoring  
                        INNER JOIN user_Mentoring ON mentoring.id = user_mentoring.id_mentoring";
                        $result_user_mentoring = mysqli_query($koneksi, $query_user_mentoring);
                        $t = 1;
                        if (mysqli_num_rows($result_user_mentoring) == 0) {
                        ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data pendaftaran</td>
                        </tr>
                        <?php 
                        } else {                        
                            while ($isi_user_mentoring = mysqli_fetch_array($result_user_mentoring)) {
                                if ($isi_user_mentoring["id_user"] != $_SESSION["id"]) {
                                    continue;
                                };
                        ?>
                                <tr>
                                    <th scope="row"><?= $t ?></th>
                                    <td><?= $isi_user_mentoring["nama_mentoring"] ?></td>
                                    <td><?= $isi_user_mentoring["tanggal"] ?></td>
                                    <td><?= $isi_user_mentoring["status"] ?></td>
                                    <?php if ($isi_user_mentoring["status"] == "Verified") : ?>
                                        <td>
                                            <a href="<?= $isi_user_mentoring['link'] ?>">
                                                <button class="btn btn-primary">Link Pertemuan</button>
                                            </a>
                                        </td>
                                    <?php else : ?>
                                        <td>
                                            <button class="btn btn-secondary">Not verified yet</button>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                        <?php
                                $t++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="daftar-mentoring">
                <?php
                $query = "SELECT * FROM mentoring";
                $result = mysqli_query($koneksi, $query);
                ?>
                <h1 class="fs-3">Daftar Mentoring</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Mentoring</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tingkat Ketersediaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x = 1;
                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <th scope="row"><?= $x ?></th>
                                <td><?= $data["nama_mentoring"] ?></td>
                                <td><?= $data["tanggal"] ?></td>
                                <?php
                                $id_mentoring = $data['id'];
                                $query_count = "SELECT COUNT('id') as total_id FROM user_mentoring WHERE id_mentoring = $id_mentoring;";
                                $res_count = mysqli_query($koneksi, $query_count);
                                $data2 = mysqli_fetch_assoc($res_count);
                                $jumlah = $data2["total_id"];
                                if ($jumlah < 10) {
                                    $status = "Tersedia";
                                } else {
                                    $status = "Penuh";
                                }
                                ?>
                                <td><?= $status ?></td>
                            </tr>
                        <?php
                            $x++;
                        };
                        ?>
                    </tbody>
                </table>
                <a href="#" class="my-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Daftar</button>
                </a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Mentoring</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="query/insertUserMentoring.php" method="POST" class="container">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-2">
                                <label for="" class="form-text">Nama Mentoring</label>
                            </div>
                            <div class="col-10">
                                <select class="form-select" aria-label="Default select example" name="mentoring">
                                    <?php
                                    $query_mentoring = "SELECT id, nama_mentoring FROM mentoring";
                                    $res_mentoring = mysqli_query($koneksi, $query_mentoring);
                                    while ($hasil_mentoring = mysqli_fetch_assoc($res_mentoring)) {
                                    ?>
                                        <option value="<?= $hasil_mentoring['id'] ?>"><?= $hasil_mentoring['nama_mentoring'] ?></option>
                                    <?php
                                    };
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require("layout/footer.php") ?>
</body>

</html>