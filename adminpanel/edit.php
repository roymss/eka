<?php

require '../inc/function.php';

$id = $_GET["id"];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href = '../index.php'
        </script>
";
    } else {
        echo "
        <script>
            alert('Data gagal ubah');
            document.location.href = '../index.php'
        </script>
";
    }
}

$produk = query("SELECT * FROM produk WHERE id = $id")[0];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Barang</title>
</head>

<body>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        EDIT Barang
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?= $produk["id"]; ?>">
                            <input type="hidden" name="gambarLama" value="<?= $produk["gambar"]; ?>">

                            <div class="form-group">
                                <label>Gambar Barang</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama" value="<?= $produk["nama"]; ?>" placeholder="Masukkan nama barang" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Barang</label>
                                <input type="text" class="form-control" name="desk" placeholder="Masukkan deskripsi barang" value="<?= $produk["desk"]; ?>"></input>
                            </div>


                            <button type="submit" name="submit" class="btn btn-success">UPDATE</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>


