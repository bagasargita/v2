<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKeperluan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_keperluan'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'keperluan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
		]);

		$this->forge->addKey('id_keperluan', true);
		$this->forge->createTable('keperluan');
	}

	public function down()
	{
		$this->forge->dropTable('keperluan');
	}
}
