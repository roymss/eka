<?php

$konek = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040168");

function query($query)
{
    global $konek;
    $result = mysqli_query($konek, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $konek;
    $nama = htmlspecialchars($data["nama"]);
    $desk = htmlspecialchars($data["desk"]);

    // Upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO produk
                VALUES
               ('0', '$gambar', '$nama', '$desk')     
    ";

    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $error = $_FILES['gambar']['error'];

    // Cek Error

    if ($error === 4){
        echo "
        <script>
            alert('Silahkan pilih gambar terlebih dahulu!')
        </script>";
        return false;
    }

    // Cek apakah diupload adalah gambar

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!')
        </script>";
        return false;
    }

    // Cek jika ukurannya terlalu besar

    if($ukuranFile > 1000000){
        echo "
        <script>
            alert('ukuran gambar terlalu besar!')
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
    

    return $namaFileBaru;
}


function hapus($id){
    global $konek;
    mysqli_query($konek, "DELETE FROM produk WHERE id = $id");
    return mysqli_affected_rows($konek);
}

function ubah($data){
    global $konek;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $desk = htmlspecialchars($data["desk"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user pilih gambar baru atau tidak
    if ( $_FILES['gambar']['error']  === 4 ){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE produk SET
                gambar = '$gambar',
                nama = '$nama',
                desk = '$desk'
              WHERE id = $id  
    ";

    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);

}

function cari($keyword){
    $query = "SELECT * FROM produk 
                WHERE
               nama LIKE '%$keyword%' 
    ";
    return query($query);
}