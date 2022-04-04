
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
              <li class="breadcrumb-item"><a href="<?= base_url('transaksi'); ?>">Transaksi</a></li> 
              <li class="breadcrumb-item active">Tambah Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- Main content -->
    <div class="  content">
        <div class=" container"> 
            <div class="card card-dark ">
              <div class="card-header">
                <h3 class="card-title text-lg"> <b>Tambah Transaksi</b> </h3>
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


                            <!--div class="form-group"> 
                            <input type="text" class="form-control " disabled  id="jam">
                            </div-->

                        <form method="post" action="<?= base_url(); ?>/transaksi/add/p"> 
                        <?= csrf_field(); ?>


                            <div class="row"> 
                                    <div class="col-md-6">
 
                                            <div class="form-group">
                                                <label for="name" class="form-label">Jenis Kayu</label>
                                                <select name="jkayu" id="j_kayu" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                                    <option value=''>Select Jenis Kayu -</option> 
                                                    <?php  foreach ($dataJenisKayus as $item1): ?>  
                                                        <?='<option value="'.$item1->id_jenis_kayu .'">'.$item1->nama_jenis_kayu.'</option>'?> 
                                                    <?php endforeach; ?>  
                                                </select> 
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="form-label">Tipe Kayu</label>
                                                <select name="t_kayu" id="t_kayu" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                                    <option value=''>Select Tipe Kayu -</option> 
                                                </select> 
                                            </div>
        
                                            <div class="form-group">
                                                <label for="name" class="form-label">Ukuran Kayu</label>
                                                <select name="u_kayu" id="u_kayu" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                                    <option value=''>Select Ukuran Kayu -</option> 
                                                </select> 
                                            </div>
    
                                    </div>
                                    <div class="col-md-6"> 
                                            <div class="form-group ">
                                                <label for="name" class="form-label">Kode Transaksi</label>
                                                <input type="text" name="kodetransaksi" class="form-control " readonly  id="" value="#JAKUTRANS<?=date("HmsdYm")?>   ">
                                            </div>

                                            <div class="form-group ">
                                                <div class="row"> 
                                                    <div class="col-sm-6">
                                                        <label for="name" class="form-label">Persediaan</label> 
                                                        <select name="persediaan" id="persediaan" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                                            <option value=''>Select Persediaan -</option> 
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="name" class="form-label">Jumlah Pembelian</label> 
                                                        <select name="j_pem" id="j_pem" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                                            <option value=''>Select Jumlah Pembelian -</option> 
                                                        </select>
                                                    </div> 
                                                </div> 
                                            </div>

                                            <div class="form-group ">
                                                <label for="name" class="form-label">Total Harga</label> 
                                                <select name="ttl_harga"  id="get_harga" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                                    <option value=''>Rp 0,00-</option> 
                                                </select>       
                                            </div>

                                            <div class="form-group ">
                                                <label for="name" class="form-label">Tipe Pemesanan</label> 
                                                <select name="tipe_pesanan"  id="tipe_pesanan" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                                        <option value='Online Order'>Online Order</option> 
                                                        <option value='Offline Order'>Offline Prder</option> 
                                                        <option value='Cash on Delivery'>Cash on Delivery</option> 
                                                </select>       
                                            </div>



                                    </div>

                                    <div class="col-md-12"> 
                                            <br><br>
                                            <hr class="bg-danger">
                                            <div class="form-group d-flex justify-content-center"> 
                                                <button type="submit" class="btn btn-block bg-primary btn-lg col-md-5"> <b> Simpan </b></button>
                                            </div>

                                    </div> 
                               
                                </div>
                            </div>
     
                        </form> 
                </div>

            </div>
        </div>
    </div>

 


</div>
