<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Stock extends Controller{


  public function index()
    {   
        $data = array(
			'menu' => '3a',
			'title' => 'Stock [SIE-JAKU]', 
            'batascss' => 'c4', 
		);   
        echo view('section/header', $data);
        echo view('v_stock', $data);
		echo view('section/footer', $data); 
        
    }



}