<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Identity extends Migration
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
            'identity_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'identity_company' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'identity_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
            ],
            'identity_email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'identity_address' => [
                'type' => 'TEXT',
            ],
            'identity_logo_text' => [
                'type' => 'TEXT',
            ],
            'identity_logo_icon' => [
                'type' => 'TEXT',
            ],
            'province_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0
            ],
            'province' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'city_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'district_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0
            ],
            'district' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'subdistrict_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0
            ],
            'subdistrict' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'country_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
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
        $this->forge->createTable('tb_identity', TRUE);

        $seeder = \Config\Database::seeder();
        $seeder->call('IdentitySeeder');
    }

    public function down()
    {
        $this->forge->dropTable('tb_identity');
    }
}
