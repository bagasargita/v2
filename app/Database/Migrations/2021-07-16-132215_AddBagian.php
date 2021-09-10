<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBagian extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_bagian'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_bagian'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
		]);

		$this->forge->addKey('id_bagian', true);
		$this->forge->createTable('bagian');
	}

	public function down()
	{
		$this->forge->dropTable('bagian');
	}
}
