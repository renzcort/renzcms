<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- add css style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>css/adminstyle.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<<<<<<< HEAD
=======
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
>>>>>>> 98c734f4666bb3b8a33a2187647bfb9163dd33ca
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<<<<<<< HEAD
=======
<style>
  #sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
  }
  #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
  }
  </style>
>>>>>>> 98c734f4666bb3b8a33a2187647bfb9163dd33ca
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
    $this->load->view('admin/partial/header'); 
  ?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php
    $this->load->view('admin/partial/main-sidebar'); 
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <?php
      $this->load->view($content); 
    ?>
    
  </div>
  <!-- /.content-wrapper -->
  <?php
    $this->load->view('admin/partial/footer'); 
  ?>

  <!-- Control Sidebar -->
  <?php
    $this->load->view('admin/partial/aside-sidebar') 
  ?>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<<<<<<< HEAD
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
=======
<!-- <script src="<?php echo base_url('assets/backend/'); ?>bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="<?php echo base_url('assets/backend/'); ?>bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

>>>>>>> 98c734f4666bb3b8a33a2187647bfb9163dd33ca
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/backend/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/backend/'); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/backend/'); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/backend/'); ?>dist/js/demo.js"></script>

<!-- CK Editor -->
<script src="<?php echo base_url('assets/backend/'); ?>bower_components/ckeditor/ckeditor.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="<?php echo base_url('assets/backend/'); ?>js/index.js"></script>
<script type="text/javascript">
  $( document ).ready(function() {
    $('#photoId').change(function(event) {
      /* Act on the event */
      filePreview(this);
    });

    $(".remove").click(function(){
      // $( "div" ).remove( ".images-preview" );
      $(this).parent(".pip").remove();
    });

    if (window.File && window.FileList && window.FileReader) {
      multipleFilePreview();
    } else {
      alert("Your browser doesn't support to File API")
    }

    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5();
    })
<<<<<<< HEAD
=======

    $( function() {
      $( "#sortable1, #sortable2" ).sortable({
        connectWith: ".connectedSortable"
      }).disableSelection();
    } );
>>>>>>> 98c734f4666bb3b8a33a2187647bfb9163dd33ca
  });
</script>

</body>
</html>
