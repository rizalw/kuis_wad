<?php
session_start(); 
require($_SERVER['DOCUMENT_ROOT']."/company profile_kuis/essensial/connection.php");
if (isset($_POST["submit"])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hasil = mysqli_query($koneksi, "INSERT INTO user_account(email, password, role) VALUES('$email', '$password', 'user')");
    if ($hasil){
        $_SESSION["berhasil_registrasi"] = "Registrasi telah berhasil";
        header("Location: ../login.php");
    } else {
        $_SESSION["gagal_registrasi"] = "Registrasi gagal";
        header("Location: ../registrasi.php");
    };
}
