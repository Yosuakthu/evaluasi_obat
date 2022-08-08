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
    $kode = $data["kode"];
    $tgl = $data["tgl_masuk"];
    $obat = $data["obat"];
    $keluar = $data["keluar"];
    $ket = $data["ket"];
    $res = $data["res"];

    $a = query("SELECT * FROM masuk
    INNER JOIN satuan ON masuk.id_satuan = satuan.id_satuan
    INNER JOIN jenis ON masuk.id_jenis = jenis.id_jenis
    INNER JOIN kategori ON masuk.id_kategori = kategori.id_kategori
    INNER JOIN suplier ON masuk.id_suplier = suplier.id_suplier
    INNER JOIN ket ON masuk.id_ket = ket.id_ket
    INNER JOIN expire ON masuk.id_expire = expire.id_expire
    INNER JOIN obat ON expire.id_obat = obat.id_obat WHERE expire.id_obat = '$obat' 
    ")[0];

    $masuk = $a["id_masuk"];

    $sql = "INSERT INTO data_obat VALUES('$kode','$id','$masuk','$tgl','$keluar','$ket','$res')";
    mysqli_query($conn,$sql) or die('gagal');
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
    mysqli_query($conn,"DELETE FROM data_obat WHERE id_data_obat = '$id'");
    return mysqli_affected_rows($conn);
}
function hapus_dbk($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM keluar WHERE id_keluar = '$id'");
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
