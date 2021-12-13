<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("essensial/important.php") ?>
    <title>Login Page</title>
    <style>
        body {
            background-color: #FCE5C9 !important;
        }

        .container {
            margin-top: 100px;
        }

        form {
            background-color: #FFA077;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <?php require("layout/navbar.php") ?>
    <?php require("essensial/connection.php") ?>
    <div class="container">
        <?php
        if (isset($_SESSION["berhasil_registrasi"])) {
            echo "<div class='alert alert-success d-flex justify-content-between' role='alert'>", $_SESSION['berhasil_registrasi'],
            "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            unset($_SESSION['berhasil_registrasi']);
        }
        ?>
        <div class="display-6 text-center"><b>Login</b></div>
        <form action="query/loginQuery.php" method="POST" class="w-75 mx-auto p-3 mt-3">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" placeholder="Masukkan nama emailmu" name="email" required><br>
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Masukkan passwordmu" name="password" required><br>
            <input type="submit" value="Login" name="submit" class="btn btn-primary form-control">
            <div class="mt-3 text-center">
                Belum punya akun? Registrasi <a href="registrasi.php">disini</a>
            </div>
    </div>
    </form>
    </div>
    <?php require("layout/footer.php") ?>
</body>

</html>