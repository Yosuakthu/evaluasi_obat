<?php

$conn = mysqli_connect('localhost','root','','evaluasi_obat');

function query($query){
    global $conn;
    $r = mysqli_query($conn,$query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($r)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $id = $data["id"];
    $ido = $data["ido"];
    $ket = $data["ket"];
    $banyak = $data["banyak"];
    $res = $data["res"];
    $sql = "INSERT INTO data_obat VALUES(NULL,'$id','$ido','$banyak','$ket','$res')";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}

function tambahuser($data){
    global $conn;
    $nama = $data["nama"];
    $user = $data["user"];
    $pass = $data["pass"];
    $id = $data["id"];
    $sql = "INSERT INTO pengguna VALUES(NULL,'$nama','$user','$pass','$id')";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}
function tambahobat($data){
    global $conn;
    $no = $data["no"];
    $stok = $data["stok"];
    
    $sql = "INSERT INTO obat VALUES(NULL,'$no','$stok')";
    mysqli_query($conn,$sql);
    return mysqli_affected_rows($conn);
}


function hapus_db($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM data_obat WHERE id_data_obat = $id");
    return mysqli_affected_rows($conn);
}
function hapus_dbk($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM obat_k WHERE id_obat_k = $id");
    return mysqli_affected_rows($conn);
}
function hapus_r($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM resep WHERE id_resep = $id");
    return mysqli_affected_rows($conn);
}
function hapus_u($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM pengguna WHERE id_pengguna = $id");
    return mysqli_affected_rows($conn);
}
function hapusobat($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM obat WHERE id_obat = $id");
    return mysqli_affected_rows($conn);
}

function uo($data){
    global $conn;
    $id =  $data["id"];
    $nama = $data["no"];
    $stok = $data["stok"];
    

    $query = "UPDATE obat SET
        nama_obat = '$nama',
        stok_obat = '$stok'
        WHERE id_obat = '$id'
    ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}
function uok($data){
    global $conn;
    $id =  $data["id"];
    $nama = $data["no"];
    $stok = $data["stok"];
    

    $query = "UPDATE obat_k SET
        obat_k = '$nama',
        stok_k = '$stok'
        WHERE id_obat_k = '$id'
    ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}

function ubah_user($data){
    global $conn;
    $id =  $data["id1"];
    $nama = $data["nama"];
    $username = $data["user"];
    $level = $data["id"];
    

    $query = "UPDATE pengguna SET
        nama = '$nama',
        username = '$username',
        id_tingkatan = '$level'
        WHERE id_pengguna = '$id'
    ";
      mysqli_query($conn,$query);
      return mysqli_affected_rows($conn);
}
