<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CustomerModel; 


class Customers extends Controller{

    public function index()
    {  
        $Customers = new CustomerModel();  
        $data = array(
			'menu' => '2a',
			'title' => 'Customer [SIE-JAKU]', 
            'batascss' => 'c3a',
            'datacustomers' => $Customers->findAll(),  
		);   
        echo view('section/header', $data);
        echo view('v_customer', $data);
		echo view('section/footer', $data); 
        
    }


    public function customeradd()
    {  

        $data = array(
			'menu' => '2a',
			'title' => 'Tambah Customer [SIE-JAKU]', 
            'batascss' => 'c3', 

		); 
        echo view('section/header', $data);
        echo view('v_tbhcustomer', $data);
		echo view('section/footer', $data); 
    }
  
      
    public function process()
    {   
            if (!$this->validate([
                'customers' => [
                    'rules' => 'required|min_length[4]|max_length[20]',
                    'errors' => [
                        'required'   => 'Nama Customer Harus diisi',
                        'min_length' => 'Nama Customer Minimal 4 Karakter',
                        'max_length' => 'Nama Customer Maksimal 20 Karakter',  
                    ]
                ], 
                'nama' => [
                    'rules' => 'required|min_length[4]|max_length[50]',
                    'errors' => [
                        'required'   => 'Nama Lengkap Harus diisi',
                        'min_length' => 'Nama Lengkap Minimal 4 Karakter',
                        'max_length' => 'Nama Lengkap Maksimal 50 Karakter',  
                    ]
                ], 
                'hp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Nomer HP Harus diisi', 
                    ]
                ], 
                'provinsi_id' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required'   => 'Provinsi Harus diisi', 
                        'max_length' => 'Provinsi 50 Karakter',  
                    ]
                ], 
                'kabupaten_id' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required'   => 'Kabupaten Harus diisi', 
                        'max_length' => 'Kabupaten 50 Karakter',  
                    ]
                ], 
                'kecamatan_id' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required'   => 'Kecamatan Harus diisi', 
                        'max_length' => 'Kecamatan 50 Karakter',  
                    ]
                ], 
                'desa_id' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required'   => 'Desa Harus diisi', 
                        'max_length' => 'Desa 50 Karakter',  
                    ]
                ], 
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Alamat Harus diisi', 
                    ]
                ], 
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('customers/add/'))->withInput(); 
            } 
 
        $Customer = new CustomerModel(); 
        $Customer->insert([
            'customers'         => '#'.$this->request->getVar('customers'), 
            'nama'              => $this->request->getVar('nama'),
            'telp'              => $this->request->getVar('telp'),
            'hp'                => $this->request->getVar('hp'),
            'wa'                => $this->request->getVar('wa'),
            'nama_provinsi'     => $this->request->getVar('provinsi_id'),
            'nama_kabupaten'    => $this->request->getVar('kabupaten_id'),
            'nama_kecamatan'    => $this->request->getVar('kecamatan_id'),
            'nama_desa'         => $this->request->getVar('desa_id'),
            'alamat'            => $this->request->getVar('alamat'), 
        ]);
        
        session()->setFlashdata('alert', 'Berhasil Menambah Data. Dengan [ ID = '.'#'.$this->request->getVar('customers').' ]');
        return redirect()->to(base_url('customers/'))->withInput(); 
    



    }


 

    public function customeredit($id = null)
    {
 

        $Customers = new CustomerModel(); 


        $data1 = $Customers->where('id_customers', $id)->findAll();
 
        $data = array(
            'menu' => '2a',
            'title' => 'Edit Customer [SIE-JAKU]', 
            'batascss' => 'c3', 
            'datacustomers' => $data1,   
        ); 

       
        echo view('section/header', $data);
        echo view('v_edtcustomer', $data);
		echo view('section/footer', $data); 
 
            

    }

 
    public function customerprosess($id = null)
    { 
        $Customers = new CustomerModel(); 

        if (!$this->validate([
            'customers' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required'   => 'Nama Customer Harus diisi',
                    'min_length' => 'Nama Customer Minimal 4 Karakter',
                    'max_length' => 'Nama Customer Maksimal 20 Karakter',  
                ]
            ], 
            'nama' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required'   => 'Nama Lengkap Harus diisi',
                    'min_length' => 'Nama Lengkap Minimal 4 Karakter',
                    'max_length' => 'Nama Lengkap Maksimal 50 Karakter',  
                ]
            ], 
            'hp' => [
                'rules' => 'required',
                'errors' => [
                    'required'   => 'Nomer HP Harus diisi', 
                ]
            ], 
            'provinsi_id' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required'   => 'Provinsi Harus diisi', 
                    'max_length' => 'Provinsi 50 Karakter',  
                ]
            ], 
            'kabupaten_id' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required'   => 'Kabupaten Harus diisi', 
                    'max_length' => 'Kabupaten 50 Karakter',  
                ]
            ], 
            'kecamatan_id' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required'   => 'Kecamatan Harus diisi', 
                    'max_length' => 'Kecamatan 50 Karakter',  
                ]
            ], 
            'desa_id' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required'   => 'Desa Harus diisi', 
                    'max_length' => 'Desa 50 Karakter',  
                ]
            ], 
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required'   => 'Alamat Harus diisi', 
                ]
            ], 
        ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('customers/'.$id))->withInput(); 
            } 

       
            $data = [
                'customers'     => $this->request->getpost('customers'),
                'nama'          => $this->request->getpost('nama'),  
                'telp'          => $this->request->getpost('telp'),
                'hp'            => $this->request->getpost('hp'), 
                'wa'            => $this->request->getpost('wa'), 
                'nama_provinsi'   => $this->request->getpost('provinsi_id'),
                'nama_kabupaten'  => $this->request->getpost('kabupaten_id'),  
                'nama_kecamatan'  => $this->request->getpost('kecamatan_id'),
                'nama_desa'       => $this->request->getpost('desa_id'), 
                'alamat'        => $this->request->getpost('alamat'), 

            ]; 
 
            $Customers->update($id, $data);

            session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = '.$id.' ]');
            return redirect()->to(base_url('customers'))->withInput(); 

 
 
    }

 


    
    public function deletedata($id = null)
    { 
         $Customers = new CustomerModel(); 

        if($Customers->find($id)){
            $Customers->delete($id); 

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = '.$id.' ]');
            return redirect()->to(base_url('customers'))->withInput();  
        }else{
            session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = '.$id.' ]');
            return redirect()->to(base_url('customers'))->withInput(); 
        } 
          
    }  

    

 













}