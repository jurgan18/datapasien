<?php

// memanggil file siswa.php
include 'class/pasien.php';

if (isset($_GET['id'])) {
    // membuat objek pasien
    $dataPasien = new Pasien();

    $tgl_lahir = $_GET['id'];

    // delete data pasien
    $dataPasien->hapusData($tgl_lahir);
}