<?php $session = session(); ?>
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
   

  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <script src="https://kit.fontawesome.com/52ec731e12.js" crossorigin="anonymous"></script>

    <?php   
      $btscss = ''; 


      if ($batascss == 'c1') {
        $btscss = '
            <!-- DataTables -->
            <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        ';
      }elseif ($batascss == 'c2') {

        //null

      }elseif ($batascss == 'c3') {
        $btscss = '
            <!-- Select2 -->
            <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
            <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

            <style>

            .select2-selection__rendered {
                line-height: 27px !important; 
            }
            .select2-container .select2-selection--single {
                height: calc(2.25rem + 2px) !important;
                border: 1px solid #ced4da
            }
            .select2-selection__arrow {
                height: 37px !important;
            }
            </style>

        ';
      }elseif ($batascss == 'c3a') { 
        $btscss = '
            <!-- DataTables -->
            <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        ';

      }elseif ($batascss == 'c4a') {
        $btscss = '
            <!-- DataTables -->
            <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        ';

      }elseif ($batascss == 'c4b') {
        $btscss = '
              
              <!-- DataTables -->
              <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
              <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
              <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
              <!-- Select2 -->
              <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
              <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

              <style>

              .select2-selection__rendered {
                  line-height: 27px !important; 
              }
              .select2-container .select2-selection--single {
                  height: calc(2.25rem + 2px) !important;
                  border: 1px solid #ced4da
              }
              .select2-selection__arrow {
                  height: 37px !important;
              }
              </style>
       ';
        
      }elseif ($batascss == 'c4c') {
        $btscss = '
            <!-- DataTables -->
            <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
            <!-- Select2 -->
            <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
            <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

            <style>

            .select2-selection__rendered {
                line-height: 27px !important; 
            }
            .select2-container .select2-selection--single {
                height: calc(2.25rem + 2px) !important;
                border: 1px solid #ced4da
            }
            .select2-selection__arrow {
                height: 37px !important;
            }
            </style>
        ';

      }elseif ($batascss == 'c4d') {
        $btscss = '
            <!-- DataTables -->
            <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
            <!-- Select2 -->
            <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
            <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

            <style>

            .select2-selection__rendered {
                line-height: 27px !important; 
            }
            .select2-container .select2-selection--single {
                height: calc(2.25rem + 2px) !important;
                border: 1px solid #ced4da
            }
            .select2-selection__arrow {
                height: 37px !important;
            }
            </style>
        ';


      }elseif ($batascss == 'c4persediaan') {
        $btscss = '
            <!-- DataTables -->
            <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
            <!-- Select2 -->
            <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
            <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

            <style>

            .select2-selection__rendered {
                line-height: 27px !important; 
            }
            .select2-container .select2-selection--single {
                height: calc(2.25rem + 2px) !important;
                border: 1px solid #ced4da
            }
            .select2-selection__arrow {
                height: 37px !important;
            }
            </style>
        ';
      }elseif ($batascss == 'c5') {
        $btscss = '
            <!-- DataTables -->
            <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
            <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
            <!-- Select2 -->
            <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
            <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

            <style>

            .select2-selection__rendered {
                line-height: 27px !important; 
            }
            .select2-container .select2-selection--single {
                height: calc(2.25rem + 2px) !important;
                border: 1px solid #ced4da
            }
            .select2-selection__arrow {
                height: 37px !important;
            }
            </style>
        ';
        
      } 
 
    ?>


  <?= $btscss; ?>




</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
 
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-danger ">
    <div class="container">
      <a href="#" class="navbar-brand">
        <img src="../../img/logo-navbar.gif" alt="SIE-JAKU LOGO" class="brand-image img-circle h-100 ">
        <span class="brand-text font-weight-bold text-white">SIE-JAKU</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
      </button>


    <?php   
      $mactive1 = '';
      $mactive2 = '';
      $mactive3 = '';
      $mactive4 = '';


      if ($menu == '1a') {
        $mactive1 = 'font-weight-bold active';
      }elseif ($menu == '2a') {
        $mactive2 = 'font-weight-bold active';
      }elseif ($menu == '3a') {
        $mactive3 = 'font-weight-bold active';
      }elseif ($menu == '4a') {
        $mactive4 = 'font-weight-bold active';
      }

      

    ?>


      <div class="collapse navbar-collapse order-3 " id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a href="<?=base_url() ?>" class="nav-link <?=$mactive1?>" style="font-size:17px">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('customers') ?>" class="nav-link <?=$mactive2?>">Customer</a>
          </li> 
          <li class="nav-item dropdown" >
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle <?=$mactive3?>">Persedian</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?=base_url('jenis-kayu') ?>" class="dropdown-item">Jenis Kayu </a></li>
              <li><a href="<?=base_url('tipe-kayu') ?>" class="dropdown-item">Tipe Kayu</a></li>
              <li><a href="<?=base_url('ukuran-kayu') ?>" class="dropdown-item">Ukuran Kayu</a></li>
              <li><a href="<?=base_url('harga-kayu') ?>" class="dropdown-item">Harga Satuan Kayu</a></li>

              <li class="dropdown-divider"></li>
              <li><a href="<?=base_url('persediaan-kayu') ?>" class="dropdown-item">Persediaan Kayu</a></li>

            </ul>
          </li>



          <li class="nav-item">
            <a href="<?=base_url('transaksi') ?>" class="nav-link <?=$mactive4?>">Transaksi</a>
          </li>
        </ul>
 
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link " data-toggle="dropdown" href="#">
            <b>My - </b>
            <i class="fa-regular fa-circle-user fa-xl"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">
              <b>Welcome, <br><?= $session->get('name'); ?></b>
              <br>
            </span>

            <div class="dropdown-divider"></div>  
            <!--a href="#" class="dropdown-item">
              <i class="fas fa-eye mr-2"></i> Profil
            </a--> 

            <div class="dropdown-divider"></div>  
            <a href="/userlogin" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> User Login
            </a> 

            <div class="dropdown-divider"></div> 
              <a href="<?= base_url(); ?>/logout"class="dropdown-item dropdown-footer text-danger py-3" ><b> <u> Keluar </u> </b></a>
          </div>
        </li> 
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
