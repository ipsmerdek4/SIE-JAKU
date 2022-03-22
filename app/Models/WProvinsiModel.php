<?php 
namespace App\Models;

use CodeIgniter\Model;

class WProvinsiModel extends Model
{
    protected $table = "wilayah_provinsi";
    protected $primaryKey = "id";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'nm_provinsi'];
}