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
			'provinsi_id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '2',
			],
			'kabupaten_id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '4',
			],
			'kecamatan_id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '7',
			],
			'desa_id'            => [
				'type'           => 'VARCHAR',
				'constraint'     => '10',
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
