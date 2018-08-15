<?php
 
class admin extends CI_controller
{
	
	function __construct()
	{
	 parent::__construct();
   if($this->session->userdata('login') == FALSE){
    redirect(base_url(''));
    exit();
   }
   $this->load->model('m_admin');
   $this->load->model('m_guru');
	}

	private function tpl($isi,$sql){
    $this->load->view('header',$sql);
    $this->load->view($isi);
    $this->load->view('footer');
	}

    public function index()
    {
    $x['judul']="Selamat Datang Di Halamana Administrator"; 	
    $this->tpl('home',$x);
    }
     
    public function guru()
    {
    $x['data']=$this->db->get('guru')->result_array();
    $x['judul']="Data Guru"; 
    $x['depan']  = FALSE;  
    $this->tpl('admin/guru',$x);   
    } 

    public function guru_tambah()
    {
    $x['judul']="Tambah Guru";   
    $x['aksi']="tambah";
    $x['nama']=""; 
    $x['username']=""; 
    $x['email']="";   
    $x['nip'] ="";
    $x['jenis_kelamin']="";   
    $x['foto']="";
     if (isset($_POST['kirim'])) {
    
$this->form_validation->set_rules('username', 'Username', 'trim|required|
                                    is_unique[admin.username]|is_unique[guru.username]');
$this->form_validation->set_rules('password', 'Password','trim|required');

 if ($this->form_validation->run() == TRUE){

    $nama_f = "nama" . time();
    $config['upload_path'] = './assets/file/';
    $config['allowed_types'] = 'png|jpg';
    $config['file_name'] = $nama_f;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('foto')) {
        
$data=array( 
'nama'=>$this->input->post('nama'),
'nip'=>$this->input->post("nip"),
'jenis_kelamin'=>$this->input->post("jenis_kelamin"),
'foto'=>$this->upload->file_name,
'username'=>$this->input->post("username"),
'password'=>md5($this->input->post("password")),
'email'=>md5($this->input->post("password")),
'r_pass'=>$this->input->post("password"),
'jenis_kelamin'=>$this->input->post("jenis_kelamin"));

$sql=$this->db->insert('guru',$data);
if($sql){
   redirect(base_url('admin/guru'));
}else{
  buat_aleert('GAGAL');
}

    }else{
     echo  $this->upload->display_errors();
    }

}else{
 buat_alert("USERNAME DAN PASSWORD TELAH DIGUNAKAN"); 
}


        }else{
        $this->tpl('admin/guru_form',$x); 
        }
    }




    public function guru_edit($id='')
    {
    $rt=$this->db->get_where('guru',array('id_guru'=>$id))->row_array();    
     $x['judul']="Edit Guru";   
     $x['aksi']="edit";
    $x['username']=$rt['username'];   
    $x['email']=$rt['email'];   
     $x['nama']=$rt['nama'];   
     $x['nip'] =$rt['nip'];
     $x['jenis_kelamin']="";   
     $x['gambar']=$rt['foto'];
     if (isset($_POST['kirim'])) {
    
    $nama_f = "nama" . time();
    $config['upload_path'] = './assets/file/';
    $config['allowed_types'] = 'png|jpg';
    $config['file_name'] = $nama_f;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('foto')) {

    $data=$this->db->get_where('guru',array('id_guru'=>$id))->row_array();
    if(!empty($data['foto'])){
    @unlink('assets/file/'.$data['foto']);
    }else{
    }
                
$data=array( 
'nama'=>$this->input->post('nama'),
'nip'=>$this->input->post("nip"),
'jenis_kelamin'=>$this->input->post("jenis_kelamin"),
'foto'=>$this->upload->file_name,
'username'=>$this->input->post("username"),
'password'=>md5($this->input->post("password")),
'email'=>md5($this->input->post("password")),
'r_pass'=>$this->input->post("password"),
'jenis_kelamin'=>$this->input->post("jenis_kelamin"));

    $sql=$this->db->update('guru',$data,array('id_guru'=>$id));
    if($sql){
       redirect(base_url('admin/guru'));
    }else{
      buat_alert('GAGAL');
    }
    }else{
      buat_alert('Gambar/Foto Tidak Valid Silahkan Ualng');
    }

    }else{
    $this->tpl('admin/guru_form',$x); 
    }

    }

    public function guru_hapus($id='')
    {
      $data=$this->db->get_where('guru',array('id_guru'=>$id))->row_array();
      if(!empty($data['foto'])){
        @unlink('assets/file/'.$data['foto']);
      }else{
        
      }
      $hapus=$this->db->delete('guru',array('id_guru'=>$id));
      if($hapus){
        $this->session->set_flashdata('pesan','Data Berhasil Di Hapus');
        redirect(base_url('admin/guru'));
      }
    }

