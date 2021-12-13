<?php
    require($_SERVER['DOCUMENT_ROOT']."/company profile_kuis/essensial/connection.php");
    if (isset($_POST["delete"])){
        $id_divisi = $_POST['id_divisi'];
        mysqli_query($koneksi, " DELETE FROM division WHERE id = $id_divisi");
        header("Location: ../admin.php");
    };
?>