<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDocument extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_document'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_document'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'no_document'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
		]);

		$this->forge->addKey('id_document', true);
		$this->forge->createTable('document');
	}

	public function down()
	{
		$this->forge->dropTable('document');
	}
}
