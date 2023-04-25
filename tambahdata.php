<?php include 'template/header.php';?>
<?php include 'template/topnavbar.php';?>
<?php include 'template/sidebar.php';?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h4> <i class="fas fa-plus"></i> Input Data PASIEN </h4>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="proses-simpan.php">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Pasien</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="nama" maxlenght="12" autocomplete="off" value="Masukkan Nama Anda" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_lahir" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Umur</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="umur" maxlenght="12" autocomplete="off" value="umur" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Ruang</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="ruang" maxlenght="12" autocomplete="off" value="ruang" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-3">
                                        <textarea class="form-control" name="alamat" row="3" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kelamin

                                </label>
                                    <div class="col-sm-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan
                                        </label>
                                    </div>   
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-success btn-submit" name="simpan" value="simpan">
                                        <a href="pasien.php" class="btn btn-default btn-reset">Batal</a>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php';?>