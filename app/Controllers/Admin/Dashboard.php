<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $arsip = $this->ATersier->findAll();
        $sm = $this->SMasuk->findAll();
        $sk = $this->SKeluar->findAll();
        $da = $this->SDisposisi->where('status', 'diajukan')->findAll();
        $dp = $this->SDisposisi->where('status', 'proses')->findAll();
        $ds = $this->SDisposisi->where('status', 'selesai')->findAll();
        $data = [
            'arsip' => count($arsip),
            'sm' => count($sm),
            'sk' => count($sk),
            'da' => count($da),
            'dp' => count($dp),
            'ds' => count($ds),
            'title' => 'Dashboard',
            'sub_title' => 'Dashboard',
        ];

        return view('admin/dashboard/index', $data);
    }
}
