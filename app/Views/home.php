 
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
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">  
 
        <div class="card ">  
        <div class="card-body">  




       
          <form method="post" action="<?= base_url(); ?>"> 
          <div class="row" > 
                <div class="col-12 col-sm-12 col-lg-1 mb-1"> 
                    <label for="name" class="form-label mt-1 ">View :</label>  
                </div>
                <div class="col-12 col-sm-12 col-lg-2 mb-3">
                    <select name="getstatus" id="vew_set" class="form-control " >  
                      <option value="1" <?= ($getstatus == 1) ? 'selected' : ''?>  >Bulan</option>
                      <option value="2" <?= ($getstatus == 2) ? 'selected' : ''?>  >Tahun</option>
                    </select>
                </div>
                <div id="chrt_bulan" class="col-12 col-sm-12 col-lg-2 mb-3">
                        <select name="bulan_view" class="form-control " >   
                            <?php 
                                $bulan = [
                                  '1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                                ];
                                foreach ($bulan as $key1 => $value1): ?>
                                <?php ($key1 < 10)? $newkeys = '0'.$key1 : $newkeys = $key1; ?>
                                <option value="<?=$newkeys?>" <?php echo ($newkeys == $getbulan ) ? "selected" : ""?>   ><?=$value1?></option> 
                            <?php endforeach;  ?> 
                        </select> 
                </div>
                <div id="chrt_tahun" class="col-12 col-sm-12 col-lg-2 mb-3">
                       <select name="tahun_view" class="form-control " >   
                            <?php 
                                $jaraktahun = 1990;
                                for ($i=$jaraktahun; $i < date('Y')+1 ; $i++) { 
                            ?>
                                <option value="<?=$i?>" <?php echo ($i == $gettahun) ? "selected" : ""?>   ><?=$i ?></option> 
                            <?php       
                                }
                            ?> 
                        </select>   
                </div>
                <div class="col-12 col-sm-12 col-lg-2 mb-3">
                    <select name="typekayu"  class="form-control " >  
                      <option value="0">Type Kayu</option>
                      <?php foreach ($JenisKayu as $k_Jk => $v_Jk) : ?>  
                          <option value="<?= $v_Jk->id_jenis_kayu ?>" <?= ( $v_Jk->id_jenis_kayu == $typekayu)? 'selected' : '' ?>><?= $v_Jk->nama_jenis_kayu ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-lg-3">
                  <button type="submit"  class="btn btn-danger">
                    <i class="fa-solid fa-box-open"></i> | 
                    Buka
                  </button> 
                </div> 
            </form>
 
                <div class="col-12 col-sm-12 col-lg-12">
                    <br> 
                </div>
                <div class="col-12 col-sm-12 col-lg-3">
                    <div class="info-box bg-dark">
                      <span class="info-box-icon bg-danger"> <i class="fa-solid fa-cart-shopping"></i>  </span>
                      <div class="info-box-content">
                        <span class="info-box-text text-lime"> <b>Product Sold </b> </span>
                        <span class="info-box-number"><?=$productsold?></span>
                        <div class="progress">
                          <div class="progress-bar bg-info" style="width: 70%"></div>
                        </div>
                        <span class="progress-description text-warning">
                          Produk yang dijual.
                        </span>
                      </div>
                    </div>
                        <!-- /.info-box -->
                </div>
              
                <div class="col-12 col-sm-12 col-lg-3">
                  <div class="info-box bg-dark">
                    <span class="info-box-icon bg-success"> <i class="fa-solid fa-money-bill-wave"></i> </span>
                    <div class="info-box-content">
                      <span class="info-box-text text-lime"><b>Net Profit</b> </span>
                      <span class="info-box-number"> <?="Rp " . number_format($getprofit,2,',','.')?></span>
                      <div class="progress">
                        <div class="progress-bar bg-info" style="width: 70%"></div>
                      </div>
                      <span class="progress-description text-warning" >
                        Keuntungan diterima.
                      </span>
                    </div>
                  </div>
                      <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-12 col-lg-3">
                  <div class="info-box bg-dark">
                    <span class="info-box-icon bg-warning"> <i class="fa-solid fa-users"></i> </span>
                    <div class="info-box-content">
                      <span class="info-box-text text-lime"><b> New Costumers</b></span>
                      <span class="info-box-number"><?=$getcountcostumer?></span>
                      <div class="progress">
                        <div class="progress-bar bg-info" style="width: 70%"></div>
                      </div>
                      <span class="progress-description text-warning">
                        Pelanggan Baru.
                      </span>
                    </div>
                  </div>
                      <!-- /.info-box -->
                </div>

                <div class="col-12 col-sm-12 col-lg-3">
                  <div class="info-box bg-dark">
                    <span class="info-box-icon bg-purple"><i class="fa-solid fa-box"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text text-lime"><b> Stock</b></span>
                      <span class="info-box-number"><?=$presenstock?> % Redy</span>
                      <div class="progress">
                        <div class="progress-bar bg-info" style="width: <?php //$presenstock?>%"></div>
                      </div>
                      <span class="progress-description text-warning">
                        Persedian Barang
                      </span>
                    </div>
                  </div>
                      <!-- /.info-box -->
                </div>




                

                <div class="col-12 col-sm-12 col-lg-6">
                  <label for="" class="text-center w-100">Total Penjualan</label>  
                  <div class="card ">  
                      <div class="card-body">   
                        <canvas id="myprdCharwt22" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                  </div> 
                </div>

                <div class="col-12 col-sm-12 col-lg-6">
                  <label for="" class="text-center w-100">Laju Costumers</label>  
                  <div class="card ">  
                      <div class="card-body">   
                        <canvas id="myprdCharwt33" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                  </div> 
                </div>
 

                <?php if ($show_hide == 0) : ?>  

                    <div class="col-12">
                          <hr class="bg-dark">
                          <label for=""> Perbandingan Produk Terjual</label>
          
                          <div class="chart">
                            <canvas id="myprdChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                          </div>
                      
                          <hr class="bg-dark"> 
                    </div>

                <?php endif; ?>
                 


                <div class="col-lg-6">
                  <label for="" class="text-center w-100">Jenis Pemesanan Terlaris</label> <!-- menampilkan urutan pembelian contoh barang A-total transaksi 10.000 -->
                  <div class="card ">  
                    <div class="card-body">  
                    <canvas id="donutChart" style="min-height: 250px; height: 3000px; max-height: 300px; max-width: 100%; "></canvas>  
                    </div>

                    

                  </div>
                </div>

                <div class="col-lg-6">
                  <label for="" class="text-center w-100"> Jenis Pembayaran Terlaris</label> <!-- menampilkan urutan pembelian contoh barang A-total transaksi 10.000 -->
                  <div class="card ">  
                    <div class="card-body">  
                      <canvas id="donutChart2" style="min-height: 250px; height: 3000px; max-height: 300px; max-width: 100%; "></canvas> 
                    </div>
                  </div>
                </div>

 
            </div>
          </div>
        </div> 

      <!-- /.col-md-6 -->
      </div> 
      <!-- /.row --> 
      </div>
      <!-- /.card-body -->
      </div>
      <!-- /.card -->





      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 