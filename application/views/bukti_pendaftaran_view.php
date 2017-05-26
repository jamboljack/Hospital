<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/logo-icon.png">
<title>Bukti Pendaftaran Online</title>
<style type="text/css">
table {
    border: 1px solid #ccccb3;      
    width: 100%;
}
th {
    height: 10px;
    /*background-color: #eff3f8;*/
    color: black;
}
th, td {
    padding: 2px;
    /*border-bottom: 1px solid #ddd;  */
}
td .daftar {
	text-align:right;
}
body{
    font-family: "Arial"; 
    font-size: 12px
}  
h1{
    font-size:15px
}
.page {
    width: 21cm;
    min-height: 29.7cm;
    padding: 0cm;
    margin: 0.1cm auto;
    border: 0.3px #D3D3D3 none;
    border-radius: 2px;
}
</style>
</head>

<body>
<div class="page">
    <div align="center"><u>Bukti Pendaftaran Online RS St. Elisabeth Semarang</u></div>
    <table align="center">
        <tr>
            <th width="50%">Bukti Pendaftaran Online</th>
            <th width="50%">Data Pendaftar</th>
        </tr>
        <tr>
            <td valign="top" align="center">
                <p>Tunjukkan Bukti Pendaftaran Berikut ke Petugas Loket <br><b>Pendaftaran RS St. Elisabeth Semarang.</b></p>
                <h2><b>No. Antrian<br><?php echo $detail->antrian_kode; ?></b></h2>
                <p>Akan dilayani pada Tanggal : <b><?php echo tgl_indo($detail->antrian_tanggal); ?></b>, Perkiraan pelayanan pada Jam : <b><?php echo substr($detail->antrian_jam_layani,0,5); ?> WIB</b>. Dimohon datang sebelumnya, antrian tidak dapat digunakan apabila Anda datang lebih dari 15 menit dari perkiraan waktu pelayanan. Terima Kasih.</p>
            </td>
            <td>
                <table width="100%">
                    <tr>
                        <?php
                        // Kondisi Jika RM kosong maka -
                        $noRM     = !empty($detail->pasien_no_rm)?$detail->pasien_no_rm:'-';
                        ?>
                        <td width="35%" class="daftar">No. Rekam Medis</td>
                        <td width="5%">:</td>
                        <td><?php echo $noRM; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Nama</td>
                        <td>:</td>
                        <td><?php echo $detail->pasien_nama; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">TTL</td>
                        <td>:</td>
                        <td><?php echo $detail->pasien_tmpt_lhr.', '.tgl_indo($detail->pasien_tgl_lhr); ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $detail->pasien_jk; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">No. Identitas</td>
                        <td>:</td>
                        <td><?php echo $detail->pasien_no_identitas; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Nama Ibu</td>
                        <td>:</td>
                        <td><?php echo $detail->pasien_nama_ibu; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Alamat</td>
                        <td>:</td>
                        <td><?php echo $detail->pasien_alamat; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Provinsi</td>
                        <td>:</td>
                        <td><?php echo $detail->provinsi_nama; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Kab. / Kota</td>
                        <td>:</td>
                        <td><?php echo ucwords(strtolower($detail->kabupaten_nama)); ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Kecamatan</td>
                        <td>:</td>
                        <td><?php echo ucwords(strtolower($detail->kecamatan_nama)); ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <th colspan="3">Data Pemeriksaan</th>
                    </tr>
                    <tr>
                        <td class="daftar">Dokter Tujuan</td>
                        <td>:</td>
                        <td><?php echo $detail->dokter_name; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Spesialis</td>
                        <td>:</td>
                        <td><?php echo $detail->tipe_name; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Tgl. Pemeriksaan</td>
                        <td>:</td>
                        <td><b><?php echo tgl_indo($detail->antrian_tanggal); ?></b></td>
                    </tr>
                    <tr>
                        <td class="daftar">Penjamin</td>
                        <td>:</td>
                        <td><?php echo $detail->pelanggan_name; ?></td>
                    </tr>
                    <tr>
                        <td class="daftar">Ruangan</td>
                        <td>:</td>
                        <td><?php echo $detail->ruangan_name; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" width="100%">Pendaftaran Pemeriksaan Rawat Jalan Online RS. St. Elisabeth Semarang. <?php echo date('d-m-Y H:i:s'); ?></th>
        </tr>
    </table>
</div>
</body>
</html>