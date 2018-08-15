<?php $hasil=$siswa->num_rows();

if($hasil > 0){

		if($semester == "1"):
		$semester_="Semester Ganjil Satu";
		elseif ($semester == "2"): 
		$semester_="Semester Genap Dua";
		endif;


?>
 
<div class="callout callout-info"><p style="color: #fff">Mata Pelajaran Siswa  >> <b><?= $mata_pelajaran ?></b> >> <?= $semester_ ?></p>
<ol>
Data Siswa Yang Telah Di Nilai Pada Mata Pelajaran Ini <br />
 <?php foreach($sudah->result_array() as $sud_): ?>
	<li><b><?= $sud_['nama_s'] ?></b></li>
 <?php endforeach; ?>
 Jika Data Siswa Diatas Ditampilkan Silahkan Pilih siswa yang lain
</ol>



</div>


<form action="" method="POST"> 
<table class="table table-striped">
<input type="hidden" name="id_mata_pelajaran" value="<?= $id_mata_pelajaran ?>" >
<input type="hidden" name="id_guru"     value="<?= $id_guru ?>" >
<input type="hidden" name="semester"     value="<?= $semester ?>">
<input type="hidden" name="id_kelas"     value="<?= $id_kelas ?>" >

 
 
<tr><td>Nilai Ujian</td>
<td>
<input type="number" name="nj" class="form-control" value="<?= $nj ?>" required="" max_length='3'></td></tr>
<tr><td>Nilai Tugas</td>
<td>
<input type="number" name="nt" class="form-control" value="<?= $nt ?>" required="" max_length='3'></td></tr>
<tr><td>Nilai Ulangan</td>
<td>
<input type="number" name="nu" class="form-control" value="<?= $nu ?>" required="" max_length='3'></td></tr>
<tr><td>KKM</td>
<td>
<input type="number" name="kkm" class="form-control" value="<?= $kkm ?>" required="" max_length='3'></td></tr>

<tr><td>Nama Siswa</td><td>
		<select class="form-control" name="id_siswa">
		<?php $no=1; foreach ($siswa->result_array() as $siswa_): $no++; ?>
		<option value="<?= $siswa_['id_siswa'] ?>"><?= ucfirst($siswa_['nama_s']) ?></option>
		 <?php endforeach; ?>
		</select></td></tr>	
 
		<tr><td><button type="submit" class="btn btn-primary" name="kirim">
					<i class="glyphicon glyphicon-floppy-disk"></i> Simpan 
				</button>
				<a class="btn btn-warning" href="#">
					<i class="glyphicon glyphicon-arrow-left"></i> Batal 
				</a></td><td></td></tr>
		 
</table>
</form>

 <?php 

}else{

	echo '<div class="callout callout-danger"><p style="color: #fff">

       !! Maaf Tidak Ada Siswa Yang Terdaftar Pada Mata Pelajaran Ini Silahakan Lihat Data Siswa Yang Terdaftar 
        Pada Mata Pelajaran Ini

	</p></div>';
}


 ?>