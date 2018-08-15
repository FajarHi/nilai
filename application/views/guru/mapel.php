<?php $sql=$data->num_rows();

 if ($sql > 0){
 ?> 

<?= $this->session->flashdata('pesan') ?>
<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Mata Pelajran</th>
                    <th>Kelas</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Guru Pengampu</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
            <?php $no=1;foreach($data->result_array() as $hasil): ?>
            <tr>
            <td><?= $no; ?></td>
            <td><?= $hasil['kode']; ?></td>
            <td><?= $hasil['ket']; ?> <b>(<?= $hasil['nama_kelas']; ?>)</b></td>
            <td><?= $hasil['nama_mapel'] ?></td>
            <td><?= $hasil['nama'] ?></td>
            <td><?= $hasil['semester']; ?></td>
            <td>
            <a href="<?= base_url('admin/penilaian_set/'.$hasil['id_mata_pelajaran']) ?>" class="btn btn-primary"><i class="fa fa-edit"></i>Set Nilai Siswa</a>&nbsp;
     
            </tr>

           <?php $no++; endforeach; ?>


                </tbody>
                </table>
 
 <?php 

}else{
 buat_alert('Tidak Ada Mata Pelajaran Pada Kelas Dan Semester Ini');
    
}

  ?>
 