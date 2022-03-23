<?php 
namespace App\Models;

use CodeIgniter\Model;

class WKecamatanModel extends Model
{
    protected $table = "wilayah_kecamatan";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id','kabupaten_id', 'nm_kecamatan'];
} 