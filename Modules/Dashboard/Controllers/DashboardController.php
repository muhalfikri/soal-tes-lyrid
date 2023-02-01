<?php

namespace Modules\Dashboard\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('Modules\Dashboard\Views\index', $data);
    }
}
