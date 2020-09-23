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
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="no_surat">Nomer Surat</label>
                                                <input id="no_surat" type="text" class="form-control" value="<?= $sm->no_surat ?>" name="no_surat" placeholder="Nomer Surat" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tgl_surat">Tanggal Surat</label>
                                                <input id="tgl_surat" type="date" class="form-control" value="<?= $sm->tgl_surat ?>" name="tgl_surat" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pengirim_surat">Pengirim Surat</label>
                                                <input id="pengirim_surat" type="text" class="form-control" value="<?= $sm->pengirim_surat ?>" name="pengirim_surat" placeholder="Pengirim Surat" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="no_agenda">Nomer Agenda</label>
                                                <input id="no_agenda" type="text" class="form-control" value="<?= $sm->no_agenda_surat ?>" name="no_agenda_surat" placeholder="Nomer Agenda" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="tgl_terima_surat">Tanggal Terima</label>
                                                <input id="tgl_terima_surat" type="date" class="form-control" value="<?= $sm->tgl_terima_surat ?>" name="tgl_terima_surat" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="perihal_surat">Perihal Surat</label>
                                            <textarea id="perihal_surat" type="text" class="form-control" name="perihal_surat" placeholder="Perihal Surat" required><?= $sm->perihal_surat ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bukti_surat">Bukti Surat</label>
                                            <input id="bukti_surat" type="file" class="form-control-file" name="file">
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