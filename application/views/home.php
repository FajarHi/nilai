 
    <section class="content">
      <div class="row">

 <?php
       //bagian BAU
       if($this->session->userdata('level') === "admin"):
             buat_kotak('green',base_url('admin/raport'),'Data Lapor Siswa'); 
             buat_kotak('red',base_url('admin/siswa'),'Data Siswa '); 
             buat_kotak('green',base_url('admin/guru'),'Data Guru'); 
             buat_kotak('yellow',base_url('admin/user'),'Management User'); 

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
     

 
 <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>


        <!-- ./col -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
 