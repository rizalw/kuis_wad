<?php
    if (isset($_POST["submit"])) {
        require($_SERVER['DOCUMENT_ROOT']."/company profile_kuis/essensial/connection.php");
        $nama_divisi = $_POST["nama_divisi"];
        $deskripsi = $_POST["deskripsi"];
        $query = "INSERT INTO division(nama_divisi, deskripsi) VALUES ('$nama_divisi', '$deskripsi');" ;
        $hasil = mysqli_query($koneksi, $query);
        header("Location: ../admin_divisi.php");
    };
?>