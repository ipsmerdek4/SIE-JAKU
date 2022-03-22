<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CustomerModel;
use App\Models\WProvinsiModel;
use App\Models\WKabupatenModel;
use App\Models\WKecamatanModel;
use App\Models\WDesaModel;


class Customers extends Controller{

    public function index()
    {  
        $Customers = new CustomerModel();  
        $data = array(
			'menu' => '2a',
			'title' => 'Customer [SIE-JAKU]', 
            'batascss' => 'c3a',
            'datacustomers' => $Customers->getjoinall(),  
		);   
        echo view('section/header', $data);
        echo view('v_customer', $data);
		echo view('section/footer', $data); 
        
    }


    public function customeradd()
    { 
        $WProvinsi = new WProvinsiModel();
        $Customers = new CustomerModel(); 

        $data = array(
			'menu' => '2a',
			'title' => 'Tambah Customer [SIE-JAKU]', 
            'batascss' => 'c3',
            'dataprovinsi' => $WProvinsi->findAll(),

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
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Provinsi Harus dipilih', 
                    ]
                ], 
                'kabupaten_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Kabupaten Harus dipilih', 
                    ]
                ], 
                'kecamatan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Kecamatan Harus dipilih', 
                    ]
                ], 
                'desa_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Desa Harus dipilih', 
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
            'provinsi_id'       => $this->request->getVar('provinsi_id'),
            'kabupaten_id'      => $this->request->getVar('kabupaten_id'),
            'kecamatan_id'      => $this->request->getVar('kecamatan_id'),
            'desa_id'           => $this->request->getVar('desa_id'),
            'alamat'            => $this->request->getVar('alamat'),
            'desa_id'           => $this->request->getVar('desa_id'),
        ]);
        
        session()->setFlashdata('alert', 'Berhasil Menambah Data. Dengan [ ID = '.'#'.$this->request->getVar('customers').' ]');
        return redirect()->to(base_url('customers/'))->withInput(); 
    



    }


 

    public function customeredit($id = null)
    {

        $WProvinsi = new WProvinsiModel();
        $WKabupaten = new WKabupatenModel(); 
        $WKecamatan = new WKecamatanModel(); 
        $WDesa = new WDesaModel(); 

        $Customers = new CustomerModel(); 


        $data1 = $Customers->where('id_customers', $id)->findAll();

        $data2 = $WProvinsi->where('id', $data1[0]->provinsi_id)->findAll();
        $data3 = $WKabupaten->where('provinsi_id', $data1[0]->provinsi_id)->findAll();   
        $data4 = $WKecamatan->where('kabupaten_id', $data1[0]->kabupaten_id)->findAll();
        $data5 = $WDesa->where('kecamatan_id', $data1[0]->kecamatan_id)->findAll();
   
        $data = array(
            'menu' => '2a',
            'title' => 'Edit Customer [SIE-JAKU]', 
            'batascss' => 'c3', 
            'datacustomers' => $data1,  
            'dataprovinsi'  => $data2,
            'datakabupaten'  => $data3,
            'datakecamatan'  => $data4,
            'datadesa'      => $data5,  
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
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Provinsi Harus dipilih', 
                    ]
                ], 
                'kabupaten_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Kabupaten Harus dipilih', 
                    ]
                ], 
                'kecamatan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Kecamatan Harus dipilih', 
                    ]
                ], 
                'desa_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Desa Harus dipilih', 
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
                'provinsi_id'   => $this->request->getpost('provinsi_id'),
                'kabupaten_id'  => $this->request->getpost('kabupaten_id'),  
                'kecamatan_id'  => $this->request->getpost('kecamatan_id'),
                'desa_id'       => $this->request->getpost('desa_id'), 
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

    


    function add_ajax_kab($id = null)
    {

        $WKabupaten = new WKabupatenModel(); 
        $datakabupaten = $WKabupaten->where('provinsi_id', $id)->findAll();
 
          
        $data = "<option value=''>- Select Kabupaten -</option>"; 
        foreach ($datakabupaten as $value) {
            $data .= "<option value='".$value->id."'>".$value->nm_kabupaten."</option>";
        }
        echo $data; 
    }

    function add_ajax_kec($id = null)
    {

        $WKecamatan = new WKecamatanModel(); 
        $datakecamatan = $WKecamatan->where('kabupaten_id', $id)->findAll();
 
          
        $data = "<option value=''>- Select Kabupaten -</option>"; 
        foreach ($datakecamatan as $value) {
            $data .= "<option value='".$value->id."'>".$value->nm_kecamatan."</option>";
        }
        echo $data; 
    }

    function add_ajax_desa($id = null)
    {

        $WDesa = new WDesaModel(); 
        $datadesa = $WDesa->where('kecamatan_id', $id)->findAll();
 
          
        $data = "<option value=''>- Select Kabupaten -</option>"; 
        foreach ($datadesa as $value) {
            $data .= "<option value='".$value->id."'>".$value->nm_desa."</option>";
        }
        echo $data; 
    }
    














}