<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KeperluanController extends BaseController
{
	public function index()
	{
		$query   = $this->db->query('SELECT * FROM keperluan');
		$results = $query->getResultArray();

		$data = [
			'title' => 'Keperluan',
			'data' => $results
		];
		return view('Keperluan/data_keperluan', $data);
	}

	public function create(){
 		$post = $this->request->getPost();
		$data = [
			'keperluan' => $post['keperluan'],
		];
		$builder = $this->db->table('keperluan');
		$builder->insert($data);

		if ($this->db->affectedRows() > 0) {
			session()->setFlashdata('success', 'Creating Successfully');
			return redirect()->to(site_url('keperluan'));
		}
	}

	public function update()
	{
		$post = $this->request->getPost();
		$data = [
			// 'id_bagian' => $post['id_bagian'],
			'keperluan' => $post['keperluan'],
		];
		$builder = $this->db->table('keperluan');
		$builder->update($data, array('id_keperluan' => $post['id_keperluan']));

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('keperluan'))->with('success', 'Updating Successfully');
		}
	}

	public function delete()
	{
		$post = $this->request->getPost();
		$builder = $this->db->table('keperluan');
		$builder->delete(array('id_keperluan' => $post['id_keperluan']));

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('keperluan'))->with('success', 'Deleting Successfully');
		}
	}
}
