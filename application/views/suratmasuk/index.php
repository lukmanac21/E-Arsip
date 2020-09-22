<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_partials/head'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php $this->load->view('_partials/navbar'); ?>
        <?php $this->load->view('_partials/sidebar'); ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Surat Masuk</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url(); ?>/Suratmasuk/add_data';">Tambah</button>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">Nomer Surat</th>
                                        <th style="text-align:center;">Tanggal Surat</th>
                                        <th style="text-align:center;">Pengirim Surat</th>
                                        <th style="text-align:center;">Bukti Surat</th>
                                        <th style="text-align:center;">Ubah</th>
                                        <th style="text-align:center;">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($surat_masuk as $sm) { ?>
                                        <tr>
                                            <td style="text-align:center;"><?= $sm->no_surat; ?></td>
                                            <td style="text-align:center;"><?= $sm->tgl_surat; ?></td>
                                            <td style="text-align:center;"><?= $sm->pengirim_surat; ?></td>
                                            <td style="text-align:center;">
                                                <img width="100" height="100" src="<?= base_url('assets/img/suratmasuk/') . $sm->bukti_surat ?>" data-toggle="modal" data-target="#suratModal">
                                            </td>
                                            <td style="text-align:center;">
                                                <a style="color:white;" type="button" href="<?= site_url('Suratmasuk/edit_data/') . $sm->id_surat_masuk; ?>" class="btn btn-info">
                                                    Ubah
                                                </a>
                                            </td>
                                            <td style="text-align:center;">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $sm->id_surat_masuk ?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>
            <?php foreach ($surat_masuk as $sm) { ?>
                <div class="modal fade" id="delete<?= $sm->id_surat_masuk ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="<?= site_url('Suratmasuk/delete_data'); ?>">
                                <div class="modal-body">
                                    <p>Hapus data dengan nomer surat <?= $sm->no_surat ?> ? </p>
                                    <input type="hidden" name="id_surat_masuk" value="<?= $sm->id_surat_masuk; ?>">
                                    <input type="hidden" name="gambarLama" value="<?= $sm->bukti_surat; ?>">
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

        <!-- Modal -->
        <div class="modal fade" id="suratModal" tabindex="-1" aria-labelledby="suratModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Bukti Surat</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="<?= base_url('assets/img/suratmasuk/') . $sm->bukti_surat ?>" width="100%" height="850px">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <?php $this->load->view('_partials/footer'); ?>
</body>

</html>