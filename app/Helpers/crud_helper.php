<?php
if ( ! function_exists('get_data_join'))
{
    function get_data_join($join = [], $limit_join = '')
    {
        $db   = \Config\Database::connect();
        if ($limit_join == 1) {
            $data = $db->table($join['table_single'])
                       ->select($join['select'])
                       ->join($join['table_join_1']['table_name'], $join['on_field_1']['on_field'], $join['on_field_1']['method'])
                       ->where($join['where'])
                       ->orderBy($join['order_by'], $join['sort_by'])
                       ->get();
        } else if($limit_join == 2){
            $data = $db->table($join['table_single'])
                       ->select($join['select'])
                       ->join($join['table_join_1']['table_name'], $join['on_field_1']['on_field'], $join['on_field_1']['method'])
                       ->join($join['table_join_2']['table_name'], $join['on_field_2']['on_field'], $join['on_field_2']['method'])
                       ->where($join['where'])
                       ->orderBy($join['order_by'], $join['sort_by'])
                       ->get();
        }
        
        return $data;
    }
}

if ( ! function_exists('get_data'))
{
    function get_data($select = [], $table_name = '', $where = [], $limit = FALSE)
    {
        $db   = \Config\Database::connect();
        $data = $db->table($table_name)->select($select)->where($where)->orderBy('created_at', 'DESC')->get($limit);
        return $data;
    }
}

if ( ! function_exists('insert'))
{
    function insert($table_name = '', $insert = [])
    {
        $db      = \Config\Database::connect();
        $db->table($table_name)->insert($insert);
        $data = $db->insertID();
        return $data;
    }
}

if ( ! function_exists('update'))
{
    function update($table_name = '', $where = [], $update = [])
    {
        $db   = \Config\Database::connect();
        $data = $db->table($table_name)->where($where)->update($update);
        return $data;
    }
}

if ( ! function_exists('delete'))
{
    function delete($table_name = '', $where = [])
    {
        $db   = \Config\Database::connect();
        $data = $db->table($table_name)->where($where)->update(['deleted_at' => 1]);
        return $data;
    }
}

?>