//mata pelajaran
    public function mapel()
    {
    $x['data'] =$this->m_admin->mapel()->result_array();    
    $x['judul']="Manajemen Data Mata Pelajaran"; 	
    $this->tpl('admin/mapel',$x);
    }

    public function mapel_tambah()
    {

    $x = array('kode' =>'' ,'nama_mapel'=>'');    
    $x['kelas']   = $this->db->get('kelas')->result_array();
    $x['guru']    = $this->db->get('guru')->result_array();
        
    $x['judul']="Data Mata Pelajaran";
    if(isset($_POST['kirim'])){ 
	
	$kode       = $this->input->post('kode');
	$kelas      = $this->input->post('kelas');
	$nama_mapel = $this->input->post("nama_mapel");
	$semester   = $this->input->post("semester");
    $id_guru    = $this->input->post("id_guru");
     
    $data = array(
    'kode' =>$kode,
    'id_kelas' =>$kelas,
    'nama_mapel' =>$nama_mapel,
    'semester' =>$semester,
    'id_guru' =>$id_guru); 

    $data=$this->db->insert('mata_pelajaran',$data);
    if($data){
      $this->session->set_flashdata('pesan','<div class="">Berhasil Di Tambahkan</div>');
      redirect(base_url('admin/mapel'));
    }else{
       buat_aleert('GAGAL MENAMBAHKAN DATA');
    }

    }else{
     	
    $this->tpl('admin/mapel_form',$x);

    } 	
        
    }

    public function mapel_edit($id='')
    {
    if(empty($id)) redirect(base_url('admin/mapel'));
     $x = array('kode' =>'' ,'nama_mapel'=>'');    
    $x['kelas']= $this->db->get('kelas')->result_array();
    $x['guru']    = $this->db->get('guru')->result_array();
        
    $x['judul']="Data Mata Pelajaran";
    if(isset($_POST['kirim'])){ 
    
   
  $kode       = $this->input->post('kode');
  $kelas      = $this->input->post('kelas');
  $nama_mapel = $this->input->post("nama_mapel");
  $semester   = $this->input->post("semester");
    $id_guru    = $this->input->post("id_guru");
     
    $data = array(
    'kode' =>$kode,
    'id_kelas' =>$kelas,
    'nama_mapel' =>$nama_mapel,
    'semester' =>$semester,
    'id_guru' =>$id_guru); 

    $data=$this->db->update('mata_pelajaran',$data,array('id_mata_pelajaran'=>$id));
    if($data){
      $this->session->set_flashdata('pesan','<div class="">Berhasil Di Tambahkan</div>');
      redirect(base_url('admin/mapel'));
    }else{
       buat_aleert('GAGAL MENAMBAHKAN DATA');
    }

    }else{
        
    $this->tpl('admin/mapel_form',$x);

    }   
    }

    public function mapel_hapus($id='')
    {
      if(empty($id)) redirect(base_url('admin/mapel'));
      $sq=$this->db->delete('mapel',array('id_mata_pelajaran'=>$id));
      if($sq){
       $this->session->set_flashdata('pesan','Data Berhasil Di Hapus'); 
       redirect(base_url('admin/mapel'));
      }else{
        buat_aleert('ERROR');
      }
    }
    

    public function siswa($value='')
    {
     $x['data']=$this->m_admin->siswa()->result_array();
     $x['judul']="Data Siswa";
     $x['depan']  = FALSE;    
     $this->tpl('admin/siswa',$x); 
    }
    
    public function siswa_tambah($value='')
    {
     $x['kelas'] =$this->db->get('kelas')->result_array();
    $x['judul']="Tambah Siswa";    
    $x['aksi']="tambah";
    $x['nama']="";
    $x['nisn']="";
    $x['jk']="";
    $x['nama_orang_tua']="";
    $x['gambar']="";
  

     if (isset($_POST['kirim'])) {
    
    $nama_f = "nama" . time();
    $config['upload_path'] = './assets/file/';
    $config['allowed_types'] = 'png|jpg';
    $config['file_name'] = $nama_f;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('foto')) {
        
$data=array( 
'nama_s'=>$this->input->post('nama'),
'nisn'=>$this->input->post("nip"),
'jk'=>$this->input->post("jenis_kelamin"),
'nama_orang_tua'=>$this->input->post("nama_orang_tua"),
'kelas'=>$this->input->post("kelas"),
'semester'=>$this->input->post("semester"),
'foto'=>$this->upload->file_name);

$sql=$this->db->insert('siswa',$data);
if($sql){
   redirect(base_url('admin/siswa'));
}else{
  buat_aleert('GAGAL');
}

    }else{
     echo  $this->upload->display_errors();
    }
        }else{
        $this->tpl('admin/siswa_form',$x); 
        }   
    }


