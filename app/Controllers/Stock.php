<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JenisKayuModel;

class Stock extends Controller{

/*  */
  public function persediaan()
  {   
    $data = array(
    'menu' => '3a',
    'title' => 'Persedian Kayu [SIE-JAKU]', 
    'batascss' => 'c4', 
    );   
    echo view('section/header', $data);
    echo view('v_stock', $data);
    echo view('section/footer', $data); 

  }



/*  start Jenis Kayu */
  public function jenis()
    {   

      $JenisKayuModels = new JenisKayuModel();

      $data = array(
                  'menu' => '3a',
                  'title' => 'Jenis Kayu [SIE-JAKU]', 
                  'batascss' => 'c4a',      
                  'JenisKayuModels' => $JenisKayuModels->findAll(),  

      );   

      echo view('section/header', $data);
      echo view('v_jenis_kayu', $data);
      echo view('section/footer', $data); 

    }

  public function add_jenis_kayu()
    {   
      $data = array(
      'menu' => '3a',
      'title' => 'Tambah Jenis Kayu [SIE-JAKU]', 
      'batascss' => 'c4a', 
      );   
      echo view('section/header', $data);
      echo view('v_add_jenis_kayu', $data);
      echo view('section/footer', $data); 

    }

  public function process()
    {   

        $JenisKayuModels = new JenisKayuModel();


              if (!$this->validate([
                  'jeniskayu' => [
                      'rules' => 'required|min_length[4]|max_length[100]',
                      'errors' => [
                          'required'   => 'Jenis Kayu Harus diisi',
                          'min_length' => 'Jenis Kayu Minimal 4 Karakter',
                          'max_length' => 'Jenis Kayu Maksimal 100 Karakter',  
                      ]
                  ], 
              ])) {
                  session()->setFlashdata('error', $this->validator->listErrors());
                  return redirect()->to(base_url('/jenis-kayu/add'))->withInput(); 
              } 

 
        $JenisKayuModels->insert([ 
            'nama_jenis_kayu' => $this->request->getVar('jeniskayu')
        ]);
        session()->setFlashdata('alert', 'Berhasil Menambah Data. Dengan [ Nama Kayu= '.'#'.$this->request->getVar('jeniskayu').' ]');
        return redirect()->to(base_url('jenis-kayu/'))->withInput(); 



    }

 
    public function deletedata($id = null)
    { 
         $JenisKayuModels = new JenisKayuModel(); 

        if($JenisKayuModels->find($id)){
            $JenisKayuModels->delete($id); 

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('jenis-kayu'))->withInput();  
        }else{
            session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('jenis-kayu'))->withInput(); 
        } 
          
    }  


    public function edit($id = null)
    {


      $JenisKayuModels = new JenisKayuModel(); 
      
       $data = array(
            'menu' => '3a',
            'title' => 'Edit Jenis Kayu [SIE-JAKU]', 
            'batascss' => 'c4a', 
            'datajeniskayu' => $JenisKayuModels->find($id), 
      );   
      echo view('section/header', $data);
      echo view('v_edt_jenis_kayu', $data);
      echo view('section/footer', $data); 

    }


    
    public function editproses($id = null)
    {
              $JenisKayuModels = new JenisKayuModel(); 

              if (!$this->validate([
                  'jeniskayu' => [
                      'rules' => 'required|min_length[4]|max_length[100]',
                      'errors' => [
                          'required'   => 'Jenis Kayu Harus diisi',
                          'min_length' => 'Jenis Kayu Minimal 4 Karakter',
                          'max_length' => 'Jenis Kayu Maksimal 100 Karakter',  
                      ]
                  ], 
              ])) {
                  session()->setFlashdata('error', $this->validator->listErrors());
                  return redirect()->to(base_url('/jenis-kayu/'.$id))->withInput(); 
              } 

            $data = [
                'nama_jenis_kayu' => $this->request->getpost('jeniskayu'),
                'updated_at'     => date("Y-m-d H:i:s"),   

            ];  
            $JenisKayuModels->update($id, $data);
            
            session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('jenis-kayu'))->withInput();  
       



    }

/* END Jenis Kayu */




  /*  */
  public function tipe()
  {   
      $data = array(
      'menu' => '3a',
      'title' => 'Jenis Kayu [SIE-JAKU]', 
      'batascss' => 'c4', 
      );   
      echo view('section/header', $data);
      echo view('v_type_kayu', $data);
      echo view('section/footer', $data); 

  }
/*  */
  public function ukuran()
  {   
    $data = array(
    'menu' => '3a',
    'title' => 'Jenis Kayu [SIE-JAKU]', 
    'batascss' => 'c4', 
    );   
    echo view('section/header', $data);
    echo view('v_ukuran_kayu', $data);
    echo view('section/footer', $data); 

  }

}