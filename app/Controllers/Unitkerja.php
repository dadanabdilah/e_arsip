<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Unit_model;

class Unitkerja extends Controller
{
    protected $munit;
    protected $table = "unit_kerja";

    public function __construct()
    {
        $this->munit = new Unit_model();
    }

    public function index()
    {
        $getdata = $this->munit->getdata();
        $data = array(
            'dataUnit' => $getdata,
        );
        return view('Admin/tampil-unit', $data);
    }

    public function tambahData()
    {
        return view('Admin/tambah-unit');
    }
}
