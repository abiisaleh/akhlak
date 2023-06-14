<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ruko extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idRuko' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'lat' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'lng' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 9,
            ],
            'pemilik' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'telp' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'verifikasi' => [
                'type' => 'ENUM("0","1")',
                'default' => '0',
            ],
            'status' => [
                'type' => 'ENUM("0","1")',
                'default' => '0',
            ],
            'idUser' => [
                'type' => 'VARCHAR',
                'constraint' => 3,
            ],
        ]);

        $this->forge->addKey('idRuko', true);
        $this->forge->createTable('ruko');
    }

    public function down()
    {
        $this->forge->dropTable('ruko');
    }
}
