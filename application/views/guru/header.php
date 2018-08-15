<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= strip_tags($judul); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php

  $admin=$this->db->get_where('guru',array('id_guru'=>$this->session->userdata('id_guru')))->result_array();

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
               <img src="<?= base_url('assets/avatar.png') ?>" class="img-circle" alt="User Image" style="width: 30px;height: 30px">
                <p>
                
                  <?= strip_tags($admin[0]['nama']) ?> - 
                   <small>Login Sebelumnya </small>
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
       if($this->session->userdata('level')=="guru"):
  
             buka_dropdown($this->session->userdata('level'),'Direktori Nilai Masuk','guru','','database');
                 buat_menu($this->session->userdata('level'),'Direktori Nilai Masuk','guru',base_url('guru/penilaian')); 
             tutup_dropdown();   
             buka_dropdown($this->session->userdata('level'),'Entri Data Nilai','guru','','edit');
                 buat_menu($this->session->userdata('level'),'Data Penilaian','guru',base_url('guru/data_nilai')); 
             tutup_dropdown();   

               buka_dropdown($this->session->userdata('level'),'Laporan Data Nilai Raport','guru','','edit');
                 buat_menu($this->session->userdata('level'),'Laporan Data Nilai','guru',base_url('guru/data_nilai')); 
             tutup_dropdown(); 

              buka_dropdown($this->session->userdata('level'),'Laporan Data Siswa','guru','','edit');
                 buat_menu($this->session->userdata('level'),'Laporan Data Siswa','guru',base_url('guru/data_nilai')); 
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"></li>
      </ol>

    </section>
    <section class="content">
    <div class="box">
    <div class="box-body">
