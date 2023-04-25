<!-- Aplikasi CRUD -->

<?php
// memanggil file pasien.php
include 'class/pasien.php';

if (isset($_POST['ubah'])) {
    if (isset($_POST['tgl_lahir'])) {
        // membuat objek pasien
        $dataPasien = new Pasien();

        // ambil data hasil submit dari form ubah
        $nama = trim($_POST['nama']);
        $tanggal = $_POST['tgl_lahir'];
        $tgl = explode('-', $tanggal);
        $tanggal_lahir = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
        $umur = trim($_POST['umur']);
        $ruang = trim($_POST['ruang']);
        $alamat = trim($_POST['alamat']);
        $jenis_kelamin = $_POST['jenis_kelamin'];

        // update data pasien
        $dataPasien->tambahData($nama, $tanggal_lahir, $umur, $ruang, $alamat,  $jenis_kelamin);
    }
}
?>