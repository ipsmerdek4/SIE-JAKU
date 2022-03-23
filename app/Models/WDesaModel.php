<?php 
namespace App\Models;

use CodeIgniter\Model;

class WDesaModel extends Model
{ 
    protected $table = "wilayah_desa";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'kecamatan_id', 'nm_desa'];
}