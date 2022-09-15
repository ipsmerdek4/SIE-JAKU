<?php 
namespace App\Controllers;

use \Dompdf\Dompdf;
use Dompdf\Options;

use CodeIgniter\Controller;
use App\Models\JenisKayuModel;
use App\Models\TipeKayuModel;
use App\Models\UkuranKayuModel;
use App\Models\PersediaanKayuModel;
use App\Models\TransaksiModel;
use App\Models\HargaKayuModel;
use App\Models\CustomerModel;





class Transaksi extends Controller{


    public function index()
    {  
  
        $Transaksis = new TransaksiModel(); 

        
            // $datatransaksi = $Transaksis->getjoinall();
              
 
        $data = array(
			'menu' => '4a',
			'title' => 'Transaksi [SIE-JAKU]', 
            'batascss' => 'c5', 
            'datatransaksi' => $Transaksis->getjoinall(), 

		);

        echo view('section/header', $data);
        echo view('v_transaksi', $data);
		echo view('section/footer', $data);  
 
    }

    public function add_transaksi()
    {  

        $UkuranKayus = new UkuranKayuModel(); 
        $JenisKayus = new JenisKayuModel();  
        $TipeKayus = new TipeKayuModel();
        $Customers = new CustomerModel(); 

 
        $data = array(
			'menu' => '4a',
			'title' => 'Transaksi [SIE-JAKU]', 
            'batascss' => 'c5s', 
            'dataTipeKayus' => $TipeKayus->findAll(), 
            'dataJenisKayus' => $JenisKayus->findAll(), 
            'dataUkuranKayus' => $UkuranKayus->findAll(), 
            'dataCustomers' => $Customers->findAll(), 
            

		);

        echo view('section/header', $data);
        echo view('v_add_transaksi', $data);
		echo view('section/footer', $data);
 
    }

    public function transaksi_process()
    {  

 
            if (!$this->validate([
                'kodetransaksi' => [
                    'rules' => 'required|max_length[100]',
                    'errors' => [
                        'required'   => 'Kode Transaksi Harus diisi ', 
                        'max_length' => 'Persediaan Kayu Maksimal 100 Angka',  
                    ]
                ], 
                'namacus' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Nama Customers Harus diisi', 
                    ]
                ],  
                'tanggal_transaksi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tanggal Transaksi Harus dipilih', 
                    ]
                ],  
                
                'tipe_pesanan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tipe Pembayaran Harus diisi', 
                    ]
                ],  
                'tipe_pembayaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tipe Pembayaran Harus diisi',                                                                           
                    ]
                ],  
                
                /* 
                'ttl_harga' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Total harga Harus dipilih', 
                    ]
                ], 
                'j_pem' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Jumlah Pembelian Harus dipilih', 
                    ]
                ], 
                'jkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => '{ field } Jenis Kayu Harus dipilih', 
                    ]
                ], 
                't_kayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tipe Kayu Harus dipilih', 
                    ]
                ], 
                'u_kayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Ukuran Kayu Harus dipilih', 
                    ]
                ],  */ 
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/transaksi/add'))->withInput(); 
            } 

            $PersediaanKayus = new PersediaanKayuModel(); 
            $Transaksis = new TransaksiModel(); 

            $kodetransaksi = explode("#",$this->request->getVar('kodetransaksi'));  
            $kodetransaksi1 = explode(" ",$kodetransaksi[1]);   
            $kodetransaksi2 = $kodetransaksi1[0];

            $getallid = $this->request->getVar('j_pem');

            $datax = [];
            $getnum = 0;
            foreach ($getallid as $key1 => $value1) { 
                switch ($value1) {
                    case "-":
                        $new_getallid = 'Jumlah Pembelian Pada Urutan ['.$key1.'] Belum di Pilih.'  ;
                        break; 
                    default:
                    $new_getallid = '';
                    $getnum = $getnum + 1;
                  }


                $datax[] = [ 
                    'new_getallid' => $new_getallid, 
                ];   
                 
            }

         
            if(count($getallid) == $getnum){

                foreach ($getallid as $key2 => $value2) { 
                   
                    $j_pem = explode("-", $value2);  
            
                    $id_jenis_kayu = $j_pem[0];
                    $id_tipe_kayu = $j_pem[1];
                    $id_ukuran_kayu = $j_pem[2];
                    $id_persediaan = $j_pem[3];
                    $jmlpembelian = $j_pem[4];
         
                    $darapersediaan = $PersediaanKayus->where('id_persediaan', $id_persediaan)->findAll(); 
         
                    $sisa =  $darapersediaan[0]->sisa_persediaan - $jmlpembelian ;

                    $timestamp = strtotime($this->request->getVar('tanggal_transaksi'));  
                    $tanggal_transaksi = date('Y-m-d', $timestamp);
                    $tgl_code = date('Y-m', $timestamp);

                    
                    $hasil1 = $Transaksis->insert([ 
                        'kode_transaksi' => $kodetransaksi2,
                        'jumlah_pembelian' => $jmlpembelian,
                        'total_harga' => $this->request->getVar('ttl_harga')[$key2], 
                        'tipe_pesanan' => $this->request->getVar('tipe_pesanan'), 
                        'tipe_pembayaran' => $this->request->getVar('tipe_pembayaran'),  
                        'id_customers' => $this->request->getVar('namacus'), 
                        'id_persediaan' => $id_persediaan,
                        'id_jenis_kayu' => $id_jenis_kayu,
                        'id_tipe_kayu' => $id_tipe_kayu,
                        'id_ukuran_kayu' => $id_ukuran_kayu, 
                        'tgl_transaksi' => $tanggal_transaksi.' '.date("H:i:s"),
                        'tgl_code' => $tgl_code,

                       /*  'tgl_transaksi' => date("Y-m-d H:i:s"),
                        'tgl_code' => date("Y-m"), */
                    ]);
        
             
                    $dataubahsisa = [
                        'sisa_persediaan' => $sisa,     
                    ];  
                    
                    $hasil2 = $PersediaanKayus->update($id_persediaan, $dataubahsisa);
        
                    if($hasil1){
                        echo 'berhasil <br><br>';
                    }
                    if($hasil2){
                        echo 'berhasil2 <br><br>'; 
                    }

                }

                session()->setFlashdata('alert', 'Berhasil Menambah Data.');
                return redirect()->to(base_url('transaksi/'))->withInput(); 
 
            }else{
                session()->setFlashdata('errorX', $datax );
                return redirect()->to(base_url('/transaksi/add'))->withInput(); 
            }

  

