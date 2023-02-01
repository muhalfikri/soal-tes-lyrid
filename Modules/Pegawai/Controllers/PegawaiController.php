<?php

namespace Modules\Pegawai\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class PegawaiController extends BaseController
{
    public function index()
    {
        $data['title']    = 'Data Pegawai';
        return view('Modules\Pegawai\Views\index', $data);
    }

    public function data_list()
    {
        $data['data'] = get_data($select = '*', $table_name = 'tb_pegawai', $where = ['deleted_at' => 0, 'hash_identity' => session()->get('hash_identity')])->getResultArray();
        echo json_encode($data);
    }

    public function save()
    {
        $post  = $this->request->getPost();
        $image = $this->request->getFile('image');
        $image_name = '';

        if ($_FILES['image']['name'] != '') {
            $validationRule = [
                'image' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[image]',
                        'is_image[image]',
                        'mime_in[image,image/jpg,image/jpeg]',
                        'max_size[image,300]',
                    ],
                ],
            ];

            if (! $this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];
                sweetalert($tipe = 'error', $status = 'Failed!', $data['errors']['image']);
                return redirect()->to('pegawai');
            }
    
            $image_name = $image->getRandomName();
            $image->move(WRITEPATH . '../public/assets/pegawai/', $image_name);
        }
        
        $post['hash_identity'] = session()->get('hash_identity');
        $post['image']         = 'assets/pegawai/'.$image_name;
        insert($table_name = 'tb_pegawai', $post);
        insert($table_name = 'tb_log', [
                                            'hash_identity' => session()->get('hash_identity'), 
                                            'hash_user' => session()->get('hash_user'), 
                                            'description' => session()->get('nama_lengkap').' Create Data Pegawai  <b>'. $post['nama_lengkap'].'</b>'
                                        ]);
        sweetalert($tipe = 'success', $status = 'Berhasil!', 'Pegawai telah ditambahkan.');
        return redirect()->to('pegawai');
    }

    public function get_data()
    {
        if ($this->request->isAjax()) {
            $id   = $this->request->getPost('id');
            $data = get_data($select = '*', $table_name = 'tb_pegawai', $where = ['id' => $id])->getRowArray();
            echo json_encode($data);
        }
    }

    public function update()
    {
        $id         = $this->request->getPost('id');
        $image      = $this->request->getFile('image');
        $image_old  = $this->request->getPost('image_old');
        $post       = $this->request->getPost();

        if ($_FILES['image']['name'] != '') {
            $validationRule = [
                'image' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[image]',
                        'is_image[image]',
                        'mime_in[image,image/jpg,image/jpeg]',
                        'max_size[image,300]',
                    ],
                ],
            ];
            if (! $this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];
                sweetalert($tipe = 'error', $status = 'Failed!', $data['errors']['image']);
                return redirect()->to('pegawai');
            }

            $image_name = $image->getRandomName();
            $image->move(WRITEPATH . '../public/assets/pegawai/', $image_name);
            $image_new = 'assets/pegawai/'.$image_name;
        } else {
            $image_new = $image_old;
        }
        
        $post['hash_identity'] = session()->get('hash_identity');
        $post['image']         = $image_new;

        unset($post['id']);
        unset($post['image_old']);
        update($table_name = 'tb_pegawai', $where = ['id' => $id], $post);
        insert($table_name = 'tb_log', [
                                            'hash_user' => session()->get('hash_user'), 
                                            'description' => session()->get('nama_lengkap').' Update Data Pegawai <b>'. $post['nama_lengkap'].'</b>'
                                        ]);
        sweetalert($tipe = 'success', $status = 'Berhasil!', 'Pegawai telah diupdate.');
        return redirect()->to('pegawai');
    }

    public function delete($id = '', $request1 = '')
    {
        delete($table_name = 'tb_pegawai', $where = ['id' => $id]);
        insert($table_name = 'tb_log', [
                                            'hash_identity' => session()->get('hash_identity'), 
                                            'hash_user' => session()->get('hash_user'), 
                                            'description' => session()->get('nama_lengkap').' Delete Data Pegawai  <b>'. $request1.'</b>'
                                        ]);
        sweetalert($tipe = 'success', $status = 'Berhasil!', 'Pegawai telah dihapus.');
        return redirect()->to('pegawai');
    }
}
