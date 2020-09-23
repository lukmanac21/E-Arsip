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
                            <h3 class="card-title">Data Disposisi</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url(); ?>/Disposisi/add_data';">Tambah</button>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">Nomer Surat</th>
                                        <th style="text-align:center;">Tanggal Disposisi</th>
                                        <th style="text-align:center;">Diteruskan Kepada</th>
                                        <th style="text-align:center;">Isi</th>
                                        <th style="text-align:center;">Cetak</th>
                                        <th style="text-align:center;">Ubah</th>
                                        <th style="text-align:center;">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($disposisi as $d) { ?>
                                        <tr>
                                            <td style="text-align:center;"><?= $d->no_surat; ?></td>
                                            <td style="text-align:center;"><?= $d->tgl_disposisi; ?></td>
                                            <td style="text-align:center;"><?= $d->diteruskan_kepada; ?></td>
                                            <td style="text-align:center;"><?= $d->isi_disposisi; ?></td>
                                            <td style="text-align:center;">
                                                <a style="color:white;" type="button" href="<?= site_url('Suratmasuk/edit_data/') . $d->id_disposisi; ?>" class="btn btn-info">
                                                    Cetak
                                                </a>
                                            </td>
                                            <td style="text-align:center;">
                                                <a style="color:white;" type="button" href="<?= site_url('Disposisi/edit_data/') . $d->id_disposisi; ?>" class="btn btn-info">
                                                    Ubah
                                                </a>
                                            </td>
                                            <td style="text-align:center;">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $d->id_disposisi ?>">
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
            <?php foreach ($disposisi as $d) { ?>
                <div class="modal fade" id="delete<?= $d->id_disposisi ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="<?= site_url('Disposisi/delete_data'); ?>">
                                <div class="modal-body">
                                    <p>Hapus data dengan nomer surat <?= $d->no_surat ?> ? </p>
                                    <input type="hidden" name="id_disposisi" value="<?= $d->id_disposisi; ?>">
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
        <?php $this->load->view('_partials/footer'); ?>
</body>

</html>