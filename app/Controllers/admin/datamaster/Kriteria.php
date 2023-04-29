<?php

namespace App\Controllers\admin\datamaster;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;

class Kriteria extends BaseController
{
    protected $KriteriaModel;

    public function __construct()
    {
        $this->KriteriaModel = new KriteriaModel();
    }

    public function index()
    {
        helper('form');
        $data['title'] = 'Kriteria';

        return view('pages/admin/kriteria',$data);
    }

    public function show()
    {
        $data['data'] = $this->KriteriaModel->findAll();
        echo json_encode($data);
    }

    public function save()
    {
        $data = $this->request->getVar();
        $this->KriteriaModel->save($data);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->KriteriaModel->delete($id);
    }
}
