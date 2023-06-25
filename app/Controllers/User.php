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
        $data['ruko'] = $this->RukoModel->verifikasi()->findAll(4);

        return view('pages/user/beranda', $data);
    }

    public function rekomendasi()
    {
        $data['ruko'] = session()->get('ruko');
        $data['perhitungan'] = session()->get('perhitungan');
        return view('pages/user/rekomendasi', $data);
    }

    public function ruko($id = null, $ruko = null)
    {
        $ruko = session()->getFlashdata('ruko');

        if ($id == 'semua') {
            $data = ['ruko' => $this->RukoModel->findAll()];
            $view = 'pages/user/ruko';
        } elseif ($ruko != null) {
            $data = ['ruko' => $this->RukoModel->find($ruko)];
            $view = 'pages/user/ruko';
        } elseif ($id) {
            $data = ['ruko' => $this->RukoModel->find($id)];
            $view = 'pages/user/detailRuko';
        } else {
            $data['ruko'] = null;
            $view = 'pages/user/ruko';
        }

        return view($view, $data);
    }

    public function filter()
    {
        $dataKriteria = $this->request->getVar();

        $fasilitasModel = model('FasilitasModel');

        foreach ($dataKriteria as $value) {
            if ($value != '-') {
                $fasilitasModel->orwhere('fkSubkriteria', $value);
            }
        }
        $fasilitasModel->select('fkRuko')->groupBy('fkRuko');
        $hasil = $fasilitasModel->find();

        if ($hasil == null) {
            session()->set('ruko', null);
            return redirect()->to('rekomendasi');
        }

        //ekstrak hasil
        foreach ($hasil as $value) {
            $DataRuko[] = $value['fkRuko'];
        }

        session()->setFlashdata('ruko', $DataRuko);
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
        $dataKriteria = $this->request->getVar();

        $kriteria = model('KriteriaModel')->findAll();
        // simpan data kriteria
        $perhitungan['kriteria'] = $kriteria;

        $fasilitasModel = model('FasilitasModel');
        $subkriteriaModel = model('SubkriteriaModel');

        foreach ($dataKriteria as $value) {
            if ($value != '-') {
                $fasilitasModel->orwhere('fkSubkriteria', $value);
            }
        }
        $fasilitasModel->select('fkRuko')->groupBy('fkRuko');
        $hasil = $fasilitasModel->find();

        if ($hasil == null) {
            session()->set('ruko', null);
            return redirect()->to('rekomendasi');
        }

        //ekstrak hasil
        foreach ($hasil as $value) {
            $DataRuko[] = $value['fkRuko'];
        }

        $ruko = $this->RukoModel->find($DataRuko);

        $perhitungan['alternatif'] = $ruko;

        $i = 0;
        foreach ($DataRuko as $ruko) {
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

        session()->set('perhitungan', $perhitungan);
        session()->set('ruko', $data);
        return redirect()->to('rekomendasi');
    }
}