/* 
 
          
 
           
         */
            
 
    }


    public function transaksi_deletedata($id = null)
    {
          $Transaksis = new TransaksiModel(); 
          $PersediaanKayus = new PersediaanKayuModel(); 
  
          if($datatrans = $Transaksis->find($id)){
 
                $darapersediaan = $PersediaanKayus->where('id_persediaan', $datatrans->id_persediaan)->findAll();  
                $kembalikan = $datatrans->jumlah_pembelian + $darapersediaan[0]->sisa_persediaan; 
                $dataubahsisa = [
                                    'sisa_persediaan' => $kembalikan,     
                                ];  
                $PersediaanKayus->update($darapersediaan[0]->id_persediaan , $dataubahsisa);

                $Transaksis->delete($id); 
    
                session()->setFlashdata('alert', 'Berhasil Menghapus Data.');
                return redirect()->to(base_url('transaksi'))->withInput();  
 

          }else{
              session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
              return redirect()->to(base_url('transaksi'))->withInput(); 
          }
  
    }
  
   

    public function cetak_transaksi($id = null)
    {
       $dompdfs = new Dompdf;

       $Transaksis = new TransaksiModel(); 

        if ($id == "semua") {
            $idnew = $Transaksis->getjoinall();
        }else{
            $idnew = $Transaksis->getlike($id); 
        }


       
        $data = array( 
			'title' => 'Transaksi [SIE-JAKU]',   
            'datatransaksi' => $idnew, 
		); 

        // echo view('v_view_transksi', $data); 
 
        $html = view('v_view_transksi', $data); 
        $dompdfs->set_option('isRemoteEnabled', TRUE);
        $dompdfs->set_option("isPhpEnabled", true); 
        $dompdfs->setPaper('A4', 'Portrait'); 
        $dompdfs->loadHtml($html); 
        $dompdfs->render();
        $dompdfs->stream('Transaksi'.date('Ymdhis').'.pdf', array(
                "Attachment" => false

        ));     

 
    }

 


    function add_ajax_tkayu($id = null)
    { 
          $TipeKayus = new TipeKayuModel(); 
          $dataTipeKayus = $TipeKayus->where('id_jenis_kayu', $id)->findAll(); 
          $data = "<option value=''>- Select Tipe Kayu -</option>"; 
          foreach ($dataTipeKayus as $value) {
            $data .= "<option value='".$id."-".$value->id_tipe_kayu."'>".$value->nama_tipe_kayu."</option>";
          } 
          echo $data;  
    }
  
   
   
    function add_ajax_ukayu($id = null)
    { 
          $pecah = explode("-",$id); 
          $UkuranKayus = new UkuranKayuModel(); 
          $dataUkuranKayus = $UkuranKayus->where('id_tipe_kayu', $pecah[1])->findAll(); 
          $data = "<option value=''>- Select Tipe Kayu -</option>"; 
          foreach ($dataUkuranKayus as $value) {
            $data .= "<option value='".$id."-".$value->id_ukuran_kayu."'>".$value->nama_Ukuran_kayu."</option>";
          } 
          echo $data;   
    }

    

    function add_ajax_persediaan($id = null)
    { 
          $pecah = explode("-",$id); 

            $id_jenis_kayu = $pecah[0];
            $id_tipe_kayu = $pecah[1];
            $id_ukuran_kayu = $pecah[2];


            $PersediaanKayus = new PersediaanKayuModel();  
            $dataPersediaanKayus = $PersediaanKayus->where('id_ukuran_kayu', $id_ukuran_kayu, 'id_tipe_kayu', $id_tipe_kayu, 'id_jenis_kayu', $id_jenis_kayu, )->findAll(); 
     
            function bulan($bulan)
            {
                Switch ($bulan){
                case 1 : $bulan="Januari";
                    Break;
                case 2 : $bulan="Februari";
                    Break;
                case 3 : $bulan="Maret";
                    Break;
                case 4 : $bulan="April";
                    Break;
                case 5 : $bulan="Mei";
                    Break;
                case 6 : $bulan="Juni";
                    Break;
                case 7 : $bulan="Juli";
                    Break;
                case 8 : $bulan="Agustus";
                    Break;
                case 9 : $bulan="September";
                    Break;
                case 10 : $bulan="Oktober";
                    Break;
                case 11 : $bulan="November";
                    Break;
                case 12 : $bulan="Desember";
                    Break;
                }
                return $bulan;
            }

          $data = "<option value=''>- Select Persediaan Kayu -</option>"; 
          foreach ($dataPersediaanKayus as $value) {
              
            $pecahtgl1 = explode(" ",$value->Tanggal_persediaan); 
            $pecahtgl2 = explode("-",$pecahtgl1[0]); 
            $newtgl = $pecahtgl2[2].'/'.bulan($pecahtgl2[1]).'/'.$pecahtgl2[0].' '.$pecahtgl1[1];
            
            if ($value->jml_persediaan > 0) {
                $data .= "<option value='".$id."-".$value->id_persediaan."'>".$newtgl. "</option>";
            }
  
          } 
          echo $data;   
    }
   



    function add_ajax_jmlp($id = null)
    {
        $pecah = explode("-",$id); 

        $id_jenis_kayu = $pecah[0];
        $id_tipe_kayu = $pecah[1];
        $id_ukuran_kayu = $pecah[2];
        $id_persediaan = $pecah[3];


 
        $PersediaanKayus = new PersediaanKayuModel();  
        $dataPersediaanKayus = $PersediaanKayus->where('id_persediaan', $id_persediaan, 'id_ukuran_kayu', $id_ukuran_kayu, 'id_tipe_kayu', $id_tipe_kayu, 'id_jenis_kayu', $id_jenis_kayu, )->findAll(); 
 
        
        if ($dataPersediaanKayus == false) {
            echo "<option value=''>0</option>";
        }else{  
            for ($x = 0; $x <= $dataPersediaanKayus[0]->sisa_persediaan; $x++) {
                echo "<option value='".$id."-".$x."'>".$x." / ".$dataPersediaanKayus[0]->sisa_persediaan ."</option>";
            }  
        }
          

    }
  

    function add_ajax_gharga($id = null)
    {
        
        $pecaht = explode("^", $id);  
        $pecahtt = explode("*", $pecaht[1]);  

        // print_r($pecahtt);

        $pecah = explode("-", $pecaht[0]); 

        $id_jenis_kayu = $pecah[0];
        $id_tipe_kayu = $pecah[1];
        $id_ukuran_kayu = $pecah[2];
        $id_persediaan = $pecah[3];
        $jmlpembelian = $pecah[4];
 
        $PersediaanKayus = new PersediaanKayuModel();  
        $HargaKayus = new HargaKayuModel();  

        // $dataPersediaanKayus = $PersediaanKayus->getwharepersediaan($id_jenis_kayu, $id_tipe_kayu, $id_ukuran_kayu);
        // $dataHargaKayus = $HargaKayus->where('id_harga_kayu', $dataPersediaanKayus[0]->id_harga_kayu)->findAll(); 
  


                $dataPersediaanKayus = $PersediaanKayus->where('id_persediaan ', $id_persediaan)->first();   
                $dataHargaKayus = $HargaKayus->where('id_harga_kayu', $dataPersediaanKayus->id_harga_kayu)->findAll(); 
                
                $totalharga = ($jmlpembelian * $dataHargaKayus[0]->nama_harga_kayu); 
                // echo "<option value='".$totalharga."'> Rp " . number_format($totalharga,2,',','.')." </option>";
  
     
      
             
            echo "  <script> 
                        $('.k_harga".$pecahtt[0]."').val('Rp " . number_format($totalharga,0,',','.')."') 
                        $('.s_harga".$pecahtt[0]."').val(".$totalharga.") 
                    </script>";
 
 
            echo "  <script>  

                        var num = 0;
                        for (let index = 0; index <= ".$pecahtt[1]."; index++) {
                            var ambilhhrg = $('.s_harga'+ index).val();
                            num += parseInt(ambilhhrg);  

                            
                        } 
                        num = '' + num + '';
                        var number_string = num.replace(/[^,\d]/g, '').toString(),
                            split   		= number_string.split(','),
                            sisa     		= split[0].length % 3,
                            rupiah     		= split[0].substr(0, sisa),
                            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

                            if(ribuan){
                                separator = sisa ? '.' : '';
                                rupiah += separator + ribuan.join('.');
                            }


                        $('.ttlharga').val('Rp ' + rupiah);



                </script>";  

 


    }

    














    

}