<?php include 'template/header.php'; ?>
<?php include 'template/topnavbar.php'; ?>
<?php include 'template/sidebar.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pasien</h1>
          </div><!-- /.col -->

          <?php
      if (empty($_GET['alert'])) {
          echo '';
      } elseif ($_GET['alert'] == 1) { ?>
        <script>
          Swal.fire(
            'Gagal!',
            'Terjadi kesalahan',
            'error'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 2) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data pasien berhasil disimpan',
            'success'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 3) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data pasien berhasil diubah',
            'success'
          );
        </script>
      <?php } elseif ($_GET['alert'] == 4) { ?>
        <script>
          Swal.fire(
            'Sukses!',
            'Data pasien berhasil dihapus',
            'success'
          );
        </script>
      <?php } ?>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Pasien</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="class">
        <a href="tambahdata.php" class='btn btn-info'><i class="fas fa-plus"></i> Tambah Data</a>
        </div>

        <table class="table table-striped table-hover mt-3" id="dataTables-example">
          <!--Judul Tabel-->
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>Ruang</th>
              <th>Alamat</th>
              <th>Jenis Kelamin</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <!--Isi Data Tabel-->
            <tbody>
<?php
// memanggil file pasien.php
include 'class/pasien.php';
// membuat objek pasien
$dataPasien = new Pasien();
// mengambil seluruh data pasien
$result = $dataPasien->tampilData();
$no = 1;
foreach ($result as $data) {
    ?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['tgl_lahir']; ?></>
        <td><?php echo $data['umur']; ?></td>
        <td><?php echo $data['ruang']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['jenis_kelamin']; ?></td>
        <td> 
            <a href="update.php?id=<?php echo $data['id']; ?>" class='btn btn-info'><i class="fas fa-edit"></i></a>

            <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger" onclick="return hapusDataPasien()"><i class="fas fa-trash"></i></a>
        </td>
    </tr>
    <?php ++$no; ?>
<?php } ?>

            </tbody>
          
          </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

<script>
    function hapusDataPasien() {
      Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Anda ingin menghapus data pasien <?php echo $data['nama']; ?> ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus data!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = "hapus.php?id=<?php echo $data['nama']; ?>"
        }
      })
    }
  </script>

<?php include 'template/footer.php'; ?>