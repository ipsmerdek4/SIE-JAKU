<?php 
namespace App\Database\Seeds;

class RUNALL extends \CodeIgniter\Database\Seeder{
    public function run(){
        $this->call('kayu');
        $this->call('tipekayu');  
        $this->call('user');  
    }
} 