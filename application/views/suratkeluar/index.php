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
                            <h3 class="card-title">Data Surat Keluar</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url(); ?>/Suratkeluar/add_data';">Tambah</button>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">Jenis</th>
                                        <th style="text-align:center;">Nomer Surat</th>
                                        <th style="text-align:center;">OPD</th>
                                        <th style="text-align:center;">Perihal</th>
                                        <th style="text-align:center;">Tanggal dibuat</th>
                                        <th style="text-align:center;">Cetak</th>
                                        <th style="text-align:center;">Ubah</th>
                                        <th style="text-align:center;">Paraf</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($surat_keluar as $sk) { ?>
                                        <tr>
                                            <td style="text-align:center;"><?= $sk->nama_jenis; ?></td>
                                            <td style="text-align:center;"><?= $sk->no_surat; ?></td>
                                            <td style="text-align:center;"><?= $sk->nama_opd; ?></td>
                                            <td style="text-align:center;"><?= $sk->perihal; ?></td>
                                            <td style="text-align:center;"><?= $sk->tgl_surat; ?></td>
                                            <td style="text-align:center;">
                                                <?php if ($d->id_paraf_kepala == null && $d->id_paraf_sek == null) : ?>
                                                    <button style="color:white;" type="button" class="btn btn-secondary">
                                                        Cetak
                                                    </button>
                                                <?php else : ?>
                                                    <a style="color:white;" type="button" href="<?= site_url('Suratkeluar/cetak_data/') . $sk->id_surat_keluar; ?>" class="btn btn-primary">
                                                        Cetak
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align:center;">
                                                <a style="color:white;" type="button" href="<?= site_url('Suratkeluar/edit_data/') . $sk->id_surat_keluar; ?>" class="btn btn-info">
                                                    Ubah
                                                </a>
                                            </td>
                                            <td style="text-align:center;">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $sk->id_surat_keluar ?>">
                                                    Paraf
                                                </button>
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