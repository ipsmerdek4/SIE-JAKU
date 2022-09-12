<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbCustomers extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id_customers'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
			'customers'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '30',
			],
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'telp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],
			'hp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],
			'wa'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],
			'nama_provinsi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'nama_kabupaten'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'nama_kecamatan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'nama_desa'            => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'alamat'			 => [
                'type'           => 'TEXT',
                'null'           => true,
			],
			'created_at' 		 => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at'         => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'tgl_code'         	 => [
				'type'           => 'VARCHAR',
				'constraint'	 => '20',
			]
 
		]);
		$this->forge->addPrimaryKey('id_customers', true);
		$this->forge->createTable('db_customers');
    }

    public function down()
    {
        $this->forge->dropTable('db_customers');
    }
}
