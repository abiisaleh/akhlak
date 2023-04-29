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

        return view('pages/user/beranda',$data);
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

        return view($view,$data);
    }

    public function daftar()
    {
        $data = $this->request->getVar();
        
        // Register user in Mythauth
        // $this->UserModel->insert($data);

        // $this->RukoModel->insert($data);
        
        // Redirect to login page
        // return redirect()->to('/login');
        

        return $this->response->send();
    }
}
