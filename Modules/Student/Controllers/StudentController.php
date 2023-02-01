<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;

class StudentController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Student';

        return view("Modules\Student\Views\index", $data);
    }


    public function add()
	{
		echo "This is other method from Student Module";
	}
}
