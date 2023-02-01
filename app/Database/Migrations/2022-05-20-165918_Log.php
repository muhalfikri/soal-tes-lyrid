<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Log extends Migration
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
            'description' => [
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
        $this->forge->createTable('tb_log', TRUE);

        $seeder = \Config\Database::seeder();
        $seeder->call('LogSeeder');
    }

    public function down()
    {
        $this->forge->dropTable('tb_log', TRUE);
    }
}
