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
                            <h3 class="card-title">Data Paraf</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url(); ?>/paraf/add_data';">Tambah</button>
                                <br>
                                <br>
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">Nama</th>
                                        <th style="text-align:center;">Jabatan</th>
                                        <th style="text-align:center;">Paraf</th>
                                        <th style="text-align:center;">Ubah</th>
                                        <th style="text-align:center;">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($paraf as $row_paraf) { ?>
                                        <tr>
                                            <td style="text-align:center;"><?= $row_paraf->nama_paraf; ?></td>
                                            <td style="text-align:center;"><?= $row_paraf->jabatan; ?></td>
                                            <td style="text-align:center;">
                                                <img width="100" height="100" src="<?= base_url('assets/img/paraf/') . $row_paraf->img_paraf ?>" data-toggle="modal" data-target="#suratModal">
                                            </td>
                                            <td style="text-align:center;">
                                                <a style="color:white;" type="button" href="<?= site_url('paraf/edit_data/') . $row_paraf->id_paraf; ?>" class="btn btn-info">
                                                    Ubah
                                                </a>
                                            </td>
                                            <td style="text-align:center;">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $row_paraf->id_paraf ?>">
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
            <?php foreach ($paraf as $row_paraf) { ?>
                <div class="modal fade" id="delete<?= $row_paraf->id_paraf ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="<?= site_url('paraf/delete_data'); ?>">
                                <div class="modal-body">
                                    <p>Hapus data paraf<?= $row_paraf->nama_paraf ?> ? </p>
                                    <input type="hidden" name="id_paraf" value="<?= $row_paraf->id_paraf; ?>">
                                    <input type="hidden" name="gambarLama" value="<?= $row_paraf->img_paraf; ?>">
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
                        <img src="<?= base_url('assets/img/paraf/') . $sm->img_paraf ?>" width="100%" height="850px">
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