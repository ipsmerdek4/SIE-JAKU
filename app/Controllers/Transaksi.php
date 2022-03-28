<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JenisKayuModel;
use App\Models\TipeKayuModel;
use App\Models\UkuranKayuModel;
use App\Models\PersediaanKayuModel;


class Transaksi extends Controller{


    public function index()
    {  
 
        $data = array(
			'menu' => '4a',
			'title' => 'Transaksi [SIE-JAKU]', 
            'batascss' => 'c5', 

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
        $dataPersediaanKayus = $PersediaanKayus->where('id_jenis_kayu', $id_jenis_kayu, 'id_tipe_kayu', $id_tipe_kayu, 'id_ukuran_kayu', $id_ukuran_kayu,)->findAll(); 


 
        for ($x = 0; $x <= $dataPersediaanKayus[0]->jml_persediaan  ; $x++) {
            echo "<option value='".$id."-".$x."'>".$x." / ".$dataPersediaanKayus[0]->jml_persediaan ."</option>";
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


        echo  "
            <input type='text' class='form-control' disabled  id='' value='Rp " . number_format(($jmlpembelian * $dataPersediaanKayus[0]->Harga_satuan),2,',','.')." '>" ;
 
 
    }

    














    

}