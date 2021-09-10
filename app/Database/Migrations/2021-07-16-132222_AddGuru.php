<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGuru extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_guru'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_guru'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'id_bagian'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
		]);

		$this->forge->addKey('id_guru', true);
		$this->forge->createTable('guru');
	}

	public function down()
	{
		$this->forge->dropTable('guru');
	}
}
