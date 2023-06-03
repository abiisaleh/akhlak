<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\RukoModel;
use CodeIgniter\Model;

class Laporan extends BaseController
{
    protected $PesananModel;

    public function __construct()
    {
        $this->PesananModel = new PesananModel();
    }

    public function index()
    {
        helper('form');
        $data['title'] = 'laporan';
        $data['data'] = $this->PesananModel->ruko()->findAll();
        return view('pages/admin/laporan', $data);
    }

    public function show()
    {
        if (in_groups('admin')) {
            $data['data'] = $this->PesananModel->findAll();
        } else {
            // $data['data'] = $this->PesananModel->ruko(user_id())->findAll();
            $data['data'] = $this->PesananModel->ruko()->findAll();
        }
        echo json_encode($data);
    }
}
