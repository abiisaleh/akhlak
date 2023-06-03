<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\RukoModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $RukoModel = new RukoModel();
        $UserModel = new UserModel();

        $data = [
            'title' => 'Dashboard',
            'countRuko' => $RukoModel->countAllResults(),
            'countDijual' => $RukoModel->where('status', '0')->countAllResults(),
            'countTerjual' => $RukoModel->where('status', '1')->countAllResults(),
            'countPemilik' => $UserModel->withGroup('pemilik')->countAllResults(),
            'rukoBaru' => $RukoModel->where('verifikasi', '0')->findAll(5),
            'ruko' => $RukoModel->findAll(),

        ];
        return view('pages/admin/dashboard', $data);
    }
}
