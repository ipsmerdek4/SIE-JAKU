<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WilayahDesa extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
			'id'       			=> [
				'type'           => 'VARCHAR',
				'constraint'     => '10',
			], 
			'kecamatan_id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '7',
			], 
			'nm_desa'       	=> [
				'type'           => 'VARCHAR',
				'constraint'     => '40',
			],  
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('wilayah_desa');
    }

    public function down()
    {
        $this->forge->dropTable('wilayah_desa'); 
    }
}
