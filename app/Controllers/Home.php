<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JenisKayuModel;
use App\Models\TipeKayuModel;
use App\Models\UkuranKayuModel;
use App\Models\PersediaanKayuModel;
use App\Models\TransaksiModel;
use App\Models\HargaKayuModel;
use App\Models\CustomerModel;



class Home extends BaseController
{
    public function index()
    {
 
        $JenisKayu = new JenisKayuModel;
        $Transaksi = new TransaksiModel;
        $Persediaan = new PersediaanKayuModel;
        $Harga = new HargaKayuModel;
        $Customer = new CustomerModel;

        $getstatus = $this->request->getpost('getstatus'); 
        // $getstatus = 1;

        if(isset($getstatus)){ 
            if ($getstatus == 1) { 
                $bulan = $this->request->getpost('bulan_view');
                $tahun = $this->request->getpost('tahun_view');

                $datagetbulantransaksi = $Transaksi->getwhere_bulanandtahun($bulan, $tahun);
                $datatransaksi = $datagetbulantransaksi; 


                $datagetbulantransaksi_2 = $Transaksi->getwhere_bulanandtahun_2($bulan, $tahun);
                $datatransaksi_ttlpenjualan = $datagetbulantransaksi_2;   
                /*  */ 
                $datagetbulanCoustomer = $Customer->getwhere_bulanandtahun($bulan, $tahun);  
                $datacountCoustomer =  $datagetbulanCoustomer;  
                /*  */
                $datagetbulanpersediaan = $Persediaan->getwhere_bulanandtahun($bulan, $tahun);    
                /*  */
                $datagetbulantransaksi2 = $Transaksi->getcountall($bulan, $tahun, 'id_jenis_kayu');       
                /*  */
                $datagetbulantransaksi3 = $Transaksi->getcountallENDWHERE($bulan, $tahun, 'tipe_pesanan');  

                $datagetbulantransaksi32txt = $Transaksi->getcountallnocount($bulan, $tahun, 'tipe_pesanan');       
                $datagetbulantransaksi32 = $Transaksi->getcountall($bulan, $tahun, 'tipe_pesanan');       
    
                $datagetbulantransaksi33txt = $Transaksi->getcountallnocount($bulan, $tahun, 'tipe_pembayaran');       
                $datagetbulantransaksi33 = $Transaksi->getcountall($bulan, $tahun, 'tipe_pembayaran');   
                

                
            } elseif ($getstatus == 2) {
                $bulan = ''; 
                $tahun = $this->request->getpost('tahun_view');

                $datagetbulantransaksi = $Transaksi->getwhere_tahun($tahun);
                $datatransaksi = $datagetbulantransaksi;  

                $datagetbulantransaksi_2 = $Transaksi->getwhere_tahun_2($tahun);
                $datatransaksi_ttlpenjualan = $datagetbulantransaksi_2;  
 
                /*  */
                $datagetbulanCoustomer = $Customer->getwhere_tahun($tahun);  
                $datacountCoustomer =  $datagetbulanCoustomer;  
                /*  */
                $datagetbulanpersediaan = $Persediaan->getwhere_tahun($tahun);
                /*  */
                $datagetbulantransaksi2 = $Transaksi->getcountall2($tahun, 'id_jenis_kayu');       
                /*  */
                $datagetbulantransaksi3 = $Transaksi->getcountallENDWHERE2($tahun, 'tipe_pesanan');    

                $datagetbulantransaksi32txt = $Transaksi->getcountall2nocount($tahun, 'tipe_pesanan');       
                $datagetbulantransaksi32 = $Transaksi->getcountall2($tahun, 'tipe_pesanan');       
                
                $datagetbulantransaksi33txt = $Transaksi->getcountall2nocount($tahun, 'tipe_pembayaran');       
                $datagetbulantransaksi33 = $Transaksi->getcountall2($tahun, 'tipe_pembayaran');   

                

            }
            $getstatus = $getstatus;

        }else{ 
            $bulan = date("m");
            $tahun = date("Y"); 
            $datagetbulantransaksi = $Transaksi->getwhere_bulanandtahun($bulan, $tahun);
            $datatransaksi = $datagetbulantransaksi; 
                  
            $datagetbulantransaksi_2 = $Transaksi->getwhere_bulanandtahun_2($bulan, $tahun);
            $datatransaksi_ttlpenjualan = $datagetbulantransaksi_2;  

            /*  */ 
            $datagetbulanCoustomer = $Customer->getwhere_bulanandtahun($bulan, $tahun);  
            $datacountCoustomer =  $datagetbulanCoustomer;  
            /*  */
            $datagetbulanpersediaan = $Persediaan->getwhere_bulanandtahun($bulan, $tahun);    
            /*  */
            $datagetbulantransaksi2 = $Transaksi->getcountall($bulan, $tahun, 'id_jenis_kayu');     
            /*  */
            $datagetbulantransaksi3 = $Transaksi->getcountallENDWHERE($bulan, $tahun, 'tipe_pesanan'); 

            $datagetbulantransaksi32txt = $Transaksi->getcountallnocount($bulan, $tahun, 'tipe_pesanan');       
            $datagetbulantransaksi32 = $Transaksi->getcountall($bulan, $tahun, 'tipe_pesanan');       

            $datagetbulantransaksi33txt = $Transaksi->getcountallnocount($bulan, $tahun, 'tipe_pembayaran');       
            $datagetbulantransaksi33 = $Transaksi->getcountall($bulan, $tahun, 'tipe_pembayaran');   
            

            
            $getstatus = '1';
            
        }
        
 
            $productsold = 0;
            $getprofit = 0;
            foreach ($datatransaksi as $value) { 
                /* get product sold */
                $productsold += $value->jumlah_pembelian;
                /* END get product sold */

                /* get profil  */ 
                $data1 = $Persediaan->where('id_persediaan', $value->id_persediaan)->findAll();
                $data2 = $Harga->where('id_harga_kayu', $data1[0]->id_harga_kayu)->findAll();

                $getmodal = ($data2[0]->nama_harga_modal * $value->jumlah_pembelian); 
                $getprofit += $value->total_harga - $getmodal;
                /* END get profit  */ 
            }
 

            /* start total costumer */
            $getcountcostumer = count($datacountCoustomer); 
            /* end total costumer  */




            /* getpersentase stock  */
            $gettotal = 0;
            $getsisa = 0;
            foreach ($datagetbulanpersediaan as $value2) { 
                $gettotal += $value2->jml_persediaan;
                $getsisa += $value2->sisa_persediaan; 
            }  

            if (($gettotal == false) or ($getsisa == false)) {
                $presenstock = 0; 
            }else{
                $presenstock = round($getsisa/$gettotal * 100,2); 
            }
            /* END getpersentase stock  */
          
 

            $datatransaksi2 = $datagetbulantransaksi2; 
            $datatransaksi3 = $datagetbulantransaksi3;
            $datatransaksi32 = $datagetbulantransaksi32;
            $datatransaksi33 = $datagetbulantransaksi33;
            
            
           
           /* 
            echo "<pre>";
            print_r($datagetbulantransaksi3);
                    */    
 
        //    dd($datatransaksi_ttlpenjualan);


 
        $data = array(
			'menu' => '1a',
			'title' => 'Home [SIE-JAKU]', 
            'batascss' => 'chome',
            'productsold' => $productsold,
            'getprofit' => $getprofit,
            'getcountcostumer' => $getcountcostumer,
            'presenstock' => $presenstock, 
              'getstatus' => $getstatus,
              'getbulan' => $bulan, 
              'gettahun' => $tahun,  
           // footer 
           'datatransaksi33'    => $datatransaksi33,
           'datagetbulantransaksi33txt'    => $datagetbulantransaksi33txt,
           'datatransaksi32'    => $datatransaksi32,
           'datagetbulantransaksi32txt'    => $datagetbulantransaksi32txt,
            'datatransaksi3' => $datatransaksi3,
            'datatransaksi2' => $datatransaksi2,
            'datatransaksi' => $datatransaksi,
            'datatransaksi_ttlpenjualan'    => $datatransaksi_ttlpenjualan,
 
		);

        echo view('section/header', $data);
        echo view('home', $data);
		echo view('section/footer', $data);
 
   



    }

 


    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }



}