public function siswa_edit($id='')
{
 if(empty($id)) redirect(base_url('admin/siswa'));
 $t=$this->db->get_where('siswa',array('id_siswa'=>$id))->row_array();
 
    $x['judul']="Tambah Siswa";    
    $x['aksi']="edit";
    $x['nama']=$t['nama_s'];
    $x['nisn']=$t['nisn'];
    $x['jk']=$t['jk'];
    $x['nama_orang_tua']=$t['nama_orang_tua'];
    $x['gambar']=$t['foto'];
    $x['kelas']=$this->db->get('kelas')->result_array();
     if (isset($_POST['kirim'])) {
    
    $nama_f = "nama" . time();
    $config['upload_path'] = './assets/file/';
    $config['allowed_types'] = 'png|jpg';
    $config['file_name'] = $nama_f;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ($this->upload->do_upload('foto')) {
        
$data=array( 
'nama_s'=>$this->input->post('nama'),
'nisn'=>$this->input->post("nip"),
'jk'=>$this->input->post("jenis_kelamin"),
'nama_orang_tua'=>$this->input->post("nama_orang_tua"),
'kelas'=>$this->input->post("kelas"),
'semester'=>$this->input->post("semester"),
'foto'=>$this->upload->file_name);

$sql=$this->db->update('siswa',$data,array('id_siswa'=>$id));
if($sql){
   $this->session->set_flashdata('pesan','Data Berhasil Di Update'); 
   redirect(base_url('admin/siswa'));
}else{
  buat_aleert('GAGAL');
}

    }else{
     echo  $this->upload->display_errors();
    }
        }else{
        $this->tpl('admin/siswa_form',$x); 
        }   
}


    public function siswa_hapus($id='')
    {
      $data=$this->db->get_where('siswa',array('id_siswa'=>$id))->row_array();
      if(!empty($data['foto'])){
        @unlink('assets/file/'.$data['foto']);
      }else{
        
      }
      $hapus=$this->db->delete('siswa',array('id_siswa'=>$id));
      if($hapus){
        $this->session->set_flashdata('pesan','Data Berhasil Di Hapus');
        redirect(base_url('admin/siswa'));
      }
    }


public function kelas()
{
 $x['data']=$this->db->get('kelas')->result_array();   
 $x['judul']="Data Kelas";
 $this->tpl('admin/kelas',$x);
}

public function kelas_tambah($value='')
{
if (isset($_POST['kirim'])) {
$data=array(
'nama_kelas'=>$this->input->post('nama_kelas'),
'ket'=>$this->input->post('ket'));

$cek=$this->db->get_where('kelas',array('nama_kelas' =>$this->input->post('nama_kelas'),
                                        'ket' =>$this->input->post('ket')));

if($cek->num_rows() > 0 ){
  buat_alert('GAGAL NAMA KELAS TELAH ADA SEBELUMNYA');
}else{
$hasil=$this->db->insert('kelas',$data);
if($hasil){
  $this->session->set_flashdata('pesan','Data Berhasil Ditambahakan');
  redirect(base_url('admin/kelas'));
}else{
  buat_alert('GAGAL');
}
}

}else{
 $x['judul']="Tambah Kelas";
 $this->tpl('admin/kelas_form',$x);
  }
}

