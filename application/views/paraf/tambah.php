<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('_partials/head'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <?php $this->load->view('_partials/navbar'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('_partials/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Surat Masuk</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="<?= site_url('Paraf/save_data'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" class="form-control" name="nama_paraf" placeholder="Nama Paraf" required>
                  </div>
                  <div class="form-group row">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control">
                      <option>-- Pilih Jabatan --</option>
                      <?php foreach ($jabatan as $j) : ?>
                        <option value="<?= $j->id_role ?>"><?= $j->jabatan ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="bukti_surat">Paraf</label>
                    <input id="bukti_surat" type="file" class="form-control-file" name="file" required>
                    <small id="emailHelp" class="form-text text-muted">Format: jpg, jpeg dan png</small>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-default float-right">Reset</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
        <!--/. container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php $this->load->view('_partials/footer'); ?>
</body>

</html>