<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use App\Models\ArsipPrimerModel;
use App\Models\ArsipSekunderModel;

class ArsipSekunder extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    protected $modelName = 'App\Models\ArsipSekunderModel';

    function __construct()
    {
        $this->APrimer = new ArsipPrimerModel;
        $this->ASekunder = new ArsipSekunderModel;
    }

    public function index()
    {
        $data = [
            'Sekunder' => $this->ASekunder->join('arsip_primer', 'arsip_primer.kode_primer = arsip_sekunder.kode_primer')->findAll(),
            'title' => 'Arsip Sekunder',
            'sub_title' => 'Data Arsip Sekunder'
        ];
        return view('admin/arsip-sekunder/index', $data);
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
            'Primer' => $this->APrimer->findAll(),
            'title' => 'Arsip Sekunder',
            'sub_title' => 'Tambah Data Arsip Sekunder'
        ];
        return view('admin/arsip-sekunder/tambah', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if(!$this->validate([
            'kode_primer' => 'required',
            'kode' => 'required',
            'nama' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
                        'kode_primer' => $this->request->getPost('kode_primer'),
                        'kode_sekunder' => $this->request->getPost('kode'),
                        'sekunder' => $this->request->getPost('nama')
                    ];
    
        if($this->model->save($request)){
            session()->setFlashdata('message', 'Tambah Data Kode Arsip Sekunder Berhasil');
            return redirect()->to('admin/arsip-sekunder');
        }else{
            session()->setFlashdata('error', 'Tambah Data Kode Arsip Sekunder Tidak Berhasil');
            return redirect()->to('admin/arsip-sekunder');
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
            'ASekunder' => $this->ASekunder->where('id_sekunder', $id)->first(),
            'Primer' => $this->APrimer->findAll(),
            'title' => 'Arsip Sekunder',
            'sub_title' => 'Edit Data Arsip Sekunder'
        ];
        return view('admin/arsip-sekunder/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if(!$this->validate([
            'kode_primer' => 'required',
            'kode' => 'required',
            'nama' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
                        'id_sekunder' => $id,
                        'kode_sekunder' => $this->request->getPost('kode'),
                        'kode_primer' => $this->request->getPost('kode_primer'),
                        'sekunder' => $this->request->getPost('nama')
                    ];
    
        if($this->ASekunder->save($request)){
            session()->setFlashdata('message', 'Edit Data Arsip Sekunder Berhasil');
            return redirect()->to('admin/arsip-sekunder');
        }else{
            session()->setFlashdata('error', 'Edit Data Arsip Sekunder Tidak Berhasil');
            return redirect()->to('admin/arsip-sekunder');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if($this->ASekunder->delete($id)){
            session()->setFlashdata('message', 'Hapus Data Arsip Sekunder Berhasil');
            return redirect()->to('admin/arsip-sekunder');
        }else{
            session()->setFlashdata('error', 'Hapus Data Arsip Sekunder Tidak Berhasil');
            return redirect()->to('admin/arsip-sekunder');
        }
    }
}
