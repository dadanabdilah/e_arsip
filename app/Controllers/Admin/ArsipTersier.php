<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\ArsipPrimerModel;
use App\Models\ArsipSekunderModel;
use App\Models\ArsipTersierModel;

class ArsipTersier extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    protected $modelName = 'App\Models\ArsipTersierModel';

    function __construct()
    {
        $this->APrimer = new ArsipPrimerModel;
        $this->ASekunder = new ArsipSekunderModel;
        $this->ATersier = new ArsipTersierModel;
    }

    public function index()
    {
        $data = [
            'Tersier'  => $this->ATersier->findAll(),
            'title' => 'Arsip Tersier',
            'sub_title' => 'Data Arsip Tersier'
        ];
        return view('admin/arsip-tersier/index', $data);
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
            'Primer'  => $this->APrimer->findAll(),
            'Skunder' => $this->ASekunder->findAll(),
            'title'   => 'Arsip Tersier',
            'sub_title' => 'Tambah Data Arsip Tersier'
        ];
        return view('admin/arsip-tersier/tambah', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if(!$this->validate([
            'kode_sekunder' => 'required',
            'kode' => 'required',
            'nama' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
                        'kode_sekunder' => $this->request->getPost('kode_sekunder'),
                        'kode_tersier' => $this->request->getPost('kode'),
                        'tersier' => $this->request->getPost('nama')
                    ];
    
        if($this->model->save($request)){
            session()->setFlashdata('message', 'Tambah Data Arsip Tersier Berhasil');
            return redirect()->to('admin/arsip-tersier');
        }else{
            session()->setFlashdata('error', 'Tambah Data Arsip Tersier Tidak Berhasil');
            return redirect()->to('admin/arsip-tersier');
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
            'Primer'  => $this->APrimer->findAll(),
            'Skunder' => $this->ASekunder->findAll(),
            'Tersier' => $this->ATersier->where('id_tersier', $id)->first(),
            'title' => 'Arsip Tersier',
            'sub_title' => 'Edit Data Arsip Tersier'
        ];
        return view('admin/arsip-tersier/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if(!$this->validate([
            'kode' => 'required',
            'nama' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
                        'id_tersier' => $id,
                        'kode_sekunder' => $this->request->getPost('kode_sekunder'),
                        'kode_tersier' => $this->request->getPost('kode'),
                        'tersier' => $this->request->getPost('nama')
                    ];
    
        if($this->ATersier->save($request)){
            session()->setFlashdata('message', 'Edit Data Arsip Tersier Berhasil');
            return redirect()->to('admin/arsip-tersier');
        }else{
            session()->setFlashdata('error', 'Edit Data Arsip Tersier Tidak Berhasil');
            return redirect()->to('admin/arsip-tersier');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if($this->ATersier->delete($id)){
            session()->setFlashdata('message', 'Hapus Data Arsip Tersier Berhasil');
            return redirect()->to('admin/arsip-tersier');
        }else{
            session()->setFlashdata('error', 'Hapus Data Arsip Tersier Tidak Berhasil');
            return redirect()->to('admin/arsip-tersier');
        }
    }
}
