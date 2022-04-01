<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JenisKayuModel;
use App\Models\TipeKayuModel;
use App\Models\UkuranKayuModel;
use App\Models\PersediaanKayuModel;
use App\Models\HargaKayuModel;





class Stock extends Controller{



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
      'title' => 'Jenis Kayu [SIE-JAKU]', 
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
            'nama_jenis_kayu' => $this->request->getVar('jeniskayu'),
            'tgl_jenis_kayu' => $this->request->getVar('tgl')
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
            'title' => 'Jenis Kayu [SIE-JAKU]', 
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




  /* start type kayu */
    public function tipe()
    {   

        $TipeKayus = new TipeKayuModel(); 


        $data = array(
            'menu' => '3a',
            'title' => 'Tipe Kayu [SIE-JAKU]', 
            'batascss' => 'c4b',  
            'DataTipeKayus' => $TipeKayus->getjoinall(),  

        );   
        echo view('section/header', $data);
        echo view('v_type_kayu', $data);
        echo view('section/footer', $data); 

    }

    public function add_tipe_kayu()
    {   
          $JenisKayus = new JenisKayuModel(); 


          $data = array(
              'menu' => '3a',
              'title' => 'Tipe Kayu [SIE-JAKU]', 
              'batascss' => 'c4b', 
              'dataJenisKayus' => $JenisKayus->findall(), 
          );   
          echo view('section/header', $data);
          echo view('v_add_tipe_kayu', $data);
          echo view('section/footer', $data); 

    }

    public function tipe_process()
    {    
              $TipeKayus = new TipeKayuModel();
    

              if (!$this->validate([
                  'tkayu' => [
                      'rules' => 'required|min_length[4]|max_length[100]',
                      'errors' => [
                          'required'   => 'Tipe Kayu Harus diisi',
                          'min_length' => 'Tipe Kayu Minimal 4 Karakter',
                          'max_length' => 'Tipe Kayu Maksimal 100 Karakter',   
                      ]
                  ],   
                  'jkayu' => [
                      'rules' => 'required',
                      'errors' => [
                          'required'   => 'Jenis Kayu Harus dipilih', 
                      ]
                  ], 
              ])) {
                  session()->setFlashdata('error', $this->validator->listErrors());
                  return redirect()->to(base_url('/tipe-kayu/add'))->withInput(); 
              } 
 
              $TipeKayus->insert([ 
                  'nama_tipe_kayu' => $this->request->getVar('tkayu'),
                  'id_jenis_kayu' => $this->request->getVar('jkayu'),
                  'tgl_tipe_kayu' => $this->request->getVar('tgl')
              ]);
              session()->setFlashdata('alert', 'Berhasil Menambah Data. Dengan [ Nama Tipe = '.'#'.$this->request->getVar('tkayu').' ]');
              return redirect()->to(base_url('tipe-kayu/'))->withInput(); 

 

    }
 
    public function tipe_deletedata($id = null)
    {
        $TipeKayus = new TipeKayuModel();

        if($TipeKayus->find($id)){
            $TipeKayus->delete($id); 

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('tipe-kayu'))->withInput();  
        }else{
            session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('tipe-kayu'))->withInput(); 
        }

    }


    public function tipe_edit($id = null)
    {
        
        $JenisKayus = new JenisKayuModel();  
        $TipeKayus = new TipeKayuModel();

 
        $data = array(
            'menu' => '3a',
            'title' => 'Tipe Kayu [SIE-JAKU]', 
            'batascss' => 'c4b',  
            'dataTipeKayus' => $TipeKayus->find($id),
            'dataJenisKayus' => $JenisKayus->findall(), 

        );   
        echo view('section/header', $data);
        echo view('v_edt_tipe_kayu', $data);
        echo view('section/footer', $data); 
    } 
 
    public function tipe_editproses($id = null)
    {
     
              $TipeKayus = new TipeKayuModel();




              if (!$this->validate([
                  'tkayu' => [
                      'rules' => 'required|min_length[4]|max_length[100]',
                      'errors' => [
                          'required'   => 'Tipe Kayu Harus diisi',
                          'min_length' => 'Tipe Kayu Minimal 4 Karakter',
                          'max_length' => 'Tipe Kayu Maksimal 100 Karakter',  
                      ]
                  ], 
                  'jkayu' => [
                      'rules' => 'required',
                      'errors' => [
                          'required'   => 'Jenis Kayu Harus dipilih', 
                      ]
                  ], 
              ])) {
                  session()->setFlashdata('error', $this->validator->listErrors());
                  return redirect()->to(base_url('/tipe-kayu/'.$id))->withInput(); 
              } 

 
            $data = [
                'nama_tipe_kayu' => $this->request->getpost('tkayu'),
                'id_jenis_kayu' => $this->request->getpost('jkayu'),
                'updated_at'     => date("Y-m-d H:i:s"),   

            ];  
            $TipeKayus->update($id, $data);
            
            session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('tipe-kayu'))->withInput();  



    }

 


