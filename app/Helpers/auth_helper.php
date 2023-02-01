<?php
if ( ! function_exists('isLoggedIn'))
{
    function isLoggedIn()
    {
        if (session()->has('hash_user') == '') {
            return FALSE;
        }else{
            return TRUE;
            // return $this->route();
        }
    }
}
?>