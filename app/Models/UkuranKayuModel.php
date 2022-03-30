<?php 
namespace App\Models;

use CodeIgniter\Model;

class UkuranKayuModel extends Model{ 
    protected $table = "db_ukuran_kayu";
    protected $primaryKey = "id_ukuran_kayu";
    protected $returnType = "object";
   // protected $useTimestamps = true;
    protected $allowedFields = ['id_tipe_kayu', 'nama_Ukuran_kayu', 'tgl_ukuran_kayu'];

    function getjoinall()
    {
        $builder = $this->db->table('db_ukuran_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_ukuran_kayu.id_tipe_kayu');
        $builder->join('db_jenis_kayu', 'db_tipe_kayu.id_jenis_kayu = db_jenis_kayu.id_jenis_kayu'); 
        $query = $builder->get();

        return $query->getResult();
    }








}