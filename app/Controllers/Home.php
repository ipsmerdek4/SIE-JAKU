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
        $Transaksi = new TransaksiModel;
        $Persediaan = new PersediaanKayuModel;
        $Harga = new HargaKayuModel;
        $Customer = new CustomerModel;


        $getbulan = 0;
        if ((date('m') == 1) or (date('m') == 2) or (date('m') == 3)) {
            $getbulan = 1; 
        }elseif ((date('m') == 4) or (date('m') == 5) or (date('m') == 6)) {
           $getbulan = 2; 
        }elseif ((date('m') == 7) or (date('m') == 8) or (date('m') == 9)) {
           $getbulan = 3; 
        }elseif ((date('m') == 10) or (date('m') == 11) or (date('m') == 12)) {
           $getbulan = 4; 
        }
        
        // $getbulan = 2; 
        $gettahun = date('Y');
        $datagetbulanCoustomer = "";

        if ($getbulan == 1) { 
            $datagetbulanCoustomer = $Customer->getlikeall('-01-', '-02-', '-03-', $gettahun);    
            $datagetbulantransaksi = $Transaksi->getlikeall('-01-', '-02-', '-03-', $gettahun);   
            $datagetbulanpersediaan = $Persediaan->getlikeall('-01-', '-02-', '-03-', $gettahun);   
        }elseif ($getbulan == 2) { 
            $datagetbulanCoustomer = $Customer->getlikeall('-04-', '-05-', '-06-', $gettahun);
            $datagetbulantransaksi = $Transaksi->getlikeall('-04-', '-05-', '-06-', $gettahun);
            $datagetbulanpersediaan = $Persediaan->getlikeall('-04-', '-05-', '-06-', $gettahun);
        }elseif ($getbulan == 3) { 
            $datagetbulanCoustomer = $Customer->getlikeall('-07-', '-08-', '-09-', $gettahun);   
            $datagetbulantransaksi = $Transaksi->getlikeall('-07-', '-08-', '-09-', $gettahun);   
            $datagetbulanpersediaan = $Persediaan->getlikeall('-07-', '-08-', '-09-', $gettahun);  
        }elseif ($getbulan == 4) { 
            $datagetbulanCoustomer = $Customer->getlikeall('-10-', '-11-', '-12-', $gettahun);   
            $datagetbulantransaksi = $Transaksi->getlikeall('-10-', '-11-', '-12-', $gettahun);   
            $datagetbulanpersediaan = $Persediaan->getlikeall('-10-', '-11-', '-12-', $gettahun);   
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
          
        $data = array(
			'menu' => '1a',
			'title' => 'Home [SIE-JAKU]', 
            'batascss' => 'chome',
            'productsold' => $productsold,
            'getprofit' => $getprofit,
            'getcountcostumer' => $getcountcostumer,
            'presenstock' => $presenstock,

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