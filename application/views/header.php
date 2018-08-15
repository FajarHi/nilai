<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= strip_tags($judul); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <?php
  $admin=$this->db->get_where('admin',array('id_admin'=>$this->session->userdata('id_admin')))->result_array();

  ?> 

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>SI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li><a href="<?= base_url() ?>" target="_blank">Preview</a></li>
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets/avatar.png') ?>" class="img-circle" alt="User Image" style="width: 30px;height: 30px">
              <span class="hidden-xs"><?= strip_tags($admin[0]['nama']) ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <img src="<?= base_url('assets/avatar.png') ?>" class="img-circle" alt="User Image">
                <p>
                
                  <?= strip_tags($admin[0]['nama']) ?> - <?= $this->session->userdata('level'); ?>
                   <small>Login Sebelumnya <?= 
                       strip_tags($admin[0]['log'])

                   ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                 
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('admin/edit_profil') ?>" class="btn btn-default btn-flat">Ubah Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('admin/keluar') ?>" onclick="return confirm('Anda Keluar Dari Sistem ? ');" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
       <?php 
       //bagian admin
if($this->session->userdata('level') =="admin" ): 
  buat_menu($this->session->userdata('level'),'Administrator','admin',base_url('admin/index'),'dashboard');
buat_menu($this->session->userdata('level'),'Data Guru','admin',base_url('admin/guru'),'book');
buat_menu($this->session->userdata('level'),'Data Siswa','admin',base_url('admin/siswa'),'book');
buat_menu($this->session->userdata('level'),'Data Kelas','admin',base_url('admin/kelas')); 
buat_menu($this->session->userdata('level'),'Data Matapelajaran','admin',base_url('admin/mapel')); 

buka_dropdown($this->session->userdata('level'),'Set Nilai Raport ','admin','','user');
buat_menu($this->session->userdata('level'),' Set Nilai Raport','admin',base_url('admin/penilaian'));
tutup_dropdown();   

buat_menu($this->session->userdata('level'),'Nilai Telah Di Set','admin',base_url('admin/data_nilai')); 
buka_dropdown($this->session->userdata('level'),'Cetak Raport','admin','','user');
buat_menu($this->session->userdata('level'),'Data Nilai','admin',base_url('admin/raport')); 
 
tutup_dropdown();          
 endif;
        ?>
     

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
  
       
      <h1>
        Dashboard
         <div class="callout callout-info"><p style="color: #fff"><?= $judul; ?></p></div>
      </h1>
       
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"></li>
      </ol>

    </section>
    <section class="content">
    <div class="box">
    <div class="box-body">
