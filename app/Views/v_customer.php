
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
              <li class="breadcrumb-item active">Customers</li>
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
                <h3 class="card-title text-lg"> <b>Data Customer</b> </h3>
              </div>


 
              
               <!-- /.card-header -->
               <div class="card-body">  
               <table id="vuserlogin" class="table table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>#Customers</th>
                    <th>Nomer Telp/Hp/WA</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                    <th>Opsi</th> 
                  </tr>
                  </thead>
                  <tbody>
                    <?php  foreach ($datacustomers as $item):  ?>


                        <tr>
                            <td></td>
                            <td>[<?=$item->customers?>] <?=$item->nama?></td>
                            <td><b> 
                                    <?php
                                         
                                        $telp11 = '';
                                        $telp12 = '- ';
                                        $telp13 = '- ';
                                        $telp1=explode(" ", $item->telp);  
                                        if (isset($telp1[0]) == 1) { 
                                          $telp11 = $telp1[0];
                                        }
                                        if (isset($telp1[1]) == 1) {
                                          $telp12 = $telp1[1];
                                        }
                                        if (isset($telp1[2]) == 1) {
                                          $telp13 = $telp1[2];
                                        }        
                                        $telp2=explode("-", $telp11.$telp12.$telp13);   
                                        echo $telp2[0].$telp2[1];
                                        echo '<br>';
  
                                        $hp1=explode(" ", $item->hp); 
                                        if (isset($hp1[0]) == 1) { 
                                          $hp11 = $hp1[0];
                                        }
                                        if (isset($hp1[1]) == 1) {
                                          $hp12 = $hp1[1];
                                        }
                                        if (isset($hp1[2]) == 1) {
                                          $hp13 = $hp1[2];
                                        }
                                        $hp2=explode("-", $hp11.$hp12.$hp13);  
                                        echo $hp2[0].$hp2[1].$hp2[2]; 
                                        echo '<br>';

                                        $wa11 = '';
                                        $wa12 = '- ';
                                        $wa13 = '- ';
                                        $wa1=explode(" ", $item->wa); 
                                        if (isset($wa1[0]) == 1) { 
                                          $wa11 = $wa1[0];
                                        }
                                        if (isset($wa1[1]) == 1) {
                                          $wa12 = $wa1[1];
                                        }
                                        if (isset($wa1[2]) == 1) {
                                          $wa13 = $wa1[2];
                                        }
                                        $wa2=explode("-", $wa11.$wa12.$wa13);  
                                        echo $wa2[0].$wa2[1].$wa2[2]; 
                                        echo '<br>'; 
 
                                    ?> 
                            </td>
                            <td>
                                <?= $item->alamat.',<br> '.$item->nama_provinsi.', '.$item->nama_kabupaten.', '.$item->nama_kecamatan.', '.$item->nama_desa.'.'; ?> 
                            </td>
                            <td>
                                <?=$item->created_at?> 
                            </td>
                            <td>
                                    <div class="row h-100 justify-content-center align-items-center">
                                        <div class="btn-group"> 
 
                                                    <a href="<?=base_url("/customers/".$item->id_customers);?>" class="btn btn-success" >
                                                        <i class="fa-solid fa-user-pen py-1 pl-1"></i>
                                                    </a>
                                                    <a href="<?=base_url("/customers/d/".$item->id_customers);?>" class="btn btn-danger btnremove">
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
