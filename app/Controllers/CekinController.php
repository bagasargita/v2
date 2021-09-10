<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CekinModel;
use Config\Services;
use \Hermawan\DataTables\DataTable;


class CekinController extends BaseController
{
	public function index()
	{
		$bagian = $this->db->query('SELECT * FROM bagian');
		$bagians = $bagian->getResultArray();

		$queryinstansi = $this->db->query('SELECT * FROM instansi');
		$instansi = $queryinstansi->getResultArray();

		$querykeperluan = $this->db->query('SELECT * FROM keperluan');
		$keperluan = $querykeperluan->getResultArray();

		$data = [
			'title' => 'Guru',
			'tujuan' => $bagians,
			'instansi' => $instansi,
			'keperluan' => $keperluan,
		];

		return view('Cekin/v_cekin', $data);
	}

	public function getData()
	{

		$model = new CekinModel();

		$listing = $model->get_datatables();
		$total_filter = $model->total_filter();
		$total_rows = $model->total_rows();
		// print_r($listing);

		$data = array();
		$no = $_POST['start'];


		foreach ($listing as $key) {
			$no++;
			$row = array();
			$row[] = $no;
			// $row[] = $key->id_cekin;
			$row[] = $key->created_at;
			$row[] = $key->status;
			$row[] = $key->nik;
			$row[] = $key->nama;
			$row[] = $key->nohp;
			$row[] = $key->instansi;
			$row[] = $key->asal;
			$row[] = $key->keperluan;
			$row[] = $key->nama_bagian;
			$row[] = $key->nama_guru;
			$row[] = $key->no_document;
			$row[] = "<div class=\"dropdown dropdown-action\"><a href=\"#\" class=\"action-icon dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\"><i class=\"material-icons\">more_vert</i></a><div class=\"dropdown-menu dropdown-menu-right\"><a class=\"dropdown-item\" href=\"cekin/detail/$key->id_cekin\"><i class=\"fa fa-pencil m-r-5\"></i>Detail</a><a class=\"dropdown-item\" target=\"_blank\" href=\"cekin/print/$key->id_cekin\"><i class=\"fa fa-print m-r-5\"></i>Print</a><a class=\"dropdown-item userDelete\" data-id=\"$key->id_cekin\" data-toggle=\"modal\" data-target=\"#delete_bagian\"><i class=\"fa fa-trash-o m-r-5\"></i>Delete</a></div></div>";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $total_rows,
			"recordsFiltered" => $total_filter,
			"data" => $data
		);

		echo json_encode($output);
	}

	public function getTujuan()
	{
		if ($this->request->isAJAX()) {
			$bagian_id = $this->request->getPost('bagian_id');
			$dataTujuan = $this->db->table('guru')->where('id_bagian', $bagian_id)->get();
			$data = "";
			foreach ($dataTujuan->getResultArray() as $row) :

				$data .= '<option value="' . $row['id_guru'] . '">' . $row['nama_guru'] . '</option>';

			endforeach;
			$msg = ['dataGuru' => $data];
			echo json_encode($msg);
		}
	}

