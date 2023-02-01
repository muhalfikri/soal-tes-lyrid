<?php

namespace Modules\Users\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class UsersController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Manajemen User';
        $data['group'] = get_data($select = '*', $table_name = 'tb_group', $where = ['deleted_at' => 0])->getResultArray();
        return view('Modules\Users\Views\index', $data);
    }

    public function save()
    {
        $post  = $this->request->getPost();
        $image = $this->request->getFile('foto');
        $image_name = '';

        if ($post['password'] == $post['password_confirm']) {
            if ($_FILES['foto']['name'] != '') {
                $validationRule = [
                    'foto' => [
                        'label' => 'Foto',
                        'rules' => [
                            'uploaded[foto]',
                            'is_image[foto]',
                            'mime_in[foto,image/jpg,image/jpeg]',
                        ],
                    ],
                ];
    
                if (! $this->validate($validationRule)) {
                    $data = ['errors' => $this->validator->getErrors()];
                    sweetalert($tipe = 'error', $status = 'Failed!', $data['errors']['image']);
                    return redirect()->to('users');
                }
        
                $image_name = $image->getRandomName();
                $image->move(WRITEPATH . '../public/assets/users/', $image_name);
            }
            
            $post['hash_identity'] = session()->get('hash_identity');
            $post['foto']          = 'assets/users/'.$image_name;
            $post['password']      = md5($post['password']);
            $post['hash_user']     = random_string('alnum', 16);
            $post['hash_identity'] = identity()['hash_identity'];
            unset($post['password_confirm']);
            insert($table_name = 'tb_users', $post);
            insert($table_name = 'tb_log', [
                                                'hash_identity' => session()->get('hash_identity'), 
                                                'hash_user' => session()->get('hash_user'), 
                                                'description' => session()->get('nama_lengkap').' Create Users  <b>'. $post['nama_lengkap'].'</b>'
                                            ]);
            sweetalert($tipe = 'success', $status = 'Berhasil!', 'Users telah ditambahkan.');
        } else {
            sweetalert($tipe = 'error', $status = 'Gagal!', 'Konfirmasi Password tidak sesuai.');
        }
        return redirect()->to('users');
    }

    public function data_list()
    {
        $join = [
            'table_single' => 'tb_users AS a',
            'select'       => 'a.*, b.nama_group',
            'table_join_1' => [
                'table_name' => 'tb_group AS b',
            ],
            'on_field_1' => [
                'on_field' => 'a.id_group = b.id',
                'method'   => 'left'
            ],
            'where' => [
                'a.deleted_at' => 0
            ],
            'order_by' => 'a.id',
            'sort_by'  => 'ASC'
        ];

        $data['data'] = get_data_join($join, 1)->getResultArray();
        echo json_encode($data);
    }

    public function get_data()
    {
        if ($this->request->isAjax()) {
            $id   = $this->request->getPost('id');
            $data = get_data($select = '*', $table_name = 'tb_users', $where = ['id' => $id])->getRowArray();
            echo json_encode($data);
        }
    }

    public function update()
    {
        $id         = $this->request->getPost('id');
        $image      = $this->request->getFile('foto');
        $image_old  = $this->request->getPost('image_old');
        $post       = $this->request->getPost();

        if ($_FILES['foto']['name'] != '') {
            $validationRule = [
                'foto' => [
                    'label' => 'Foto',
                    'rules' => [
                        'uploaded[foto]',
                        'is_image[foto]',
                        'mime_in[foto,image/jpg,image/jpeg]',
                    ],
                ],
            ];
            if (! $this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];
                sweetalert($tipe = 'error', $status = 'Failed!', $data['errors']['image']);
                return redirect()->to('users');
            }

            $image_name = $image->getRandomName();
            $image->move(WRITEPATH . '../public/assets/users/', $image_name);
            $image_new = 'assets/users/'.$image_name;
        } else {
            $image_new = $image_old;
        }

        $post['foto']         = $image_new;
        unset($post['id']);
        unset($post['image_old']);
        update($table_name = 'tb_users', $where = ['id' => $id], $post);
        insert($table_name = 'tb_log', [
                                            'hash_user' => session()->get('hash_user'), 
                                            'description' => session()->get('nama_lengkap').' Update Users <b>'. $post['nama_lengkap'].'</b>'
                                        ]);
        sweetalert($tipe = 'success', $status = 'Berhasil!', 'Users telah diupdate.');
        return redirect()->to('users');
    }

    public function delete($id = '', $request1 = '')
    {
        delete($table_name = 'tb_users', $where = ['id' => $id]);
        insert($table_name = 'tb_log', [
                                            'hash_identity' => session()->get('hash_identity'), 
                                            'hash_user' => session()->get('hash_user'), 
                                            'description' => session()->get('nama_lengkap').' Delete User  <b>'. $request1.'</b>'
                                        ]);
        sweetalert($tipe = 'success', $status = 'Berhasil!', 'Users telah dihapus.');
        return redirect()->to('users');
    }

    public function ubah_password()
    {
        $id           = $this->request->getPost('id');
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $post = $this->request->getPost();
        if ($post['password'] == $post['password_confirm']) {
            $post['password'] = md5($post['password']);
            unset($post['id']);
            unset($post['password_confirm']);
            unset($post['nama_lengkap']);
            update($table_name = 'tb_users', $where = ['id' => $id], $post);
            insert($table_name = 'tb_log', [
                                                'hash_user' => session()->get('hash_user'), 
                                                'description' => session()->get('nama_lengkap').' Update Password  <b>'. $nama_lengkap.'</b>'
                                            ]);
            sweetalert($tipe = 'success', $status = 'Berhasil!', 'Password telah diupdate.');
        } else {
            sweetalert($tipe = 'error', $status = 'Gagal!', 'Konfirmasi Password tidak sesuai.');
        }

        return redirect()->to('users');
    }
}
