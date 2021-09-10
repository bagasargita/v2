<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InstansiController extends BaseController
{
	public function index()
	{
		$query   = $this->db->query('SELECT * FROM instansi');
		$results = $query->getResultArray();

		$data = [
			'title' => 'Instansi',
			'data' => $results
		];
		return view('Instansi/data_instansi', $data);
	}

	public function create(){
 		$post = $this->request->getPost();
		$data = [
			'instansi' => $post['instansi'],
		];
		$builder = $this->db->table('instansi');
		$builder->insert($data);

		if ($this->db->affectedRows() > 0) {
			session()->setFlashdata('success', 'Creating Successfully');
			return redirect()->to(site_url('instansi'));
		}
	}

	public function update()
	{
		$post = $this->request->getPost();
		$data = [
			// 'id_bagian' => $post['id_bagian'],
			'instansi' => $post['instansi'],
		];
		$builder = $this->db->table('instansi');
		$builder->update($data, array('id_instansi' => $post['id_instansi']));

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('instansi'))->with('success', 'Updating Successfully');
		}
	}

	public function delete()
	{
		$post = $this->request->getPost();
		$builder = $this->db->table('instansi');
		$builder->delete(array('id_instansi' => $post['id_instansi']));

		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('instansi'))->with('success', 'Deleting Successfully');
		}
	}
}
