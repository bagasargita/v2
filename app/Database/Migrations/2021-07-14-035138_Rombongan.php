<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rombongan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_rombongan'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_cekin'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'nama_rombongan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addPrimaryKey('id_rombongan', true);
		$this->forge->createTable('rombongan');
	}

	public function down()
	{
		$this->forge->dropTable('rombongan');
	}
}
