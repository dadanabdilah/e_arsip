<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\ArsipPrimerModel;
use App\Models\ArsipSekunderModel;
use App\Models\ArsipTersierModel;
use App\Models\UnitKerjaModel;

class UnitKerja extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    protected $modelName = 'App\Models\UnitKerjaModel';

    function __construct()
    {
        $this->APrimer = new ArsipPrimerModel;
        $this->ATersier = new ArsipTersierModel;
        $this->ASekunder = new ArsipSekunderModel;
        $this->UKerja = new UnitKerjaModel;
    }

    public function index()
    {
        $data = [
            'UnitKerja'  => $this->model->findAll(),
            'title' => 'Data Unit Kerja',
            'sub_title' => 'Data Unit Kerja'
        ];
        return view('admin/unit-kerja/index', $data);
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
            'UnitKerja'  => $this->model->findAll(),
            'title' => 'Data Unit Kerja',
            'sub_title' => 'Tambah Data Unit Kerja'
        ];
        return view('admin/unit-kerja/tambah', $data);
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
            'kode_unit' => $this->request->getPost('kode'),
            'nama_unit' => $this->request->getPost('nama'),
            'kontak' => $this->request->getPost('kontak')
        ];

        if ($this->model->save($request)) {
            session()->setFlashdata('message', 'Tambah Data Unit Kerja Berhasil');
            return redirect()->to('admin/unit-kerja');
        } else {
            session()->setFlashdata('error', 'Tambah Data Unit Kerja Tidak Berhasil');
            return redirect()->to('admin/unit-kerja');
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
            'UKerja'  => $this->model->where('id_unit', $id)->first(),
            'title' => 'Data Unit Kerja',
            'sub_title' => 'Edit Data Unit Kerja'
        ];
        return view('admin/unit-kerja/edit', $data);
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
            'id_unit' => $id,
            'kode_unit' => $this->request->getPost('kode'),
            'nama_unit' => $this->request->getPost('nama'),
            'kontak' => $this->request->getPost('kontak')
        ];

        if ($this->UKerja->save($request)) {
            session()->setFlashdata('message', 'Edit Data Unit Kerja Berhasil');
            return redirect()->to('admin/unit-kerja');
        } else {
            session()->setFlashdata('error', 'Edit Data Unit Kerja Tidak Berhasil');
            return redirect()->to('admin/unit-kerja');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if ($this->UKerja->delete($id)) {
            session()->setFlashdata('message', 'Hapus Data Unit Kerja Berhasil');
            return redirect()->to('admin/unit-kerja');
        } else {
            session()->setFlashdata('error', 'Hapus Data Unit Kerja Tidak Berhasil');
            return redirect()->to('admin/unit-kerja');
        }
    }
}
