<!DOCTYPE html>
<html>
<head>
	<title><?= $judul ?></title>
</head>

<link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
<body>
<div class="container">
<div class="row">
<center>
<h4><tt><img src="<?= base_url('/assets/home/proc.png') ?>" class="img-responsive" style="width: 50px;height: 50px">Laporan Penilaian Hasil Belajar Siswa SMK NEGRI 1 BATAHAN <br />
 Nagari Kampung Melayu Silaping Ranah Batahan</tt>

</h4>
</center>
<hr />

<table style="height: 73px;" width="384">
<tbody>
<tr>
<td style="width: 184px;">Nama Peserta Didik</td>
<td style="width: 184px;">: <b><?= $nama ?></b></td>
</tr>
<tr>
<td style="width: 184px;">Nomor Induk</td>
<td style="width: 184px;">:<b><?= $nisn ?></b></td>
</tr>
<tr>
<td style="width: 184px;">Nama Sekolah</td>
<td style="width: 184px;">: Sma Negri 1 Batahan</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>



<table class="table table-striped">
<tbody>
<tr>
<td><strong>No</strong></td>
<td><strong>Komponen/Mata Pelajaran</strong></td>
<td><strong>Krikteria Ketuntasan Minimal</strong></td>
<td><strong>Niliai</strong></td>
<td><strong>Hasil Studi</strong></td>
</tr>
<?php 
$sum='';
$rata1 = $data->num_rows(); 
$hasil_rata='';
$no=1;foreach($data->result_array() as $hasil): ?>
<tr>
<td><?= $no ?></td>
<td><?= $hasil['nama_mapel'] ?></td>
<td>60</td>
<td><?= $hasil['nilai'] ?></td>
<td><?= $hasil['ket_nilai'] ?></td>
</tr>
<?php
 $sum += $hasil['nilai'];
 $no++; endforeach; ?>
</tbody>
</table>
 



<table class="table table-striped">
<tbody>
<tr>
<td style="width: 126px;"><strong>JUMLAH&nbsp;&nbsp;</strong></td>
<td style="width: 126px;"><?= $sum ?></td>
<td style="width: 126px;">&nbsp;</td>
<td style="width: 127px;">&nbsp;</td>
</tr>
<tr>
<td style="width: 126px;"><strong>RATA-RATA</strong></td>
<td style="width: 126px;"><?php 
$hasil_rata=$sum/$rata1;
echo $hasil_rata; ?></td>
<td style="width: 126px;">&nbsp;</td>
<td style="width: 127px;">&nbsp;</td>
</tr>
<tr>
 
</tr>
</tbody>
</table>
<p>&nbsp;</p>
<p>Wali Kelas .......</p>


Dicetak Pada Tanggal <?= tgl_indonesia(date('Y-m-d')) ?> Jam <?= date('h:i:s') ?>
</div>
</div>
</body>
</html>