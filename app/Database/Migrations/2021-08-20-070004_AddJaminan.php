<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddJaminan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_jaminan'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'cekin_id'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nama_jaminan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'status_jaminan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
		]);

		$this->forge->addKey('id_jaminan', true);
		$this->forge->createTable('jaminan');
	}

	public function down()
	{
		$this->forge->dropTable('jaminan');
	}
}
