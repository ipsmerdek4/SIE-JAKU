<?php 
namespace App\Models;

use CodeIgniter\Model;

class PersediaanKayuModel extends Model{
    protected $table      = 'db_persediaan_kayu';     
    protected $primaryKey = "id_persediaan";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id_jenis_kayu','id_tipe_kayu','id_ukuran_kayu','jml_persediaan','Harga_satuan'];



    function getjoinall()
    {
        $builder = $this->db->table('db_persediaan_kayu');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_persediaan_kayu.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_persediaan_kayu.id_tipe_kayu');
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_persediaan_kayu.id_ukuran_kayu'); 
        $query = $builder->get();

        return $query->getResult();
    }







}