<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Code It</title>
    <?php require("essensial/important.php") ?>
</head>

<body style="overflow-x:hidden">
    <?php
    require("layout/navbar.php");
    require("essensial/connection.php");
    ?>
    <div style="background-color: #FCE5C9;" id="content">
        <?php
        if (isset($_SESSION["is_login"])) {
            echo "<div class='alert alert-success d-flex justify-content-between' role='alert'>", $_SESSION['is_login'],
            "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
            unset($_SESSION['is_login']);
        }
        if (isset($_SESSION["is_logout"])) {
            echo "<div class='alert alert-success d-flex justify-content-between' role='alert'>", $_SESSION['is_logout'],
            "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
            unset($_SESSION['is_logout']);
        }
        ?>
        <div class="d-flex flex-column align-content-center jumbotron py-3">
            <h1 class="display-5 text-center">Just Code It Community</h1>
            <iframe class="ms-auto me-auto mt-2" width="480" height="279" src="https://www.youtube.com/embed/C3Dnwy0vXZo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p class="fs-5 text-center w-50 ms-auto me-auto mt-3" id="aktivitas">Just Code It (JCI) adalah Komunitas yang berfokus kepada pengajaran khususnya di bidang teknologi informasi. Komunitas ini berada dibawah Departemen Ristek HMSI Telkom University</p>
        </div>
        <div class="d-flex aktivitas">
            <div class="card ms-auto me-auto px-5 py-5">
                <div class="card-body">
                    <div class="card-title text-center display-6">
                        <b>Aktivitas</b>
                    </div>
                    <div class="card-text row mt-5">
                        <div class="col fs-5">
                            <div class="detail-aktivitas w-75 mx-auto">
                                Di komunitas ini kami melakukan banyak kegiatan yang pastinya sangat bermanfaat khususnya kepada anggota kami dan umumnya kepada seluruh mahasiswa yang berada di bawah naungan HMSI Telkom University. Aktivitas yang kami lakukan seperti.
                                Mentoring Tugas Besar
                                Mentoring Pra-Kuliah
                                Sharing Session
                                Dan masih banyak lagi!
                            </div>
                        </div>
                        <div id="carouselExampleIndicators" class="carousel slide col" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/Dokumentasi Pengenalan Python.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/Bahas Exception Handling sebelum praktikum.png" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex divisi py-5 flex-column" id="divisi">
            <div class="display-6 ms-auto me-auto"><b>Divisi</b></div>
            <div class="text-center fs-5 w-50 ms-auto me-auto deskripsi-divisi">
                Seperti komunitas yang lainnya, di dalam Komunitas Just Code It memiliki divisi - divisi yang saling bekerja sama untuk membangun komunitas menjadi lebih baik.
            </div>
            <div class="d-flex justify-content-evenly flex-wrap detail-divisi mt-2">
                <?php
                $queryDivisi = "SELECT * FROM division";
                $hasil = mysqli_query($koneksi, $queryDivisi);
                $x = 1;
                while ($data = mysqli_fetch_array($hasil)) {
                ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-center fs-4">
                                <?php echo $data["nama_divisi"] ?>
                            </div>
                            <div class="card-text text-center">
                                <?php echo $data["deskripsi"] ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="tentang-kami py-5" id="tentang-kami">
            <div class="container">
                <div class="display-6 text-center py-3">
                    <b>Tentang Kami</b>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="deskripsi-tentangkami-kiri fs-5 w-75 mx-auto">
                            Just Code It (JCI) adalah Komunitas yang berfokus kepada pengajaran khususnya di bidang teknologi informasi. Komunitas ini berada dibawah Departemen Ristek HMSI Telkom University
                        </div>
                    </div>
                    <div class="col">
                        <div class="deskripsi-tentangkami-kanan fs-5 w-75 mx-auto">
                            Komunitas ini secara resmi didirikan pada bulan Maret tahun 2021, namun kami sebenarnya sudah mulai mendirikannya secara tidak resmi pada bulan Juli tahun 2020
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col">
                        <div class="card mt-2 h-100">
                            <div class="card-body">
                                <div class="card-title text-center display-6">
                                    <b>Visi</b>
                                </div>
                                <div class="card-text text-center">
                                    Mendorong pengembangan diri pribadi mahasiswa di bidang teknologi untuk menghasilkan pribadi yang unggul, kompeten, dan aktif berkontribusi kepada masyarakat maupun entitas Sistem Informasi.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mt-2 h-100">
                            <div class="card-body">
                                <div class="card-title display-6 text-center">
                                    <b>Misi</b>
                                </div>
                                <div class="card-text">
                                    1. Menciptakan lingkungan yang suportif dan kolaboratif untuk menunjang kebutuhan akademik dan minat mahasiswa khususnya teknologi<br>
                                    2. Menciptakan konten digital kreatif bertemakan teknologi untuk menunjang akademik dan minat mahasiswa khususnya teknologi<br>
                                    3. Memfasilitasi minat mahasiswa terhadap teknologi dengan kegiatan seminar, Hands-on, dll<br>
                                    4. Berperan aktif dalam dalam kegiatan perlombaan internal maupun eksternal yang berkaitan dengan Sistem Informasi<br>
                                    5. Membuat produk unggul yang dapat berguna bagi masyarakat luas.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hubungi-kami d-flex justify-content-evenly py-5" id="hubungi-kami">
            <div class="hubungi-kami-kiri">
                <div class="display-6 text-center">
                    <b>Lokasi Kami</b>
                </div>
                <iframe class="d-block mx-auto p-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4790.543520309059!2d107.62886901528157!3d-6.971490770201213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9adaf2f99a3%3A0xaefd20f00bdb096d!2sTelkom%20University%20Convention%20Hall!5e1!3m2!1sid!2sid!4v1634722731001!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="hubungi-kami-kanan">
                <div class="display-6 text-center pb-5">
                    <b>Hubungi kami</b>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama Depan" aria-label="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Nama Belakang" aria-label="Last name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="Deskripsi hal yang ingin diutarakan"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Anda belum mengisi form dengan lengkap</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require("layout/footer.php") ?>
</body>

</html>