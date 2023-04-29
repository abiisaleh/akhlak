<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\RukoModel;

class Ruko extends BaseController
{
    protected $RukoModel;

    public function __construct()
    {
        $this->RukoModel = new RukoModel();
    }

    public function index()
    {
        helper('form');
        $KriteriaModel = new KriteriaModel();

        $data['title'] = 'Ruko';
        $data['kriteria'] = $KriteriaModel->findAll();

        return view('pages/admin/ruko',$data);
    }

    public function show()
    {
        $data['data'] = $this->RukoModel->findAll();
        $data['total'] = $this->RukoModel->where('verifikasi','0')->countAllResults();
        echo json_encode($data);
    }

    public function save()
    {
        $data = $this->request->getVar();
        $this->RukoModel->save($data);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->RukoModel->delete($id);
    }
}
