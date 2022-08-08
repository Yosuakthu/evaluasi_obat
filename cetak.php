<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'koneksi.php';
$id = $_GET["id"];
$obat = query("SELECT * FROM resep
INNER JOIN data_obat ON resep.id_data_obat = data_obat.id_data_obat
INNER JOIN pengguna ON data_obat.id_pengguna = pengguna.id_pengguna
INNER JOIN obat on data_obat.id_obat = obat.id_obat
WHERE data_obat.id_pengguna = '$id'
");

$ht = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PERTANIAN</title>
</head>
<body>
    <h4>Laporan Resep Obat</h4>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" cellpadding="8" border="1">
        <thead>
            <tr> 
            <th>NO.</th>
            <th>Nama Dokter</th>
            <th>Nama Obat</th>
            <th>Banyak Obat</th>
            <th>Keterangan Obat</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>';
$i = 1;
foreach ($obat as $penguna) {
    $ht .= '
                <tr>
                <td>' . $i++ . '</td>
                <td>' . $penguna["nama"] . '</td>
                <td>' . $penguna["nama_obat"] . '</td>
                <td>' . $penguna["jenis_tanaman"] . '</td>
                <td>' . $penguna["banyak"] . ' Hekatar</td>
                <td>' . $penguna["keterangan_obat"] . ' Hektar</td>
                </tr>
            ';
}

$ht .= '</table>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($ht);
$mpdf->Output();
$mpdf->Output('laporan-pertanian.pdf', \Mpdf\Output\Destination::INLINE);
