<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Arsip_model;

class Arsip extends Controller
{
    protected $marsip;
    protected $table = "arsip";

    public function __construct()
    {
        $this->marsip = new Arsip_model();
    }

    public function index()
    {
        $getdata = $this->marsip->getdata();
        $data = array(
            'dataArsip' => $getdata,
        );
        return view('Admin/tampil-arsip', $data);
    }

    public function tambahData()
    {
        return view('Admin/tambah-arsip');
    }

    public function tambahDataAksi()
    {
        $kodearsip = $this->request->getPost("kode_arsip");
        $namaarsip = $this->request->getPost("nama_arsip");
        $data = array(
            'kode_arsip' => $kodearsip,
            'nama_arsip' => $namaarsip,
        );

        try {
            $tambahDataAksi = $this->marsip->simpanData($this->table, $data);
            redirect('Arsip');
            /*if ($tambahDataAksi) {
                echo "<script>alert("Data Berhasil disimpan");window.location='" . base_url('Admin/tampil-arsip') . "';</script>";
            } else {
                echo "<script>alert("Data Gagal disimpan");window.location='" . base_url('Arsip') . "';</script>";
            }*/
        } catch (\Exception $e) {
            /* echo "<script>alert("Kode Arsip sudah ada");window.location='" . base_url('Arsip') . "';</script>"";*/
        }
    }

    public function deleteData($id)
    {
        $where = ['id_arsip' => $id];

        try {
            $hapus = $this->marsip->hapusData($this->table, $where);
            if ($hapus) {
                echo '<script>alert("Data Berhasil disimpan");window.location(' . base_url('Arsip') . ');</script>';
            } else {
                echo '<script>alert("Data Gagal disimpan");window.location(' . base_url('Arsip') . ');</script>';
            }
        } catch (\Exception $e) {
            echo '<script>alert("Kode Arsip sudah ada");window.location(' . base_url('Arsip') . ');</script>';
        }
    }
}
