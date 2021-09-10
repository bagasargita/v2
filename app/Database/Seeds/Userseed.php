<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Userseed extends Seeder
{
	public function run()
	{
		$data = [
			'username' => 'admin',
			'email' => 'superadmin@gmail.com',
			'password' => password_hash('admin123', PASSWORD_BCRYPT),
		];
		$this->db->table('user')->insert($data);
	}
}
