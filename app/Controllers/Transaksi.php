<?php 
namespace App\Controllers;

use \Dompdf\Dompdf;

use CodeIgniter\Controller;
use App\Models\JenisKayuModel;
use App\Models\TipeKayuModel;
use App\Models\UkuranKayuModel;
use App\Models\PersediaanKayuModel;
use App\Models\TransaksiModel;
use App\Models\HargaKayuModel;





class Transaksi extends Controller{


    public function index()
    {  
 

        $Transaksis = new TransaksiModel(); 



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

 
        $data = array(
			'menu' => '4a',
			'title' => 'Transaksi [SIE-JAKU]', 
            'batascss' => 'c5', 
            'dataTipeKayus' => $TipeKayus->findAll(), 
            'dataJenisKayus' => $JenisKayus->findAll(), 
            'dataUkuranKayus' => $UkuranKayus->findAll(), 
            

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
                        'required'   => 'Kode Transaksi Harus diisi Harus diisi', 
                        'max_length' => 'Persediaan Kayu Maksimal 100 Angka',  
                    ]
                ], 
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
                        'required'   => 'Jenis Kayu Harus dipilih', 
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
                ],  
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/transaksi/add'))->withInput(); 
            } 


            $PersediaanKayus = new PersediaanKayuModel(); 
            $Transaksis = new TransaksiModel(); 

            
            $kodetransaksi = explode("#",$this->request->getVar('kodetransaksi'));  
            $kodetransaksi1 = explode(" ",$kodetransaksi[1]);   
            $kodetransaksi2 = $kodetransaksi1[0];
 
            $j_pem = explode("-",$this->request->getVar('j_pem'));  
            
            $id_jenis_kayu = $j_pem[0];
            $id_tipe_kayu = $j_pem[1];
            $id_ukuran_kayu = $j_pem[2];
            $id_persediaan = $j_pem[3];
            $jmlpembelian = $j_pem[4];
 
            $darapersediaan = $PersediaanKayus->where('id_persediaan', $id_persediaan)->findAll(); 
 
            $sisa =  $darapersediaan[0]->sisa_persediaan - $jmlpembelian ;
           
  
            $Transaksis->insert([ 
                'kode_transaksi' => $kodetransaksi2,
                'jumlah_pembelian' => $jmlpembelian,
                'total_harga' => $this->request->getVar('ttl_harga'),
                'tipe_pesanan' => $this->request->getVar('tipe_pesanan'),
                'id_persediaan' => $id_persediaan,
                'id_jenis_kayu' => $id_jenis_kayu,
                'id_tipe_kayu' => $id_tipe_kayu,
                'id_ukuran_kayu' => $id_ukuran_kayu,
                'tgl_transaksi' => date("Y-m-d H:i:s"),
            ]);

     
            $dataubahsisa = [
                'sisa_persediaan' => $sisa,     
            ];  
            $PersediaanKayus->update($id_persediaan, $dataubahsisa);

 
            session()->setFlashdata('alert', 'Berhasil Menambah Data.');
            return redirect()->to(base_url('transaksi/'))->withInput(); 
        
            
 
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

        $data = array( 
			'title' => 'Transaksi [SIE-JAKU]',  
            'getdata' => $id,
		); 

        $html = view('v_view_transksi', $data); 
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
            for ($x = 0; $x <= $dataPersediaanKayus[0]->jml_persediaan; $x++) {
                echo "<option value='".$id."-".$x."'>".$x." / ".$dataPersediaanKayus[0]->jml_persediaan ."</option>";
            }  
        }
          

    }
  

    function add_ajax_gharga($id = null)
    {

        $pecah = explode("-",$id); 

        $id_jenis_kayu = $pecah[0];
        $id_tipe_kayu = $pecah[1];
        $id_ukuran_kayu = $pecah[2];
        $jmlpembelian = $pecah[4];

        $PersediaanKayus = new PersediaanKayuModel();  
        $HargaKayus = new HargaKayuModel();  

        $dataPersediaanKayus = $PersediaanKayus->where('id_jenis_kayu', $id_jenis_kayu, 'id_tipe_kayu', $id_tipe_kayu, 'id_ukuran_kayu', $id_ukuran_kayu,)->findAll(); 
        $dataHargaKayus = $HargaKayus->where('id_harga_kayu', $dataPersediaanKayus[0]->id_harga_kayu)->findAll(); 
 
        $totalharga = ($jmlpembelian * $dataHargaKayus[0]->nama_harga_kayu);
        echo "<option value='".$totalharga."'> Rp " . number_format($totalharga,2,',','.')." </option>";
  
 
 
    }

    














    

}