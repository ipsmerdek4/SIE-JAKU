
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
              <li class="breadcrumb-item active">Transaksi</li>
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
                <h3 class="card-title text-lg"> <b>Data Transaksi</b> </h3>
              </div>
 



              <style>

                  @media only screen and (max-width:500px) {
                    .footertransaksi{
                      display: none;
                    }
                  }

                  @media only screen and (min-width:768px) {
                    .footertransaksi2{
                      display: none;
                    } 
                  }

              </style>




                <!-- /.card-header -->
                <div class="card-body">  
                    <table id="vtransaksi" class="table table-bordered table-striped display">
                        <thead>
                        <tr>
                          <th>No</th> 
                          <th>Kode Transaksi</th>
                          <th>Jenis, Tipe, dan Ukuran Kayu</th>
                          <th>Jumlah<br>Pembelian</th> 
                          <th>Total<br>Harga</th> 
                          <th>Opsi</th> 
                        </tr>
                        </thead>
                        <tbody> 
                        <?php $no=0; foreach ($datatransaksi as $item): $no++; ?>
                            
                          <tr>
                            <td><?=$no?></td> 
                            <td>#<?=$item->kode_transaksi?></td> 
                            <td>
                            <?=$item->nama_jenis_kayu?>, <?=$item->nama_tipe_kayu?>, <?=$item->nama_Ukuran_kayu?>
                            </td>
                            <td><?=$item->jumlah_pembelian?> </td>
                            <td><?=$item->total_harga?> </td> 
                            <td>
                                      <div class="row h-100 justify-content-center align-items-center">
                                          <div class="btn-group">  
                                                <a href="<?=base_url("/transaksi/".$item->id_transaksi );?>" class="btn btn-success" >
                                                    <i class="fa-solid fa-user-pen py-1 pl-1"></i>
                                                </a>
                                                <a href="<?=base_url("/transaksi/d/".$item->id_transaksi );?>" class="btn btn-danger btnremove">
                                                    <i class="fa-solid fa-trash-can-arrow-up py-1 px-1"></i>
                                                </a>   
                                          </div>
                                      </div>  
                            </td> 
                          </tr>
                          
                        <?php endforeach; ?>  
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th> 
                                <th></th>
                                <th></th>  
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                </table>


               </div>
            </div>
        </div>
    </div>

 


</div>
