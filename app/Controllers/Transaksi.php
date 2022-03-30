<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JenisKayuModel;
use App\Models\TipeKayuModel;
use App\Models\UkuranKayuModel;
use App\Models\PersediaanKayuModel;
use App\Models\TransaksiModel;


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
                    'rules' => 'required|max_length[20]',
                    'errors' => [
                        'required'   => 'Total Harga Harus diisi', 
                        'max_length' => 'Total Harga Maksimal 20 Angka',  
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
            $jmlpembelian = $j_pem[3];
 
            $ttl_harga = $PersediaanKayus->where('id_jenis_kayu', $id_jenis_kayu, 'id_tipe_kayu', $id_tipe_kayu, 'id_ukuran_kayu', $id_ukuran_kayu,)->findAll(); 
            $ttl_harga2 = $ttl_harga[0]->Harga_satuan * $jmlpembelian;

            $sisa =  $ttl_harga[0]->jml_persediaan  - $jmlpembelian ;
           
 
 
            $Transaksis->insert([ 
                'kode_transaksi' => $kodetransaksi2,
                'jumlah_pembelian' => $jmlpembelian,
                'total_harga' => $ttl_harga2,
                'id_jenis_kayu' => $id_jenis_kayu,
                'id_tipe_kayu' => $id_tipe_kayu,
                'id_ukuran_kayu' => $id_ukuran_kayu,
                'tgl_transaksi' => date("Y-m-d H:i:s"),
            ]);

     
            $dataubahsisa = [
                'jml_persediaan' => $sisa,     
            ];  
            $PersediaanKayus->update($ttl_harga[0]->id_persediaan, $dataubahsisa);

 
            session()->setFlashdata('alert', 'Berhasil Menambah Data.');
            return redirect()->to(base_url('transaksi/'))->withInput(); 
             
 
    }


    public function transaksi_deletedata($id = null)
    {
          $Transaksis = new TransaksiModel(); 
  
          if($Transaksis->find($id)){
              $Transaksis->delete($id); 
  
              session()->setFlashdata('alert', 'Berhasil Menghapus Data.');
              return redirect()->to(base_url('transaksi'))->withInput();  
          }else{
              session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
              return redirect()->to(base_url('transaksi'))->withInput(); 
          }
  
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
  
   
    function add_ajax_jmlp($id = null)
    {
        $pecah = explode("-",$id); 

        $id_jenis_kayu = $pecah[0];
        $id_tipe_kayu = $pecah[1];
        $id_ukuran_kayu = $pecah[2];


        


        $PersediaanKayus = new PersediaanKayuModel();  
        $dataPersediaanKayus = $PersediaanKayus->where('id_ukuran_kayu', $id_ukuran_kayu, 'id_jenis_kayu', $id_jenis_kayu, 'id_tipe_kayu', $id_tipe_kayu )->findAll(); 


        if ($dataPersediaanKayus == false) {
            echo "<option value=''>0</option>";
        }else{ 
            for ($x = 0; $x <= $dataPersediaanKayus[0]->jml_persediaan  ; $x++) {
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
        $jmlpembelian = $pecah[3];

        $PersediaanKayus = new PersediaanKayuModel();  
        $dataPersediaanKayus = $PersediaanKayus->where('id_jenis_kayu', $id_jenis_kayu, 'id_tipe_kayu', $id_tipe_kayu, 'id_ukuran_kayu', $id_ukuran_kayu,)->findAll(); 


        echo  "  <input type='text' class='form-control' readonly  name='ttl_harga' value='Rp " . number_format(($jmlpembelian * $dataPersediaanKayus[0]->Harga_satuan),2,',','.')." '>" ;
 
 
    }

    














    

}