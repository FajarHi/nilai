 
    <section class="content">
      <div class="row">

 <?php
       //bagian BAU
       if($this->session->userdata('level') === "admin"):
             buat_kotak('green',base_url('admin/surat_keluar'),'Data Informasi(Berita)'); 
             buat_kotak('red',base_url('admin/surat_masuk'),'Data Registrasi '); 
             buat_kotak('green',base_url('laporan/laporan_surat_masuk'),'Data Prestasi'); 
             buat_kotak('yellow',base_url('laporan/laporan_surat_keluar'),'Management User'); 

        //end bagian BAU     
        //bagian Operator
        elseif($this->session->userdata('level') == "operator"):
        
             buat_kotak('green',base_url('admin/surat_keluar'),'Entri Surat Keluar'); 
             buat_kotak('yellow',base_url('admin/surat_masuk'),'Entri Surat Masuk'); 
             buat_kotak('green',base_url('laporan/laporan_surat_masuk'),'Data Surat Masuk'); 
             buat_kotak('yellow',base_url('laporan/laporan_surat_keluar'),'Data Surat Keluar'); 
        //end bagian operator
       elseif($this->session->userdata('level') == "superadmin"):
          buka_dropdown($this->session->userdata('level'),'Data User Login','superadmin','','book');
                 buat_menu($this->session->userdata('level'),'Data User','superadmin',base_url('admin/surat_masuk')); 
             tutup_dropdown();  

             buka_dropdown($this->session->userdata('level'),'Setting ','superadmin','','envelope');
                 buat_menu($this->session->userdata('level'),'','superadmin',''); 
                 buat_menu($this->session->userdata('level'),'','superadmin',''); 
             tutup_dropdown();    
       endif; 
//bagain super admin
        ?>
     <!-- ./col -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
 