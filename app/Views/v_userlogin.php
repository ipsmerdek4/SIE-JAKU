
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
              <li class="breadcrumb-item active">User Login</li>
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
                <h3 class="card-title text-lg"> <b>Data Users Login</b> </h3>
              </div>
               <!-- /.card-header -->
               <div class="card-body">

        

                <table id="vuserlogin" class="table table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Opsi</th> 
                  </tr>
                  </thead>
                  <tbody> 
                      <?php $no = 1; foreach ($datausers as $item):  
                  ?>

                  <tr>
                    <td>  </td> 
                    <td >
                        <?= $item->name; ?>  
                    </td>
                    <td> 
                        <?= $item->username; ?>  
                    </td>
                    <td> 
                        <?= $item->created_at; ?>  
                    </td>
                    <td>
                         <div class="row h-100 justify-content-center align-items-center">
                            <div class="btn-group"> 

                              <?php if ($item->username != 'admin') { ?>
                                          <a href="<?=base_url("/userlogin/".$item->username);?>" class="btn btn-success" >
                                            <i class="fa-solid fa-user-pen py-1 pl-1"></i>
                                          </a>
                                          <a href="<?=base_url("/userlogin/d/".$item->username);?>" class="btn btn-danger btnremove">
                                            <i class="fa-solid fa-trash-can-arrow-up py-1 px-1"></i>
                                          </a> 
                                    
                              <?php }else{ ?>

                                           <button class="btn btn-success" disabled>
                                            <i class="fa-solid fa-user-pen py-1 pl-1"></i>
                                          </button>
                                          <button class="btn btn-danger" disabled>
                                            <i class="fa-solid fa-trash-can-arrow-up py-1 px-1"></i>
                                          </button> 

                              <?php } ?>

                              
                            </div>
                        </div>
                      </td>
                  </tr>

                      <?php endforeach; ?>


                  </tbody>
                </table>
                </div>
              <!-- /.card-body -->



            </div>

        </div>
    </div>
</div>
