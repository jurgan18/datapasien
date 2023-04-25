<?php

class Pasien
{
    public function tampilData()
    {
        // memanggil file database.php
        include 'class/koneksi.php';

        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk mengambil semua data mahasiswa
        $sql = 'SELECT * FROM pasien ORDER BY nama ASC';

        $result = $mysqli->query($sql);

        while ($data = $result->fetch_assoc()) {
            $hasil[] = $data;
        }

        // menutup koneksi database
        $mysqli->close();

        // nilai kembalian dalam bentuk array
        return $hasil;
    }

    public function tambahData($nama, $tgl_lahir, $umur, $ruang, $alamat, $jenis_kelamin)
    {
        // memanggil file database.php
        include 'class/koneksi.php';

        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // mem-bypass karakter spesial dalam query SQL, sehingga jika attacker mnyertakan karakter seperti ‘ ! ^ ] ” dan lain sebagainya, maka fungsi ini tidak akan membaca karakter tersebut.
        $nama = $mysqli->real_escape_string($nama);
        $umur = $mysqli->real_escape_string($umur);
        $alamat = $mysqli->real_escape_string($alamat);

        // sql statement untuk insert data siswa
        $sql = "INSERT INTO pasien (nama,tgl_lahir,umur,ruang,alamat,jenis_kelamin) 
                VALUES ('$nama','$tgl_lahir','$umur','$ruang','$alamat','$jenis_kelamin')";

        $result = $mysqli->query($sql);

        // cek hasil query
        if ($result) {
            /* jika data berhasil disimpan alihkan ke halaman pasien dan tampilkan pesan = 2 */
            header('Location: pasien.php?alert=2');
        } else {
            /* jika data gagal disimpan alihkan ke halaman pasien dan tampilkan pesan = 1 */
            header('Location: pasien.php?alert=1');
        }

        // menutup koneksi database
        $mysqli->close();
    }

    // Method untuk mengambil data pasien berdasarkan nama
    public function ambilData($id)
    {
        // memanggil file database
        include 'class/koneksi.php';

        // membuat objek dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statment untuk mengambil data pasien berdasarkan umur
        $sql = "SELECT * FROM pasien WHERE id = '$id'";

        $result = $mysqli->query($sql);
        $data = $result->fetch_assoc();

        // menutup koneksi database
        $mysqli->close();

        // nilai kembalian dalam bentuk array
        return $data;
    }

    public function updateData($nama, $tgl_lahir, $umur, $ruang, $alamat, $jenis_kelamin)
    {
        // memanggil file database
        include 'koneksi.php';

        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        $nama = $mysqli->real_escape_string($nama);
        $umur = $mysqli->real_escape_string($umur);
        $alamat = $mysqli->real_escape_string($alamat);

        // sql statement untuk update data pasien
        $sql = "UPDATE pasien SET nama       = '$nama',
                                    tgl_lahir       = '$tgl_lahir',
                                    umur       = '$umur',
                                    ruang       = '$ruang',
                                    alamat       = '$alamat',
                              WHERE  jenis_kelamin   = '$jenis_kelamin'";

        $result = $mysqli->query($sql);

        // cek hasil query
        if ($result) {
            /* jika data berhasil diubah alihkan ke halaman index.php dan tampilkan pesan = 3 */
            header('Location: pasien.php?alert=3');
        } else {
            /* jika data gagal diubah alihkan ke halaman index.php dan tampilkan pesan = 1 */
            header('Location: pasien.php?alert=1');
        }

        // menutup koneksi database
        $mysqli->close();
    }

    public function hapusData($nama)
    {
        // memanggil file database.php
        include 'koneksi.php';

        // membuat objek db dengan nama $db
        $db = new Database();

        // membuka koneksi ke database
        $mysqli = $db->connect();

        // sql statement untuk delete data pasien
        $sql = "DELETE FROM pasien WHERE nama   = '$tgl_lahir'";

        $result = $mysqli->query($sql);

        // cek hasil query
        if ($result) {
            /* jika data berhasil disimpan alihkan ke halaman pasien dan tampilkan pesan = 4 */
            header('Location: pasien.php?alert=4');
        } else {
            /* jika data gagal disimpan alihkan ke halaman pasien dan tampilkan pesan = 1 */
            header('Location: pasien.php?alert=1');
        }

        // menutup koneksi database
        $mysqli->close();
    }
}