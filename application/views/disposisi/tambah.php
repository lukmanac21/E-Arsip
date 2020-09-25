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
                            <h3 class="card-title">Tambah Data Disposisi</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" role="form" action="<?= site_url('Disposisi/save_data'); ?>" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="id_surat">Nomer Surat</label>
                                            <select name="id_surat" id="id_surat" class="form-control">
                                                <option>-- Pilih Nomer Surat --</option>
                                                <?php foreach ($surat as $s) : ?>
                                                    <option value="<?= $s->id_surat_masuk ?>"><?= $s->no_surat ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tgl_disposisi">Tanggal Disposisi</label>
                                            <input id="tgl_disposisi" type="date" class="form-control" name="tgl_disposisi" value="<?= date('Y-m-d') ?>" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="isi_disposisi">Isi Disposisi</label>
                                            <textarea id="isi_disposisi" class="form-control" name="isi_disposisi" placeholder="Nomer Agenda" required></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="diteruskan_kepada">Diteruskan Kepada</label>
                                            <textarea name="diteruskan_kepada" id="compose-textarea" class="form-control" height="500"></textarea>
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