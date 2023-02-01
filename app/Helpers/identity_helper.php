<?php
if ( ! function_exists('identity'))
{
    function identity()
    {
        $db      = \Config\Database::connect();
        $data    = $db->table('tb_identity')->select('*')->where('deleted_at', 0)->get()->getRowArray();
        return $data;
    }
}
?>