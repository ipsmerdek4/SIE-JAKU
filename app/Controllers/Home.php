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

  
        if (!$this->request->getpost('p_bulan')) { 
                $getbulan = 0;
                if ((date('m') == 1) or (date('m') == 2) or (date('m') == 3)) {
                    $getbulan = 1;  
                    $gettahun = date('Y');
                }elseif ((date('m') == 4) or (date('m') == 5) or (date('m') == 6)) {
                    $getbulan = 2; 
                    $gettahun = date('Y');
                }elseif ((date('m') == 7) or (date('m') == 8) or (date('m') == 9)) {
                    $getbulan = 3; 
                    $gettahun = date('Y');
                }elseif ((date('m') == 10) or (date('m') == 11) or (date('m') == 12)) {
                    $getbulan = 4; 
                    $gettahun = date('Y');
                }
        }else{
            $getbulan = $this->request->getpost('p_bulan');
            $gettahun = $this->request->getpost('p_tahun');
            
        }
  
        
        //$getbulan = 2; 
        //$gettahun = '2022';
        $datagetbulanCoustomer = "";

        if ($getbulan == 1) { 
            $datagetbulanCoustomer = $Customer->getlikeall($gettahun.'-01-', $gettahun.'-02-', $gettahun.'-03-');    
            $datagetbulantransaksi = $Transaksi->getlikeall($gettahun.'-01-', $gettahun.'-02-', $gettahun.'-03-');    
            $datagetbulantransaksi2 = $Transaksi->getcountall($gettahun.'-01-', $gettahun.'-02-', $gettahun.'-03-', 'id_jenis_kayu');     
            $datagetbulantransaksi3 = $Transaksi->getcountall($gettahun.'-01-', $gettahun.'-02-', $gettahun.'-03-', 'tipe_pesanan');     
            $datagetbulanpersediaan = $Persediaan->getlikeall($gettahun.'-01-', $gettahun.'-02-', $gettahun.'-03-');    
        }elseif ($getbulan == 2) { 
            $datagetbulanCoustomer = $Customer->getlikeall($gettahun.'-04-', $gettahun.'-05-', $gettahun.'-06-');
            $datagetbulantransaksi = $Transaksi->getlikeall($gettahun.'-04-', $gettahun.'-05-', $gettahun.'-06-'); 
            $datagetbulantransaksi2 = $Transaksi->getcountall($gettahun.'-04-', $gettahun.'-05-', $gettahun.'-06-', 'id_jenis_kayu');  
            $datagetbulantransaksi3 = $Transaksi->getcountall($gettahun.'-04-', $gettahun.'-05-', $gettahun.'-06-', 'tipe_pesanan');      
            $datagetbulanpersediaan = $Persediaan->getlikeall($gettahun.'-04-', $gettahun.'-05-', $gettahun.'-06-');
        }elseif ($getbulan == 3) { 
            $datagetbulanCoustomer = $Customer->getlikeall($gettahun.'-07-', $gettahun.'-08-', $gettahun.'-09-');   
            $datagetbulantransaksi = $Transaksi->getlikeall($gettahun.'-07-', $gettahun.'-08-', $gettahun.'-09-');  
            $datagetbulantransaksi2 = $Transaksi->getcountall($gettahun.'-07-', $gettahun.'-08-', $gettahun.'-09-', 'id_jenis_kayu');   
            $datagetbulantransaksi3 = $Transaksi->getcountall($gettahun.'-07-', $gettahun.'-08-', $gettahun.'-09-', 'tipe_pesanan');       
            $datagetbulanpersediaan = $Persediaan->getlikeall($gettahun.'-07-', $gettahun.'-08-', $gettahun.'-09-'); 
        }elseif ($getbulan == 4) { 
            $datagetbulanCoustomer = $Customer->getlikeall($gettahun.'-10-', $gettahun.'-11-', $gettahun.'-12-');   
            $datagetbulantransaksi = $Transaksi->getlikeall($gettahun.'-10-', $gettahun.'-11-', $gettahun.'-12-');   
            $datagetbulantransaksi2 = $Transaksi->getcountall($gettahun.'-10-', $gettahun.'-11-', $gettahun.'-12-', 'id_jenis_kayu');  
            $datagetbulantransaksi3 = $Transaksi->getcountall($gettahun.'-10-', $gettahun.'-11-', $gettahun.'-12-', 'tipe_pesanan');        
            $datagetbulanpersediaan = $Persediaan->getlikeall($gettahun.'-10-', $gettahun.'-11-', $gettahun.'-12-');   
        }
 

        
            $datatransaksi = $datagetbulantransaksi; 
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
            $datacountCoustomer =  $datagetbulanCoustomer;  
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
   
           
           
           
           /* 
            echo "<pre>";
            print_r($datagetbulantransaksi3);
                    */    
 
 
        $data = array(
			'menu' => '1a',
			'title' => 'Home [SIE-JAKU]', 
            'batascss' => 'chome',
            'productsold' => $productsold,
            'getprofit' => $getprofit,
            'getcountcostumer' => $getcountcostumer,
            'presenstock' => $presenstock,
            'getbulan' => $getbulan,
            'gettahun' => $gettahun,
           // footer 
            'datatransaksi3' => $datatransaksi3,
            'datatransaksi2' => $datatransaksi2,
            'datatransaksi' => $datatransaksi,
 
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