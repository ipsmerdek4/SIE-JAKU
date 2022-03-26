
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
              <li class="breadcrumb-item active">Edit Persediaan Kayu</li>
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
                <h3 class="card-title text-lg"> <b>Edit Persediaan Kayu</b> </h3>
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



                    <form method="post" action="<?= base_url(); ?>/persediaan-kayu/e/<?=$datapersediaan[0]->id_persediaan?>"> 
                        <?= csrf_field(); ?>
    
                        <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="name" class="form-label">Jenis Kayu</label>
                                <select name="j_kayu" id="j_kayu" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                    <option value=''>Select Jenis Kayu -</option>  
                                    <?php  foreach ($dataJenisKayus as $item1): ?>  
                                        <option value="<?=$item1->id_jenis_kayu?>" <?php echo ($item1->id_jenis_kayu == $datapersediaan[0]->id_jenis_kayu) ? "selected" : ""?>  > <?=$item1->nama_jenis_kayu?></option>
                                    <?php endforeach; ?>  
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Tipe Kayu</label>
                                <select name="t_kayu" id="t_kayu" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                    <option value=''>Select Tipe Kayu -</option> 
                                    <?php  foreach ($dataTipeKayus as $item2): ?>  
                                        <option value="<?=$item2->id_tipe_kayu?>" <?php echo ($item2->id_tipe_kayu == $datapersediaan[0]->id_tipe_kayu) ? "selected" : ""?>  > <?=$item2->nama_tipe_kayu?></option>
                                    <?php endforeach; ?>  
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Ukuran Kayu</label>
                                <select name="ukayu" id="ukayu" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                    <option value=''>Select Ukuran Kayu -</option> 
                                    <?php  foreach ($dataUkuranKayus as $item3): ?>  
                                        <option value="<?=$item3->id_ukuran_kayu?>" <?php echo ($item3->id_ukuran_kayu == $datapersediaan[0]->id_ukuran_kayu) ? "selected" : ""?>  > <?=$item3->nama_Ukuran_kayu?></option>
                                    <?php endforeach; ?>  
                                </select> 
                            </div>

                        </div>
                        <div class="col-md-6">   

                            <div class="form-group">
                                <label for="name" class="form-label">Persediaan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-cubes"></i></span>
                                    </div>
                                <input type="text" name="p_kayu" class="form-control" placeholder="Masukan Persedian Kayu Dalam Angka." onkeypress="return hanyaAngka(event)" value="<?=$datapersediaan[0]->jml_persediaan?>">
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="name" class="form-label">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-rupiah-sign"></i></span>
                                    </div>
                                    <input type="text" name="harga" class="form-control "  placeholder="Harga Satuan" onkeypress="return hanyaAngka(event)" value="<?=$datapersediaan[0]->Harga_satuan?>">
                                </div>
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
