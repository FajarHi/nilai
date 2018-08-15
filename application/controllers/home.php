<?php 
 
class Home extends CI_controller
{
   
	function __construct()
	{
	 parent:: __construct();	
	 $this->load->model('m_site');
    $this->load->model('m_admin');
   $this->model=$this->m_site;
	 
	}

  private function tpl($isi='',$variavbel=''){
  
   $this->load->view('front/header',$variavbel);
   $this->load->view('front/'.$isi);
   $this->load->view('front/footer');
  }

	public function index()
	{
	 $x['judul'] ="Selamat Datang Di Smkn 1 Batahan";
   $x['content']='front/awal';
   $this->tpl('home',$x);
	}

  public function login($value='')
  {
    if(isset($_POST['kirim'])){

    $username=barasiah($this->input->post('username'));
    $password=barasiah($this->input->post('password'));

    $cek_sql1=$this->model->m_login($username,md5($password));
    $cek_sql2=$this->model->m_login_guru($username,md5($password));

    if($cek_sql1->num_rows() > 0){
      //cek yang pertama jika ada lanjut dan sebalinknya;
    $hasil=$cek_sql1->row_array();  
    $data_login = array(
    'id_admin' =>$hasil['id_admin'] ,
    'username' =>$hasil['username'] ,
    'password' =>$hasil['password'] ,
    'level' =>$hasil['level'],
    'login' =>TRUE,
    );
      $this->session->set_userdata($data_login);
      redirect(base_url('admin'));
    }elseif($cek_sql2->num_rows() > 0){
      
      //cek yang kedua jika ada lanjut dan sebalinknya;
    $has=$cek_sql2->row_array();  
    $guru = array(
    'id_guru' =>$has['id_guru'] ,
    'username' =>$has['username'] ,
    'password' =>$has['password'] ,
    'level' =>'guru',
    'login' =>TRUE,
    );
      $this->session->set_userdata($guru);
      redirect(base_url('admin'));

    }else{ 
      $this->session->sess_destroy();  
      buat_alert('MAAF USERNAME DAN PASSWORD TIDAK DI TEMUKAN');
    }

    }else{
      print_r("DONT ALLOW SCRIPT ALLOWED");
    }
  }

  public function guru()
  {
   $x['data']=$this->db->get('guru')->result_array(); 
   $x['judul'] ="Data Guru";
   $x['content']="admin/guru";
   $x['depan']  = TRUE;
   $this->tpl('home',$x);
  }


  public function siswa()
  {
    $x['data']=$this->m_admin->siswa()->result_array();
   $x['judul'] ="Data Siswa";
   $x['content']="admin/siswa";
   $x['depan']  = TRUE;
   $this->tpl('home',$x);
  }

  public function nilai()
  {
  $x['judul'] ="Data Nilai";
   $this->tpl('home',$x);
  }

}

