<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <style>
    .login-page {
      background-image: url('../../img/background-1.jpg');  
    }
    .text-hover-danger:hover{
      color:#343a40;
    }
 
  </style>



</head>
<body class="h-100 login-page">
<!--body class="hold-transition "-->


<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-11 col-md-12 col-lg-6">
          


        <div class="">
  <!-- /.login-logo -->

 
              
                <div class="card card-outline card-dark ">
                  <div class="card-header text-center">
                      <a href="/login" class="h3 text-hover-danger">
                        
                          <img src="../../img/UD ANISSA BALI BACKGROUND PUTIH - Login.gif" alt="SIE-JAKU LOGO" class="img-circle h-100 "><br>

                          <b>SIE-JAKU </b><br>
                          <b class="text-lg">(SISTEM INFORMASI EKESEKUTIF PENJUALAN KAYU)</b><br>
                          UD. ANISSA BALI
                  
                      </a>
                  </div>
                  <div class="card-body">  

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <?php echo session()->getFlashdata('error'); ?>
                          </div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url(); ?>/login/process"> 
                      <?= csrf_field(); ?>
                            
                      <div class="input-group mb-3">
                      <input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus>
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                      <input type="password" name="password" id="password" placeholder="Password" class="form-control"  >
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>

                      <br>
                      <div class="row"> 
                        <!-- /.col -->
                        <div class="col-12">
                          <button type="submit" class="btn btn-dark btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
              
                
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

 
  
</div>

        </div>
    </div>
</div>


<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
