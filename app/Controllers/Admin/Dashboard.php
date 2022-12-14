<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'sub_title' => 'Dashboard',
        ];

        return view('admin/dashboard/index', $data);
    }
}
