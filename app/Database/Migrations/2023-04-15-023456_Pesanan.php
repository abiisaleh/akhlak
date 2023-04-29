<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idPesanan' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fkRuko' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'telp' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'total' => [
                'type' => 'INT',
                'constraint' => 9,
            ],
            'pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
        ]);

        $this->forge->addKey('idPesanan',true);
        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');
    }
}
