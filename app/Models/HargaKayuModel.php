<?php 
namespace App\Models;

use CodeIgniter\Model;

class HargaKayuModel extends Model{
    protected $table = "db_harga_kayu";
    protected $primaryKey = "id_harga_kayu ";
    protected $returnType = "object";
   // protected $useTimestamps = true;
    protected $allowedFields = ['id_ukuran_kayu', 'nama_harga_kayu', 'tgl_harga_kayu'];


    function getjoinall()
    {
        $builder = $this->db->table('db_harga_kayu');
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_harga_kayu.id_ukuran_kayu'); 
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_ukuran_kayu.id_tipe_kayu'); 
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_tipe_kayu.id_jenis_kayu');
        $query = $builder->get();

        return $query->getResult();
    }




}