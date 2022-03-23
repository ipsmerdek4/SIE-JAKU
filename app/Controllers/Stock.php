<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Stock extends Controller{


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

  public function jenis()
  {   
    $data = array(
    'menu' => '3a',
    'title' => 'Jenis Kayu [SIE-JAKU]', 
    'batascss' => 'c4', 
    );   
    echo view('section/header', $data);
    echo view('v_jenis_kayu', $data);
    echo view('section/footer', $data); 

  }

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