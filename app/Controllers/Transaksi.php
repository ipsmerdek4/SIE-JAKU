<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

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
 
        $data = array(
			'menu' => '4a',
			'title' => 'Transaksi [SIE-JAKU]', 
            'batascss' => 'c5', 

		);

        echo view('section/header', $data);
        echo view('v_add_transaksi', $data);
		echo view('section/footer', $data);
 
    }


    

}