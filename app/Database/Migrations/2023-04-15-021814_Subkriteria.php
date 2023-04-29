<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subkriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idSubkriteria' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'fkKriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'subkriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'nilai' => [
                'type' => 'INT',
                'constraint' => 9,
            ],
        ]);

        $this->forge->addKey('idSubkriteria',true);
        $this->forge->createTable('subkriteria');
    }

    public function down()
    {
        $this->forge->dropTable('subkriteria');
    }
}
