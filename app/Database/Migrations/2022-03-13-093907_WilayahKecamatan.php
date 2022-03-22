<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WilayahKecamatan extends Migration
{
    public function up()
    {
        $this->forge->addField([ 
			'id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '7',
			], 
			'kabupaten_id'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '4',
			], 
			'nm_kecamatan'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '30',
			], 
 
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('wilayah_kecamatan');
    }

    public function down()
    {
        $this->forge->dropTable('wilayah_kecamatan'); 
    }
}
