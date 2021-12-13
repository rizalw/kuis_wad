<?php
    require($_SERVER['DOCUMENT_ROOT']."/company profile_kuis/essensial/connection.php");
    if (isset($_POST["submit"])) {
        $id_divisi = $_POST['id_divisi'];
        $nama_divisi = $_POST['nama_divisi'];
        $deskripsi = $_POST['deskripsi'];
        echo $id_divisi, $nama_divisi, $deskripsi;
        mysqli_query($koneksi, "UPDATE division SET
                                nama_divisi = '$nama_divisi',
                                deskripsi = '$deskripsi'
                                WHERE id = '$id_divisi';");
        header("Location: ../admin.php");
    };
?>