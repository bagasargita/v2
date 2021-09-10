<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddQrcode extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_qrcode'          => [
				'type'           => 'INT',
				'constraint'     => 12,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_cekin'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'url'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at datetime default current_timestamp',
		]);
		$this->forge->addPrimaryKey('id_qrcode', true);
		$this->forge->createTable('qrcode');
	}

	public function down()
	{
		$this->forge->dropTable('qrcode');
	}
}
