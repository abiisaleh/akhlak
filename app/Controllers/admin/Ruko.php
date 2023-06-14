<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\RukoModel;

use function PHPUnit\Framework\isNull;

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
        } else {
            $data['data'] = $this->RukoModel->pemilik(user_id())->findAll();
        }

        echo json_encode($data);
    }

    public function create($id)
    {
        if (in_groups('pemilik')) {
            $data = [
                'idRuko' => $id,
                'idUser' => user_id()
            ];
            $this->RukoModel->save($data);
        }

        return redirect()->to('admin/ruko');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Ruko';
        $data['ruko'] = $this->RukoModel->find($id);
        $data['kriteria'] = model('KriteriaModel')->findAll();
        $data['fasilitas'] = model('FasilitasModel')->where('fkRuko', $id)->find();

        return view('pages/admin/ruko-detail', $data);
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getVar();
            $fileDokumen = $this->request->getFile('dokumen');
            $fileGambar = $this->request->getFile('gambar');

            if ($fileDokumen && $fileDokumen->isValid() && !$fileDokumen->hasMoved()) {
                $newName = $fileDokumen->getRandomName();
                $data['dokumen'] = $newName;
                $fileDokumen->move(FCPATH . 'uploads/doc', $newName);
                $res['msg'][] = 'File berhasil diunggah.';
            }

            if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
                $newName = $fileGambar->getRandomName();
                $data['gambar'] = $newName;
                $fileGambar->move(FCPATH . 'uploads/img', $newName);
                $res['msg'][] = 'Gambar berhasil diunggah.';
            }

            $this->RukoModel->save($data);
            $res['msg'][] = 'Data berhasil diubah.';

            return $this->response->setJSON($res);
        };
    }

    public function fasilitas()
    {
        $fasilitasModel = model('FasilitasModel');
        $kriteria = model('KriteriaModel')->findAll();

        $data['fkRuko'] = $this->request->getVar('idRuko');

        foreach ($kriteria as $Kriteria) {
            $data['fkKriteria'] = $Kriteria['idKriteria'];
            $data['fkSubkriteria'] = $this->request->getVar($Kriteria['idKriteria']);

            $fasilitas = $fasilitasModel->getID($data['fkRuko'], $data['fkKriteria']);
            if (empty($fasilitas)) {
                model('FasilitasModel')->insert($data);
            } else {
                $data['idFasilitas'] = $fasilitas['idFasilitas'];
                model('FasilitasModel')->save($data);
            }
        }

        $res['msg'] = 'Data Kriteria berhasil disimpan.';
        return $this->response->setJSON($res);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->RukoModel->delete($id);
    }
}
