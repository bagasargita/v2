<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCekin extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_cekin'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nik'       => [
				'type'       => 'BIGINT',
				'constraint' => '255',
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'nohp'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'jenkel'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'asal'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'keperluan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'bagian_id'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'tujuan_id'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'status'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
			],
			'bukti_foto'       => [
				'type'       => 'VARCHAR',
				'constraint' => '200',
				'null'           => true,

			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp',
		]);

		$this->forge->addKey('id_cekin', true);
		$this->forge->createTable('cekin');
	}

	public function down()
	{
		$this->forge->dropTable('cekin');
	}
}
