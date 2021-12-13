<?php
session_start();
unset($_SESSION["nama"]);
unset($_SESSION["Status"]);
if (isset($_SESSION["is_admin"])){
    unset($_SESSION["is_admin"]);
}
$_SESSION["is_logout"] = "Berhasil Logout";
header("Location: ../index.php");
?>