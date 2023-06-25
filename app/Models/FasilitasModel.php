<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'fasilitas';
    protected $primaryKey       = 'idFasilitas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['fkRuko', 'fkKriteria', 'fkSubkriteria'];

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

    public function ruko($id)
    {
        return $this->where('fkRuko', $id)->find();
    }

    public function getID($ruko, $kriteria)
    {
        $id = $this->where('fkRuko', $ruko)->where('fkKriteria', $kriteria)->first();
        return $id;
    }

    public function joinruko()
    {
        return $this->join('ruko', 'fkRuko = idRuko');
    }

    public function joinsubkriteria()
    {
        return $this->join('subkriteria', 'fksubkriteria = idsubkriteria');
    }
}
