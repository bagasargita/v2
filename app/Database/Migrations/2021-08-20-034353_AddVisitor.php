<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddVisitor extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_visitor'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nik'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nohp'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'jenkel'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
		]);

		$this->forge->addKey('id_visitor', true);
		$this->forge->createTable('visitor');
	}

	public function down()
	{
		$this->forge->dropTable('visitor');
	}
}
