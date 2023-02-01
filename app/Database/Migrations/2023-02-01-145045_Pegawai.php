<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
				'auto_increment' => true
            ],
            'hash_identity' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'hash_pegawai' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'whatsapp' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
            ],
            'alamat' => [
                'type' => 'TEXT'
            ],
            'image' => [
                'type' => 'TEXT'
            ],
            'deleted_at' => [
                'type' => 'INT',
                'constraint' => 2,
                'default' => 0
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('tb_pegawai', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_pegawai', TRUE);
    }
}
