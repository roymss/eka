<?php

require '../inc/function.php';

$produk = query("SELECT * FROM produk");

if(isset($_POST["cari"])){
    $produk = cari($_POST["keyword"]);
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin.css?<?= time(); ?>">
    <title>Data Barang</title>
</head>

<body>

    <nav class="nav-head navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Foodies</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <form class="d-flex" role="search" method="post">
                <input class="form-control  me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" name="cari" type="submit">Search</button>
            </form>
        </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-2">
                    <h2>Halaman Admin</h2>
                    <br />
                    <br />
                    <div class="card-header">
                        DATA BARANG
                    </div>
                    <div class="card-body">
                        <a href="tambah.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Desk</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($produk as $pro) : ?>
                                    <tr>

                                        <td><img src="../assets/img/<?= $pro["gambar"]; ?>" width="80px" height="80px" alt=""></td>
                                        <td><?= $pro["nama"]; ?></td>
                                        <td><?= $pro["desk"]; ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?id=<?= $pro["id"]; ?>" class="btn btn-sm btn-primary">EDIT</a>
                                            <a href="hapus.php?id=<?= $pro["id"]; ?>" class="btn btn-sm btn-danger">HAPUS</a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>