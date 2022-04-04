<?php 
namespace App\Models;

use CodeIgniter\Model;

class PersediaanKayuModel extends Model{
    protected $table      = 'db_persediaan_kayu';     
    protected $primaryKey = "id_persediaan";
    protected $returnType = "object";
   // protected $useTimestamps = true;
    protected $allowedFields = ['id_jenis_kayu','id_tipe_kayu','id_ukuran_kayu','jml_persediaan','sisa_persediaan','id_harga_kayu','Tanggal_persediaan'];


      function getwharepersediaan($id1 = null, $id2 = null, $id3 = null)
    {
        $builder = $this->db->table('db_persediaan_kayu'); 
        $builder->where('id_jenis_kayu', $id1);
        $builder->where('id_tipe_kayu', $id2);
        $builder->where('id_ukuran_kayu', $id3);
        $query = $builder->get();

        return $query->getResult();
    }


    function getjoinall()
    {
        $builder = $this->db->table('db_persediaan_kayu');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_persediaan_kayu.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_persediaan_kayu.id_tipe_kayu');
        $builder->join('db_ukuran_kayu', 'db_persediaan_kayu.id_ukuran_kayu = db_ukuran_kayu.id_ukuran_kayu'); 
        $builder->join('db_harga_kayu', 'db_persediaan_kayu.id_harga_kayu = db_harga_kayu.id_harga_kayu'); 
        $query = $builder->get();

        return $query->getResult();
    }

   
    function getlikeall($bln1 = null, $bln2 = null, $bln3 = null)
    {
        $builder = $this->db->table('db_persediaan_kayu');
        $builder->like('Tanggal_persediaan', $bln1);  
        $builder->orLike('Tanggal_persediaan', $bln2);  
        $builder->orLike('Tanggal_persediaan', $bln3);   
        $query = $builder->get();

        return $query->getResult();
    }

    





}