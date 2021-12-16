<?php
session_start();
?>
<nav class="navbar navbar-expand-md sticky-top navbar-dark p-2">
    <div class="container-fluid">
        <a class="navbar-brand d-flex" href="./index.php">
            <img src="assets/logo png nya jci crop.png" alt="" class="d-inline-block align-text-top me-4">
            <div class="judul fs-4">
                Just Code It Community
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0 d-flex">
                <li class="nav-item">
                    <a class="nav-link active fs-5" aria-current="page" href="./index.php#aktivitas">Aktivitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-5" href="./index.php#divisi">Divisi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-5" href="./index.php#tentang-kami">Tentang Kami</a>
                </li>
                <?php if (!isset($_SESSION["Status"])) : ?>
                    <li class="nav-item">
                        <a href="./login.php">
                            <input type="button" value="Login" class="btn btn-light">
                        </a>
                    </li>
                <?php else : ?>
                    <?php if ($_SESSION["role"] == "user"):?>
                        <li class="nav-item">
                            <a href="./mentoring.php" class="nav-link active fs-5">Mentoring</a>
                        </li>
                    <?php endif;?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION["nama"] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if (isset($_SESSION["is_admin"])) : ?>
                                <a class="dropdown-item" href="./admin_overview.php">Admin Page</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="./query/logoutQuery.php">Logout</a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>