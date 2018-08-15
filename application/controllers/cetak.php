<?php 

/**
* 
*/
class cetak extends CI_controller
{
	
	function __construct()
	{
     parent::__construct();
     $this->load->model('m_admin');
	}

	public function raport($id_siswa,$semester)
	{
	 $this->session->set_flashdata('pesan','Kesalahan Tak Terduga');
     if(empty($id_siswa) OR  empty($semester)) redirect(base_url('admin/raport'));
//jika kosong id_siswa dan kosong Id raport balek lagi 

     $x['rank']=$this->m_admin->raport($id_siswa,$semester)->num_rows();
     
     $x['judul']="Daftar Nilai Kolektif Siswa";
     $sql=$this->m_admin->raport($id_siswa,$semester)->result_array();
     $x['data']= $this->m_admin->raport($id_siswa,$semester);
     $x['nama']= $sql[0]['nama_s'];
     $x['nisn']= $sql[0]['nisn'];
     $this->load->view('laporan/raport',$x);
  
	}
}