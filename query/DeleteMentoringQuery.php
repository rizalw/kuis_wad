<?php
    require($_SERVER['DOCUMENT_ROOT']."/company profile_kuis/essensial/connection.php");
    if (isset($_POST["delete"])){
        $id_mentoring = $_POST['id_mentoring'];
        mysqli_query($koneksi, " DELETE FROM mentoring WHERE id = $id_mentoring");
        header("Location: ../admin_mentoring.php");
    };
?>