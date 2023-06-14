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
        $data['ruko'] = $this->RukoModel->findAll(4);

        return view('pages/user/beranda', $data);
    }

    public function rekomendasi()
    {
        $data['ruko'] = session()->get('ruko');
        return view('pages/user/rekomendasi', $data);
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

    public function search()
    {
        $rukoID = $this->request->getVar();
        $ruko = $this->RukoModel->find($rukoID);
        $kriteria = model('KriteriaModel')->findAll();
        $fasilitasModel = model('FasilitasModel');
        $subkriteriaModel = model('SubkriteriaModel');

        $i = 0;
        foreach ($rukoID as $ruko) {
            $data[$i]['idRuko'] = $ruko;
            foreach ($kriteria as $Kriteria) {
                $fkSubkriteria = $fasilitasModel->where('fkRuko', $ruko)->where('fkKriteria', $Kriteria['idKriteria'])->first()['fkSubkriteria'];
                if ($fkSubkriteria == 0) {
                    $nilai = 0;
                } else {
                    $nilai = $subkriteriaModel->find($fkSubkriteria)['nilai'];
                }
                $data[$i][$Kriteria['kriteria']] = $nilai;
                $nilaiKriterias[$Kriteria['kriteria']][] = $nilai;
            }
            $i++;
        }

        foreach ($kriteria as $Kriteria) {
            $max[$Kriteria['kriteria']] = max($nilaiKriterias[$Kriteria['kriteria']]);
            $min[$Kriteria['kriteria']] = min($nilaiKriterias[$Kriteria['kriteria']]);
        }

        $cost = ['harga'];
        $benefit = ['ukuran', 'fasilitas', 'lokasi', 'kondisi jalan', 'lingkungan', 'listrik', 'lantai', 'halaman parkir', 'air'];

        foreach ($data as &$Ruko) {
            foreach ($kriteria as $Kriteria) {
                if (in_array($Kriteria['kriteria'], $cost)) {
                    if ($Ruko[$Kriteria['kriteria']] == 0) {
                        $rating = 0;
                    } else {
                        $rating = $min[$Kriteria['kriteria']] / $Ruko[$Kriteria['kriteria']];
                    }
                } elseif (in_array($Kriteria['kriteria'], $benefit)) {
                    if ($Ruko[$Kriteria['kriteria']] == 0) {
                        $rating = 0;
                    } else {
                        $rating = $Ruko[$Kriteria['kriteria']] / $max[$Kriteria['kriteria']];
                    }
                }
                $Ruko['rating_' . $Kriteria['kriteria']] = $rating;
                $nilaiV[] = $rating * $Kriteria['bobot'];
            }
            $Ruko['V'] = round(array_sum($nilaiV) / 100, 3);
            $nilaiV = []; //reset nilai v
        }

        usort($data, function ($a, $b) {
            return $b['V'] - $a['V'];
        });

        session()->set('ruko', $data);
    }
}
