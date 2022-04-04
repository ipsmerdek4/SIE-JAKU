<?php 
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = "db_customers";
    protected $primaryKey = "id_customers";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['customers', 'nama', 'telp', 'hp', 'wa', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'desa_id', 'alamat'];



     
    function getlikeall($bln1 = null, $bln2 = null, $bln3 = null)
    {
        $builder = $this->db->table('db_customers');
        $builder->like('created_at', $bln1);   
        $builder->orLike('created_at', $bln2);  
        $builder->orLike('created_at', $bln3);  
        $query = $builder->get();

        return $query->getResult();
    }


    function getjoinall()
    {
        $builder = $this->db->table('db_customers');
        $builder->join('wilayah_provinsi', 'db_customers.provinsi_id = wilayah_provinsi.id');
        $builder->join('wilayah_kabupaten', 'db_customers.kabupaten_id = wilayah_kabupaten.id');
        $builder->join('wilayah_kecamatan', 'db_customers.kecamatan_id = wilayah_kecamatan.id');
        $builder->join('wilayah_desa', 'db_customers.desa_id = wilayah_desa.id');
        $query = $builder->get();

        return $query->getResult();
    }

    
    function get_join_where($id = null)
    {
        $builder = $this->db->table('db_customers');
        $builder->join('wilayah_provinsi', 'db_customers.provinsi_id = wilayah_provinsi.id');
        $builder->join('wilayah_kabupaten', 'db_customers.kabupaten_id = wilayah_kabupaten.id');
        $builder->join('wilayah_kecamatan', 'db_customers.kecamatan_id = wilayah_kecamatan.id');
        $builder->join('wilayah_desa', 'db_customers.desa_id = wilayah_desa.id');
        $query = $builder->getWhere(['db_customers.id_customers ' => $id]);

        return $query->getResult();
    }

    
    
}