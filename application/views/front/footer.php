 <?php
    echo $this->session->flashdata('pesan');
    buka_modal('Login','login','');
    modal_isi(buka_form(base_url('home/login'),'',''),
              buat_textbox('Username','username','','10','text'),
              buat_textbox('Password','password','','10','password'),
    tutup_form_login('','kirim')
     );
    tutup_modal();
     ?>


 <script src="<?= base_url('assets/home') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->     
<script src="<?= base_url('assets/home') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/home') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/home') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/home') ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets/home') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/home') ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>




<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

      
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; 2017 ANITA ARLINA</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url('assets/home/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/home/bootstrap.bundle.min.js') ?>"></script>

  </body>

</html>
