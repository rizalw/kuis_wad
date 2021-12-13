<?php
    session_start();
    if (isset($_POST["submit"])) {
        require($_SERVER['DOCUMENT_ROOT']."/company profile_kuis/essensial/connection.php");
        $nama_mentoring = $_POST["nama_mentoring"];
        $tanggal = $_POST["tanggal"];
        $waktu = $_POST["waktu"];
        $link = $_POST["link"];
        $combinedDT = date('Y-m-d H:i:s', strtotime("$tanggal $waktu"));
        $query = "INSERT INTO mentoring(nama_mentoring, tanggal, link) VALUES ('$nama_mentoring', '$combinedDT', '$link');" ;
        $hasil = mysqli_query($koneksi, $query);
        if ($hasil){
            $_SESSION["berhasil"] = "Data berhasil dimasukkan";
        } else{
            $_SESSION["gagal_input"] = "Data tidak berhasil dimasukkan";
        }
        header("Location: ../admin_mentoring.php");
    };
