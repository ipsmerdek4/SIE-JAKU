



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
              <li class="breadcrumb-item"><a href="<?= base_url('customers'); ?>">Customers</a></li> 
              <li class="breadcrumb-item active">Tambah Customer</li>
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
                <h3 class="card-title text-lg"> <b>Tambah Customers</b> </h3>
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



              

                <form method="post" action="<?= base_url(); ?>/customers/p"> 
                <?= csrf_field(); ?>
                <div class="row"> 
                    <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="Tanggal" class="form-label">Tanggal <b class="text-danger">*</b></label>
                                <input type="date" class="form-control" id="" name="tanggal" placeholder="">
                            </div> 
                            <div class="form-group">
                                <label for="Customers" class="form-label">Customers# <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" id="" name="customers" placeholder="Masukan Nama Singkat Customer">
                            </div> 
                            <div class="form-group">
                                <label for="Nama Lengkap " class="form-label">Nama Lengkap <b class="text-danger">*</b></label>
                                <input type="text" class="form-control" id="" name="nama" placeholder="Masukan Nama Lengkap Customer">
                            </div> 
                            <div class="form-group">
                                <label for="Nomer Telp" class="form-label">Nomer Telp</label> 
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input name="telp" type="text" class="form-control" data-inputmask='"mask": "(+62 999) 999-9999"' data-mask placeholder="Masukan Nomer Telp">
                                </div> 
                             </div> 
                            <div class="form-group">
                                <label for="Nomer Hp " class="form-label">Nomer Hp <b class="text-danger">*</b></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-mobile-screen-button"></i></span>
                                    </div>
                                    <input name="hp" type="text" class="form-control" data-inputmask='"mask": "(+62 99) 999-999-999"' data-mask placeholder="Masukan Nomer Hp">
                                </div> 
                            </div> 
                            <div class="form-group">
                                <label for="Nomer WhatsApp" class="form-label">Nomer WhatsApp</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-brands fa-whatsapp"></i></span>
                                    </div>
                                    <input name="wa" type="text" class="form-control" data-inputmask='"mask": "(+62 99) 999-999-999"' data-mask placeholder="Masukan Nomer WhatsApp">
                                </div> 
                            </div>  

                    </div>
                    <div class="col-md-6">  
                            <div class="form-group">
                                <label for="Provinsi" class="form-label">Provinsi <b class="text-danger">*</b></label>
                                <input type="text" name="provinsi_id" class="form-control">
                                 
                            </div> 
                            <div class="form-group">
                                <label for="Kabupaten" class="form-label">Kabupaten <b class="text-danger">*</b></label>
                                <input type="text" name="kabupaten_id" class="form-control"> 
                            </div> 
                            <div class="form-group">
                                <label for="Kecamatan" class="form-label">Kecamatan <b class="text-danger">*</b></label>
                                <input type="text" name="kecamatan_id" class="form-control">  
                            </div> 
                            <div class="form-group">
                                <label for="Desa" class="form-label">Desa <b class="text-danger">*</b></label>
                                <input type="text" name="desa_id" class="form-control">   
                            </div> 

                            <div class="form-group">
                                <label for="Alamat" class="form-label" >Alamat <b class="text-danger">*</b></label>
                                <textarea placeholder="Masukan Alamat Lengkap Customer" name="alamat"  class="form-control" ></textarea> 
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
              <!-- /.card-body -->



            </div>

        </div>
    </div>
</div>

