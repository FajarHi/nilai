    <div class="container">

    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home >> </a></li>
        <li class="active"> <?= $judul ?></li>
      </ol>
      <div class="row">
<?php $this->load->view($content); ?>
</div>
</div>