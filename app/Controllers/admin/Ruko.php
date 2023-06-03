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
        return view('pages/admin/ruko', $data);
    }

    public function show()
    {
        if (in_groups('admin')) {
            $data['data'] = $this->RukoModel->findAll();
            $data['total'] = $this->RukoModel->where('verifikasi', '0')->countAllResults();
        } else {
            $data['data'] = $this->RukoModel->pemilik(user_id())->findAll();
            $data['total'] = $this->RukoModel->pemilik(user_id())->countAllResults();
        }

        echo json_encode($data);
    }

    public function create($id)
    {
        // if (in_groups('pemilik')) {
        $data = [
            'idRuko' => $id,
            'idUser' => user_id()
        ];
        $this->RukoModel->save($data);
        // }

        return redirect()->to('admin/ruko');
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
