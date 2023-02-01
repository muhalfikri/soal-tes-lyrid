<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IdentitySeeder extends Seeder
{
    public function run()
    {
        helper('text');
        $data = [
            'hash_identity'      => 'bZa2yp3rUnTgP4Yh',
            'identity_name'      => 'SISTEM DATA PEGAWAI',
            'identity_company'   => 'SISTEM DATA PEGAWAI',
            'identity_phone'     => '083872806501',
            'identity_email'     => 'muhalfikri579@gmail.com',
            'identity_address'   => 'Jl. Raya Inkopad Blok O5 No.9, Sasak Panjang, Tajurhalang, Bogor Kode Pos 16320',
            'identity_logo_text' => 'assets/images/logo-text.png',
            'identity_logo_icon' => 'assets/images/logo-icon.png',
            'province_id'        => '9',
            'province'           => 'Jawa Barat',
            'city_id'            => '78',
            'city'               => 'Kabupaten Bogor',
            'district_id'        => '',
            'district'           => '',
            'subdistrict_id'     => '1057',
            'subdistrict'        => 'Tajurhalang',
            'country_id'         => '+62',
        ];

        $this->db->table('tb_identity')->insert($data);
    }
}
