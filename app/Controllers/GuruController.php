<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GuruController extends BaseController
{
	public function index()
	{
		$query   = $this->db->query('SELECT * FROM guru JOIN bagian ON bagian.id_bagian = guru.id_bagian');
		$results = $query->getResultArray();

		$bagian = $this->db->query('SELECT * FROM bagian');
		$bagians = $bagian->getResultArray();

		$data = [
			'title' => 'Guru',
			'data' => $results,
			'bagian' => $bagians,
		];

		return view('Guru/data_guru', $data);
	}

	public function create()
	{
		$post = $this->request->getPost();
		$data = [
			'nama_guru' => $post['nama_guru'],
			'id_bagian' => $post['id_bagian'],
		];

		$builder = $this->db->table('guru');
		$builder->insert($data);

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('guru'))->with('success', 'Creating Successfully');
		}
	}

	public function update()
	{
		$post = $this->request->getPost();
		$data = [
			'id_guru' => $post['id_guru'],
			'nama_guru' => $post['nama_guru'],
			'id_bagian' => $post['id_bagian'],
		];
		$builder = $this->db->table('guru');
		$builder->update($data, array('id_guru' => $post['id_guru']));

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('guru'))->with('success', 'Updating Successfully');
		}
	}

	public function delete()
	{
		$post = $this->request->getPost();
		$builder = $this->db->table('guru');
		$builder->delete(array('id_guru' => $post['id_guru']));

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('guru'))->with('success', 'Deleting Successfully');
		}
	}
}
