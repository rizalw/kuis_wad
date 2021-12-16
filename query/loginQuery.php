<?php
session_start();
if (isset($_POST["submit"])) {
    require($_SERVER['DOCUMENT_ROOT']."/company profile_kuis/essensial/connection.php");
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "
        SELECT * FROM user_account where email = '$email' AND password = '$password';
        ";
    $hasil = mysqli_query($koneksi, $query);
    if ($hasil) {
        if (mysqli_num_rows($hasil) == 0) {
            header("Location: ../index.php");
        } elseif (mysqli_num_rows($hasil) == 1) {
            while ($data = mysqli_fetch_assoc($hasil)) {
                $email_split = explode("@", $email);
                $_SESSION["nama"] = $email_split[0];
                $_SESSION["is_login"] = "Berhasil Login";
                $_SESSION["Status"] = true;
                $_SESSION["role"] = $data["role"];
                if ($data["role"] == "admin") {
                    $_SESSION["is_admin"] = true;
                    header("Location: ../admin_overview.php");
                } elseif ($data["role"] == "user") {
                    header("Location: ../index.php");
                };
            };
        };
    };
};
