<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbTipeKayu extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
            'id_tipe_kayu'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
			'id_jenis_kayu'          => [
                'type'           => 'INT',
				'constraint'     =>  5,
            ],
			'nama_tipe_kayu'       => [
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
		$this->forge->addPrimaryKey('id_tipe_kayu', true);
		$this->forge->createTable('db_tipe_kayu');
    }

    public function down()
    {
		$this->forge->dropTable('db_tipe_kayu'); 
    }
}