/* END TYPE KAYU  */


/* START UKURAN KAYU */

  public function ukuran()
  {   
    $UkuranKayus = new UkuranKayuModel();


    $data = array(
    'menu' => '3a',
    'title' => 'Ukuran Kayu [SIE-JAKU]', 
    'batascss' => 'c4c',
    'dataUkuranKayus' => $UkuranKayus->getjoinall(),  
 
    );   
    echo view('section/header', $data);
    echo view('v_ukuran_kayu', $data);
    echo view('section/footer', $data); 

  }

  public function add_ukuran_kayu()
  {   
        $JenisKayus = new JenisKayuModel(); 
        
        $data = array(
            'menu' => '3a',
            'title' => 'Ukuran Kayu [SIE-JAKU]', 
            'batascss' => 'c4c', 
            'dataJenisKayus' => $JenisKayus->findall(), 
        );   
        echo view('section/header', $data);
        echo view('v_add_ukuran_kayu', $data);
        echo view('section/footer', $data); 

  }

  public function ukuran_process()
  {    
            if (!$this->validate([
                'ukayu' => [
                    'rules' => 'required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required'   => 'Ukuran Kayu Harus diisi',
                        'min_length' => 'Ukuran Kayu Minimal 4 Karakter',
                        'max_length' => 'Ukuran Kayu Maksimal 100 Karakter',  
                    ]
                ], 
                'jkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Jenis Kayu Harus dipilih', 
                    ]
                ],   
                'tkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tipe Kayu Harus dipilih',  
                    ]
                ], 
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/ukuran-kayu/add'))->withInput(); 
            } 

            $UkuranKayus = new UkuranKayuModel(); 
            $UkuranKayus->insert([ 
                'nama_Ukuran_kayu' => $this->request->getVar('ukayu'),
                'id_tipe_kayu' => $this->request->getVar('tkayu'),
                'tgl_ukuran_kayu' => $this->request->getVar('tgl')
            ]);
            session()->setFlashdata('alert', 'Berhasil Menambah Data.');
            return redirect()->to(base_url('ukuran-kayu/'))->withInput(); 
       

  }

  public function ukuran_deletedata($id = null)
  {
        $UkuranKayus = new UkuranKayuModel();

        if($UkuranKayus->find($id)){
            $UkuranKayus->delete($id); 

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('ukuran-kayu'))->withInput();  
        }else{
            session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('ukuran-kayu'))->withInput(); 
        }

  }

 
  public function ukuran_edit($id = null)
  {
        $UkuranKayus = new UkuranKayuModel(); 
        $JenisKayus = new JenisKayuModel();  
        $TipeKayus = new TipeKayuModel();


        $data1 = $UkuranKayus->where('id_ukuran_kayu', $id)->findAll();
        $data2 = $TipeKayus->where('id_tipe_kayu', $data1[0]->id_tipe_kayu)->findAll(); 
        $data3 = $JenisKayus->where('id_jenis_kayu', $data2[0]->id_jenis_kayu)->findAll(); 

  
      $data = array(
          'menu' => '3a',
          'title' => 'Ukuran Kayu [SIE-JAKU]', 
          'batascss' => 'c4c',  
          'dataTipeKayus' => $data2,
          'dataTipeKayusall' => $TipeKayus->where('id_jenis_kayu', $data3[0]->id_jenis_kayu)->findAll(),
          'dataJenisKayus' => $JenisKayus->findAll(), 
          'UkuranKayus' => $data1, 

      );   
      echo view('section/header', $data);
      echo view('v_edt_ukuran_kayu', $data);
      echo view('section/footer', $data);  
       
  } 

  public function ukuran_editproses($id = null)
  {
   
 
            if (!$this->validate([
                'ukayu' => [
                    'rules' => 'required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required'   => 'Ukuran Kayu Harus diisi',
                        'min_length' => 'Ukuran Kayu Minimal 4 Karakter',
                        'max_length' => 'Ukuran Kayu Maksimal 100 Karakter',  
                    ]
                ], 
                'jkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Jenis Kayu Harus dipilih', 
                    ]
                ], 
                'tkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tipe Kayu Harus dipilih', 
                    ]
                ], 
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/ukuran-kayu/'.$id))->withInput(); 
            } 

 
          $UkuranKayus = new UkuranKayuModel();

          $data = [
              'nama_Ukuran_kayu' => $this->request->getpost('ukayu'),
              'id_tipe_kayu' => $this->request->getpost('tkayu'),
              'updated_at'     => date("Y-m-d H:i:s"),   

          ];  
          $UkuranKayus->update($id, $data);
          
          session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = #'.$id.' ]');
          return redirect()->to(base_url('ukuran-kayu'))->withInput();  

 

  }

 
 


