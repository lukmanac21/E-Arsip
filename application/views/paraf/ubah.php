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
                            <form class="form-horizontal" role="form" action="<?= site_url('Paraf/update_data'); ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_paraf" value="<?= $paraf->id_paraf ?>">
                                <input type="hidden" name="gambarLama" value="<?= $paraf->img_paraf ?>">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama_paraf">Nama Paraf</label>
                                        <input id="nama_paraf" type="text" class="form-control" name="nama_paraf" placeholder="Nomer Surat" value="<?= $paraf->nama_paraf ?>" required>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bukti_surat">Paraf</label>
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