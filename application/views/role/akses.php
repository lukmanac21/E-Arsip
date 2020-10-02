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
              <thead>
              <tr>
                <th>Nama Menu</th>
                <th>Hak Akses</th>
                <th>Fungsi</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($data as $row_data){?>
                    <tr>
                        <td><?= $row_data->nama_sub_menu;?></td>
                        <td>
                            <div id="form-check-input" class="form-check">
                              <input class="form-check-input" type="checkbox"<?= get_access($role['id_role'],$row_data->id_sub_menu);?> data-role="<?= $role['id_role'];?>" data-menu="<?= $row_data->id_sub_menu;?>">
                            </div>
                        </td>
                        <td>
                              <?php foreach($func as $row_func){?>     
                                <div class="form-check form-check-inline">
                                <input class="" type="checkbox" name="row_func[]" value="<?=$row_func->id_function?>">&nbsp;
                                  <?=$row_func->nama_function?>
                                  </div>
                              <?php } ?>
                        </td>
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
