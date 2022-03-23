<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WilayahProvinsi extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
			'id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '2',
			], 
 
			'nm_provinsi'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '30',
			], 
 
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('wilayah_provinsi');
    }

    public function down()
    {
        $this->forge->dropTable('wilayah_provinsi'); 
    }
}
