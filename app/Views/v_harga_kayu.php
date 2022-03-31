
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
              <li class="breadcrumb-item active">Harga Kayu</li>
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
                <h3 class="card-title text-lg"> <b>Data Harga Kayu</b> </h3>
              </div>  
               <!-- /.card-header -->
               <div class="card-body">  

 
               <table id="vharga_kayu" class="table table-bordered table-striped display">
                        <thead>
                        <tr>
                          <th>No</th> 
                          <th>Jenis Kayu</th>
                          <th>Tipe Kayu</th>
                          <th>Ukuran Kayu</th> 
                          <th>Harga Satuan Kayu</th> 
                          <th>Opsi</th> 
                        </tr>
                        </thead>
                        <tbody> 
                        <?php  foreach ($dataHargaKayus as $item):  ?> 
                            <tr>
                              <td></td>
                              <td><?=$item->nama_jenis_kayu?></td>
                              <td><?=$item->nama_tipe_kayu?></td>
                              <td><?=$item->nama_Ukuran_kayu?></td>
                              <td><?=$item->nama_harga_kayu?></td>
                              <td>
                                  <div class="row h-100 justify-content-center align-items-center">
                                      <div class="btn-group"> 

                                                  <a href="<?=base_url("/harga-kayu/".$item->id_harga_kayu  );?>" class="btn btn-success" >
                                                      <i class="fa-solid fa-user-pen py-1 pl-1"></i>
                                                  </a>
                                                  <a href="<?=base_url("/harga-kayu/d/".$item->id_harga_kayu  );?>" class="btn btn-danger btnremove">
                                                      <i class="fa-solid fa-trash-can-arrow-up py-1 px-1"></i>
                                                  </a>  
                                      
                                      </div>
                                  </div>  

                              </td>
                            </tr>
                        <?php endforeach; ?> 

                        

                        </tbody>
                </table>











               </div>
            </div>
        </div>
    </div>

 


</div>
