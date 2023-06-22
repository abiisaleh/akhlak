<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use App\Models\RukoModel;
use CodeIgniter\Model;

class Pesanan extends BaseController
{
    protected $PesananModel;

    public function __construct()
    {
        $this->PesananModel = new PesananModel();
    }

    public function index()
    {
        helper('form');
        $data['title'] = 'pesanan';
        $data['data'] = $this->PesananModel->ruko()->findAll();
        return view('pages/admin/pesanan', $data);
    }

    public function show()
    {
        if (in_groups('admin')) {
            $data['data'] = $this->PesananModel->findAll();
        } else {
            $data['data'] = $this->PesananModel->ruko(user_id())->find();
        }
        echo json_encode($data);
    }

    public function save()
    {
        $data = $this->request->getVar();

        $RukoModel = new RukoModel();
        $ruko = $RukoModel->find($data['fkRuko']);
        $data['total'] = $ruko['harga'] * 3 / 100 + $ruko['harga'];

        $this->PesananModel->save($data);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->PesananModel->delete($id);
    }
}
