<?php

namespace Modules\Auth\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    public function login()
    {
        return view('Modules\Auth\Views\index');
    }

    public function login_process()
    {
        $output = [];
        if ($this->request->isAJAX()) {
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $where = [
                'email'      => $email, 
                'password'   => md5($password), 
                'deleted_at' => 0
            ];

            $cek_data = get_data($select = '*', $table_name = 'tb_users', $where)->getRowArray();
            
            if (!empty($cek_data)) {
                $session = [
                    'id'            => $cek_data['id'],
                    'hash_identity' => $cek_data['hash_identity'],
                    'hash_user'     => $cek_data['hash_user'],
                    'email'         => $cek_data['email'],
                    'nama_lengkap'  => $cek_data['nama_lengkap'],
                    'no_telp'       => $cek_data['no_telp'],
                    'foto'          => $cek_data['foto'],
                    'id_group'      => $cek_data['id_group'],
                    'logged_in'     => TRUE
                ];

                session()->set($session);

                $insert = [
                    'hash_user'   => session()->get('hash_user'),
                    'description' => session()->get('nama_lengkap').' Login Pada Tanggal <strong>'.date('Y-m-d H:i:s').'</strong>'
                ];

                insert($table_name = 'tb_log', $insert);
                update($table_name = 'tb_users', $where = ['hash_user' => session()->get('hash_user')], $update = ['status' => 1]);

                $output['code']    = 200;
                $output['status']  = 'success';
                $output['message'] = 'Selamat Datang '.session()->get('nama_lengkap');
            } else {
                $output['code']    = 404;
                $output['status']  = 'error';
                $output['message'] = 'Email atau Password salah';
            }

            echo json_encode($output);
        }
    }

    public function logout()
    {
        $insert = [
            'hash_user'   => session()->get('hash_user'),
            'description' => session()->get('nama_lengkap').' Logout Pada Tanggal <strong>'.date('Y-m-d H:i:s').'</strong>'
        ];

        insert($table_name = 'tb_log', $insert);
        update($table_name = 'tb_users', $where = ['hash_user' => session()->get('hash_user')], $update = ['status' => 0]);

        session()->destroy();
        return redirect()->to('auth/login');
    }
}
