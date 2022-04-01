
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
                                
<div class="row">                     
<div class="col-md-6">   
<div class="input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa-solid fa-cubes"></i></span>
    </div>
    <input type="text" name="p_kayu" class="form-control" placeholder="Masukan Persedian Kayu Dalam Angka." onkeypress="return hanyaAngka(event)" value="<?=$datapersediaan[0]->sisa_persediaan?>">
</div>
</div>                      
<div class="col-md-6">   
    <input type="text" name="tlp_kayu" class="form-control" placeholder="Masukan Persedian Kayu Dalam Angka." readonly onkeypress="return hanyaAngka(event)" value="<?=$datapersediaan[0]->jml_persediaan?>">
</div>  
</div>      


                            </div>  
                                        
                            <div class="form-group">
                                <label for="name" class="form-label">Harga </label>
                                <select name="harga_k" id="harga_k" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;"> 
                                    <?php  foreach ($datHargaKayus as $item4): ?>  
                                        <option value="<?=$item4->id_harga_kayu?>" <?php echo ($item4->id_harga_kayu == $datapersediaan[0]->id_harga_kayu) ? "selected" : ""?>  > <?="Rp " . number_format($item4->nama_harga_kayu,2,',','.')?></option>
                                    <?php endforeach; ?>  
                                </select> 
                            </div>
                            <div class="form-group"> 
                                <sm >Note : <b class="text-danger">*</b> </sm> <br>
                                <sm >
                                    <ul>
                                        <li>Dengan mengubah Data Persediaan, maka sisa Data Persediaan dapat di ubah tetapi untuk total persediaan tidak akan berubah. </li>
                                        <li>Bila Sisa Data Persediaan melebihi dari Max Total Persediaan, maka Sisa akan mengikuti Max Total Persediaan. </li>
                                    </ul>
                                    
                                
                            
                                 </sm>
                                 
                            </div>
                                

                        </div>  

                        <div class="col-md-12 "><br><br><hr class="bg-danger"> </div> 

                        <div class="col-md-3 ">  </div> 
                        <div class="col-md-3 "> 
                            <div class="form-group d-flex justify-content-center"> 
                                <a href="<?= base_url('persediaan-kayu');?>" class="btn btn-block bg-danger btn-lg ">Kembali</a> 
                            </div>
                        </div> 
                        <div class="col-md-3 ">  
                            <div class="form-group d-flex justify-content-center"> 
                                <button type="submit" class="btn btn-block bg-primary btn-lg "> <b> Simpan </b></button>
                            </div>
                        </div> 
                        </div> 

                    </form>
                </div> 
            </div>
        </div>
    </div>

 


</div>
