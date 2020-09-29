<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .header {
            text-align: center;
        }

        .content table {
            border-collapse: collapse;
        }

        .content .dari {
            border-left: none;
            border-right: none;
            padding-left: 10px;
        }

        .content .titik2 {
            border-left: none;
            border-right: none;
        }

        .content .isi {
            border-left: none;
        }

        .content .isi2 {
            border-left: none;
            border-right: none;
        }

        .content .diterima {
            border-right: none;
            padding-left: 10px;
        }

        .none-border-top {
            border-top: none;
        }

        .none-border-bottom {
            border-bottom: none;
        }

        .isi-disposisi {
            text-align: center;
            height: 200px;
        }

        .isi-disposisi h4 {
            text-align: center;
        }

        .footer table.ttd {
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1><u>PEMERINTAH KABUPATEN BONDOWOSO</u></h1>
        <h1>LEMBAR DISPOSISI</h1>
    </div>

    <!-- <div class="content">
        <table border="1">
            <tr>
                <td width="140" height="40" class="dari">Surat dari</td>
                <td width="20" class="titik2">:</td>
                <td width="175" class="isi"><?= $disposisi->pengirim_surat ?></td>
                <td width="140" class="diterima">Diterima tanggal</td>
                <td width="20" class="titik2">:</td>
                <td width="175" class="isi2"><?= date("d-m-Y", strtotime($disposisi->tgl_terima_surat)) ?></td>
            </tr>
            <tr>
                <td width="140" height="40" class="dari none-border-top">Tanggal surat</td>
                <td width="20" class="titik2 none-border-top">:</td>
                <td width="175" class="isi none-border-top"><?= date("d-m-Y", strtotime($disposisi->tgl_surat)) ?></td>
                <td width="140" class="diterima none-border-top">Nomor Agenda</td>
                <td width="20" class="titik2 none-border-top">:</td>
                <td width="175" class="isi2 none-border-top"><?= $disposisi->no_agenda_surat ?></td>
            </tr>
            <tr>
                <td width="140" height="40" class="dari none-border-top">Nomor surat</td>
                <td width="20" class="titik2 none-border-top">:</td>
                <td width="175" class="isi none-border-top"><?= $disposisi->no_surat ?></td>
                <td width="140" class="diterima none-border-top none-border-bottom">Diteruskan kepada</td>
                <td width="20" class="titik2 none-border-top none-border-bottom">:</td>
                <td width="175" class="isi2 none-border-top none-border-bottom"></td>
            </tr>
            <tr>
                <td width="140" height="110" class="dari none-border-top" style="padding-top: -55px;">PERIHAL</td>
                <td width="20" class="titik2 none-border-top" style="padding-top: -55px;">:</td>
                <td width="175" class="isi none-border-top" style="padding-top: -35px;"><?= $disposisi->perihal_surat ?></td>
                <td width="140" class="diterima none-border-top" colspan="3" style="padding-top: -35px;">
                    <?= $disposisi->diteruskan_kepada ?>
                </td>
            </tr>
        </table>
        <div class="isi-disposisi">
            <h4>ISI DISPOSISI</h4>
            <?= $disposisi->isi_disposisi ?>
        </div>
    </div>
    <div class="footer">
        <table border="0" class="ttd">
            <tr>
                <td width="200" height="40" style="text-align: center;">Sekretaris Kecamatan</td>
                <td width="300"></td>
                <td width="200" style="text-align: center;">Kepala Kecamatan</td>
            </tr>
            <tr>
                <td height="100"><img height="100" width="100" src="<?= base_url('assets/img/paraf/') . $disposisi->paraf_sekretaris ?>"></td>
                <td></td>
                <td><img height="100" width="100" src="<?= base_url('assets/img/paraf/') . $disposisi->paraf_kepala ?>"></td>
            </tr>
            <tr>
                <td height="40" style="text-align: center;"><?= $disposisi->nama_sekretaris ?></td>
                <td></td>
                <td style="text-align: center;"><?= $disposisi->nama_kepala ?></td>
            </tr>
        </table>
    </div> -->
    <div class="content">
        <table border="1">
            <tr>
                <td width="140" height="40" class="dari">Surat dari</td>
                <td width="20" class="titik2">:</td>
                <td width="175" class="isi"><?= $disposisi['pengirim_surat'] ?></td>
                <td width="140" class="diterima">Diterima tanggal</td>
                <td width="20" class="titik2">:</td>
                <td width="175" class="isi2"><?= date("d-m-Y", strtotime($disposisi['tgl_terima_surat'])) ?></td>
            </tr>
            <tr>
                <td width="140" height="40" class="dari none-border-top">Tanggal surat</td>
                <td width="20" class="titik2 none-border-top">:</td>
                <td width="175" class="isi none-border-top"><?= date("d-m-Y", strtotime($disposisi['tgl_surat'])) ?></td>
                <td width="140" class="diterima none-border-top">Nomor Agenda</td>
                <td width="20" class="titik2 none-border-top">:</td>
                <td width="175" class="isi2 none-border-top"><?= $disposisi['no_agenda_surat'] ?></td>
            </tr>
            <tr>
                <td width="140" height="40" class="dari none-border-top">Nomor surat</td>
                <td width="20" class="titik2 none-border-top">:</td>
                <td width="175" class="isi none-border-top"><?= $disposisi['no_surat'] ?></td>
                <td width="140" class="diterima none-border-top none-border-bottom">Diteruskan kepada</td>
                <td width="20" class="titik2 none-border-top none-border-bottom">:</td>
                <td width="175" class="isi2 none-border-top none-border-bottom"></td>
            </tr>
            <tr>
                <td width="140" height="110" class="dari none-border-top" style="padding-top: -55px;">PERIHAL</td>
                <td width="20" class="titik2 none-border-top" style="padding-top: -55px;">:</td>
                <td width="175" class="isi none-border-top" style="padding-top: -35px;"><?= $disposisi['perihal_surat'] ?></td>
                <td width="140" class="diterima none-border-top" colspan="3" style="padding-top: -35px;">
                    <?= $disposisi['diteruskan_kepada'] ?>
                </td>
            </tr>
        </table>
        <div class="isi-disposisi">
            <h4>ISI DISPOSISI</h4>
            <?= $disposisi['isi_disposisi'] ?>
        </div>
    </div>
    <div class="footer">
        <table border="0" class="ttd">
            <tr>
                <td width="200" height="40" style="text-align: center;">Sekretaris Kecamatan</td>
                <td width="300"></td>
                <td width="200" style="text-align: center;">Kepala Kecamatan</td>
            </tr>
            <tr>
                <td height="100"><img height="100" width="100" src="<?= base_url('assets/img/paraf/') . $disposisi['paraf_sekretaris'] ?>"></td>
                <td></td>
                <td><img height="100" width="100" src="<?= base_url('assets/img/paraf/') . $disposisi['paraf_kepala'] ?>"></td>
            </tr>
            <tr>
                <td height="40" style="text-align: center;"><?= $disposisi['nama_sekretaris'] ?></td>
                <td></td>
                <td style="text-align: center;"><?= $disposisi['nama_kepala'] ?></td>
            </tr>
        </table>
    </div>
</body>

</html>