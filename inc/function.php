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
    $gambar = htmlspecialchars($data["gambar"]);
    $nama = htmlspecialchars($data["nama"]);
    $desk = htmlspecialchars($data["desk"]);

    $query = "INSERT INTO produk
                VALUES
               ('0', '$gambar', '$nama', '$desk')     
    ";

    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);
}


function hapus($id){
    global $konek;
    mysqli_query($konek, "DELETE FROM produk WHERE id = $id");
    return mysqli_affected_rows($konek);
}

function ubah($data){
    global $konek;
    $id = $data["id"];
    $gambar = htmlspecialchars($data["gambar"]);
    $nama = htmlspecialchars($data["nama"]);
    $desk = htmlspecialchars($data["desk"]);

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