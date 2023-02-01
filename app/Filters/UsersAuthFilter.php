<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UsersAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // helper('convretor');
        if (is_null(session()->get('logged_in'))) {
            // sweetalert('error', 'Failed!', '403: Access Forbidden');
            return redirect()->to(base_url('auth/login'));
        } else {
            return TRUE;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}