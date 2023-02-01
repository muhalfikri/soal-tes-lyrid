<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'hash_user' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'no_telp' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'foto' => [
                'type' => 'TEXT',
            ],
            'id_group' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'status' => [
                'type'       => 'INT',
                'constraint' => 2,
                'default'    => 0
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
        $this->forge->createTable('tb_users', TRUE);

        $seeder = \Config\Database::seeder();
        $seeder->call('UserSeeder');
    }

    public function down()
    {
        $this->forge->dropTable('tb_users');
    }
}
