<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePeminjamanBukuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pinjam' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_anggota' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_buku' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'jml_pinjam' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
            'tgl_pinjam' => [
                'type' => 'DATE',
            ],
            'tgl_kembali' => [
                'type' => 'DATE',
            ],
            'lama_pinjam' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
            'denda' => [
                'type' => 'INT',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('id_pinjam', true);
        $this->forge->addForeignKey('id_anggota', 'anggota', 'id_anggota', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_buku', 'buku', 'id_buku', 'CASCADE', 'CASCADE');
        $this->forge->createTable('peminjaman_buku');
    }

    public function down()
    {
        $this->forge->dropTable('peminjaman_buku');
    }
}
