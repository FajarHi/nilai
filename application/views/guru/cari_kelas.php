<form action="" method="POST"> 
<table class="table table-striped">
<tr><td>Pilih Kelas</td><td>
		
<select class="form-control" name="kelas" required="">
	<option value="">--Pilih Kelas--</option>
	<?php

	 $no=1;foreach($kelas as $hasil): ?>
	<option value="<?= $hasil['id_kelas'] ?>">
	<?= $hasil['ket']; ?> <b>(<?= $hasil['nama_kelas']; ?>)</b>
	</option>
<?php $no++;endforeach; ?>
</select>


<tr><td>Semester</td><td>
	<select class="form-control" required="" name="semester"> 
	<option value="1">Satu / Ganjil</option>
	<option value="2">Dua / Genap</option>
</select></td></tr>


		
</td></tr>			 
		<tr><td><button type="submit" class="btn btn-primary" name="kirim">
					<i class="glyphicon glyphicon-floppy-disk"></i> Simpan 
				</button>
				<a class="btn btn-warning" href="#">
					<i class="glyphicon glyphicon-arrow-left"></i> Batal 
				</a></td><td></td></tr>
		 
</table>
</form>