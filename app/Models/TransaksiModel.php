<?php 
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model{
   
    
    protected $table = "db_transaksi";
    protected $primaryKey = "id_transaksi";
    protected $returnType = "object";
   // protected $useTimestamps = true;
    protected $allowedFields = ['kode_transaksi','id_customers','jumlah_pembelian','total_harga','id_jenis_kayu','id_tipe_kayu','id_ukuran_kayu','id_persediaan','tipe_pesanan','tipe_pembayaran','tgl_transaksi','tgl_code'];




    
     
    function getwhere_bulanandtahun($bln = null, $thn = null)
    {
        $builder = $this->db->table('db_transaksi');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_transaksi.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_transaksi.id_tipe_kayu'); 
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_transaksi.id_ukuran_kayu'); 
        $builder->join('db_persediaan_kayu', 'db_persediaan_kayu.id_persediaan  = db_transaksi.id_persediaan '); 
        $builder->join('db_customers', 'db_customers.id_customers = db_transaksi.id_customers');  
 
        $builder->like('tgl_transaksi', $thn.'-'.$bln);    
        $builder->orderBy('tgl_transaksi', 'DESC');
    
        $query = $builder->get();

        return $query->getResult();
    }



    function getwhere_tahun($thn = null)
    {
        $builder = $this->db->table('db_transaksi');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_transaksi.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_transaksi.id_tipe_kayu'); 
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_transaksi.id_ukuran_kayu'); 
        $builder->join('db_persediaan_kayu', 'db_persediaan_kayu.id_persediaan  = db_transaksi.id_persediaan '); 
        $builder->join('db_customers', 'db_customers.id_customers = db_transaksi.id_customers');  

        $builder->like('tgl_transaksi', $thn.'-');    
        $builder->orderBy('tgl_transaksi', 'DESC');

        $query = $builder->get();

        return $query->getResult();
    }






    function Chartgetwhere_bulanandtahun($bln = null, $thn = null)
    {
        $builder = $this->db->table('db_transaksi');   

        $builder->select('sum(total_harga) as hasil_ttl, tgl_code, id_jenis_kayu, tgl_transaksi'); 
        // $builder->select();
        $builder->like('tgl_transaksi', $thn.'-'.$bln);    
        $builder->orderBy('tgl_transaksi', 'DESC');

        $builder->groupBy('id_jenis_kayu');  
        // $builder->groupBy('tgl_code');  

        $query = $builder->get();

        return $query->getResult();
    }


    
    function ChartTTPgetwhere_bulanandtahun($bln = null, $thn = null)
    {
        $builder = $this->db->table('db_transaksi');   

        // $builder->select('sum(total_harga) as hasil_ttl, tgl_code, id_jenis_kayu, tgl_transaksi'); 
        // $builder->select();
        $builder->like('tgl_transaksi', $thn.'-'.$bln);    
        $builder->orderBy('tgl_transaksi', 'DESC');

        // $builder->groupBy('id_jenis_kayu');  
        // $builder->groupBy('tgl_code');  

        $query = $builder->get();

        return $query->getResult();
    }


    function ChartTTPgetwhere_tahun($thn = null)
    {
        $builder = $this->db->table('db_transaksi');  
        $builder->select('sum(total_harga) as hasil_ttl, DATE_FORMAT(tgl_transaksi, "%M") as tgl_transaksi, tgl_code');
        $builder->like('tgl_code', $thn.'-');     
        $builder->groupBy('tgl_code');  
        $query = $builder->get();

        return $query->getResult();
    }

   






    
    function getwhere_bulanandtahun_2($bln = null, $thn = null)
    {
        $builder = $this->db->table('db_transaksi');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_transaksi.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_transaksi.id_tipe_kayu'); 
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_transaksi.id_ukuran_kayu'); 
        $builder->join('db_persediaan_kayu', 'db_persediaan_kayu.id_persediaan  = db_transaksi.id_persediaan '); 
        $builder->join('db_customers', 'db_customers.id_customers = db_transaksi.id_customers');  

        $builder->like('tgl_transaksi', $thn.'-'.$bln);    
        $builder->orderBy('tgl_transaksi', 'DESC'); 

        $query = $builder->get();

        return $query->getResult();
    }

    function getwhere_tahun_2($thn = null)
    {
        $builder = $this->db->table('db_transaksi');  
        $builder->select('sum(total_harga) as hasil_ttl, DATE_FORMAT(tgl_transaksi, "%M") as tgl_transaksi, tgl_code');
        $builder->like('tgl_code', $thn.'-');     
        $builder->groupBy('tgl_code');  
        $query = $builder->get();

        return $query->getResult();
    }

 
    function getcountall($bln = null, $thn = null, $count = null)
    { 
        $builder = $this->db->table('db_transaksi');  
        $builder->select(); 
        $builder->selectCount($count);
        $builder->groupBy($count);
        $builder->like('tgl_transaksi', $thn.'-'.$bln);    
 
        $query = $builder->get();

        return $query->getResult();
    }
 
    function getcountallnocount($bln = null, $thn = null, $count = null)
    { 
        $builder = $this->db->table('db_transaksi');  
        $builder->select();  
        $builder->groupBy($count);
        $builder->like('tgl_transaksi', $thn.'-'.$bln);    
 
        $query = $builder->get();

        return $query->getResult();
    }

 
    function getcountall2($thn = null, $count = null)
    { 
        $builder = $this->db->table('db_transaksi');  
        $builder->select(); 
        $builder->selectCount($count);
        $builder->groupBy($count);
        $builder->like('tgl_transaksi', $thn.'-');    
 
        $query = $builder->get();

        return $query->getResult();
    }

    function getcountall2nocount($thn = null, $count = null)
    { 
        $builder = $this->db->table('db_transaksi');  
        $builder->select();  
        $builder->groupBy($count);
        $builder->like('tgl_transaksi', $thn.'-');    
 
        $query = $builder->get();

        return $query->getResult();
    }

    /* spc */
    function getcountallENDWHERE($bln = null, $thn = null, $count = null)
    { 
        $builder = $this->db->table('db_transaksi');  
        $builder->select(); 
        $builder->selectCount($count);
        $builder->groupBy($count);
        $builder->where('tipe_pesanan', 'Online Order');
        $builder->orwhere('tipe_pesanan', 'Offline Order');
        $builder->like('tgl_transaksi', $thn.'-'.$bln);    
 
        $query = $builder->get();

        return $query->getResult();
    }

    function getcountallENDWHERE2($thn = null, $count = null)
    { 
        $builder = $this->db->table('db_transaksi');  
        $builder->select(); 
        $builder->selectCount($count);
        $builder->groupBy($count);
        $builder->where('tipe_pesanan', 'Online Order');
        $builder->orwhere('tipe_pesanan', 'Offline Order');
        $builder->like('tgl_transaksi', $thn.'-');    
 
        $query = $builder->get();

        return $query->getResult();
    }







    /*  */

    function getjoinall()
    {
        $builder = $this->db->table('db_transaksi');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_transaksi.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_transaksi.id_tipe_kayu'); 
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_transaksi.id_ukuran_kayu'); 
        $builder->join('db_persediaan_kayu', 'db_persediaan_kayu.id_persediaan = db_transaksi.id_persediaan '); 
        $builder->join('db_customers', 'db_customers.id_customers = db_transaksi.id_customers');
        $query = $builder->get();

        return $query->getResult();
    }

    function getlike($id = null)
    {
        $builder = $this->db->table('db_transaksi');
        $builder->join('db_jenis_kayu', 'db_jenis_kayu.id_jenis_kayu = db_transaksi.id_jenis_kayu');
        $builder->join('db_tipe_kayu', 'db_tipe_kayu.id_tipe_kayu = db_transaksi.id_tipe_kayu'); 
        $builder->join('db_ukuran_kayu', 'db_ukuran_kayu.id_ukuran_kayu = db_transaksi.id_ukuran_kayu'); 
        $builder->join('db_customers', 'db_customers.id_customers = db_transaksi.id_customers');

        $builder->like('nama_jenis_kayu', $id);   
        $builder->orLike('nama_tipe_kayu', $id);   
        $builder->orLike('nama_Ukuran_kayu', $id);   
        $builder->orLike('jumlah_pembelian', $id);   
        $builder->orLike('total_harga', $id);   
        $builder->orLike('kode_transaksi', $id);   
        $builder->orLike('tipe_pesanan', $id);    
        $query = $builder->get();
        
        return $query->getResult();

    }



}