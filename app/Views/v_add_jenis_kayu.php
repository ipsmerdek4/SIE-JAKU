
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
              <li class="breadcrumb-item"><a href="<?= base_url('jenis-kayu'); ?>">Jenis Kayu</a></li> 
              <li class="breadcrumb-item active">Tambah Jenis Kayu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- Main content -->
    <div class="row content">
        <div class="col-lg-5 container"> 
            <div class="card card-dark ">
              <div class="card-header">
                <h3 class="card-title text-lg"> <b>Tambah Jenis Kayu</b> </h3>
              </div>


 
              
               <!-- /.card-header -->
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

                                <form method="post" action="<?= base_url(); ?>/jenis-kayu/add/p"> 
                                    <?= csrf_field(); ?>
                
 
                                    <div class="form-group">
                                        <label for="name" class="form-label">Jenis Kayu</label>
                                        <input type="text" class="form-control" id="jeniskayu" name="jeniskayu" placeholder="Silahkan Ketikan Jenis Kayu.">
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Tanggal</label>
                                        <input name="tgl" type="text" class="form-control " readonly value="<?=date("Y-m-d H:i:s")?>">
                                    </div>


                                    <br><br><hr class="bg-danger">
                                    <div class="form-group d-flex justify-content-center"> 
                                        <button type="submit" class="btn btn-block bg-primary btn-lg col-md-5"> <b> Simpan </b></button>
                                    </div>

                                    

                                </form>

                    

                                </div>
                            </div>
            
                        </div>
 

               </div>
            </div>
        </div>
    </div>

 


</div>
