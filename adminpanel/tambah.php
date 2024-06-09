<?php

require '../inc/function.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = '../index.php'
        </script>
";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan');
            document.location.href = '../index.php'
        </script>
";
    }
}



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Data</title>
</head>

<body>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        TAMBAH DATA
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Foto Barang</label>
                                <input type="file" name="gambar" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama" placeholder="Masukkan nama barang" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Barang</label>
                                <textarea class="form-control" name="desk" placeholder="Masukkan Deskripsi Barang" required></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">SIMPAN</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>