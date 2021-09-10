<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BagianController extends BaseController
{
	public function index()
	{
		$query   = $this->db->query('SELECT * FROM bagian');
		$results = $query->getResultArray();

		$data = [
			'title' => 'Bagian',
			'data' => $results
		];
		return view('Bagian/data_bagian', $data);
	}

	public function create()
	{
		$post = $this->request->getPost();
		$data = [
			'nama_bagian' => $post['nama_bagian'],
		];
		$builder = $this->db->table('bagian');
		$builder->insert($data);

		if ($this->db->affectedRows() > 0) {
			session()->setFlashdata('success', 'Creating Successfully');
			return redirect()->to(site_url('bagian'));
		}
	}

	public function update()
	{
		$post = $this->request->getPost();
		$data = [
			// 'id_bagian' => $post['id_bagian'],
			'nama_bagian' => $post['nama_bagian'],
		];
		$builder = $this->db->table('bagian');
		$builder->update($data, array('id_bagian' => $post['id_bagian']));

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('bagian'))->with('success', 'Updating Successfully');
		}
	}

	public function delete()
	{
		$post = $this->request->getPost();
		$builder = $this->db->table('bagian');
		$builder->delete(array('id_bagian' => $post['id_bagian']));

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('bagian'))->with('success', 'Deleting Successfully');
		}
	}
}