	public function create()
	{
		if ($this->request->isAJAX()) {
			$validation = \Config\Services::validation();
			$valid = $this->validate([
				'nik' => [
					'label' => 'Nomor Induk Kependudukan',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
						'numeric' => '{field} Hanya boleh menginput angka',
						'is_unique' => '{field} Tidak boleh sama',

					],
				],
				'nama' => [
					'label' => 'Nama Visitor',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',

					],
				],
				'nohp' => [
					'label' => 'Nomor Handphone',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
						'numeric' => '{field} Hanya boleh menginput angka',
					],
				],
				'jenkel' => [
					'label' => 'Jenis kelamin',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
					],
				],
				'nama_jaminan' => [
					'label' => 'Nama jaminan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
					],
				],
				'instansi_id' => [
					'label' => 'Instansi',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
					],
				],
				'asal' => [
					'label' => 'Asal Instansi',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
					],
				],
				'keperluan_id' => [
					'label' => 'Keperluan',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
					],
				],
				'bagian_id' => [
					'label' => 'Bagian',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
					],
				],
				'bersama' => [
					'label' => 'Bersama',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
					],
				],
				'nama_document' => [
					'label' => 'Document',
					'rules' => 'required',
					'errors' => [
						'required' => '{field} Tidak boleh kosong',
					],
				],

			]);

			if (!$valid) {
				$msg = ['error' => [
					'nik' => $validation->getError('nik'),
					'nama' => $validation->getError('nama'),
					'nohp' => $validation->getError('nohp'),
					'jenkel' => $validation->getError('jenkel'),
					'nama_jaminan' => $validation->getError('nama_jaminan'),
					'instansi_id' => $validation->getError('instansi_id'),
					'asal' => $validation->getError('asal'),
					'keperluan_id' => $validation->getError('keperluan_id'),
					'bagian_id' => $validation->getError('bagian_id'),
					'bersama' => $validation->getError('bersama'),
					'nama_document' => $validation->getError('nama_document'),
				]];
			} else {

				$nama_document = $this->request->getPost('nama_document');
				$no_document = $this->request->getPost('no_document');

				$newDocument = [
					'nama_document' => $nama_document,
					'no_document' => $no_document,
				];

				$buildDocument = $this->db->table('document');
				$buildDocument->insert($newDocument);

				$id_document = $this->db->insertID();

				$nik = $this->request->getPost('nik');
				$nama = $this->request->getPost('nama');
				$nohp = $this->request->getPost('nohp');
				$jenkel = $this->request->getPost('jenkel');
				$asal = $this->request->getPost('asal');
				$instansi_id = $this->request->getPost('instansi_id');
				$keperluan_id = $this->request->getPost('keperluan_id');
				$bagian_id = $this->request->getPost('bagian_id');
				$tujuan_id = $this->request->getPost('tujuan_id');
				$bersama = $this->request->getVar('bersama');
				$status = $this->request->getPost('status');
				$bukti_foto = $this->request->getPost('bukti_foto');

				$image = str_replace('data:image/jpeg;base64,', '', $bukti_foto);
				$image = base64_decode($image);
				$filename = "post-" . time()  . '.jpg';
				file_put_contents(FCPATH . './assets/images/' . $filename, $image);

				$inVisit = $this->db->table('visitor');
				$cekNik = $inVisit->getWhere(['nik' => $nik])->getRow();
				if ($cekNik == NULL) {

					$newVisit = [
						'nik' => $nik,
						'nama' => $nama,
						'nohp' => $nohp,
						'jenkel' => $jenkel,
					];
					$inVisit->insert($newVisit);
					$id_Visit = $this->db->insertID();

					$data = [
						'visitor_id' => $id_Visit,
						'asal' => $asal,
						'instansi_id' => $instansi_id,
						'keperluan_id' => $keperluan_id,
						'bagian_id' => $bagian_id,
						'document_id' => $id_document,
						'tujuan_id' => $tujuan_id,
						'status' => $status,
						'bukti_foto' => '/assets/images/' . $filename,
					];

					$builder = $this->db->table('cekin');
					$builder->insert($data);
				}
				if ($cekNik == !NULL) {
					$id_visitor = $this->db->query("SELECT id_visitor FROM visitor WHERE visitor.nik = $nik")->getRow();

					$data = [
						'visitor_id' => $id_visitor->id_visitor,
						'asal' => $asal,
						'instansi_id' => $instansi_id,
						'keperluan_id' => $keperluan_id,
						'bagian_id' => $bagian_id,
						'document_id' => $id_document,
						'tujuan_id' => $tujuan_id,
						'status' => $status,
						'bukti_foto' => '/assets/images/' . $filename,
					];

					$builder = $this->db->table('cekin');
					$builder->insert($data);
				}

				$cekin_id = $this->db->insertID();

				$nama_jaminan = $this->request->getPost('nama_jaminan');

				$newJaminan = [
					'cekin_id' => $cekin_id,
					'nama_jaminan' => $nama_jaminan,
					'status_jaminan' => "Not Taken",
				];

				$buildJaminan = $this->db->table('jaminan');
				$buildJaminan->insert($newJaminan);

				$query   = $this->db->query("SELECT * FROM cekin JOIN bagian ON bagian.id_bagian = cekin.bagian_id  WHERE cekin.id_cekin = '" . $cekin_id . "' ")->getRow();

				$writer = new \Endroid\QrCode\Writer\PngWriter();

				if ($query->nama_bagian == "Kepala Sekolah") {
					$qrcode = \Endroid\QrCode\QrCode::create($cekin_id)
						->setEncoding(new \Endroid\QrCode\Encoding\Encoding('UTF-8'))
						->setErrorCorrectionLevel(new \Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow())
						->setSize(300)
						->setMargin(10)
						->setRoundBlockSizeMode(new \Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin())
						->setForegroundColor(new \Endroid\QrCode\Color\Color(0, 0, 0))
						->setBackgroundColor(new \Endroid\QrCode\Color\Color(255, 0, 0));
				} else if ($query->nama_bagian == "Wakil Kepala Sekolah") {
					$qrcode = \Endroid\QrCode\QrCode::create($cekin_id)
						->setEncoding(new \Endroid\QrCode\Encoding\Encoding('UTF-8'))
						->setErrorCorrectionLevel(new \Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow())
						->setSize(300)
						->setMargin(10)
						->setRoundBlockSizeMode(new \Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin())
						->setForegroundColor(new \Endroid\QrCode\Color\Color(0, 0, 0))
						->setBackgroundColor(new \Endroid\QrCode\Color\Color(255, 0, 0));
				} else if ($query->nama_bagian == "TU") {
					$qrcode = \Endroid\QrCode\QrCode::create($cekin_id)
						->setEncoding(new \Endroid\QrCode\Encoding\Encoding('UTF-8'))
						->setErrorCorrectionLevel(new \Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow())
						->setSize(300)
						->setMargin(10)
						->setRoundBlockSizeMode(new \Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin())
						->setForegroundColor(new \Endroid\QrCode\Color\Color(0, 0, 0))
						->setBackgroundColor(new \Endroid\QrCode\Color\Color(253, 215, 3));
				} else {
					$qrcode = \Endroid\QrCode\QrCode::create($cekin_id)
						->setEncoding(new \Endroid\QrCode\Encoding\Encoding('UTF-8'))
						->setErrorCorrectionLevel(new \Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow())
						->setSize(300)
						->setMargin(10)
						->setRoundBlockSizeMode(new \Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin())
						->setForegroundColor(new \Endroid\QrCode\Color\Color(0, 0, 0))
						->setBackgroundColor(new \Endroid\QrCode\Color\Color(34, 139, 35));
				}

				$logo = \Endroid\QrCode\Logo\Logo::create(site_url('/assets/images/logo.png'))
					->setResizeToWidth(50);
				$label = \Endroid\QrCode\Label\Label::create($nama)
					->setTextColor(new \Endroid\QrCode\Color\Color(0, 0, 0));
				$result = $writer->write($qrcode, $logo, $label);

				$qrname = 'qrcode-' . time()  . '.png';

				$result->saveToFile(FCPATH . './assets/qr-code/' . $qrname . '');

				$qrinsert = [
					'id_cekin' => $cekin_id,
					'url' => '/assets/qr-code/' . $qrname,
				];
				$builderQr = $this->db->table('qrcode');
				$builderQr->insert($qrinsert);


				$rombongan = explode(",", $bersama);
				for ($i = 0; $i < count($rombongan); $i++) {

					$newRom[$i] = array(
						'id_cekin' => $cekin_id,
						'nama_rombongan' => $rombongan[$i],
					);

					$builderRom = $this->db->table('rombongan');
					$builderRom->insert($newRom[$i]);
				}

				$msg = ['sukses' => 'Data Berhasil Disimpan'];
			}
			return json_encode($msg);
		} else {
			exit('Maaf data tidak ada');
		}



		// if ($this->db->affectedRows() > 0) {
		// 	session()->setFlashdata('success', 'Creating Successfully');
		// 	return redirect()->to(site_url('cekin'));
		// }
	}

	public function detail($id)
	{
		$query   = $this->db->query("SELECT cekin.id_cekin, cekin.created_at, cekin.status, cekin.asal , cekin.bukti_foto, visitor.nama, visitor.nik, visitor.nohp, visitor.jenkel , instansi.instansi, keperluan.keperluan, bagian.nama_bagian, guru.nama_guru, document.no_document, qrcode.url FROM cekin JOIN qrcode ON qrcode.id_cekin = cekin.id_cekin JOIN visitor ON visitor.id_visitor = cekin.visitor_id JOIN bagian ON bagian.id_bagian = cekin.bagian_id JOIN guru ON guru.id_guru = cekin.tujuan_id JOIN instansi ON instansi.id_instansi = cekin.instansi_id JOIN keperluan ON keperluan.id_keperluan = cekin.keperluan_id JOIN document ON document.id_document = cekin.document_id WHERE cekin.id_cekin = '" . $id . "' ")->getResultArray();

		$res = $this->db->query("SELECT * FROM rombongan WHERE rombongan.id_cekin = '" . $id . "' ")->getResultArray();

		$data = [
			'data1' => $query,
			'data2' => $res
		];
		return view('Cekin/detail_cekin', $data);
	}

	public function delete()
	{
		$post = $this->request->getPost();
		$builder = $this->db->table('cekin');
		$builder->delete(['id_cekin' => $post['cekin_id']]);
		$builder1 = $this->db->table('rombongan');
		$builder1->delete(['id_cekin' => $post['cekin_id']]);
		$builder2 = $this->db->table('qrcode');
		$builder2->delete(['id_cekin' => $post['cekin_id']]);
		if ($this->db->affectedRows() > 0) {
			return redirect()->to(site_url('cekin'))->with('success', 'Deleting Successfully');
		}
	}

	public function htmlToPDF($id)
	{
		$query   = $this->db->query("SELECT cekin.id_cekin, cekin.status, cekin.asal , visitor.nama, visitor.nik, visitor.nohp, instansi.instansi, keperluan.keperluan, bagian.nama_bagian, guru.nama_guru, document.no_document, qrcode.url FROM cekin JOIN qrcode ON qrcode.id_cekin = cekin.id_cekin JOIN visitor ON visitor.id_visitor = cekin.visitor_id JOIN bagian ON bagian.id_bagian = cekin.bagian_id JOIN guru ON guru.id_guru = cekin.tujuan_id JOIN instansi ON instansi.id_instansi = cekin.instansi_id JOIN keperluan ON keperluan.id_keperluan = cekin.keperluan_id JOIN document ON document.id_document = cekin.document_id WHERE cekin.id_cekin = '" . $id . "' ")->getResultArray();

		$res = $this->db->query("SELECT * FROM rombongan WHERE rombongan.id_cekin = '" . $id . "' ")->getResultArray();

		$datas = [
			'data1' => $query,
			'data2' => $res
		];

		return view('Cekin/pdf_view', $datas);
	}
}
