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
                            <h3 class="card-title">Ubah Data Surat Masuk</h3>
                        </div>
                        <div class="card-body">
                            <?php foreach ($surat_masuk as $sm) { ?>
                                <form class="form-horizontal" role="form" action="<?= site_url('Suratmasuk/update_data'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_surat_masuk" value="<?= $sm->id_surat_masuk ?>">
                                    <input type="hidden" name="gambarLama" value="<?= $sm->bukti_surat ?>">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="no_surat">Nomer Surat</label>
                                            <input id="no_surat" type="text" class="form-control" name="no_surat" placeholder="Nomer Surat" value="<?= $sm->no_surat ?>" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tgl_surat">Tanggal Surat</label>
                                            <input id="tgl_surat" type="date" class="form-control" name="tgl_surat" value="<?= $sm->tgl_surat ?>" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pengirim_surat">Pengirim Surat</label>
                                            <input id="pengirim_surat" type="text" class="form-control" name="pengirim_surat" placeholder="Pengirim Surat" value="<?= $sm->pengirim_surat ?>" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bukti_surat">Bukti Surat</label>
                                            <input id="bukti_surat" type="file" class="form-control-file" name="file">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-default float-right">Reset</button>
                                    </div>
                                    <!-- /.card-footer -->
                                </form>
                            <?php } ?>
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