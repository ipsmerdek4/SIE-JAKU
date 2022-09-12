

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="<?=base_url()?>">SIE-JAKU</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>


<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

 

<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script> 
 
 <script src="../../dist/js/sweetalert2/package/dist/sweetalert2.all.min.js"></script>


            

  <?php   
      $btsjv = ''; 


      if ($batascss == 'c1') {
        $btsjv = ' 
          <!-- DataTables  & Plugins -->
          <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
          <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
          <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
          <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
          <script src="../../plugins/jszip/jszip.min.js"></script>
          <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
          <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
        ';
      ?>

        <script>
            $(document).ready(function() {
                    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn'; 
                    var table =$('#vuserlogin').DataTable( { 
                        buttons: [
                            {
                              text:      '<i class="fa-solid fa-user-plus"></i>  <b>| Tambah Data</b>', 
                              className: ' btn-primary',
                              action:     function ( e, dt, node, config ) {
                                            window.location.href = '/userlogin/useradd';
                                          }
                            }
                        ],
                        order: [[3, "asc" ]],
                        responsive: true, 
                        lengthChange: false, 
                        autoWidth: false,  


                    } );
                    table.on( 'order.dt search.dt', function () {
                      table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        } );
                    } ).draw();
                    table.buttons().container().appendTo("#vuserlogin_wrapper .col-md-6:eq(0)"); 

                      /*  */

                    <?php if(session()->has("alert")) { ?>
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: '<?= session("alert") ?>',
                            showConfirmButton: false,
                            timer: 2500 
                            })
                    <?php } ?> 

                      /*  */ 
            } );

              
 

              
              $('.btnremove').on('click', function (e)
              {
                  e.preventDefault();
                  const href = $(this).attr('href');

                    Swal.fire({
                          title: 'Apakah anda yakin?', 
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                      if (result.value) {
                          document.location.href = href; 
                      }
                    })  
              });









        </script>
        
      <?php
      }elseif ($batascss == 'c2') {
        $btsjv = ' 
                <!-- Bootstrap Switch -->
                <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> 

        '; 
      ?>  
         
        <script>
          $(function () { 
            $("#grbuserspas").hide();   
            $('.pass-check').on('switchChange.bootstrapSwitch', function(event, state) {
                if (state)
                { //true
                  $("#grbuserspas").show();   
                }else
                { //false
                  $("#grbuserspas").hide();  
                }
            });


            $("input[data-bootstrap-switch]").each(function(){
              $(this).bootstrapSwitch('state', $(this).prop('checked')); 
            })

          }) 
        </script> 

      <?php  
      }elseif ($batascss == 'chome') {
        
        $btsjv = ' 
                <!-- ChartJS -->
                <script src="../../plugins/chart.js/Chart.min.js"></script>
                <!-- FLOT CHARTS -->
                <script src="../../plugins/flot/jquery.flot.js"></script>
                <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
                <script src="../../plugins/flot/plugins/jquery.flot.resize.js"></script>
                <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
                <script src="../../plugins/flot/plugins/jquery.flot.pie.js"></script>
        ';
      
 
      ?>
 


        <script> 
                $(document).ready(function () {      
                  
                      $('#chrt_tahun').show();
                      $('#chrt_bulan').show();
                });

                $("#vew_set").change(function (){
                    var values = $(this).val(); 
                    if (values == 1) {
                      $('#chrt_tahun').show();
                      $('#chrt_bulan').show();
                    } else if(values == 2) {
                      $('#chrt_tahun').show();
                      $('#chrt_bulan').hide();
                      
                    }
                }) 


    $(function () { 
                /*  */
                var barChartOptions = {
                        responsive              : true,
                        maintainAspectRatio     : false,
                        datasetFill             : false,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    userCallback: function(label, index, labels) {
                                        // when the floored value is the same as the value we have a whole number
                                        if (Math.floor(label) === label) {
                                            return label;
                                        }

                                    },
                                }
                            }],
                        },
                }; 
                var ctx = document.getElementById('myprdChart').getContext('2d');
                var chart = new Chart(ctx, {
                      // The type of chart we want to create
                      type: 'bar',
                      // The data for our dataset 
                      data: { 
                          labels: [  
                                      <?php
                                          if($getstatus == 1) :  
                                            echo '"'.$getbulan.'-'.$gettahun.'"';
                                          elseif($getstatus == 2): 
                                            echo '"'.$gettahun.'"'; 
                                          endif;  
                                      ?> 
                                  ],
                            datasets: [  
                                        <?php  $keys = 0; foreach ($chart_PPT as $K_PPT => $V_PPT) : $keys++;?> 
                                                <?php if ( $keys % 2 == 0 ) : ?>  
                                                      {
                                                        label :'<?=$V_PPT['nama_jenis_kayu']?>',
                                                        backgroundColor     : 'rgb(189,183,107)', 
                                                        pointRadius : false,  
                                                        borderColor: ['rgb(60, 179, 113)'],
                                                        data: ["<?=$V_PPT['hasil_ttl']?>"]
                                                      }, 
                                                <?php elseif ( $keys % 3 == 0 ) :?> 
                                                
                                                      {
                                                        label :'<?=$V_PPT['nama_jenis_kayu']?>',
                                                        backgroundColor     : 'rgb(255,218,185)', 
                                                        pointRadius : false,  
                                                        borderColor: ['rgb(60, 179, 113)'],
                                                        data: ["<?=$V_PPT['hasil_ttl']?>"]
                                                      }, 

                                                <?php else :?> 
                                                
                                                      {
                                                        label :'<?=$V_PPT['nama_jenis_kayu']?>',
                                                        backgroundColor     : 'rgb(255,218,185)', 
                                                        pointRadius : false,  
                                                        borderColor: ['rgb(60, 179, 113)'],
                                                        data: ["<?=$V_PPT['hasil_ttl']?>"]
                                                      }, 
                                                  
                                                <?php endif;?>  
                                        <?php endforeach; ?> 
                                      ]
                      },
                      // Configuration options go here
                      options: barChartOptions,
                  
                  
                });


           


                   //-------------
                    //- DONUT CHART -
                   //-------------
                    // Get context with jQuery - using jQuery's .get() method.
                  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                  var donutData        = {
                                            labels: [ 
                                                  <?php foreach ($chart_JPT as $k_JPT => $v_JPT) : ?> 
                                                      '<?=$v_JPT['nama_JPT']?>', 
                                                  <?php endforeach; ?>
                                              ],
                                            datasets: [
                                              {
                                                  data: [ 
                                                    <?php foreach ($chart_JPT as $k_JPT => $v_JPT) : ?> 
                                                        '<?=$v_JPT['count_JPT']?>', 
                                                    <?php endforeach; ?>
                                                   ],
                                                  backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                                              }
                                            ]
                                          }
                  var donutOptions     = {
                      maintainAspectRatio : false,
                      responsive : true,
                  }
                  //Create pie or douhnut chart
                  // You can switch between pie and douhnut using the method below.
                  new Chart(donutChartCanvas, {
                      type: 'doughnut',
                      data: donutData,
                      options: donutOptions
                  })



                  //-------------
                  //- DONUT CHART - 2
                  //-------------
                  // Get context with jQuery - using jQuery's .get() method.
                  var donutChartCanvas = $('#donutChart2').get(0).getContext('2d')
                  var donutData        = {
                                            labels: [
                                                  <?php foreach ($chart_JPYT as $k_JPYT => $v_JPYT) : ?> 
                                                      '<?=$v_JPYT['nama_JPYT']?>', 
                                                  <?php endforeach; ?>
                                              ],
                                            datasets: [
                                              {
                                                  data: [
                                                    <?php foreach ($chart_JPYT as $k_JPYT => $v_JPYT) : ?> 
                                                        '<?=$v_JPYT['count_JPYT']?>', 
                                                    <?php endforeach; ?>
                                                  ],
                                                  backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                                              }
                                            ]
                                          }
                  var donutOptions     = {
                      maintainAspectRatio : false,
                      responsive : true,
                  }
                  //Create pie or douhnut chart
                  // You can switch between pie and douhnut using the method below.
                  new Chart(donutChartCanvas, {
                      type: 'doughnut',
                      data: donutData,
                      options: donutOptions
                  })





                  /* CHART 3 */
                  var barChartOptions2 = {
                  responsive              : true,
                  maintainAspectRatio     : false,
                  datasetFill             : false,
                  scales: {
                    yAxes: [{
                      ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                          if(parseInt(value) >= 1000){
                            return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                          } else {
                            return 'Rp ' + value;
                          }
                        }
                      }
                    }]
                  },
                    tooltips: {
                                callbacks: {
                                    label: function(tooltipItem, data) {
                                        return "Rp " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                                            return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                                        });
                                    }
                                }
                            },
                    legend: {
                        display: false,
                          onClick: null
                      }







                  };
 
                  var ctx2 = document.getElementById('myprdCharwt22').getContext('2d');
                  var chart2 = new Chart(ctx2, { 
                          type: 'bar', 
                          data: { 
                              labels: [    
                                    <?php foreach ($chart_TP as $k_TP => $v_TP) : ?> 
                                        '<?=$v_TP['date_TP']?>', 
                                    <?php endforeach; ?> 
                              ],
                              datasets: [{
                                  label: 'Penjualan Perbulan',
                                  data: [ 
                                          <?php foreach ($chart_TP as $k_TP => $v_TP) : ?> 
                                              '<?=$v_TP['total_harga']?>', 
                                          <?php endforeach; ?> 
                                        ],
                                  backgroundColor: [
                                      'rgba(75, 192, 192, 0.2)','rgba(255, 99, 132, 0.2)','rgba(255, 99, 132, 0.2)',
                                  ],
                                  borderColor: [
                                      'rgba(75, 192, 192, 1)',
                                  ],
                                  borderWidth: 1
                              }]
                          },
                          // Configuration options go here
                          options: barChartOptions2, 
                  });

 

                var barChartOptions3 = {
                    responsive              : true,
                    maintainAspectRatio     : false,
                    datasetFill             : false, 
                    scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    userCallback: function(label, index, labels) {
                                        // when the floored value is the same as the value we have a whole number
                                        if (Math.floor(label) === label) {
                                            return label;
                                        }

                                    },
                                }
                            }],
                        },
                }; 

                  var ctx3 = document.getElementById('myprdCharwt33').getContext('2d');
                  var chart3 = new Chart(ctx3, { 
                          type: 'bar', 
                          data: { 
                              labels: [ 
                                          <?php foreach ($chart_CCC as $v_CCC) : ?> 
                                              '<?=$v_CCC['date_cc']?>', 
                                          <?php endforeach; ?>  
                              ],
                              datasets: [{
                                  label: 'Total Costumers',
                                  data: [ 
                                          <?php foreach ($chart_CCC as $v_CCC) : ?> 
                                              '<?=$v_CCC['total_cc']?>', 
                                          <?php endforeach; ?> 
                                  ],
                                  backgroundColor: [
                                      'rgba(243, 39, 144, 0.38)',
                                  ],
                                  borderColor: [
                                      'rgba(243, 39, 144, 0.8)',
                                  ],
                                  borderWidth: 1
                              }]
                          },
                          // Configuration options go here
                          options: barChartOptions3, 
                  });



          });




 

                


        </script>


      <?php  
      }elseif ($batascss == 'c3') {
        $btsjv = '
            <!-- Select2 -->
            <script src="../../plugins/select2/js/select2.full.min.js"></script> 
            <!-- InputMask -->
            <script src="../../plugins/moment/moment.min.js"></script>
            <script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
        ';
      ?>


        <script>
          $(document).ready(function(){
 
             //Initialize Select2 Elements
              $('.select2').select2() 

              
              //Money Euro
              $('[data-mask]').inputmask()


          });
        </script>
 

      <?php 
      }elseif ($batascss == 'c3a') {
        $btsjv = '
          <!-- DataTables  & Plugins -->
          <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
          <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
          <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
          <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
          <script src="../../plugins/jszip/jszip.min.js"></script>
          <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
          <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
      '; 
      ?>

        <script>
              $(document).ready(function() {

                    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn'; 
                    var table =$('#vuserlogin').DataTable( { 
                        buttons: [
                            {
                              text:      '<i class="fa-solid fa-user-plus"></i>  <b>| Tambah Data</b>', 
                              className: ' btn-primary',
                              action:     function ( e, dt, node, config ) {
                                            window.location.href = '/customers/add';
                                          }
                            }
                        ],
                        order: [[3, "asc" ]],
                        responsive: true, 
                        lengthChange: false, 
                        autoWidth: false,  


                    } );
                    table.on( 'order.dt search.dt', function () {
                      table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        } );
                    } ).draw();
                    table.buttons().container().appendTo("#vuserlogin_wrapper .col-md-6:eq(0)"); 

                    /*  */

                    <?php if(session()->has("alert")) { ?>
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: '<?= session("alert") ?>',
                            showConfirmButton: false,
                            timer: 2500 
                            })
                    <?php } ?> 

                    /*  */
              } );
 
                    /*  */  
              $('.btnremove').on('click', function (e)
              {
                  e.preventDefault();
                  const href = $(this).attr('href');

                    Swal.fire({
                          title: 'Apakah anda yakin?', 
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                      if (result.value) {
                          document.location.href = href; 
                      }
                    })  
              });
 
        </script>

 
      <?php  
      }elseif ($batascss == 'c4a') {
        $btsjv = '
          <!-- DataTables  & Plugins -->
          <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
          <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
          <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
          <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
          <script src="../../plugins/jszip/jszip.min.js"></script>
          <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
          <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
      '; 
      ?>

    <script>
            $(document).ready(function() {

                $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn'; 
                var table =$('#vjenis_kayu').DataTable( { 
                    buttons: [
                        {
                          text:      '<i class="fa-solid fa-user-plus"></i>  <b>| Tambah Data</b>', 
                          className: ' btn-primary',
                          action:     function ( e, dt, node, config ) {
                                        window.location.href = '/jenis-kayu/add';
                                      }
                        }
                    ],
                    order: [[1, "asc" ]],
                    responsive: true, 
                    lengthChange: false, 
                    autoWidth: false,   
                } );
                table.on( 'order.dt search.dt', function () {
                  table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
                table.buttons().container().appendTo("#vjenis_kayu_wrapper .col-md-6:eq(0)"); 

                    /*  */

                    <?php if(session()->has("alert")) { ?>
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            text: '<?= session("alert") ?>',
                            showConfirmButton: false,
                            timer: 2500 
                            })
                    <?php } ?> 

                    /*  */



            } );


          
              $('.btnremove').on('click', function (e)
              {
                  e.preventDefault();
                  const href = $(this).attr('href');

                    Swal.fire({
                          title: 'Apakah anda yakin?', 
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                      if (result.value) {
                          document.location.href = href; 
                      }
                    })  
              });


    </script>



      <?php  
      }elseif ($batascss == 'c4b') {
        $btsjv = '
          <!-- Select2 -->
            <script src="../../plugins/select2/js/select2.full.min.js"></script> 
          <!-- DataTables  & Plugins -->
          <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
          <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
          <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
          <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
          <script src="../../plugins/jszip/jszip.min.js"></script>
          <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
          <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
          <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
      '; 
      ?>

          <script>
                  $(document).ready(function() {
        
                      //Initialize Select2 Elements
                      $('.select2').select2() 

                      /*  */
                      $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn'; 
                      var table =$('#vtipe_kayu').DataTable( { 
                          buttons: [
                              {
                                text:      '<i class="fa-solid fa-user-plus"></i>  <b>| Tambah Data</b>', 
                                className: ' btn-primary',
                                action:     function ( e, dt, node, config ) {
                                              window.location.href = '/tipe-kayu/add';
                                            }
                              }
                          ],
                          order: [[3, "asc" ]],
                          responsive: true, 
                          lengthChange: false, 
                          autoWidth: false,   
                      } );
                      table.on( 'order.dt search.dt', function () {
                        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                              cell.innerHTML = i+1;
                          } );
                      } ).draw();
                      table.buttons().container().appendTo("#vtipe_kayu_wrapper .col-md-6:eq(0)"); 

                      /* START alert */

                      <?php if(session()->has("alert")) { ?>
                          Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              text: '<?= session("alert") ?>',
                              showConfirmButton: false,
                              timer: 2500 
                              })
                      <?php } ?> 

                      /* END ALERT */



                  } );


                
                    $('.btnremove').on('click', function (e)
                    {
                        e.preventDefault();
                        const href = $(this).attr('href');

                          Swal.fire({
                                title: 'Apakah anda yakin?', 
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, Hapus!'
                          }).then((result) => {
                            if (result.value) {
                                document.location.href = href; 
                            }
                          })  
                    });


          </script>
      <?php  
      }elseif ($batascss == 'c4c') {
        $btsjv = '
            <!-- Select2 -->
            <script src="../../plugins/select2/js/select2.full.min.js"></script> 
            <!-- DataTables  & Plugins -->
            <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
            <script src="../../plugins/jszip/jszip.min.js"></script>
            <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
            <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
        

        '; 
      ?>
            <script>
                  $(document).ready(function() {
        
                      //Initialize Select2 Elements
                      $('.select2').select2() 

                      $("#j_kayu").change(function (){ 
                        var url = "<?php echo site_url('/ukuran-kayu/g-tipe-kayu');?>/"+$(this).val();
                        $('#t_kayu').load(url);
                        return false; 
                      })



                      /*  */
                      $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn'; 
                      var table =$('#vukuran_kayu').DataTable( { 
                          buttons: [
                              {
                                text:      '<i class="fa-solid fa-user-plus"></i>  <b>| Tambah Data</b>', 
                                className: ' btn-primary',
                                action:     function ( e, dt, node, config ) {
                                              window.location.href = '/ukuran-kayu/add';
                                            }
                              }
                          ],
                          order: [[3, "asc" ]],
                          responsive: true, 
                          lengthChange: false, 
                          autoWidth: false,   
                      } );
                      table.on( 'order.dt search.dt', function () {
                        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                              cell.innerHTML = i+1;
                          } );
                      } ).draw();
                      table.buttons().container().appendTo("#vukuran_kayu_wrapper .col-md-6:eq(0)"); 

                      /* START alert */

                      <?php if(session()->has("alert")) { ?>
                          Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              text: '<?= session("alert") ?>',
                              showConfirmButton: false,
                              timer: 2500 
                              })
                      <?php } ?> 

                      /* END ALERT */






                  } );


                
                    $('.btnremove').on('click', function (e)
                    {
                        e.preventDefault();
                        const href = $(this).attr('href');

                          Swal.fire({
                                title: 'Apakah anda yakin?', 
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, Hapus!'
                          }).then((result) => {
                            if (result.value) {
                                document.location.href = href; 
                            }
                          })  
                    });


          </script>


      <?php 
      }elseif ($batascss == 'c4d') {
        $btsjv = ' 
            <script src="../../plugins/select2/js/select2.full.min.js"></script> 
            <!-- DataTables  & Plugins -->
            <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
            <script src="../../plugins/jszip/jszip.min.js"></script>
            <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
            <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
        

        ';
      ?>
      
          <script> 
                  function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))

                    return false;
                    return true;
                  }



                 
 
                  
                  $(document).ready(function() {
         

                    
                      const rupiah = (number)=>{
                        return new Intl.NumberFormat("id-ID", {
                          style: "currency",
                          currency: "IDR"
                        }).format(number);
                      }
      
                      //Initialize Select2 Elements
                      $('.select2').select2() 

     
                      $("#j_kayu").change(function (){ 
                        var url = "<?php echo site_url('/harga-kayu/g-tipe-kayu');?>/"+$(this).val();
                        $('#t_kayu').load(url);
                        return false; 
                      })

                      $("#t_kayu").change(function (){ 
                        var url = "<?php echo site_url('/harga-kayu/g-ukuran-kayu');?>/"+$(this).val();
                        $('#ukayu').load(url);
                        return false; 
                      })


 
                      /*  */
                      $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn'; 
                      var table =$('#vharga_kayu').DataTable( { 
                          buttons: [
                              {
                                text:      '<i class="fa-solid fa-user-plus"></i>  <b>| Tambah Data</b>', 
                                className: ' btn-primary',
                                action:     function ( e, dt, node, config ) {
                                              window.location.href = '/harga-kayu/add';
                                            }
                              }
                          ],
                          order: [[3, "asc" ]],
                          responsive: true, 
                          lengthChange: false, 
                          autoWidth: false,  
                          columnDefs : [     
                                      {
                                          targets: 0,
                                          className: ' text-sm-center', 
                                      }, 
                                      {
                                          targets: 5,
                                          className: ' text-sm-center',
                                          render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp ' ),
                                      },
                                      {
                                          targets: 4,
                                          className: ' text-sm-center',
                                          render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp ' ),
                                      },
                                    ] 
                      } );
                      table.on( 'order.dt search.dt', function () {
                        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                              cell.innerHTML = i+1;
                          } );
                      } ).draw();
                      table.buttons().container().appendTo("#vharga_kayu_wrapper .col-md-6:eq(0)"); 

                      /* START alert */

                      <?php if(session()->has("alert")) { ?>
                          Swal.fire({
                              position: 'top-end',
                              icon: 'success',
                              text: '<?= session("alert") ?>',
                              showConfirmButton: false,
                              timer: 2500 
                              })
                      <?php } ?> 

                      /* END ALERT */


 
                  } );
 

                
                    $('.btnremove').on('click', function (e)
                    {
                        e.preventDefault();
                        const href = $(this).attr('href');

                          Swal.fire({
                                title: 'Apakah anda yakin?', 
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, Hapus!'
                          }).then((result) => {
                            if (result.value) {
                                document.location.href = href; 
                            }
                          })  
                    });





          </script>


      <?php 
      }elseif ($batascss == 'c4persediaan') {
        $btsjv = '
            <!-- Select2 -->
            <script src="../../plugins/select2/js/select2.full.min.js"></script> 
            <!-- DataTables  & Plugins -->
            <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
            <script src="../../plugins/jszip/jszip.min.js"></script>
            <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
            <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
        

        '; 
      ?>
         
        <script>


                function hanyaAngka(evt) {
                  var charCode = (evt.which) ? evt.which : event.keyCode
                  if (charCode > 31 && (charCode < 48 || charCode > 57))

                  return false;
                  return true;
                }
                $(document).ready(function() {

                  //Initialize Select2 Elements
                    $('.select2').select2() 

                    $("#j_kayu").change(function (){ 
                      var url = "<?php echo site_url('/persediaan-kayu/g-tipe-kayu');?>/"+$(this).val();
                      $('#t_kayu').load(url);
                      return false; 
                    })

                    $("#t_kayu").change(function (){ 
                      var url = "<?php echo site_url('/persediaan-kayu/g-ukuran-kayu');?>/"+$(this).val();
                      $('#ukayu').load(url);
                      return false; 
                    })

                    $("#ukayu").change(function (){ 
                      var url = "<?php echo site_url('/persediaan-kayu/g-harga-kayu');?>/"+$(this).val();
                      $('#harga_k').load(url);
                      return false; 
                    })





                    $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn'; 
                    var table =$('#vpersediaan').DataTable( { 
                        buttons: [
                            {
                              text:      '<i class="fa-solid fa-user-plus"></i>  <b>| Tambah Data</b>', 
                              className: ' btn-primary',
                              action:     function ( e, dt, node, config ) {
                                            window.location.href = '/persediaan-kayu/add';
                                          }
                            }
                        ],
                        order: [[1, "asc" ]],
                        responsive: true, 
                        lengthChange: false, 
                        autoWidth: false,   
                    } );
                    table.on( 'order.dt search.dt', function () {
                      table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        } );
                    } ).draw();
                    table.buttons().container().appendTo("#vpersediaan_wrapper .col-md-6:eq(0)"); 

                        /*  */

                        <?php if(session()->has("alert")) { ?>
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: '<?= session("alert") ?>',
                                showConfirmButton: false,
                                timer: 2500 
                                })
                        <?php } ?> 

                        /*  */



                } );


              
                  $('.btnremove').on('click', function (e)
                  {
                      e.preventDefault();
                      const href = $(this).attr('href');

                        Swal.fire({
                              title: 'Yakin Menghapus Data ini?', 
                              html: '<hr class="mt-1 border-danger"><b>Menghapus Persediaan akan<br>mempengaruhi Data Transaksi.</b>',
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Ya, Hapus!'
                        }).then((result) => {
                          if (result.value) {
                              document.location.href = href; 
                          }
                        })  
                  });


        </script>


         


      <?php  
      }elseif ($batascss == 'c5') {
        $btsjv = '
            <!-- Select2 -->
            <!--script src="../../plugins/select2/js/select2.full.min.js"></script--> 
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

            
            <!-- DataTables  & Plugins -->
            <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
            <script src="../../plugins/jszip/jszip.min.js"></script>
            <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
            <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
            <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
        

        ';  
      ?>

          
          <script type="text/javascript">
                  /* 
                  window.setTimeout("waktu()",1000);  
                  function waktu() {   
                    var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
                        namabulan = namabulan.split(" ");
                    var tanggal = new Date();  
                    setTimeout("waktu()",1000);   
                    document.getElementById("jam").value = tanggal.getDate()+"-"+namabulan[tanggal.getMonth()]+"-"+tanggal.getFullYear()+" "+tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
                  } */
 
 
                  $(document).ready(function() {  

                      
 
                        const rupiah = (number)=>{
                          return new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR"
                          }).format(number);
                        }
        
            
                        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn'; 
                        var table =$('#vtransaksi').DataTable( { 


                          

                          footerCallback : function ( row, data, start, end, display ) {
                                var api = this.api();
                    
                                // Remove the formatting to get integer data for summation
                                var intVal = function ( i ) {
                                    return typeof i === 'string' ?
                                        i.replace(/[\$,]/g, ' ')*1 :
                                        typeof i === 'number' ?
                                            i : 0;
                                };
                    
                                // Total over all pages
                                total = api
                                    .column( 6 )
                                    .data()
                                    .reduce( function (a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0 );
                    
                                // Total over this page
                                pageTotal = api
                                    .column( 6, { page: 'current'} )
                                    .data()
                                    .reduce( function (a, b) {
                                        return intVal(a) + intVal(b);
                                    }, 0 );
                    

                                if ($(window).width() >= 1000 ) {
                                    // Update footer
                                    $( api.column( 5 ).footer() ).html( 
                                          'Total :' 
                                    );
                                    // Update footer
                                    $( api.column( 6 ).footer() ).html( 
                                        ' '+  rupiah(pageTotal)  +'<hr class="my-1">('+ rupiah(total) +' total)' 
                                    );
                                }else if($(window).width() >= 285 ){
                                    // Update footer
                                    $( api.column( 0 ).footer() ).html( 
                                          'Total :' 
                                    );
                                      // Update footer
                                      $( api.column( 1 ).footer() ).html( 
                                      ' '+  rupiah(pageTotal)  +'<hr class="my-1">('+ rupiah(total) +' total)' 
                                    );
                                }else{  
                                    // Update footer
                                    $( api.column( 0 ).footer() ).html( 
                                      ' '+  rupiah(pageTotal)  +'<hr class="my-1">('+ rupiah(total) +' total)' 
                                    );

                                }

                            },
                            buttons: [
                                {
                                  text:      '<i class="fa-solid fa-user-plus"></i>  <b>| Tambah Data</b>', 
                                  className: ' btn-primary',
                                  action:     function ( e, dt, node, config ) {
                                                window.location.href = '/transaksi/add';
                                              },
                                              
                                }, 
                                {
                                    text: '<i class="fa-solid fa-print"></i> <b>| Cetak</b>',
                                    className: ' btn-danger ml-3', 
                                    action:     function ( e, dt, node, config ) {
                                                var value = $('.dataTables_filter input').val(); 
                                                if (value == false) {
                                                      window.open('/transaksi/view/semua', '_blank'); 
                                                } else {
                                                      window.open('/transaksi/view/'+ value, '_blank');   
                                                }
                                              },  
                                }  /*
                                {
                                    extend: 'print',
                                    text: '<i class="fa-solid fa-print"></i> <b>| Cetak</b>',
                                    className: ' btn-danger ml-3', 
                                    footer: true,  
                                }  */
                            ],
                            
                            //order: [[1, "asc" ]],
                            responsive: true, 
                            lengthChange: true, 
                            autoWidth: false,   
                            columnDefs : [     
                                          {
                                              targets: 0,
                                              className: ' text-sm-center', 
                                          },
                                          {
                                              targets: 5,
                                              className: ' text-sm-center', 
                                          },
                                          {
                                              targets: 6,
                                              className: ' text-sm-center',
                                              render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp ' ),
                                          },
                                        ]

                        } ); 
                        table.on( 'order.dt search.dt', function () {
                          table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                cell.innerHTML = i+1;
                            } );
                        } ).draw();  

                        table.buttons().container().appendTo("#vtransaksi_wrapper .col-md-6:eq(0)"); 
 
                        /*  */

                        <?php if(session()->has("alert")) { ?>
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                text: '<?= session("alert") ?>',
                                showConfirmButton: false,
                                timer: 2500 
                                })
                        <?php } ?> 

                        /*  */
 

                  } );



                $('.btnremove').on('click', function (e)
                {
                    e.preventDefault();
                    const href = $(this).attr('href');

                      Swal.fire({
                            title: 'Apakah anda yakin?', 
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Hapus!'
                      }).then((result) => {
                        if (result.value) {
                            document.location.href = href; 
                        }
                      })  
                });
 
 
          </script>

      
      <?php  
      }elseif ($batascss == 'c5s') {
        $btsjv = '
                    <!-- Select2 -->
                    <script src="../../plugins/select2/js/select2.full.min.js"></script> 
                    <!-- DataTables  & Plugins -->
                    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
                    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
                    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
                    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
                    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
                    <script src="../../plugins/jszip/jszip.min.js"></script>
                    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
                    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
                    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
                    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
                    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>  
                
                ';  
      ?>
          <script>

              $(document).ready(function () { 
 

                      $(".j_kayu").change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-tipe-kayu');?>/"+$(this).val();
                        $('.t_kayu').load(url);
                        return false; 
                      })

                      $("#t_kayu").change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-ukuran-kayu');?>/"+$(this).val();
                        $('#u_kayu').load(url);
                        return false; 
                      })
 
                      $("#u_kayu").change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-persediaan-kayu');?>/"+$(this).val();
                        $('#persediaan').load(url);
                        return false; 
                      })

                      $("#persediaan").change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-jmlp-kayu');?>/"+$(this).val();
                        $('#j_pem').load(url);
                        return false; 
                      })
 
                      $("#j_pem").change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-gharga-kayu');?>/"+$(this).val();
                        $('#get_harga').load(url);
                        return false; 
                      })

              });
            

              $('.v_form').on('click', '.remove_transaksi', function(e) {
                  e.preventDefault(); 
                  $(this).parent().remove();
              });

              $(document).on('click', '#multiple_create_transaksi', function() {

              // $('#multiple_create_transaksi').on('click', function () {   
                      let number = $('.numb').val();
 
                      let hasil = (parseInt(number) + parseInt(1));  
                      $('.numb').val(hasil);

                      getform(hasil);
 

                      //  new_selec2 = $('.ambilin').first().clone();
                      // $('.v_form').append( new_selec2 ); 
                      // $('.v_form').append( '<button id="ermv" type="button" class="btn btn-sm btn-danger remove_transaksi mx-auto" >Hapus Transaksi</button>' ); 
                     

                      $(".j_kayu" + hasil).change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-tipe-kayu');?>/"+$(this).val();
                        $('.t_kayu' + hasil).load(url);
                        return false; 
                      })

                      $(".t_kayu" + hasil).change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-ukuran-kayu');?>/"+$(this).val();
                        $('.u_kayu' + hasil).load(url);
                        return false; 
                      })
 
                      $(".u_kayu" + hasil).change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-persediaan-kayu');?>/"+$(this).val();
                        $('.persediaan' + hasil).load(url);
                        return false; 
                      })

                      $(".persediaan" + hasil).change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-jmlp-kayu');?>/"+$(this).val();
                        $('.j_pem' + hasil).load(url);
                        return false; 
                      })
 
                      $(".j_pem" + hasil).change(function (){ 
                        var url = "<?php echo site_url('/transaksi/g-gharga-kayu');?>/"+$(this).val();
                        $('.get_harga' + hasil).load(url);
                        return false; 
                      })


                
              });

                         
              function getform(hasil)
              { 
 
                  $('.v_form').append('<div class="row"> ' + 
                                    '<div class="col-md-12"> <hr>  </div>' + 
                                    '<div class="col-md-6">' + 

                                      '<div class="form-group">' + 
                                          '<label for="name" class="form-label">Jenis Kayu <span class="badge badge-danger">1</span></label>' + 
                                          '<select name="jkayu[]" id="j_kayu" class="form-control select2 j_kayu' + hasil + ' "  style="width: 100%;"> ' + 
                                              '<option value="">Select Jenis Kayu -</option> ' + 
                                              '<?php  foreach ($dataJenisKayus as $item1): ?>  ' + 
                                                  '<?='<option value="'.$item1->id_jenis_kayu .'">'.$item1->nama_jenis_kayu.'</option>'?> ' + 
                                              '<?php endforeach; ?>  ' + 
                                          '</select> ' + 
                                      '</div>' + 

                                      '<div class="form-group">' + 
                                          '<label for="name" class="form-label">Tipe Kayu <span class="badge badge-danger">2</span></label>' + 
                                          '<select name="t_kayu[]" id="t_kayu" class="form-control select2 select2-primary t_kayu' + hasil + '" data-dropdown-css-class="select2-primary" style="width: 100%;"> ' + 
                                              '<option value="">Select Tipe Kayu -</option> ' + 
                                          '</select> ' + 
                                      '</div>' + 


                                      '<div class="form-group">' + 
                                          '<label for="name" class="form-label">Ukuran Kayu <span class="badge badge-danger">3</span></label>' + 
                                          '<select name="u_kayu[]" id="u_kayu" class="form-control select2 select2-primary u_kayu' + hasil + ' " data-dropdown-css-class="select2-primary" style="width: 100%;"> ' + 
                                              '<option value="">Select Ukuran Kayu -</option> ' + 
                                          '</select> ' + 
                                      '</div>' + 

                                    '</div>' + 
                                    '<div class="col-md-6">  ' + 
                                      '<div class="form-group ">' + 
                                          '<div class="row"> ' + 
                                              '<div class="col-sm-6">' + 
                                                  '<label for="name" class="form-label">Persediaan</label> ' + 
                                                  '<select name="persediaan[]" id="persediaan" class="form-control select2 select2-primary persediaan' + hasil + ' " data-dropdown-css-class="select2-primary" style="width: 100%;"> ' + 
                                                      '<option value="">Select Persediaan -</option> ' + 
                                                  '</select>' + 
                                              '</div>' + 
                                              '<div class="col-sm-6">' + 
                                                  '<label for="name" class="form-label">Jumlah Pembelian</label> ' + 
                                                  '<select name="j_pem[]" id="j_pem" class="form-control select2 select2-primary j_pem' + hasil + ' " data-dropdown-css-class="select2-primary" style="width: 100%;"> ' + 
                                                      '<option value="-">Select Jumlah Pembelian -</option> ' + 
                                                  '</select>' + 
                                              '</div> ' + 
                                          '</div> ' + 
                                      '</div>' + 
 
                                      '<div class="form-group ">' + 
                                          '<label for="name" class="form-label">Total Harga</label> ' + 
                                          '<select name="ttl_harga[]"  id="get_harga" class="form-control select2 select2-primary get_harga' + hasil + '" data-dropdown-css-class="select2-primary" style="width: 100%;"> ' + 
                                              '<option value="">Rp 0,00-</option> ' + 
                                          '</select>      ' +  
                                      '</div>' + 

                                      '<div class="form-group ">' + 
                                          '<label for="name" class="form-label">Tipe Pemesanan</label> ' + 
                                          '<select name="tipe_pesanan[]"  id="tipe_pesanan" class="form-control select2 select2-primary tipe_pesanan' + hasil + ' " data-dropdown-css-class="select2-primary" style="width: 100%;"> ' + 
                                                  '<option value="Online Order">Online Order</option> ' + 
                                                  '<option value="Offline Order">Offline Order</option>  ' + 
                                          '</select>       ' + 
                                      '</div>' + 

                                      '<div class="form-group ">' + 
                                          '<label for="name" class="form-label">Tipe Pembayaran</label> ' + 
                                          '<select name="tipe_pembayaran[]"  id="tipe_pembayaran" class="form-control select2 select2-primary tipe_pembayaran' + hasil + ' " data-dropdown-css-class="select2-primary" style="width: 100%;"> ' + 
                                                  '<option value="Tunai">Tunai</option> ' + 
                                                  '<option value="Transfer">Transfer</option> ' + 
                                                  '<option value="Debit">Debit</option> ' + 
                                          '</select>' + 
                                      '</div>' + 
 
                                    '</div>' + 
 
 
                                    '<button type="button" class="btn btn-sm btn-danger remove_transaksi mx-auto btnrmv' + hasil +'" >Hapus Transaksi</button>' + 
                                     
                                  '</div> ' + 
                                   
                                  '');
                 
              
 
              
              }  


 

          </script>


      <?php  
      }
 
      ?>

      <?= $btsjv; ?>




</body>
</html>