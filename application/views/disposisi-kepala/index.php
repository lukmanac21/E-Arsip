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
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">Nomer Surat</th>
                                        <th style="text-align:center;">Tanggal Disposisi</th>
                                        <th style="text-align:center;">Diteruskan Kepada</th>
                                        <th style="text-align:center;">Isi</th>
                                        <th style="text-align:center;">Status</th>
                                        <th style="text-align:center;">Verifikasi</th>
                                        <th style="text-align:center;">Ubah</th>
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
                                                <?php if ($d->id_paraf_kepala == NULL) : ?>
                                                    <div class="badge badge-danger">Belum Verifikasi</div>
                                                <?php else : ?>
                                                    <div class="badge badge-success">Sudah Verifikasi</div>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <?php if ($d->id_paraf_kepala == NULL) : ?>
                                                    <a href="<?= site_url('DisposisiKepala/verif/') . $d->id_disposisi ?>" class="btn btn-outline-success btn-sm"><i class="far fa-check-circle"></i> Verif</a>
                                                <?php else : ?>
                                                    <a href="<?= site_url('DisposisiKepala/batal_verif/') . $d->id_disposisi ?>" class="btn btn-outline-danger btn-sm"><i class="far fa-times-circle"></i> Batal</a>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <a style="color:white;" type="button" href="<?= site_url('DisposisiKepala/edit_data/') . $d->id_disposisi; ?>" class="btn btn-info">
                                                    Ubah
                                                </a>
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
        <?php $this->load->view('_partials/footer'); ?>
</body>

</html>