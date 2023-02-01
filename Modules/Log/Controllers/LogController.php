<?php

namespace Modules\Log\Controllers;

use App\Controllers\BaseController;

class LogController extends BaseController
{
    public function index()
    {
        $data['title']    = 'Log Activity';
        return view('Modules\Log\Views\index', $data);
    }

    public function get_data()
    {
        $where = ['a.deleted_at' => 0, 'a.hash_user' => session()->get('hash_user')];
        if (session()->get('id_group') == 1) {
            $where = [
                'a.deleted_at' => 0, 
                'a.hash_identity' => session()->get('hash_identity')
            ];
        } else {
            $where = [
                'a.deleted_at' => 0, 
                'a.hash_identity' => session()->get('hash_identity'),
                'a.hash_user' => session()->get('hash_user')
            ];
        }

        $join = [
            'select'   => '
                a.*, 
                b.nama_lengkap
            ',
            'table_single' => 'tb_log AS a',
            'table_join_1' => ['table_name' => 'tb_users AS b'],
            'on_field_1'   => ['on_field'   => 'a.hash_user = b.hash_user', 'method' => 'left'],
            'where'        => $where,
            'order_by'     => 'a.created_at',
            'sort_by'      => 'desc'
        ];

        $data['data'] = get_data_join($join, $limit_join = 1)->getResultArray();
        echo json_encode($data);
    }
}
