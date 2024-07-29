<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnggotaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_anggota' => [
                'type' => 'INT',
                'constraint' => 50,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_anggota' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'prodi_anggota' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'hp_anggota' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('id_anggota', true);
        $this->forge->createTable('anggota');
    }

    public function down()
    {
        $this->forge->dropTable('anggota');
    }
}
