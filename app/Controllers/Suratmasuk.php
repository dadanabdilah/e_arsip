<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Surat_model;

class Suratmasuk extends Controller
{
    protected $msuratmasuk;
    protected $table = "surat_masuk";

    public function __construct()
    {
        $this->msuratmasuk = new Surat_model();
    }

    public function index()
    {
        $getdata = $this->msuratmasuk->getdata();
        $data = array(
            'dataUnit' => $getdata,
        );
        return view('Admin/tampil-sm', $data);
    }

    public function tambahData()
    {
        return view('Admin/tambah-sm');
    }
}
