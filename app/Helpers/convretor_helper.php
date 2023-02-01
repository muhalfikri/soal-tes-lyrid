<?php
if ( ! function_exists('sweetalert'))
{
    function sweetalert($type = '', $status = '', $message = '')
    {
        session()->setFlashdata('sweetalert', 'Swal.fire({
                title : "'.$status.'",
                text : "'.$message.'",
                icon : "'.$type.'"
            });');

        return TRUE;
    }
}

if ( ! function_exists('notification'))
{
    function notification($type = '', $message = '')
    {
        session()->setFlashdata('notification', 'Toast.fire({
            icon: "'.$type.'",
            title: "'.$message.'"
        });');

        return TRUE;
    }
}
?>