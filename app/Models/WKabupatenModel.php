<?php 
namespace App\Models;

use CodeIgniter\Model;

class WKabupatenModel extends Model
{ 
    protected $table = "wilayah_kabupaten";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'provinsi_id', 'nm_kabupaten'];

}