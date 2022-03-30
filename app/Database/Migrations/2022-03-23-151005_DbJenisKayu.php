<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbJenisKayu extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_jenis_kayu'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
			'nama_jenis_kayu'       => [
				'type'           => 'TEXT',
                'null'           => true,
			],
			'tgl_jenis_kayu'       => [
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
		$this->forge->addPrimaryKey('id_jenis_kayu', true);
		$this->forge->createTable('db_jenis_kayu');
    }

    public function down()
    {
		$this->forge->dropTable('db_jenis_kayu'); 
    }
}
