
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
              <li class="breadcrumb-item"><a href="<?= base_url('persediaan-kayu'); ?>">Persediaan Kayu</a></li> 
              <li class="breadcrumb-item active">Tambah Persediaan Kayu</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- Main content -->
    <div class=" content">
        <div class="container"> 
            <div class="card card-dark ">
                <div class="card-header">
                <h3 class="card-title text-lg"> <b>Tambah Persediaan Kayu</b> </h3>
                </div> 
                <!-- /.card-header -->
                <div class="card-body">   
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                    <?php endif; ?> 



                    <form method="post" action="<?= base_url(); ?>/tipe-kayu/add/p"> 
                        <?= csrf_field(); ?>
    
                        <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="name" class="form-label">Jenis Kayu</label>
                                <select name="jkayu" id="" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                    <option value=''>Select Jenis Kayu -</option> 
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Tipe Kayu</label>
                                <input type="text" name="tkayu" class="form-control" placeholder="Silahkan Ketikan Tipe Kayu." >
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Ukuran Kayu</label>
                                <input type="text" name="tkayu" class="form-control" placeholder="Silahkan Ketikan Tipe Kayu." >
                            </div>

                        </div>
                        <div class="col-md-6">  
                            
                            <div class="form-group">
                                <label for="name" class="form-label">Persediaan</label>
                                <input type="text" class="form-control "  placeholder="dalam hitungan angka">
                            </div> 

                        
                            <div class="form-group">
                                <label for="name" class="form-label">Harga</label>
                                <input type="text" class="form-control "  placeholder="Harga Satuan">
                            </div> 



                            <div class="form-group">
                                <label for="name" class="form-label">Tanggal</label>
                                <input type="text" class="form-control " disabled value="<?=date("d-M-Y H:i:s")?>">
                            </div> 

                        </div>  
                        <div class="col-md-12 "> 
                            <br><br><hr class="bg-danger">
                            <div class="form-group d-flex justify-content-center"> 
                                <button type="submit" class="btn btn-block bg-primary btn-lg col-md-5"> <b> Simpan </b></button>
                            </div>
                        </div> 
                        </div> 

                    </form>
                </div> 
            </div>
        </div>
    </div>

 


</div>
