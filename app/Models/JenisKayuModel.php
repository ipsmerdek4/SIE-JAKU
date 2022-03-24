<?php 
namespace App\Models;

use CodeIgniter\Model;

class JenisKayuModel extends Model{
  
    protected $table = "db_jenis_kayu";
    protected $primaryKey = "id_jenis_kayu";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_jenis_kayu'];




}