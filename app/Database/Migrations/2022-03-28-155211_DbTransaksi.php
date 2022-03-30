<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi'          => [
                'type'           => 'INT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true
            ],
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
			'tgl_transaksi' => [
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
		$this->forge->addPrimaryKey('id_transaksi', true);
		$this->forge->createTable('db_transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('db_transaksi');
    }
}
