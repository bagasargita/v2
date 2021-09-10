<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddInstansi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_instansi'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'instansi'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
		]);

		$this->forge->addKey('id_instansi', true);
		$this->forge->createTable('instansi');
	}

	public function down()
	{
		$this->forge->dropTable('instansi');
	}
}
