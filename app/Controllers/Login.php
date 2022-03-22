<?php

namespace App\Controllers;
use App\Models\UserModel;


class Login extends BaseController
{
    public function index()
    {


        $data = array(
			//'menu' => '1a',
			'title' => 'Login [SIE-JAKU]', 
		);

        //echo view('section/header', $data);
        echo view('login', $data);
		//echo view('section/footer', $data);

        
    }


    public function process()
    {
        $users = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'name' => $dataUser->name,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url());
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }








}