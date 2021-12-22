<?php
session_start(); 
if (isset($_POST["submit"])) {
    require($_SERVER['DOCUMENT_ROOT']."/company profile_kuis/essensial/connection.php");
    $id = $_POST["id"];
    $query = "UPDATE user_mentoring SET status = 'Verified' WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    if ($query){
        $_SESSION["berhasil"] = "Berhasil verifikasi";
    } else {
        $_SESSION["gagal"] = "Gagal verifikasi";
    }
    header("Location: ../admin_user_mentor.php");
}
?>