<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_group' => 'Super Admin',
                'sidebar'    => 'super_admin',
            ],
            [
                'nama_group' => 'Admin',
                'sidebar'    => 'admin',
            ],
            [
                'nama_group' => 'Finance',
                'sidebar'    => 'finance',
            ],
            [
                'nama_group' => 'Gudang',
                'sidebar'    => 'gudang',
            ],
            [
                'nama_group' => 'Customer Service',
                'sidebar'    => 'customer_service',
            ],
        ];

        $this->db->table('tb_group')->insertBatch($data);
    }
}
