<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $arsip = $this->ATersier->findAll();
        $sm = $this->SMasuk->findAll();
        $data = [
            'arsip' => count($arsip),
            'sm' => count($sm),
            'title' => 'Dashboard',
            'sub_title' => 'Dashboard',
        ];

        return view('admin/dashboard/index', $data);
    }
}
