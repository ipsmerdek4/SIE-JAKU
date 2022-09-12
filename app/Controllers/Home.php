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
 
        if(isset($getstatus)){ 
            if ($getstatus == 1) {  
                $bulan = $this->request->getpost('bulan_view');
                $tahun = $this->request->getpost('tahun_view');
                $x_BULAN_TAHUN = $tahun.'-'.$bulan;

                $datatransaksi = $Transaksi->getwhere_bulanandtahun($bulan, $tahun); 

                $datacountCoustomer = $Customer->getwhere_bulanandtahun($bulan, $tahun);   

                $datagetbulanpersediaan = $Persediaan->getwhere_bulanandtahun($bulan, $tahun);    

                //chart
                $dataCHRTtransaksi = $Transaksi->Chartgetwhere_bulanandtahun($bulan, $tahun);

                $dataCHRTTTPtransaksi = $Transaksi->ChartTTPgetwhere_bulanandtahun($bulan, $tahun);

                $dataCHRTCCtransaksi = $Customer->getChartwhere_bulanandtahun($bulan, $tahun);


            } elseif ($getstatus == 2){
                $bulan = ''; 
                $tahun = $this->request->getpost('tahun_view');
                $x_BULAN_TAHUN = $tahun.'-'.$bulan;

                $datatransaksi = $Transaksi->getwhere_tahun($tahun);

                $datacountCoustomer = $Customer->getwhere_tahun($tahun);  

                $datagetbulanpersediaan = $Persediaan->getwhere_tahun($tahun);
                //chart
                $dataCHRTtransaksi = $Transaksi->Chartgetwhere_bulanandtahun($bulan, $tahun);

                $dataCHRTTTPtransaksi = $Transaksi->ChartTTPgetwhere_tahun($bulan, $tahun);

                $dataCHRTCCtransaksi = $Customer->getChartwhere_bulanandtahun($bulan, $tahun);


            }
        }else{
            $bulan = date("m");
            $tahun = date("Y"); 
            $x_BULAN_TAHUN = $tahun.'-'.$bulan;
            $getstatus  = 1;

            $datatransaksi = $Transaksi->getwhere_bulanandtahun($bulan, $tahun); 

            $datacountCoustomer = $Customer->getwhere_bulanandtahun($bulan, $tahun);   

            $datagetbulanpersediaan = $Persediaan->getwhere_bulanandtahun($bulan, $tahun);    

            //chart
            $dataCHRTtransaksi = $Transaksi->Chartgetwhere_bulanandtahun($bulan, $tahun);

            $dataCHRTTTPtransaksi = $Transaksi->ChartTTPgetwhere_bulanandtahun($bulan, $tahun);

            $dataCHRTCCtransaksi = $Customer->getChartwhere_bulanandtahun($bulan, $tahun);


        }

                    //batas
                        $productsold = 0;
                        $getprofit = 0;
                        foreach ($datatransaksi as $value) { 
                            // get product sold
                            $productsold += $value->jumlah_pembelian;
                            // END get product sold

                            // get profil  
                            $data1 = $Persediaan->where('id_persediaan', $value->id_persediaan)->findAll();
                            $data2 = $Harga->where('id_harga_kayu', $data1[0]->id_harga_kayu)->findAll();

                            $getmodal = ($data2[0]->nama_harga_modal * $value->jumlah_pembelian); 
                            $getprofit += $value->total_harga - $getmodal;
                            // END get profit  
                        }

                   
                        // start total costumer
                        $getcountcostumer = count($datacountCoustomer); 
                        // end total costumer 

                        // getpersentase stock 
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
                        // END getpersentase stock 
                    //batas END

                    
                    $chart_PPT = [];
                    foreach ($dataCHRTtransaksi as $key1 => $value1) { 

                            $getjeniskayu = $JenisKayu->where('id_jenis_kayu', $value1->id_jenis_kayu)->first();
                            $getcont = $Transaksi->where('tgl_code', $value1->tgl_code)->where('id_jenis_kayu', $value1->id_jenis_kayu)->countAllResults();

                            $chart_PPT[] = [
                                'nama_jenis_kayu'   => $getjeniskayu->nama_jenis_kayu,
                                'hasil_ttl'         => $getcont,
                            ];  
 
                    }

                    $chart_JPT = [];
                    $dataX_JPT = [
                        'Online Order',
                        'Offline Order'
                    ];
                    foreach ($dataX_JPT as $key2 => $value_JPT) {  

                            $count_JPT = $Transaksi
                                            ->where('tipe_pesanan', $value_JPT)
                                            ->like('tgl_transaksi', $x_BULAN_TAHUN)    
                                            ->countAllResults();
                         
                            if ($count_JPT > 0) {
                                $chart_JPT[] = [
                                    'nama_JPT'          => $value_JPT,
                                    'count_JPT'         => $count_JPT,
                                ];
                            } 
 
                    }  



                    $chart_JPYT = [];
                    $dataX_JPYT = [
                        'Tunai',
                        'Transfer',
                        'Debit'
                    ];
                    foreach ($dataX_JPYT as $key2 => $value_JPYT) {  

                            $count_JPYT = $Transaksi
                                            ->where('tipe_pembayaran', $value_JPYT)
                                            ->like('tgl_transaksi', $x_BULAN_TAHUN)    
                                            ->countAllResults();
                         
                            if ($count_JPYT > 0) {
                                $chart_JPYT[] = [
                                    'nama_JPYT'          => $value_JPYT,
                                    'count_JPYT'         => $count_JPYT,
                                ];
                            } 
 
                    }  
 

                    $chart_TP = [];
                    foreach ($dataCHRTTTPtransaksi as $key => $value_TP) { 

                   
                        if ($getstatus == 1){ 
                            $timestamp = strtotime($value_TP->tgl_transaksi);  
                            $data_tp = date('Y-m-d', $timestamp);
                            $total_harga = $value_TP->total_harga;
                        }elseif ($getstatus == 2){ 
                            $data_tp = $value_TP->tgl_transaksi; 
                            $total_harga = $value_TP->hasil_ttl;
                        } 


                        $chart_TP[] = [
                            'date_TP'               => $data_tp,
                            'total_harga'           => $total_harga,
                        ];

                    }

                   
                    $chart_CCC = []; 
                    foreach ($dataCHRTCCtransaksi as $key => $value_CC) { 

                        $getcont = $Customer->where('tgl_code', $value_CC->tgl_code)->countAllResults();
 
                        $chart_CCC[] = [
                            'date_cc'       =>  $value_CC->created_at,
                            'total_cc'      =>  $getcont,
                        ];
                    } 
  


        $data = [
            'menu'                  => '1a',
			'title'                 => 'Home [SIE-JAKU]', 
            'batascss'              => 'chome',
            'getbulan'              => $bulan, 
            'gettahun'              => $tahun,  
            'productsold'           => $productsold,
            'getprofit'             => $getprofit,
            'getcountcostumer'      => $getcountcostumer,
            'presenstock'           => $presenstock,
            'getstatus'             => $getstatus,
            'chart_PPT'             => $chart_PPT,
            'chart_JPT'             => $chart_JPT,
            'chart_JPYT'            => $chart_JPYT,
            'chart_TP'              => $chart_TP,
            'chart_CCC'             => $chart_CCC




        ];




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