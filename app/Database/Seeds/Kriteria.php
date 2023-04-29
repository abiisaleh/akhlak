<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kriteria extends Seeder
{
    public function run()
    {
        $data = [
            'kriteria' => 'harga',
            'bobot' => '20'
        ];

        $this->db->table('kriteria')->insert($data);
    }
}
