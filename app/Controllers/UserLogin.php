<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserLogin extends BaseController
{
    public function index()
    { 
        $users = new UserModel();
 
        $data = array(
			'menu' => '1a',
			'title' => 'User Login [SIE-JAKU]', 
            'batascss' => 'c1',
            'datausers' => $users->findAll(),

		);

        echo view('section/header', $data);
        echo view('v_userlogin', $data);
		echo view('section/footer', $data);
 
    }





 
    public function useradd()
    { 
        $users = new UserModel();
 
        $data = array(
			'menu' => '1a',
			'title' => 'Create [SIE-JAKU]', 
            'batascss' => 'c1',
            'datausers' => $users->findAll(),

		);

        echo view('section/header', $data);
        echo view('v_register', $data);
		echo view('section/footer', $data);
 
    }

    public function process()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[db_users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        
        $users = new UserModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name')
        ]);
        session()->setFlashdata('alert', 'Berhasil Menambah Data. Dengan [ ID = '.'#'.$this->request->getVar('username').' ]');
        return redirect()->to(base_url('userlogin/'))->withInput(); 
    }

 
    public function editdata($id = null)
    {
        $users = new UserModel();

        $data = array(
            'menu' => '1a',
			'title' => 'Update [SIE-JAKU]', 
            'batascss' => 'c2',
            'datausers' => $users->find($id), 
        );
 
        echo view('section/header', $data);
        echo view('v_edtuserlogin', $data);
		echo view('section/footer', $data);
 

    } 

     

    public function updatedata($id = null)
    {  

        $users = new UserModel();
 
        if ($this->request->getpost('my-checkbox')) {
            if (!$this->validate([
                'username' => [
                    'rules' => 'required|min_length[4]|max_length[20]|is_unique[db_users.username]',
                    'errors' => [
                        'required' => 'Username Harus diisi',
                        'min_length' => 'Username Minimal 4 Karakter',
                        'max_length' => 'Username Maksimal 20 Karakter', 
                        'is_unique' => 'Username sudah digunakan sebelumnya'
                    ]
                ],
                'password' => [
                    'rules' => 'min_length[4]|max_length[50]',
                    'errors' => [
                        'required' => 'Password Harus diisi',
                        'min_length' => 'Password Minimal 4 Karakter',
                        'max_length' => 'Password Maksimal 50 Karakter',
                    ]
                ],
                'password_conf' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                    ]
                ],
                'name' => [
                    'rules' => 'required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required' => 'Nama Harus diisi',
                        'min_length' => 'Nama Minimal 4 Karakter',
                        'max_length' => 'Nama Maksimal 100 Karakter',
                    ]
                ],
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('userlogin/'.$id))->withInput(); 
            } 


               
            $data = [
                'username' => $this->request->getpost('username'),
                'name'     => $this->request->getpost('name'),  
                'password' => password_hash($this->request->getpost('password'), PASSWORD_BCRYPT),

            ];  
            $users->update($id, $data);
            
            session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = '.$id.' ]');
            return redirect()->to(base_url('userlogin'))->withInput();  
       
         
        }else{
            if (!$this->validate([
                'username' => [
                    'rules' => 'required|min_length[4]|max_length[20]|is_unique[db_users.username]',
                    'errors' => [
                        'required' => 'Username Harus diisi',
                        'min_length' => 'Username Minimal 4 Karakter',
                        'max_length' => 'Username Maksimal 20 Karakter', 
                        'is_unique' => 'Username sudah digunakan sebelumnya'
                    ]
                ], 
                'name' => [
                    'rules' => 'required|min_length[4]|max_length[100]',
                    'errors' => [
                        'required' => 'Nama Harus diisi',
                        'min_length' => 'Nama Minimal 4 Karakter',
                        'max_length' => 'Nama Maksimal 100 Karakter',
                    ]
                ],
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('userlogin/'.$id))->withInput();
            } 


            //
            $data = [
                'username' => $this->request->getpost('username'),
                'name'     => $this->request->getpost('name'),   

            ]; 
            $users->update($id, $data);
            session()->setFlashdata('alert', 'Berhasil Merubah Data. Dengan [ ID = '.$id.' ]');
            return redirect()->to(base_url('userlogin'))->withInput();  
       
        }
        
 

 

    }  



    public function deletedata($id = null)
    {
        $users = new UserModel();


        if($users->find($id)){
            $users->delete($id);

            session()->setFlashdata('alert', 'Berhasil Menghapus Data. Dengan [ ID = '.$id.' ]');
            return redirect()->to(base_url('userlogin'))->withInput();   
        }else{
             session()->setFlashdata('alert', 'Terjadi Kesalahan Saat Menghapus Data. Dengan [ ID = '.$id.' ]');
            return redirect()->to(base_url('userlogin'))->withInput(); 
         }
 

          
    }  

 



}
