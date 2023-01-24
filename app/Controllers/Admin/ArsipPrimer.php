<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\ArsipPrimerModel;

class ArsipPrimer extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    protected $modelName = 'App\Models\ArsipPrimerModel';

    function __construct()
    {
        $this->APrimer = new ArsipPrimerModel;
    }

    public function index()
    {
        $data = [
            'Primer' => $this->model->findAll(),
            'title' => 'Arsip Primer',
            'sub_title' => 'Data Arsip Primer'
        ];
        return view('admin/arsip-primer/index', $data);
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
            'title' => 'Arsip Primer',
            'sub_title' => 'Tambah Data Arsip Primer'
        ];
        return view('admin/arsip-primer/tambah', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if(!$this->validate([
            'kode' => 'required',
            'nama' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
                        'kode_primer' => $this->request->getPost('kode'),
                        'primer' => $this->request->getPost('nama')
                    ];
    
        if($this->model->save($request)){
            session()->setFlashdata('message', 'Tambah Data Arsip Primer Berhasil');
            return redirect()->to('admin/arsip-primer');
        }else{
            session()->setFlashdata('error', 'Tambah Data Arsip Primer Tidak Berhasil');
            return redirect()->to('admin/arsip-primer');
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
            'Primer' => $this->model->where('id_primer', $id)->first(),
            'title' => 'Arsip Primer',
            'sub_title' => 'Data Arsip Primer'
        ];
        return view('admin/arsip-primer/edit', $data);
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
                        'id_primer' => $id,
                        'kode_primer' => $this->request->getPost('kode'),
                        'primer' => $this->request->getPost('nama')
                    ];
    
        if($this->APrimer->save($request)){
            session()->setFlashdata('message', 'Edit Data Arsip Primer Berhasil');
            return redirect()->to('admin/arsip-primer');
        }else{
            session()->setFlashdata('error', 'Edit Data Arsip Primer Tidak Berhasil');
            return redirect()->to('admin/arsip-primer');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if($this->APrimer->delete($id)){
            session()->setFlashdata('message', 'Hapus Data Arsip Primer Berhasil');
            return redirect()->to('admin/arsip-primer');
        }else{
            session()->setFlashdata('error', 'Hapus Data Arsip Primer Tidak Berhasil');
            return redirect()->to('admin/arsip-primer');
        }
    }
}
