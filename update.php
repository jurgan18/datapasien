<?php include 'template/header.php'; ?>
<?php include 'template/topnavbar.php'; ?>
<?php include 'template/sidebar.php'; ?>

<div class="content-wrapper">
<div class="content-header">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <i class="fas fa-edit"></i>
                Ubah data pasien
            </h4>
        </div> <!-- /.page-header -->

        <?php
        // mendapatkan id dari id url
        $id = $_GET['id'];

if (isset($id)) {
    // memanggil file mahasiswa.php
    include 'class/pasien.php';

    // membuat objek mahasiswa
    $dataPasien = new pasien();

    // mengambil seluruh data mahasiswa dengan method ambilData
    $result = $dataPasien->ambilData($id);

    $nama = $result['nama'];
    $tanggal = $result['tgl_lahir'];
    $tgl = explode('-', $tanggal);
    $tanggal_lahir = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
    $umur = $result['umur'];
    $ruang = $result['ruang'];
    $alamat = $result['alamat'];
    $jenis_kelamin = $result['jenis_kelamin'];
    
?>

        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="proses_ubah.php">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Pasien</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Lahir</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_lahir" autocomplete="off" value="<?php echo $tanggal_lahir; ?>" required>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Umur</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="umur" autocomplete="off" value="<?php echo $umur; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ruang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="ruang" autocomplete="off" value="<?php echo $ruang; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-3">
                            <textarea class="form-control" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-3">
                            <?php if ($jenis_kelamin == 'Laki-laki') { ?>
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                                </label>
                            <?php } else { ?>
                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" checked> Perempuan
                                </label>
                            <?php } ?>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-info btn-submit" name="ubah" value="Ubah">
                            <a href="pasien.php" class="btn btn-default btn-reset">Batal</a>
                        </div>
                    </div>
                </form>
            </div> <!-- /.panel-body -->
        </div> <!-- /.panel -->
    </div> <!-- /.col -->
</div> <!-- /.row -->
</div>
</div>
</div>
<?php include 'template/footer.php'; ?>