public function kelas_edit($id='')
{
if(empty($id)) redirect(base_url('admin/kelas'));

if (isset($_POST['kirim'])) {
$data=array(
'nama_kelas'=>$this->input->post('nama_kelas'),
'ket'=>$this->input->post('ket'));

$cek=$this->db->get_where('kelas',array('nama_kelas' =>$this->input->post('nama_kelas'),
                                        'ket' =>$this->input->post('ket')));

if($cek->num_rows() > 0 ){
buat_alert('GAGAL NAMA KELAS TELAH ADA SEBELUMNYA');
}else{
$hasil=$this->db->update('kelas',$data,array('id_kelas'=>$id));
if($hasil){
  $this->session->set_flashdata('pesan','Data Berhasil Ditambahakan');
  redirect(base_url('admin/kelas'));
}else{
  buat_aleert('GAGAL');
}

}

}else{
 $x['judul']="Tambah Kelas";
 $this->tpl('admin/kelas_form',$x);
  } 
}

public function kelas_hapus($id='')
{
  $sql=$this->db->delete('kelas',array('id_kelas' =>$id));
  if($sql){
   redirect(base_url('admin/kelas'));
  }else{

  }
}

public function data_user()
{
 $x['user']=$this->db->get('admin')->result_array();   
 $x['judul']="Data Hak Akases";   
 $this->tpl('admin/user',$x);
}

public function user_tambah()
{
$x['username']="";
$x['password']="";
$x['nama']="";
$x['level']="";
 $x['judul']=":::Tambah Hak Akses";   
 if (isset($_POST['kirim'])) {  
$data=array(
'username'=>$this->input->post("username"),
'password'=>md5($this->input->post("password")),
'nama'=>$this->input->post("nama"),
'level'=>$this->input->post("level"));

$sql=$this->db->insert('admin',$data);
if($sql){
  redirect(base_url('admin/data_user'));
}else{
  buat_alert('GAGAL SQL ');
}
 }else{
  $this->tpl('admin/user_form',$x);
 }
}

public function edit_user($id)
{
if(empty($id)) redirect(base_url('admin/user'));    
$q=$this->db->get_where('admin',array('id_admin'=>$id))->row_array(); 
$x['username']=$q['username'];
$x['password']="";
$x['nama']=$q['nama'];
$x['level']=$q['level'];
 $x['judul']=":::Edit Hak Akses";   
 if (isset($_POST['kirim'])) {  
$data=array(
'username'=>$this->input->post("username"),
'password'=>md5($this->input->post("password")),
'nama'=>$this->input->post("nama"),
'level'=>$this->input->post("level"));

$sql=$this->db->update('admin',$data,array('id_admin'=>$id));
if($sql){
  redirect(base_url('admin/data_user'));
}else{
  buat_alert('GAGAL SQL ');
}
 }else{
  $this->tpl('admin/user_form',$x);
 }
}


public function hapus_user($id)
{
 if($this->session->userdata('id_admin') == $id ){
   $this->session->set_flashdata('pesan','Anda Tidak Dapat Mengahapus Diri Anda Sendiri');
   redirect(base_url('admin/data_user/'));
 }else{ 
 $sql=$this->db->delete('admin',array('id_admin'=>$id));
 if($sql){
    $this->session->set_flashdata('pesan','Data Berhasil Di Hapus');
    redirect(base_url('admin/data_user'));
 }
}
}
public function keluar()
{
 $this->session->sess_destroy();
 redirect(base_url(''));
}

