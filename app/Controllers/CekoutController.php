<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CekoutController extends BaseController
{
	public function index()
	{
		$builder = $this->db->table('cekin');
		$builder->join('visitor', 'visitor.id_visitor = cekin.visitor_id');
		$builder->join('jaminan', 'jaminan.cekin_id = cekin.id_cekin');
		$query = $builder->select('cekin.id_cekin, cekin.status, visitor.nama, visitor.nik, jaminan.status_jaminan')->where('status', "Cekout")->get();

		$data = ['data' => $query->getResultArray()];
		return view('Cekout/scan_cekout', $data);
	}

	public function scanner()
	{
		if ($this->request->isAJAX()) {
			$id = $this->request->getVar('id');
			$data = $this->db->table('cekin')->where('id_cekin', $id)->get();
			// $data->getResultArray();

			foreach ($data->getResultArray() as $key => $value) {
				$datalama = $value['status'];
			}

			if ($datalama == "Cekout") {
				$msg = ['error' => 'Data Sudah Cekout'];
			} else {
				$updatedata = [
					'status' => 'Cekout'
				];

				$builder = $this->db->table('cekin');
				$builder->where('id_cekin', $id);
				$builder->update($updatedata);

				$msg = ['sukses' => 'Data Berhasil Cekout'];
			}

			echo json_encode($msg);
		}
	}

	public function getJaminan()
	{
		if ($this->request->isAJAX()) {
			$id = $this->request->getVar('id');
			$query = $this->db->table('jaminan')->where('cekin_id', $id)->get();
			$data = "";

			foreach ($query->getResultArray() as $row) :

				$data .= '<input type="text" value="' . $row['nama_jaminan'] . '" class="form-control" id="jaminan_name" readonly>';

			endforeach;
			$msg = ['dataJaminan' => $data];

			echo json_encode($msg);
		}
	}

	public function statusJaminan(){
		if ($this->request->isAJAX()){
			$id = $this->request->getVar('id');
			$status_jaminan = $this->request->getVar('status_jaminan');
			$query = $this->db->table('jaminan')->where('cekin_id', $id)->get();

			foreach ($query->getResultArray() as $key => $value) {
				$datalama = $value['status_jaminan'];
			}

			if ($datalama == "Di kembalikan") {
				$msg = ['error' => 'Data Sudah Dikembalikan'];
			} else {
				$updatedata = [
					'status_jaminan' => $status_jaminan
				];

				$builder = $this->db->table('jaminan');
				$builder->where('cekin_id', $id);
				$builder->update($updatedata);

				$msg = ['sukses' => 'Data Berhasil Cekout'];
			}

			echo json_encode($msg);
		}
	}
}
