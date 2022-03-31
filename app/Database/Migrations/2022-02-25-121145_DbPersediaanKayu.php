<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbPersediaanKayu extends Migration
{
    public function up(){

       $this->forge->addField([
			'id_persediaan' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
			'id_jenis_kayu' => [
                'type'           => 'INT',
                'constraint'     => 5,
			],
			'id_tipe_kayu' => [
                'type'           => 'INT',
                'constraint'     => 5,
			],
			'id_ukuran_kayu' => [
                'type'           => 'INT',
                'constraint'     => 5,
			],
			'jml_persediaan' => [
                'type'           => 'INT',
                'constraint'     => 5,
			],
			'id_harga_kayu' => [
                'type'           => 'INT',
                'constraint'     => 5,
			],
			'Tanggal_persediaan' => [
				'type'           => 'DATETIME', 
			],

            /*
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
            ], */
 
		]);
		$this->forge->addPrimaryKey('id_persediaan', true);
		$this->forge->createTable('db_persediaan_kayu');

    }

    public function down(){
        $this->forge->dropTable('db_persediaan_kayu');
    }
}