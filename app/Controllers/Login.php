<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'sub_title' => 'Login',
        ];

        return view('login/index', $data);
    }
}
