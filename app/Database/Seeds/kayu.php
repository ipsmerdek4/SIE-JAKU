<?php 
namespace App\Database\Seeds;

class kayu extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data = [
            [ 
                'id_jenis_kayu '   =>  '1', 
                'nama_jenis_kayu'   =>  'Kayu Meranti', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
            [ 
                'id_jenis_kayu '   =>  '2', 
                'nama_jenis_kayu'   =>  'Kayu Kruing', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
            [ 
                'id_jenis_kayu '   =>  '3', 
                'nama_jenis_kayu'   =>  'Kayu Kempas', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
            [ 
                'id_jenis_kayu '   =>  '4', 
                'nama_jenis_kayu'   =>  'Kayu Kamper', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
            [ 
                'id_jenis_kayu '   =>  '5', 
                'nama_jenis_kayu'   =>  'Kayu Bangkirai', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
            [ 
                'id_jenis_kayu '   =>  '6', 
                'nama_jenis_kayu'   =>  'Kayu Merbau', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
            [ 
                'id_jenis_kayu '   =>  '7', 
                'nama_jenis_kayu'   =>  'Kayu Ulin', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
            [ 
                'id_jenis_kayu '   =>  '8', 
                'nama_jenis_kayu'   =>  'Kayu Jati', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
            [ 
                'id_jenis_kayu '   =>  '9', 
                'nama_jenis_kayu'   =>  'Kayu Jati', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
            [ 
                'id_jenis_kayu '   =>  '10', 
                'nama_jenis_kayu'   =>  'Kayu Mahoni', 
                'tgl_jenis_kayu'    =>  date("Y-m-d H:i:s")
            ], 
        ];

        $this->db->table('db_jenis_kayu')->insertBatch($data);
    }
}