public function edit_profil()
{
 $sql=$this->db->get_where('admin',array('id_admin'=>$this->session->userdata('id_admin')))->row_array(); 
  $x['judul']="Edit Profil";
  $x['username']=$sql['username'];
  $x['nama']=$sql['nama'];
  if(isset($_POST['kirim'])){
    $data = array('username' =>$this->input->post('username'),
                  'password' =>md5($this->input->post('password')));

    $q=$this->db->update('admin',$data,array('id_admin'=>$this->session->userdata('id_admin')));
    if($q){
      $this->session->set_flashdata('pesan','Data BErhasil Di Edit');
      redirect(base_url('admin/prodfil'));
    }else{

    }
  }else{
     $this->tpl('admin/user_form',$x);
  }

}

public function data_nilai()
  {
  $x['kelas']=$this->db->get('kelas')->result_array(); 
  $x['judul']="Data Nilai Siswa Telah Di SET";
   if(isset($_POST['kirim'])){
    $kelas=$this->input->post('kelas');
    $semester=$this->input->post('semester');
    $x['data']=$this->m_admin->nilai($kelas,$semester)->result_array();  
    $x['judul']="Data Nilai Siswa Telah Di SET";
      $this->tpl('guru/penilaian',$x);
  }else{
      $this->tpl('guru/cari_kelas',$x);
  }
}


  public function penilaian()
  {
   $x['kelas']=$this->db->get('kelas')->result_array(); 
   $x['judul']="Direktori Nilai Masuk ";
   if(isset($_POST['kirim'])){
    $kelas=$this->input->post('kelas');
    $semester=$this->input->post('semester');
    $x['data']=$this->m_admin->mapel_guru($kelas,$semester);  
      $this->tpl('guru/mapel',$x);
   }else{
    $this->tpl('guru/cari_kelas',$x);
   }

  }

  public function penilaian_set($id)
  {
    if(empty($id)) redirect(base_url('guru/penilaian'));

      $data=$this->db->get_where('mata_pelajaran',array('id_mata_pelajaran'=>$id))->row_array();
 
$x['nilai']="";
$x['nu']="";
$x['nj']="";
$x['nt']="";
$x['kkm']="";
$x['nilai']="";
$x['id_mata_pelajaran']=$data['id_mata_pelajaran'];
$x['id_guru']=$data['id_guru'];
$x['semester']=$data['semester'];
$x['id_kelas']=$data['id_kelas'];

$x['siswa']=$this->m_admin->cari_data_siswa($data['semester']);

if(isset($_POST['kirim'])){
$semester=$this->input->post("semester");
$id_siswa=$this->input->post("id_siswa");
$cek=$this->db->get_where('nilai',array('semester'=>$semester));
$nilai=$this->db->get_where('nilai',array('id_siswa'=>$id_siswa));
$hasil=$nilai->row_array();

if($hasil['id_mata_pelajaran'] == $this->input->post("id_mata_pelajaran")){  
    buat_alert('Siswa Pada Mata Pelajaran Ini Telah Terdaftar Silahkan Pilih Siswa Yang Lain');
}else{

 $nj  = $this->input->post("nj");
 $nu  = $this->input->post("nu");
 $nt  = $this->input->post("nt");
 $kkm = $this->input->post("kkm");
 
 $hasil=($nj+$nu+$nt) / 4;

if($hasil == 100){
$nilai="Tuntas Paripurna";
}elseif($hasil >= 60){
$nilai="Tuntas ";
}elseif($hasil == 65){
$nilai="KKM (Krikteria Ketuntasan Minimal)";
}else{
 $nilai="Gagal";
}
 
 $data=array(
'ket_nilai'=>$nilai,
'id_mata_pelajaran'=>$this->input->post("id_mata_pelajaran"),
'nilai'=>$this->input->post("nilai"),
'id_siswa'=>$this->input->post("id_siswa"),
'id_guru'=>$this->input->post("id_guru"),
'semester'=>$this->input->post("semester"),
'id_kelas'=>$this->input->post("id_kelas"),
'nj'=>$this->input->post("nj"),
'nu'=>$this->input->post("nu"),
'nt'=>$this->input->post("nt"),
'kkm'=>$this->input->post("kkm"),
'nilai'=>$hasil
);

$sql=$this->db->insert('nilai',$data);
if($sql){
  $this->session->set_flashdata('pesan','Nilai Berhasil Di Update');  
   buat_alert('NILAI TELAH DI BERHASIL DI UPDATE');
}else{
  buat_alert('GAGAL');
}
}
    }else{ 
      $x['mata_pelajaran']=$data['nama_mapel'];
      $x['sudah']=$this->db->query("select * from siswa a, nilai b where a.id_siswa=b.id_siswa
        group by b.id_siswa");
      $x['judul']="Administrator Guru";
      $this->tpl('guru/nilai_form',$x);
      }
  }
 

public function nilai_edit($id)
{
if(empty($id)) redirect(base_url('guru/penilaian'));  
  $data=$this->db->get_where('nilai',array('id_nilai'=>$id))->row_array();

$x['nilai']=$x['nilai'];
$x['nu']=$x['nu'];
$x['nj']=$x['nj'];
$x['nt']=$x['nt'];
$x['kkm']=$x['kkm'];
$x['id_mata_pelajaran']=$data['id_mata_pelajaran'];
$x['id_guru']=$data['id_guru'];
$x['semester']=$data['semester'];
$x['id_kelas']=$data['id_kelas'];


if(isset($_POST['kirim'])){
$semester=$this->input->post("semester");
$id_siswa=$this->input->post("id_siswa");
$cek=$this->db->get_where('nilai',array('semester'=>$semester));
$nilai=$this->db->get_where('nilai',array('id_siswa'=>$id_siswa));
$hasil=$nilai->row_array();

if($hasil['id_mata_pelajaran'] != $this->input->post("id_mata_pelajaran")){  
    buat_alert('Maaf Data Nilai Sudaha ada');
}else{

 $nj  = $this->input->post("nj");
 $nu  = $this->input->post("nu");
 $nt  = $this->input->post("nt");
 $kkm = $this->input->post("kkm");

 $hasil=($nj+$nu+$nt) / 4;

if($hasil == 100){
$nilai="Tuntas Paripurna";
}elseif($hasil >= 60){
$nilai="Tuntas ";
}elseif($hasil == 65){
$nilai="KKM (Krikteria Ketuntasan Minimal)";
}else{
 $nilai="Gagal";
}
 
 $data=array(
'ket_nilai'=>$nilai,
'id_mata_pelajaran'=>$this->input->post("id_mata_pelajaran"),
'nilai'=>$this->input->post("nilai"),
'id_siswa'=>$this->input->post("id_siswa"),
'id_guru'=>$this->input->post("id_guru"),
'semester'=>$this->input->post("semester"),
'id_kelas'=>$this->input->post("id_kelas"),
'nj'=>$this->input->post("nj"),
'nu'=>$this->input->post("nu"),
'nt'=>$this->input->post("nt"),
'kkm'=>$this->input->post("kkm"),
'nilai'=>$hasil
);

$sql=$this->db->update('nilai',$data,array('id_nilai'=>$id));
if($sql){
  $this->session->set_flashdata('pesan','Nilai Berhasil Di Update');  
   buat_alert('NILAI TELAH DI BERHASIL DI UPDATE');
}else{
  buat_alert('GAGAL');
}

}

    }else{ 
    $id=$this->session->userdata('id_guru');  
    $x['data']=$this->m_guru->mapel_guru($id)->result_array();  
    $x['judul']="Administrator Guru";
      $this->tpl('guru/nilai_form',$x);
    }
}

public function nilai_hapus($id='')
{
  $hasil=$this->db->delete('nilai',array('id_nilai'=>$id));
  if($hasil){
   buat_alert('Data Berhasil Di hapus');
  }else{
    buat_alert('Gagal SQL ERROR');
  }
}

//bagian nilai rapoort siswa ;
public function raport()
{
 $x['kelas'] =$this->db->get('kelas')->result_array();
 $x['judul'] ="Cetak Rapor Siswa";
 if (isset($_POST['kirim'])) {

    $kelas=$this->input->post('kelas');
    $semester=$this->input->post('semester');
    $this->m_admin->cari_siswa($kelas,$semester);
    $x['data']=$this->m_admin->cari_siswa($kelas,$semester)->result_array();
    $this->tpl('admin/per_siswa',$x); 

  }else{
     $x['data'] ="";
    $this->tpl('admin/per_siswa',$x);
  } 
}

}