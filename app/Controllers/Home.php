<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {


        $data = array(
			'menu' => '1a',
			'title' => 'Home [SIE-JAKU]', 
            'batascss' => 'chome',

		);

        echo view('section/header', $data);
        echo view('home', $data);
		echo view('section/footer', $data);

        
    }


    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }



}