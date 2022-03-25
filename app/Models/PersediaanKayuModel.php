<?php 
namespace App\Models;

use CodeIgniter\Model;

class PersediaanKayuModel extends Model{
    protected $table      = 'db_persediaan_kayu';     
    protected $primaryKey = "id_persediaan";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id_jenis_kayu','id_tipe_kayu','id_ukuran_kayu','jml_persediaan','Harga_satuan'];


}