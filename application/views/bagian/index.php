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
            <h3 class="card-title">Data Bagian</h3>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url();?>/Bagian/add_data';">Tambah</button>
              <br>
                <br>
              <thead>
              <tr>
                <th>Nama Bagian</th>
                <th style="text-align:center;">Ubah</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($bagian as $row_bagian){?>
                    <tr>
                        <td><?= $row_bagian->nama_bagian;?></td>
                        <td style="text-align:center;"><a style="color:white;" type="button" href="<?= site_url('Bagian/edit_data/').$row_bagian->id_bagian ;?>" class="btn btn-info" > Ubah</a</td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
    </section>
    </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <?php $this->load->view('_partials/footer');?>
</body>
</html>
