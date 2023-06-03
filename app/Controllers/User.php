<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RukoModel;
use App\Models\UserModel;

class User extends BaseController
{
    protected $RukoModel;
    protected $UserModel;

    public function __construct()
    {
        $this->RukoModel = new RukoModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'ruko' => $this->RukoModel->findAll(4)
        ];

        return view('pages/user/beranda', $data);
    }

    public function ruko($id = null)
    {
        if ($id) {
            $data = [
                'ruko' => $this->RukoModel->find($id)
            ];

            $view = 'pages/user/detailRuko';
        } else {

            $data = [
                'ruko' => $this->RukoModel->findAll()
            ];

            $view = 'pages/user/ruko';
        }

        return view($view, $data);
    }

    public function daftar()
    {
        $data = $this->request->getVar();

        $this->RukoModel->insert($data);

        $idRuko = $this->RukoModel->getInsertID();

        // Redirect to admin page
        return redirect()->to('admin/ruko/' . $idRuko);
    }
}
