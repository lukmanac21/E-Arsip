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
              <h3 class="card-title">Ubah Data User</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" role="form" action="<?= site_url('user/update_data'); ?>" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="id_role">Nama Role</label>
                    <select class="form-control select2" name="id_role">
                      <?php foreach ($role as $row_role) { ?>
                        <?php if ($user->id_role == $row_role->id_role) : ?>
                          <option value="<?= $row_role->id_role; ?>" selected><?= $row_role->nama_role; ?></option>
                        <?php else : ?>
                          <option value="<?= $row_role->id_role; ?>"><?= $row_role->nama_role; ?></option>
                        <?php endif; ?>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group row">
                    <label for="nama_user">Nama User</label>
                    <input id="nama_user" type="text" class="form-control" name="nama_user" placeholder="Nama user" value="<?= $user->nama_user ?>" required>
                  </div>
                  <div class="form-group row">
                    <label for="password_user">Password User</label>
                    <input id="password_user" type="password" class="form-control" name="password_user" placeholder="Password user" value="<?= $user->password_user ?>" required>
                  </div>
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