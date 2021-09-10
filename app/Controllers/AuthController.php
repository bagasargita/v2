<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
	public function index()
	{
		return redirect()->to(site_url('login'));
	}

	public function login()
	{
		if (session('user_id')) {
			return redirect()->to(site_url('dashboard'));
		}
		return view('Auth/login');
	}

	public function loginprosess()
	{

		$post = $this->request->getPost();
		$query = $this->db->table('user')->getWhere(['email' => $post['email']]);
		$user = $query->getRow();
		if ($user) {
			if (password_verify($post['password'], $user->password)) {
				$params = ['user_id' => $user->user_id];
				session()->set($params);
				return redirect()->to(site_url('dashboard'));
				echo ('login');
			} else {
				session()->setFlashdata('error', 'Wrong Password');
				return redirect()->back();
			}
		} else {
			session()->setFlashdata('error', 'Email not Found');
			return redirect()->back();
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/login');
	}
}
