<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi [SIE-JAKU]</title>


    
    <style>
        @page{
            margin:30px;
        }
        .table{ 
            width:100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            

        }
        .table td, .table th {
        border: 1px solid #A0A0A0;
        padding: 8px;
        }
        .table th { 
            background-color: #007bff; 
            color: white;
            font-size: 13px;


        }
        .table tr:nth-child(even){background-color: #f2f2f2;}
        .img-header{  
            margin-left: auto;
            margin-right: auto;
            width: 100px;
        }
        .row3{
            width:150px;
            margin:auto;
        }
        .header-cetak-transaksi{
            text-align: center;
            font-size: 14px;
            width:320px;
            margin:auto;
        }

    </style>




</head>
<body>

 <div class="img-header">
    <img src="<?=base_url()?>/img/UD ANISSA BALI BACKGROUND PUTIH - Login.gif" alt="SIE-JAKU LOGO" style="width:100%;" > 
 </div>
<h1 class="header-cetak-transaksi">(SIE-JAKU) SISTEM INFORMASI EKSEKUTIF PENJUALAN KAYU PADA UD. ANISSA BALI</h1>
<br><br>

<table class="table">  
    <thead>
        <tr>
            <th>No</th> 
            <th>Kode Transaksi</th>
            <th>Jenis, Tipe, dan Ukuran Kayu</th>
            <th>Jumlah<br>Pembelian</th> 
            <th>Total<br>Harga</th>
            <th>Tipe<br>Pesanan</th>  
        </tr>
    </thead> 
    <tbody>
    <?php $no=0; foreach ($datatransaksi as $item): $no++; ?>

        <tr>
            <td class="row1"><?=$no?></td>
            <td class="row2"><?=$item->kode_transaksi?></td>
            <td > <p class="row3"> <?=$item->nama_jenis_kayu?>, <?=$item->nama_tipe_kayu?>, <?=$item->nama_Ukuran_kayu?> </p></td>
            <td class="row4"><?=$item->jumlah_pembelian?></td>
            <td class="row5"><?="Rp " . number_format($item->total_harga,2,',','.')?></td>
            <td class="row6"><?=$item->tipe_pesanan?></td>
        </tr>
    <?php endforeach; ?>  

    </tbody>
</table>

    

<script type="text/php">
        if ( isset($pdf) ) {
            // OLD 
            // $font = Font_Metrics::get_font("helvetica", "bold");
            // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(255,0,0));
            // v.0.7.0 and greater
            $x = 250;
            $y = 800;
            $text = "SIE-JAKU ({PAGE_NUM} dari {PAGE_COUNT}) Halaman";
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "bold");
            $size = 6;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</body>
</html>