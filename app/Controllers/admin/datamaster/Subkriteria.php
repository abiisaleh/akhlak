<?php

namespace App\Controllers\admin\datamaster;

use App\Controllers\BaseController;
use App\Models\SubkriteriaModel;

class Subkriteria extends BaseController
{
    protected $SubkriteriaModel;

    public function __construct()
    {
        $this->SubkriteriaModel = new SubkriteriaModel();
    }

    public function index()
    {
        helper('form');
        $data['title'] = 'Subkriteria';

        return view('pages/admin/subkriteria',$data);
    }

    public function show()
    {
        $data['data'] = $this->SubkriteriaModel->join('kriteria','fkKriteria = idKriteria')->findAll();
        echo json_encode($data);
    }

    public function save()
    {
        $data = $this->request->getVar();
        $this->SubkriteriaModel->save($data);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->SubkriteriaModel->delete($id);
        echo json_encode(['status' => true]);
    }
}
