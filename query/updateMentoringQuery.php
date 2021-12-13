<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/company profile_kuis/essensial/connection.php");
if (isset($_POST["submit"])) {
    $id_mentoring = $_POST["id_mentoring"];
    $nama_mentoring = $_POST["nama_mentoring"];
    $tanggal = $_POST["tanggal"];
    $waktu = $_POST["waktu"];
    $link = $_POST["link"];
    $combinedDT = date('Y-m-d H:i:s', strtotime("$tanggal $waktu"));
    $query = "UPDATE mentoring SET
        nama_mentoring = '$nama_mentoring',
        tanggal = '$combinedDT',
        link = '$link'
        WHERE id = $id_mentoring";
    $hasil = mysqli_query($koneksi, $query);
    if ($hasil){
        $_SESSION["berhasil_update"] = "Data berhasil diupdate";
    } else{
        $_SESSION["gagal_update"] = "Data tidak berhasil diupdate";
    }
    header("Location: ../admin_mentoring.php");
};
?>