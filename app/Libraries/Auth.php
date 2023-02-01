<?php

namespace App\Libraries;

class Auth
{
    public function cek_login()
    {
        if (session()->has('hash_user') == '') {
            return FALSE;
        }else{
            return TRUE;
            // return $this->route();
        }
    }

    public function route()
    {
        return redirect()->to('dashboard');
    }
}