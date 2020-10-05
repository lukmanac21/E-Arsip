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
            <!-- Content Header (Page header) -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Pesan Baru</h3>
                        </div>
                        <!-- /.card-header -->
                        <?php $selected = 'selected'; ?>
                        <form class="form-horizontal" role="form" action="<?= site_url('Suratkeluar/update_data'); ?>" method="post">
                            <input type="hidden" name="id_surat_keluar" value="<?= $surat_keluar->id_surat_keluar ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="no_surat">Jenis Surat</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_jenis" id="id_jenis" required>
                                            <option value="">--Pilih Jenis--</option>
                                            <?php foreach ($jenis as $row_jenis) { ?>
                                            <option value="1" <?php if ($surat_keluar->id_jenis == $row_jenis->id_jenis) echo 'selected = "selected"' ?>><?= $row_jenis->nama_jenis?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_surat">OPD Penerima</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_opd" id="id_opd">
                                            <option value="">--Pilih OPD--</option>
                                            <?php foreach ($opd as $row_opd) { ?>
                                                <option value="<?= $row_opd->id_opd; ?>" <?php echo ($surat_keluar->id_opd == $row_opd->id_opd) ? $selected : ''; ?>><?= $row_opd->nama_opd; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="no_surat">Bagian Penerima</label>
                                        <select class="form-control select2" style="width: 100%;" name="id_bagian" id="id_bagian">
                                            <option value="">--Pilih Bagian--</option>
                                            <?php foreach ($bagian as $row_bagian) { ?>
                                                <option value="<?= $row_bagian->id_bagian; ?>" <?php echo ($surat_keluar->id_bagian == $row_bagian->id_bagian) ? $selected : ''; ?>><?= $row_bagian->nama_bagian; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_surat">Tanggal</label>
                                        <input type="date" class="form-control" name="tgl_surat" placeholder="Tanggal" value="<?= $surat_keluar->tgl_surat ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="no_surat">Nomer Surat</label>
                                        <input type="text" class="form-control" name="no_surat" placeholder="No Surat" value="<?= $surat_keluar->no_surat ?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_surat">Sifat</label>
                                        <input type="text" class="form-control" name="sifat" value="<?= $surat_keluar->sifat ?>" placeholder="Sifat">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="perihal">Perihal</label>
                                        <input type="text" class="form-control" name="perihal" value="<?= $surat_keluar->perihal ?>" placeholder="Perihal">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="no_surat">Lampiran <small><b>(berkas)</b></small></label>
                                        <input type="number" min="1" class="form-control" name="lampiran" value="<?= $surat_keluar->lampiran ?>" placeholder="Lampiran">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea id="compose-textarea" name="isi_surat" class="form-control" style="height: 300px"><?= $surat_keluar->isi_surat ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        </section>
    </div>
    <aside class="control-sidebar control-sidebar-dark"></aside>
    <?php $this->load->view('_partials/footer'); ?>
</body>

</html>