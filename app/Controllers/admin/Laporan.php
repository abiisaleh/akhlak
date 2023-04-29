<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function index()
    {
        $data['title'] = 'Laporan';
        return view('pages/admin/laporan',$data);
    }
}
