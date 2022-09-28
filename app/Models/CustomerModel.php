<?php 
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = "db_customers";
    protected $primaryKey = "id_customers";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['customers', 'nama', 'telp', 'hp', 'wa', 'nama_provinsi', 'nama_kabupaten', 'nama_kecamatan', 'nama_desa', 'alamat','tgl_code','created_at','updated_at'];



     
    function getwhere_bulanandtahun($bln = null, $thn = null)
    {
        $builder = $this->db->table('db_customers'); 
        $builder->like('created_at', $thn.'-'.$bln);    

        $query = $builder->get();   

        return $query->getResult();
    }



     
    function getChartwhere_bulanandtahun($bln = null, $thn = null)
    {
       /*  $builder = $this->db->table('db_customers'); 
        $builder->like('tgl_code', $thn.'-'.$bln);    
        $builder->groupBy('tgl_code');  

        $query = $builder->get();   

        return $query->getResult(); */



        $builder = $this->db->table('db_customers');    
        $builder->select('COUNT(created_at) as totalcs, DATE_FORMAT(created_at, "%Y-%m-%d") as tgl_regis, created_at');
        $builder->like('created_at', $thn.'-'.$bln);    
         
        $builder->groupBy('tgl_regis');  
        // $builder->orderBy('created_at', 'DESC'); 
        $query = $builder->get();

        return $query->getResult();


    }

    
    function getChartwhere_tahun($thn = null)
    {
       

        $builder = $this->db->table('db_customers');    
        $builder->select('COUNT(created_at) as totalcs, DATE_FORMAT(created_at, "%Y-%m") as tgl_regis, created_at');
        $builder->like('created_at', $thn);    
         
        $builder->groupBy('tgl_regis');  
        // $builder->orderBy('created_at', 'DESC'); 
        $query = $builder->get();

        return $query->getResult();
    }

        
    function getwhere_tahun($thn = null)
    {
        $builder = $this->db->table('db_customers'); 
        $builder->like('created_at', $thn.'-');    

        $query = $builder->get();

        return $query->getResult();
    } 

    
 /*
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
 */
    
    
}