
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6"> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li> 
            <li class="breadcrumb-item"><a href="<?= base_url('/userlogin'); ?>">User Login</a></li> 
              <li class="breadcrumb-item active">Edit Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">

            <div class="card card-dark ">
              <div class="card-header">
                <h3 class="card-title text-lg"> <b>Edit Users Login</b> </h3>
              </div>
              <div class="card-body"> 

              <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
 

                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
                <?php endif; ?> 

                <form method="post" action="<?= base_url('/userlogin/u/'.$datausers->username)?>">  
                    <?= csrf_field(); ?>
 

                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?=$datausers->username?>">
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=$datausers->name?>">
                    </div>  
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label> <br>

                        <input type="checkbox" name="my-checkbox" class="pass-check" data-bootstrap-switch> <br><br>
 
                        <div id="grbuserspas">
                                <small class="form-label">New Password</small>
                                <input type="password" class="form-control" id="password" name="password"> 
                                <small class="form-label">Confirm Password</small>
                                <input type="password" class="form-control" id="password_conf" name="password_conf"> 
                        </div> 
                    </div>
                    <br><br><hr class="bg-danger">
                    <div class="form-group d-flex justify-content-center"> 
                        <button type="submit" class="btn btn-block bg-success btn-lg col-md-5"> <b> Simpan </b></button>
                    </div>

                </form>


         

                    </div>
                </div>
 
              </div>
              <!-- /.card-body -->
            </div>

        </div>
    </div>
</div>