/* END UKURAN KAYU  */



/* HARGA KAYU */

  public function harga()
  {   

            $HargaKayus = new HargaKayuModel(); 


            $data = array(
            'menu' => '3a',
            'title' => 'Harga Kayu [SIE-JAKU]', 
            'batascss' => 'c4d',   
            'dataHargaKayus' => $HargaKayus->getjoinall(), 
        
            );   
            echo view('section/header', $data);
            echo view('v_harga_kayu', $data);
            echo view('section/footer', $data); 

  }
 
  public function add_harga_kayu()
  {   
        $JenisKayus = new JenisKayuModel(); 
        
        $data = array(
            'menu' => '3a',
            'title' => 'Harga Kayu [SIE-JAKU]', 
            'batascss' => 'c4d', 
            'dataJenisKayus' => $JenisKayus->findall(), 
        );   
        echo view('section/header', $data);
        echo view('v_add_harga', $data);
        echo view('section/footer', $data); 

  }
 
  public function harga_process()
  {    
            if (!$this->validate([
                'harga' => [
                    'rules' => 'required|max_length[100]',
                    'errors' => [
                        'required'   => 'Harga Kayu Harus diisi', 
                        'max_length' => 'Harga Kayu Maksimal 100 Karakter',  
                    ]
                ], 
                'jkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Jenis Kayu Harus dipilih', 
                    ]
                ], 
                'tkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tipe Kayu Harus dipilih', 
                    ]
                ], 
                'ukayu' => [
                    'rules' => 'required|is_unique[db_harga_kayu.id_ukuran_kayu]',
                    'errors' => [
                        'required'   => ' Kayu Harus dipilih', 
                        'is_unique' => 'Jenis, tipe Dan Ukuran Kayu sudah digunakan sebelumnya'
                    ]
                ], 
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/harga-kayu/add'))->withInput(); 
            } 
 
            $HargaKayus = new HargaKayuModel(); 
            $HargaKayus->insert([ 
                'nama_harga_kayu' => $this->request->getVar('harga'),
                'id_ukuran_kayu' => $this->request->getVar('ukayu'),
                'tgl_harga_kayu' => $this->request->getVar('tgl')
            ]);

            session()->setFlashdata('alert', 'Berhasil Menambah Data.');
            return redirect()->to(base_url('harga-kayu/'))->withInput(); 
        

  }
 
  public function harga_deletedata($id = null)
  {
        $HargaKayus = new HargaKayuModel(); 

        if($HargaKayus->find($id)){
            $HargaKayus->delete($id); 

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('harga-kayu'))->withInput();  
        }else{
            session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('harga-kayu'))->withInput(); 
        }

  }
 
  public function harga_edit($id = null)
  {
        $HargaKayus = new HargaKayuModel(); 

        $JenisKayus = new JenisKayuModel();  
        $TipeKayus = new TipeKayuModel();
        $UkuranKayus = new UkuranKayuModel(); 

        $data1 = $HargaKayus->where('id_harga_kayu', $id)->findAll(); 
        $data2 = $UkuranKayus->where('id_ukuran_kayu', $data1[0]->id_ukuran_kayu)->findAll(); 
        $data3 = $TipeKayus->where('id_tipe_kayu', $data2[0]->id_tipe_kayu)->findAll(); 
        $data4 = $JenisKayus->where('id_jenis_kayu', $data3[0]->id_jenis_kayu)->findAll(); 

 
      $data = array(
            'menu' => '3a',
            'title' => 'Ukuran Kayu [SIE-JAKU]', 
            'batascss' => 'c4d',  
            'data1' => $data1, //harga kayu
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'dataJenisKayus' => $JenisKayus->findall(),  
            'dataTipeKayus' => $TipeKayus->where('id_jenis_kayu', $data4[0]->id_jenis_kayu)->findAll(),   
            'dataukuranKayus' => $UkuranKayus->where('id_tipe_kayu', $data3[0]->id_tipe_kayu)->findAll(),  
 

      );   
      echo view('section/header', $data);
      echo view('v_edt_harga', $data);
      echo view('section/footer', $data);   
       
  } 
 
  public function harga_editproses($id = null)
  {
   
    
 
             if (!$this->validate([
                'harga' => [
                    'rules' => 'required|max_length[100]',
                    'errors' => [
                        'required'   => 'Harga Kayu Harus diisi', 
                        'max_length' => 'Harga Kayu Maksimal 100 Karakter',  
                    ]
                ], 
                'jkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Jenis Kayu Harus dipilih', 
                    ]
                ], 
                'tkayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Tipe Kayu Harus dipilih', 
                    ]
                ], 
                'ukayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => ' Kayu Harus dipilih',  
                    ]
                ], 
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/harga-kayu/'.$id ))->withInput(); 
            } 

                $HargaKayus = new HargaKayuModel(); 


                $data = [
                    'nama_harga_kayu' => $this->request->getpost('harga'),
                    'id_ukuran_kayu' => $this->request->getpost('ukayu'),
                   // 'updated_at'     => date("Y-m-d H:i:s"),   

                ];  
                $HargaKayus->update($id, $data);
                
                session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = #'.$id.' ]');
                return redirect()->to(base_url('harga-kayu'))->withInput();  
  
 

  }




