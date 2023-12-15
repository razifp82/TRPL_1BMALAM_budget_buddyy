<?php

error_reporting(false);
session_start(); 
if(!$_SESSION['username']){
header('Location:../index.php?session=expired');
}
include('header.php');?>

<!DOCTYPE html>
<html lang="en">

<?php include('../conf/koneksi.php');?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
<?php include('preloader.php');?>

  <!-- Navbar -->
  <?php include('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  <?php include('logo.php');?>

    <!-- Sidebar -->
   <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <?php include('content_header.php');?>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php
    if (isset($_GET['page'])){
     if ($_GET['page']=='beranda'){
       include('beranda.php');
      }
      else if($_GET['page']=='pm'){
       include('pm.php');
      }
      else if($_GET['page']=='edit_pm'){
       include('edit/edit_pm.php');
      }
      else if($_GET['page']=='pn'){
        include('pn.php');
       }
       else if($_GET['page']=='edit_pn'){
        include('edit/edit_pn.php');
       }
       else if($_GET['page']=='rn'){
        include('rn.php');
       }
       else if($_GET['page']=='edit_rn'){
        include('edit/edit_rn.php');
       }
       else if($_GET['page']=='dn'){
        include('dn.php');
       }
       else if($_GET['page']=='edit_dn'){
        include('edit/edit_dn.php');
       }
       else if($_GET['page']=='grafik'){
        include('grafik.php');
       }
       else if($_GET['page']=='faq'){
        include('faq.php');
       }
       else if($_GET['page']=='kalender'){
        include('kalender.php');
       }
       else if($_GET['page']=='proses'){
        include('tambah/proses.php');
       }
       else if($_GET['page']=='notifikasi'){
        include('notifikasi.php');
       }
       else if($_GET['page']=='bts'){
        include('bts.php');
       }
       else if($_GET['page']=='edit_bts'){
        include('edit/edit_bts.php');
       }
    }
    ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
