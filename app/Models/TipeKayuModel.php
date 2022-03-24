<?php 
namespace App\Models;

use CodeIgniter\Model;

class TipeKayuModel extends Model{
    protected $table = "db_tipe_kayu";
    protected $primaryKey = "id_tipe_kayu";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id_jenis_kayu','nama_tipe_kayu'];


    function getjoinall()
    {
        $builder = $this->db->table('db_tipe_kayu');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_tipe_kayu.id_jenis_kayu'); 
        $query = $builder->get();

        return $query->getResult();
    }







}