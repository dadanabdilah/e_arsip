<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\ArsipPrimerModel;
use App\Models\ArsipSekunderModel;
use App\Models\ArsipTersierModel;
use App\Models\UnitKerjaModel;
use App\Models\BidangModel;


class Bidang extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    protected $modelName = 'App\Models\BidangModel';

    function __construct()
    {
        $this->APrimer = new ArsipPrimerModel;
        $this->ATersier = new ArsipTersierModel;
        $this->ASekunder = new ArsipSekunderModel;
        $this->UKerja = new UnitKerjaModel;
        $this->UBidang = new BidangModel;
    }

    public function index()
    {
        $data = [
            'bidang'  => $this->model->findAll(),
            'title' => 'Data Bidang',
            'sub_title' => 'Data Bidang'
        ];
        return view('admin/bidang/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'bidang'  => $this->model->findAll(),
            'title' => 'Data Bidang',
            'sub_title' => 'Tambah Data Bidang'
        ];
        return view('admin/bidang/tambah', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'kode' => 'required',
            'nama' => 'required',
            'kontak' => 'required',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'kode_bidang' => $this->request->getPost('kode'),
            'nama_bidang' => $this->request->getPost('nama'),
            'kontak' => $this->request->getPost('kontak')
        ];

        if ($this->model->save($request)) {
            session()->setFlashdata('message', 'Tambah Data Bidang Berhasil');
            return redirect()->to('admin/bidang');
        } else {
            session()->setFlashdata('error', 'Tambah Bidang Kerja Tidak Berhasil');
            return redirect()->to('admin/bidang');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'UBidang'  => $this->model->where('id_bidang', $id)->first(),
            'title' => 'Data Bidang',
            'sub_title' => 'Edit Data Bidang'
        ];
        return view('admin/bidang/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'kode' => 'required',
            'nama' => 'required',
            'kontak' => 'required',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'id_bidang' => $id,
            'kode_bidang' => $this->request->getPost('kode'),
            'nama_bidang' => $this->request->getPost('nama'),
            'kontak' => $this->request->getPost('kontak')
        ];

        if ($this->UBidang->save($request)) {
            session()->setFlashdata('message', 'Edit Data Bidang Berhasil');
            return redirect()->to('admin/bidang');
        } else {
            session()->setFlashdata('error', 'Edit Data Bidang Tidak Berhasil');
            return redirect()->to('admin/bidang');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if ($this->UBidang->delete($id)) {
            session()->setFlashdata('message', 'Hapus Data Bidang Berhasil');
            return redirect()->to('admin/bidang');
        } else {
            session()->setFlashdata('error', 'Hapus Data Bidang Tidak Berhasil');
            return redirect()->to('admin/bidang');
        }
    }
}
