<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'kode_transaksi'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'jumlah_pembelian'       => [
                'type'           => 'INT',
                'constraint'     => 5,
			],
			'total_harga'       => [
                'type'           => 'BIGINT',
                'constraint'     => 50,
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
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			]
 
		]);
		$this->forge->addPrimaryKey('kode_transaksi', true);
		$this->forge->createTable('db_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('db_transaksi');
    }
}
