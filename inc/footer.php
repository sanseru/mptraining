<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Haris Lukman Hakim</a>.</strong> MEDIKA PLAZA All rights
    reserved.
  </footer>








  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- <div class="control-sidebar-bg"></div>  -->
</div>
<!-- ./wrapper -->










<!-- jQuery 3 -->
<script src="css/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="css/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="css/raphael/raphael.min.js"></script>
<script src="css/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="css/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="css/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="css/moment/min/moment.min.js"></script>
<script src="css/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="css/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="css/select2/dist/js/select2.full.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="css/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="css/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="css/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="css/ckeditor/ckeditor.js"></script>

<script src="css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


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
        //Date picker
        $('#datepicker').datepicker({
      autoclose: true
    })
        $('#reservation').daterangepicker({
        locale: {
            format: 'DD MMMM YYYY'
        }
    })
            // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
      CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })

</script>
</body>
</html>
