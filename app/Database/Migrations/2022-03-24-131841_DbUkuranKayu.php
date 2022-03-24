<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbUkuranKayu extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
            'id_ukuran_kayu'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_tipe_kayu'          => [
                'type'           => 'INT',
                'constraint'     => 5, 
            ], 
			'nama_Ukuran_kayu'       => [
				'type'           => 'TEXT',
                'null'           => true,
			], 
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			]
 
		]);
		$this->forge->addPrimaryKey('id_ukuran_kayu', true);
		$this->forge->createTable('db_ukuran_kayu');
    }

    public function down()
    {
		$this->forge->dropTable('db_ukuran_kayu'); 
    }
}
