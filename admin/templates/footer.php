<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<script src="js/sweetalert2.min.js"></script>
<script src="js/admin-ajax.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<!-- <script src="js/dataTables.bootstrap.min.js"></script> -->
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/responsive.bootstrap4.min.js"></script>
<script src="js/dataTables.buttons.min.js"></script>
<script src="js/buttons.bootstrap4.min.js"></script>
<script src="js/jszip.min.js"></script>
<script src="js/pdfmake.min.js"></script>
<script src="js/vfs_fonts.js"></script>
<script src="js/buttons.html5.min.js"></script>
<script src="js/buttons.print.min.js"></script>
<script src="js/buttons.colVis.min.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/bootstrap-colorpicker.min.js"></script>
<!-- <script src="js/bootstrap-datetimepicker.min.js"></script> -->
<!-- <script src="js/select2.js"></script> -->
<script src="js/select2.min.js"></script>
<script src="js/select2.full.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/jquery.inputmask.min.js"></script>
<script src="js/tempusdominus-bootstrap-4.min.js"></script>
<script src="js/iconpicker.js"></script>
<script src="js/fontawesome4.json"></script>
<script src="../js/cotizador.js"></script>
<script src="js/icheck.min.js"></script>


<script>
    $(function () {
       //Initialize Select2 Elements
       $('.select2').select2()

    //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //     theme: 'bootstrap4'
    // })
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Date picker
    $('#reservationdate').datetimepicker({
       format: 'L'
    });

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    $('#icono').iconpicker();
    
  });
</script>
<script src="js/login-ajax.js"></script>
<script src="js/app.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
<script src="js/fastclick.js"></script>

</html>
