 
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

        
        <label for="">Dalam Bulan : Januari - Maret 2022</label>
        <div class="row" >

          <div class="col-12 col-sm-12 col-lg-3">
              <div class="info-box bg-dark">
                <span class="info-box-icon bg-danger"> <i class="fa-solid fa-cart-shopping"></i>  </span>
                <div class="info-box-content">
                  <span class="info-box-text text-lime"> <b>Product Sold </b> </span>
                  <span class="info-box-number">41,410</span>
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
              <span class="info-box-icon bg-success"> <i class="fa-solid fa-dollar-sign"></i> </span>
              <div class="info-box-content">
                <span class="info-box-text text-lime"><b>Net Profit</b> </span>
                <span class="info-box-number"> 1.000.000.000,-</span>
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
                <span class="info-box-number">41,410 </span>
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
                <span class="info-box-number">80 % Redy</span>
                <div class="progress">
                  <div class="progress-bar bg-info" style="width: 70%"></div>
                </div>
                <span class="progress-description text-warning">
                  Persedian Barang
                </span>
              </div>
            </div>
                <!-- /.info-box -->
          </div>

          <div class="col-12">
          <hr class="bg-dark">
          <label for=""> Perbandingan procuk Terjual</label>
 
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
             
                <hr class="bg-dark">


          </div>

          <div class="col-lg-6">
            <label for="" class="text-center w-100">Penjualan Terlaris</label> <!-- menampilkan urutan pembelian contoh barang A-total transaksi 10.000 -->
            <div class="card ">  
              <div class="card-body">  
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> 
              </div>
            </div>
          </div>


          <!-- /.col-md-6 -->
          <div class="col-lg-6"> 
          <label for="" class="text-center w-100">Barang Terlaris</label> <!-- menampilkan urutan barang paling bayak di -->
            <div class="card ">  
              <div class="card-body">  
                <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> 
              </div>
            </div>
          </div>
          
        <div class="col-lg-6">
          <label for="" class="text-center w-100">Total Penjualan</label> <!-- menampilkan urutan pembelian contoh barang A-total transaksi 10.000 -->
          <div class="card ">  
            <div class="card-body">  
                <div id="bar-chart" style="height: 300px;"></div>
            </div>
          </div>
        </div> 


        <div class="col-lg-6">
          <label for="" class="text-center w-100">Ikhtisar Pesanan</label> <!-- menampilkan urutan pembelian contoh barang A-total transaksi 10.000 -->
          <div class="card ">  
            <div class="card-body">  
              <div >
                <h2 style="margin: 0 0 -10px 0"><b> 1.000</b></h2>
                <small>Total Penjualan</small>
              </div>
              
              <div class="mt-3">
                <h5 for=""><b> 100 Barang</b></h5>
                <div class="" > 
                  <p class="float-left">Online order</p> 
                  <p class="float-right">100%</p> 
                </div> 
                <div class="progress  border-danger " style="clear:both;  ">
                  <div class="progress-bar bg-primary progress-bar-striped" role="progressbar"
                      aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">  
                  </div>
                </div>
              </div>
              <div class="mt-2">
                <h5 for=""><b> 100 Barang</b></h5>
                <div class="" > 
                  <p class="float-left">Offline order</p> 
                  <p class="float-right">100%</p> 
                </div> 
                <div class="progress  border-danger " style="clear:both;  ">
                  <div class="progress-bar bg-danger progress-bar-striped" role="progressbar"
                      aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">  
                  </div>
                </div>
              </div>
              <div class="mt-2">
                <h5 for=""><b> 100 Barang</b></h5>
                <div class="" > 
                  <p class="float-left">Cash on Delivery</p> 
                  <p class="float-right">100%</p> 
                </div> 
                <div class="progress  border-danger " style="clear:both;  ">
                  <div class="progress-bar bg-warning progress-bar-striped" role="progressbar"
                      aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">  
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

 