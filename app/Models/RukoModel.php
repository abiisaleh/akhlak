<?php

namespace App\Models;

use CodeIgniter\Model;

class RukoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ruko';
    protected $primaryKey       = 'idRuko';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['alamat', 'harga', 'pemilik', 'telp', 'verifikasi', 'status', 'idUser', 'lat', 'lng', 'dokumen', 'gambar'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function pemilik($pemilik)
    {
        return $this->where('idUser', $pemilik);
    }

    public function fasilitas()
    {
        return $this
            ->join('fasilitas', 'fasilitas.fkRuko = ruko.idRuko', 'LEFT')
            ->join('kriteria', 'kriteria.idKriteria = fasilitas.fkKriteria', 'LEFT')
            ->join('subkriteria', 'subkriteria.idSubkriteria = fasilitas.fkSubkriteria', 'LEFT')
            ->select('ruko.*, kriteria, subkriteria');
    }

    public function fasilitasRuko()
    {
        return $this
            ->join('fasilitas', 'fasilitas.fkRuko = ruko.idRuko', 'LEFT')
            ->join('subkriteria', 'subkriteria.idSubkriteria = fasilitas.fkSubkriteria', 'LEFT')
            ->select('ruko.*, subkriteria');
    }

    public function verifikasi()
    {
        return $this->where('verifikasi', '1');
    }
}
