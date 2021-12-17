<?php
    session_start();
    require($_SERVER['DOCUMENT_ROOT']."/company profile_kuis/essensial/connection.php");
    if (isset($_POST["submit"])){
        $id_user = $_SESSION["id"];
        $id_mentoring = $_POST["mentoring"];
        $status = "On Process";
        $query = "INSERT INTO user_mentoring(id_user, id_mentoring, status)
        VALUES ( $id_user, $id_mentoring,'$status');";
        $result = mysqli_query($koneksi, $query);
        if ($result){
            $_SESSION["berhasil_submit"] = "Data berhasil ditambahkan";
            header("location: ../mentoring.php");
        }
    }
?>