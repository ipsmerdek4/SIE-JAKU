

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
<script src="../../plugins/jquery/jquery.min.js"></script>
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
          $(function () {

   


            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData        = {
              labels: [
                  'Chrome',
                  'IE',
                  'FireFox',
                  'Safari',
                  'Opera',
                  'Navigator',
              ],
              datasets: [
                {
                  data: [700,500,400,600,300,100],
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
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
            var donutData2        = {
              labels: [
                  'Chrome',
                  'IE',
                  'FireFox',
                  'Safari',
                  'Opera',
                  'Navigator',
              ],
              datasets: [
                {
                  data: [700,500,400,600,300,100],
                  backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }
              ]
            }
            var donutOptions2     = {
              maintainAspectRatio : false,
              responsive : true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas2, {
              type: 'doughnut',
              data: donutData2,
              options: donutOptions2
            })









          var areaChartData = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
              {
                label               : 'Digital Goods',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [28, 48, 40, 19, 86, 27, 90]
              },
              {
                label               : 'Electronics',
                backgroundColor     : 'rgba(210, 214, 222, 1)',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [65, 59, 80, 81, 56, 55, 40]
              },
            ]
          }




          //-------------
          //- BAR CHART -
          //-------------
          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = $.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          var temp1 = areaChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
          };

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          });

 
            /*
          * BAR CHART
          * ---------
          */

          var bar_data = {
            data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
            bars: { show: true }
          }
          $.plot('#bar-chart', [bar_data], {
            grid  : {
              borderWidth: 1,
              borderColor: '#f3f3f3',
              tickColor  : '#f3f3f3'
            },
            series: {
              bars: {
                show: true, barWidth: 0.5, align: 'center',
              },
            },
            colors: ['#3c8dbc'],
            xaxis : {
              ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June']]
            }
          })
          /* END BAR CHART */

 

          //end function  
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

              $("#provinsi").change(function (){
                var url = "<?php echo site_url('customers/add_ajax_kab');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
              })

              $("#kabupaten").change(function (){
                var url = "<?php echo site_url('customers/add_ajax_kec');?>/"+$(this).val();
                $('#kecamatan').load(url);
                return false;
              })

              $("#kecamatan").change(function (){
                var url = "<?php echo site_url('customers/add_ajax_desa');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
              })
   
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
            $(document).ready(function() {

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
      }elseif ($batascss == 'c5') {
      }
 
      ?>

      <?= $btsjv; ?>




</body>
</html>
