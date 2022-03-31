<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbHargaKayu extends Migration{
    public function up(){

         $this->forge->addField([ 
            'id_harga_kayu'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_ukuran_kayu'          => [
                'type'           => 'INT',
                'constraint'     => 5, 
            ], 
			'nama_harga_kayu'       => [
				'type'           => 'BIGINT',
                'null'           => 20,
			], 
			'tgl_harga_kayu'       => [
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
			]*/
 
		]);
		$this->forge->addPrimaryKey('id_harga_kayu', true);
		$this->forge->createTable('db_harga_kayu');


    }

    public function down()
    {
        $this->forge->dropTable('db_harga_kayu');
    }
}