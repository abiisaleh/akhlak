<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserGroup extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'pemilik',
                'description' => 'Pemilik Ruko'
            ],
            [
                'name' => 'admin',
                'description' => 'Admin Sistem'
            ],
        ];

        $this->db->table('auth_groups')->insertBatch($data);
    }
}
