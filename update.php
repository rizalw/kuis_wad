<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>
    <?php require("essensial/important.php") ?>
    <style>
        body{
            background-color: #FCE5C9 !important;
        }
    </style>
</head>
<body>
    <?php 
        require("layout/navbar.php");
        require("essensial/connection.php");
        $id = $_GET['id'];
        $queryDivisi = "SELECT * FROM division WHERE id = $id";
        $hasil = mysqli_query($koneksi, $queryDivisi);
    ?>
    <main class="container w-50">
        <div class="display-5 text-center mt-5">
            Data Divisi
        </div>
        <form action="query/updateQuery.php" method="post">
            <?php 
                while($data = mysqli_fetch_array($hasil)){ 
            ?>
                <label for="" class="form-text" >Nama Divisi</label>
                <input type="text" name="nama_divisi" id="" class="form-control" value="<?php echo $data["nama_divisi"] ?>">
                <label for="" class="form-text mt-2" >Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="5" class="form-control"><?php echo $data["deskripsi"] ?></textarea>
                <input type="number" name="id_divisi" id="" value="<?php echo $data['id']?>" hidden>
                <div class="row mt-4">
                    <div class="col">
                        <a href="admin.php">
                            <input type="button" value="Kembali" name="kembali" class="btn btn-danger w-100">
                        </a>
                    </div>
                    <div class="col">
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary w-100">
                    </div>
                </div>
            <?php 
                }
            ?>
        </form>
    </main>
    <?php require("layout/footer.php"); ?>
</body>
</html>