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

        $data['title'] = 'Dashboard';
        $data['ruko'] = $RukoModel->findAll();

        if (in_groups('admin')) {
            $data['countRuko'] = $RukoModel->countAllResults();
            $data['countDijual'] = $RukoModel->where('status', '0')->countAllResults();
            $data['countTerjual'] = $RukoModel->where('status', '1')->countAllResults();
            $data['countPemilik'] = $UserModel->withGroup('pemilik')->countAllResults();
            $data['rukoBaru'] = $RukoModel->where('verifikasi', '0')->findAll(5);
        } else {
            $data['countRuko'] = $RukoModel->where('idUser', user_id())->countAllResults();
            $data['countDijual'] = $RukoModel->where('status', '0')->where('idUser', user_id())->countAllResults();
            $data['countTerjual'] = $RukoModel->where('status', '1')->where('idUser', user_id())->countAllResults();
            $data['rukoBaru'] = $RukoModel->where('verifikasi', '0')->where('idUser', user_id())->findAll(5);
        }
        return view('pages/admin/dashboard', $data);
    }
}
