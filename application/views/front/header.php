<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul ?></title>

    <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/home/bootstrap.min.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/home') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/home/shop-homepage.css') ?>" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/home/proc.png') ?>" class="img-responsive" style="width: 50px;height: 50px"> Sistem Informasi Pengolahan Data Nilai Siswa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fa fa-home"></i>Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home/guru') ?>"><i class="fa fa-list"></i>&nbsp;Direktori Guru</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home/siswa') ?>"> <i class="fa fa-list"></i>&nbsp;Data Siswa</a>
            </li>
            
             <li class="nav-item">
             <a class="nav-link" data-toggle="modal" data-target="#login">
            <i class="fa fa-fw fa-sign-out"></i>Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Header with Background Image -->
    <header class="business-header" style="
    background: url(<?= base_url('assets/home/bac.jpg') ?>) top left fixed;
    background-size: cover;
    height:  300px;
   
    ">
      <div class="container">
        <div class="row">
          <div class="col-lg-12" >
            <h4 class="display-3 text-center text-white mt-4" style=" font-size: 50px;
    font-weight: bold;
    padding: 50px;"><?= $judul ?></h4>
          </div>
        </div>
      </div>
    </header>

 