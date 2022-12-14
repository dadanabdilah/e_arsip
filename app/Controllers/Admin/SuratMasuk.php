<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

class SuratMasuk extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
                    'title' => 'Surat Masuk',
                    'sub_title' => 'Data Surat Masuk'
                ];
        return view('admin/surat-masuk/index', $data);
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
            'title' => 'Surat Masuk',
            'sub_title' => 'Tambah Data Surat Masuk'
        ];
        return view('admin/surat-masuk/tambah', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data = [
            'title' => 'Surat Masuk',
            'sub_title' => 'Edit Data Surat Masuk'
        ];
        return view('admin/surat-masuk/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