/* END HARGA KAYU */



/*  */
  public function persediaan()
  {   

    $PersediaanKayus = new PersediaanKayuModel(); 
    $UkuranKayus = new UkuranKayuModel(); 
    $JenisKayus = new JenisKayuModel();  
    $TipeKayus = new TipeKayuModel();
 
 
    $data = array(
            'menu' => '3a',
            'title' => 'Persedian Kayu [SIE-JAKU]', 
            'batascss' => 'c4persediaan',  
            'dataPersediaanKayus' => $PersediaanKayus->getjoinall(), 

    );   
    echo view('section/header', $data);
    echo view('v_persediaan', $data);
    echo view('section/footer', $data); 
 
  }
 
  public function add_persediaan_kayu()
  {   
        
        $JenisKayus = new JenisKayuModel();  

        $data = array(
            'menu' => '3a',
            'title' => 'Persediaan Kayu [SIE-JAKU]', 
            'batascss' => 'c4persediaan', 
            'dataJenisKayus' => $JenisKayus->findAll(), 
             
        );   
        echo view('section/header', $data);
        echo view('v_add_persediaan', $data);
        echo view('section/footer', $data); 

  }
  
  public function persediaan_process()
  {    
  
            if (!$this->validate([ 
                'p_kayu' => [
                    'rules' => 'required|max_length[5]',
                    'errors' => [
                        'required'   => 'Persediaan Kayu Harus diisi', 
                        'max_length' => 'Persediaan Kayu Maksimal 5 Angka',  
                    ]
                ], 
                'harga_k' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Harga Kayu Harus dipilih', 
                    ]
                ], 
                'j_kayu' => [
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
                'ukayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Ukuran Kayu Harus dipilih', 
                    ]
                ],  
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/persediaan-kayu/add'))->withInput(); 
            } 
  
            $PersediaanKayus = new PersediaanKayuModel(); 


           // print_r($this->request->getVar('harga_k'));

             
            $PersediaanKayus->insert([ 
                'Tanggal_persediaan' => $this->request->getVar('tgl'),
                'jml_persediaan' => $this->request->getVar('p_kayu'),
                'sisa_persediaan' => $this->request->getVar('p_kayu'),
                'id_harga_kayu' => $this->request->getVar('harga_k'),
                'id_jenis_kayu' => $this->request->getVar('j_kayu'),
                'id_tipe_kayu' => $this->request->getVar('t_kayu'),
                'id_ukuran_kayu' => $this->request->getVar('ukayu'),
            ]);
 

            session()->setFlashdata('alert', 'Berhasil Menambah Data.');
            return redirect()->to(base_url('persediaan-kayu/'))->withInput(); 
 
 
  }
 
  public function persediaan_deletedata($id = null)
  {
        $PersediaanKayus = new PersediaanKayuModel(); 

        if($PersediaanKayus->find($id)){
            $PersediaanKayus->delete($id); 

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('persediaan-kayu'))->withInput();  
        }else{
            session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = #'.$id.' ]');
            return redirect()->to(base_url('persediaan-kayu'))->withInput(); 
        }

  }

 

  public function persediaan_edit($id = null)
  {
        $PersediaanKayus = new PersediaanKayuModel();  
        $UkuranKayus = new UkuranKayuModel(); 
        $JenisKayus = new JenisKayuModel();  
        $TipeKayus = new TipeKayuModel();
        $HargaKayus = new HargaKayuModel(); 

 
        $data1 = $PersediaanKayus->where('id_persediaan', $id)->findAll(); 
        $data3 = $TipeKayus->where('id_jenis_kayu', $data1[0]->id_jenis_kayu)->findAll(); 
        $data4 = $UkuranKayus->where('id_tipe_kayu', $data1[0]->id_tipe_kayu)->findAll(); 
        $data5 = $HargaKayus->where('id_harga_kayu', $data1[0]->id_harga_kayu)->findAll(); 
 
 
   
      $data = array(
          'menu' => '3a',
          'title' => 'Persediaan Kayu [SIE-JAKU]', 
          'batascss' => 'c4persediaan',  
          'datapersediaan' => $data1, 
          'dataJenisKayus' => $JenisKayus->findAll(), 
          'dataTipeKayus' => $data3, 
          'dataUkuranKayus' => $data4, 
          'datHargaKayus' => $data5, 


      );   
      echo view('section/header', $data);
      echo view('v_edt_persediaan', $data);
      echo view('section/footer', $data);  


      
       
  } 



  public function persediaan_editproses($id = null)
  {
   
 
            if (!$this->validate([
                'p_kayu' => [
                    'rules' => 'required|max_length[5]',
                    'errors' => [
                        'required'   => 'Persediaan Kayu Harus diisi', 
                        'max_length' => 'Persediaan Kayu Maksimal 5 Angka',  
                    ]
                ], 
                'harga_k' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Jenis Kayu Harus dipilih',   
                    ]
                ], 
                'j_kayu' => [
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
                'ukayu' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Ukuran Kayu Harus dipilih', 
                    ]
                ],  
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/persediaan-kayu/'.$id))->withInput(); 
            } 


            if ($this->request->getVar('p_kayu') > $this->request->getVar('tlp_kayu')) {
                $inputstock = $this->request->getVar('tlp_kayu');
             }else{
                $inputstock =$this->request->getVar('p_kayu');
            }
 

        $PersediaanKayus = new PersediaanKayuModel();   
        $data = [
            'sisa_persediaan' => $inputstock,
            'id_harga_kayu' => $this->request->getVar('harga_k'),
            'id_jenis_kayu' => $this->request->getVar('j_kayu'),
            'id_tipe_kayu' => $this->request->getVar('t_kayu'),
            'id_ukuran_kayu' => $this->request->getVar('ukayu'), 

        ];  
        $PersediaanKayus->update($id, $data);
        
        session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = #'.$id.' ]');
        return redirect()->to(base_url('persediaan-kayu'))->withInput();  
 
 
  }

 





  function add_ajax_tkayu($id = null)
  { 
        $TipeKayus = new TipeKayuModel(); 
        $dataTipeKayus = $TipeKayus->where('id_jenis_kayu', $id)->findAll(); 
        $data = "<option value=''>- Select Tipe Kayu -</option>"; 
        foreach ($dataTipeKayus as $value) {
          $data .= "<option value='".$value->id_tipe_kayu."'>".$value->nama_tipe_kayu."</option>";
        } 
        echo $data;  
  }

 
 
  function add_ajax_ukayu($id = null)
  { 
        $UkuranKayus = new UkuranKayuModel(); 
        $dataUkuranKayus = $UkuranKayus->where('id_tipe_kayu', $id)->findAll(); 
        $data = "<option value=''>- Select Tipe Kayu -</option>"; 
        foreach ($dataUkuranKayus as $value) {
          $data .= "<option value='".$value->id_ukuran_kayu."'>".$value->nama_Ukuran_kayu."</option>";
        } 
        echo $data;  
  }

 
  function add_ajax_hargakayu($id = null)
  { 
        $HargaKayus = new HargaKayuModel(); 
        $dataHargaKayus = $HargaKayus->where('id_ukuran_kayu', $id)->findAll(); 

        if ($dataHargaKayus == false) {
            $data = "<option value=''>Rp " . number_format(0,2,',','.')  ."  </option>";
        }else{
            $data = ""; 
        foreach ($dataHargaKayus as $value) {
            $data .= "<option value='".$value->id_harga_kayu ."'>Rp " . number_format($value->nama_harga_kayu,2,',','.')  ."  </option>";
        } 
        }

        
        echo $data;  
  }




}