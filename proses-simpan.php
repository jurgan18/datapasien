<?php

include 'class/pasien.php';

if (isset($_POST['simpan'])) {
    $dataPasien = new Pasien();
    $nama = trim($_POST['nama']);
    $tanggal = $_POST['tgl_lahir'];
    $tgl = explode('-', $tanggal);
    $tanggal_lahir = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
    $umur = trim($_POST['umur']);
    $ruang = trim($_POST['ruang']);
    $alamat = trim($_POST['alamat']);
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $dataPasien->tambahData($nama, $tanggal_lahir, $umur, $ruang, $alamat, $jenis_kelamin);
}
?>