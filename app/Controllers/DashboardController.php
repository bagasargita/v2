<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
	public function index()
	{
		date_default_timezone_set("Asia/Bangkok");

		$temp = 0;
		$t1 = '-' . $temp . 'day';
		$t0 = '-' . ($temp - 1) . 'day';
		$start = date("Y-m-d", strtotime($t1));
		$end = date("Y-m-d", strtotime($t0));
		// dd($start, $end);
		$day1 = $this->db->query("SELECT cekin.created_at, cekin.status, COUNT(*) as total FROM cekin WHERE cekin.created_at BETWEEN '" . $start . "' AND '" . $end . "'")->getResultArray();
		// dd($day1);

		$temp = 1;
		$t1 = '-' . $temp . 'day';
		$t0 = '-' . ($temp - 1) . 'day';
		$start = date("Y-m-d", strtotime($t1));
		$end = date("Y-m-d", strtotime($t0));
		$day2   = $this->db->query("SELECT cekin.created_at, cekin.status, COUNT(*) as total FROM cekin WHERE cekin.created_at BETWEEN '" . $start . "' AND '" . $end . "'")->getResultArray();

		$temp = 2;
		$t1 = '-' . $temp . 'day';
		$t0 = '-' . ($temp - 1) . 'day';
		$start = date("Y-m-d", strtotime($t1));
		$end = date("Y-m-d", strtotime($t0));
		$day3   = $this->db->query("SELECT cekin.created_at, cekin.status, COUNT(*) as total FROM cekin WHERE cekin.created_at BETWEEN '" . $start . "' AND '" . $end . "'")->getResultArray();

		$temp = 3;
		$t1 = '-' . $temp . 'day';
		$t0 = '-' . ($temp - 1) . 'day';
		$start = date("Y-m-d", strtotime($t1));
		$end = date("Y-m-d", strtotime($t0));
		$day4   = $this->db->query("SELECT cekin.created_at, cekin.status, COUNT(*) as total FROM cekin WHERE cekin.created_at BETWEEN '" . $start . "' AND '" . $end . "'")->getResultArray();

		$temp = 4;
		$t1 = '-' . $temp . 'day';
		$t0 = '-' . ($temp - 1) . 'day';
		$start = date("Y-m-d", strtotime($t1));
		$end = date("Y-m-d", strtotime($t0));
		$day5   = $this->db->query("SELECT cekin.created_at, cekin.status, COUNT(*) as total FROM cekin WHERE cekin.created_at BETWEEN '" . $start . "' AND '" . $end . "'")->getResultArray();

		$temp = 5;
		$t1 = '-' . $temp . 'day';
		$t0 = '-' . ($temp - 1) . 'day';
		$start = date("Y-m-d", strtotime($t1));
		$end = date("Y-m-d", strtotime($t0));
		$day6 = $this->db->query("SELECT cekin.created_at, cekin.status, COUNT(*) as total FROM cekin WHERE cekin.created_at BETWEEN '" . $start . "' AND '" . $end . "'")->getResultArray();

		$arrRes = array_merge($day1, $day2, $day3, $day4, $day5, $day6);
		// dd(json_encode($arrRes));


		$rombongan = $this->db->query('SELECT * FROM rombongan');
		$roms = $rombongan->getResultArray();
		$count_roms = count($roms);
		$visitor = $this->db->query('SELECT * FROM visitor');
		$vis = $visitor->getResultArray();
		$count_vis = count($vis);

		$total_human_visit = $count_vis + $count_roms;
		// \dd($total_human_visit);


		$bagian = $this->db->query('SELECT * FROM bagian');
		$bagians = $bagian->getResultArray();
		$count_bagian = count($bagians);
		$guru = $this->db->query('SELECT * FROM guru');
		$gurus = $guru->getResultArray();
		$count_guru = count($gurus);
		$cekin = $this->db->query('SELECT * FROM cekin');

		$data = [

			'title' => 'Guru',
			'data' => $count_bagian,
			'data1' => $count_guru,
			'data2' => $total_human_visit,
			'chart' => json_encode($arrRes),
			'line' => json_encode($arrRes),
		];

		return view('dashboard', $data);
	}
}
