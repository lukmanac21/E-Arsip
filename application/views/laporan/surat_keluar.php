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

        .isi-header {
            text-align: right;
            margin-right: 20px;
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
        <table class="table-header" cellspacing="0" cellpadding="0"  style="line-height:0.1px;" height="151px">
            <tr>
                <td width="20%" rowspan="6"><img height="120" width="auto" src="<?php echo base_url();?>assets/img/header/logoheader.jpg"/></td>
                <td style="text-align:center; font-size: 25px;">PEMERINTAH KABUPATEN BONDOWOSO</td>
            </tr>
            <tr>
            <td style="text-align:center; font-size: 22px; font-weight:bold;">KECAMATAN BONDOWOSO</td>
            </tr>
            <tr>
            <td style="text-align:center; font-size: 12px;  margin-bottom:0px; padding-bottom:0px;">Jl. A. YANI No. 41 Telp (0332) 421181</td>
            </tr>
            <tr>
            <td style="text-align:center; font-size: 15px;  margin-bottom:0px; padding-bottom:0px;">B O N D O W O S O</td>
            </tr>
        </table>
        <hr style="height:2px;border-width:0;color:black;background-color:black padding:0px; margin:0px;">   
    </div>
    <div class="content">
        <table class="table-header" cellspacing="0" cellpadding="0" style="margin-top:10px;" >
            <tr>
            <td style="text-align:left; font-size: 13px;  margin-bottom:2px; padding-bottom:2px; padding-left: 480px">Bondowoso, <?= date("d-M-Y", strtotime($surat_keluar['tgl_surat'])) ?></td>
            </tr>
            <br>
            <br>
            <tr>
            <td style="text-align:left; font-size: 13px;  margin-bottom:0px; padding-bottom:0px; padding-left: 480px">Kepada</td>
            </tr>
        </table>
        <table class="table-header" cellspacing="0" cellpadding="0">
            <tr><td style="font-size: 13px; margin-bottom:5px; padding-bottom:5px;">Nomor </td><td style="font-size: 13px; margin-bottom:5px; padding-bottom:5px;"> &nbsp; :</td><td style="font-size: 13px; margin-bottom:5px; padding-bottom:5px;"> &nbsp; <?= $surat_keluar['no_surat']?></td></tr>
            <br>
            <tr><td style="font-size: 13px; margin-bottom:5px; padding-bottom:5px;">Sifat</td><td style="font-size: 13px; margin-bottom:5px; padding-bottom:5px;"> &nbsp; :</td><td style="font-size: 13px; margin-bottom:5px; padding-bottom:5px;"> &nbsp; <?= $surat_keluar['sifat']?></td></tr>
            <br>
            <tr><td style="font-size: 13px; margin-bottom:5px; padding-bottom:5px;">Perihal</td><td style="font-size: 13px; margin-bottom:5px; padding-bottom:5px;"> &nbsp; :</td><td style="font-size: 13px; margin-bottom:5px; padding-bottom:5px;"> &nbsp; <?= $surat_keluar['perihal']?></td></tr>
        </table>
    </div>
    <div class="footer">
        <!-- <table border="0" class="ttd">
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
        </table> -->
    </div>
</body>

</html>