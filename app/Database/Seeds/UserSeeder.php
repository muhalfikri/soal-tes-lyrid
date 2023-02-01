<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        helper('text');
        $data = [
            [
                'hash_identity' => 'bZa2yp3rUnTgP4Yh',
                'hash_user'     => 'G0K51MhSainJrPgy',
                'email'         => 'superadmin@demo.com',
                'password'      => md5('superadmin'),
                'nama_lengkap'  => 'Super Admin',
                'no_telp'       => '083872806501',
                'alamat'        => 'Jl. Raya Inkopad Blok O-5 No.9, Sasak Panjang, Tajurhalang, Bogor Kode Pos 16320',
                'foto'          => 'assets/files/default.png',
                'id_group'      => 1,
            ],
            [
                'hash_identity' => 'bZa2yp3rUnTgP4Yh',
                'hash_user'     => 'PS21mDeHR45sJQ7M',
                'email'         => 'admin@demo.com',
                'password'      => md5('admin'),
                'nama_lengkap'  => 'User Admin',
                'no_telp'       => '083872806501',
                'alamat'        => 'Jl. Raya Inkopad Blok O-5 No.9, Sasak Panjang, Tajurhalang, Bogor Kode Pos 16320',
                'foto'          => 'assets/files/default.png',
                'id_group'      => 2
            ],
            [
                'hash_identity' => 'bZa2yp3rUnTgP4Yh',
                'hash_user'     => 'D304sMWIAylXrSKV',
                'email'         => 'finance@demo.com',
                'password'      => md5('finance'),
                'nama_lengkap'  => 'User Finance',
                'no_telp'       => '083872806501',
                'alamat'        => 'Jl. Raya Inkopad Blok O-5 No.9, Sasak Panjang, Tajurhalang, Bogor Kode Pos 16320',
                'foto'          => 'assets/files/default.png',
                'id_group'      => 3
            ],
            [
                'hash_identity' => 'bZa2yp3rUnTgP4Yh',
                'hash_user'     => 'qron4O5ShwFtv6Vc',
                'email'         => 'gudang@demo.com',
                'password'      => md5('gudang'),
                'nama_lengkap'  => 'User Gudang',
                'no_telp'       => '083872806501',
                'alamat'        => 'Jl. Raya Inkopad Blok O-5 No.9, Sasak Panjang, Tajurhalang, Bogor Kode Pos 16320',
                'foto'          => 'assets/files/default.png',
                'id_group'      => 4
            ],
            [
                'hash_identity' => 'bZa2yp3rUnTgP4Yh',
                'hash_user'     => '5WL8kogDZQKHhbVC',
                'email'         => 'cs@demo.com',
                'password'      => md5('cs'),
                'nama_lengkap'  => 'Customer Service',
                'no_telp'       => '083872806501',
                'alamat'        => 'Jl. Raya Inkopad Blok O-5 No.9, Sasak Panjang, Tajurhalang, Bogor Kode Pos 16320',
                'foto'          => 'assets/files/default.png',
                'id_group'      => 5
            ],
        ];

        $this->db->table('tb_users')->insertBatch($data);
    }
}
