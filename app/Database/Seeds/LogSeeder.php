<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LogSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'hash_identity' => 'bZa2yp3rUnTgP4Yh',
            'description'   => 'Welcome To System Data Pegawai',
        ];

        $this->db->table('tb_log')->insert($data);
    }
}
