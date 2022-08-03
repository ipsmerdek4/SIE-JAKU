<?php 
namespace App\Database\Seeds;

class user extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [ 
                'username'      =>  'admin', 
                'password'      =>  '$2y$10$JICsy5OPjPv/.kyvNRkHP.XOVEOuw.W3qP0EfNFqEw29aJZqAOjjK', 
                'name'          =>  'Admin', 
                'created_at'    =>  date("Y-m-d H:i:s")
            ],  
        ];

        $this->db->table('db_users')->insertBatch($data);
    }
}