 
    <section class="content">
      <div class="row">

 <?php
 if($this->session->userdata('level') == "guru"):
             buat_kotak('green',base_url('admin/surat_keluar'),'Entri Surat Keluar'); 
             buat_kotak('yellow',base_url('admin/surat_masuk'),'Entri Surat Masuk'); 
             buat_kotak('green',base_url('laporan/laporan_surat_masuk'),'Data Surat Masuk'); 
             buat_kotak('yellow',base_url('laporan/laporan_surat_keluar'),'Data Surat Keluar'); 
       endif; 
//bagain super admin
        ?>
     



        <!-- ./col -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
 