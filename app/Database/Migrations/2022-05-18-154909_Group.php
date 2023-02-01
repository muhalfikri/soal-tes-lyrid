<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Group extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
				'auto_increment' => true
            ],
            'nama_group' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'sidebar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'deleted_at' => [
                'type'       => 'INT',
                'constraint' => 2,
                'default'    => 0
            ],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('tb_group', TRUE);

        $seeder = \Config\Database::seeder();
        $seeder->call('GroupSeeder');
    }

    public function down()
    {
        $this->forge->dropTable('tb_group');
    }
}
