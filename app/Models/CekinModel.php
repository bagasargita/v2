<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class CekinModel extends Model
{
    var $column_order = ['id_cekin', 'created_at', 'status', 'nik', 'nama', 'nohp', 'asal', 'instansi', 'nama_bagian', 'nama_guru', 'keperluan', 'no_document'];
    var $order = ['id_cekin' => 'DESC'];

    function get_datatables()
    {

        $querySearch = "";

        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $querySearch = "nik LIKE '%$search%' OR nama LIKE '%$search%' OR asal LIKE '%$search%' OR instansi LIKE '%$search%'";
        } else {
            $querySearch = "id_cekin != ''";
        }

        if ($_POST['searchByFromdate'] != '' && $_POST['searchByTodate'] != '') {
            $searchByFromdate = $_POST['searchByFromdate'];
            $searchByTodate = $_POST['searchByTodate'];
            $querySearch .= " and (cekin.created_at between '" . $searchByFromdate . "' and '" . $searchByTodate . "' ) ";
        }



        if ($_POST['order']) {
            $result_order = $this->column_order[$_POST['order']['0']['column']];
            $result_dir = $_POST['order']['0']['dir'];
        } else if ($this->order) {
            $order = $this->order;
            $result_order = key($order);
            $result_dir = $order[key($order)];
        }

        if ($_POST['length'] != -1) {
            $db      = \Config\Database::connect();
            $builder = $db->table('cekin');
            $builder->join('visitor', 'visitor.id_visitor = cekin.visitor_id');
            $builder->join('bagian', 'bagian.id_bagian = cekin.bagian_id');
            $builder->join('guru', 'guru.id_guru = cekin.tujuan_id');
            $builder->join('instansi', 'instansi.id_instansi = cekin.instansi_id');
            $builder->join('keperluan', 'keperluan.id_keperluan = cekin.keperluan_id');
            $builder->join('document', 'document.id_document = cekin.document_id');
            $query = $builder->select('cekin.id_cekin, cekin.created_at, cekin.status, cekin.asal ,visitor.nama, visitor.nik, visitor.nohp, instansi.instansi, keperluan.keperluan, bagian.nama_bagian, guru.nama_guru, document.no_document')->where($querySearch)->orderBy($result_order, $result_dir)->limit($_POST['length'], $_POST['start'])->get();
            // var_dump($query->getResult());
            // die;
            return $query->getResult();
        }
    }

    function total_rows()
    {

        $sQuery = "SELECT COUNT(id_cekin) as total FROM cekin";
        $db     = \Config\Database::connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function total_filter()
    {

        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $querySearch = "AND ( status LIKE '%search%' OR asal LIKE '%search%')";
        } else {
            $querySearch = "";
        }
        $sQuery = "SELECT COUNT(id_cekin) as total FROM cekin WHERE id_cekin != '' $querySearch ";
        $db     = \Config\Database::connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }
}
