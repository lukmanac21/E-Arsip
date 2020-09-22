<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('_partials/head');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php $this->load->view('_partials/navbar');?>
  <?php $this->load->view('_partials/sidebar');?>
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data role</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url();?>/Role/add_data';">Tambah</button>
              <br>
                <br>
              <thead>
              <tr>
                <th>Nama role</th>
                <th style="text-align:center;">Hak Akses</th>
                <th style="text-align:center;">Ubah</th>
                <th style="text-align:center;">Hapus</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($role as $row_role){?>
                    <tr>
                        <td><?= $row_role->nama_role;?></td>
                        <td style="text-align:center;"><a style="color:white;" type="button" href="<?= site_url('Role/access_data/').$row_role->id_role ;?>" class="btn btn-warning" > Hak Akses</a</td>
                        <td style="text-align:center;"><a style="color:white;" type="button" href="<?= site_url('Role/edit_data/').$row_role->id_role ;?>" class="btn btn-info" > Ubah</a</td>
                        <td style="text-align:center;"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $row_role->id_role?>"> Hapus</button</td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
    </section>
    <?php foreach($role as $row_role){?>
    <div class="modal fade" id="delete<?= $row_role->id_role?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" action="<?= site_url('Role/delete_data');?>">
          <div class="modal-body">
            <p>Hapus data role <?= $row_role->nama_role?> ? </p>
            <input type="hidden" name="id_role" value="<?= $row_role->id_role ;?>">
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
    </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <?php $this->load->view('_partials/footer');?>
</body>
</html>
