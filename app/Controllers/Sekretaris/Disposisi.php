<?php

namespace App\Controllers\Sekretaris;

use CodeIgniter\RESTful\ResourceController;

use App\Models\DisposisiModel;
use App\Models\BidangModel;
use App\Models\SuratMasukModel;

class Disposisi extends ResourceController
{
    protected $modelName = 'App\Models\DisposisiModel';

    function __construct()
    {
        $this->Bidang = new BidangModel;
        $this->SMasuk = new SuratMasukModel;
        $this->SDisposisi = new DisposisiModel;
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'Disposisi' => $this->model->withSuratMasuk()->withBidang()->findAll(),
            'title' => 'Disposisi',
            'sub_title' => 'Data Disposisi'
        ];

        return view('sekretaris/disposisi/index', $data);
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
            'SMasuk' => $this->SMasuk->findAll(),
            'Bidang' => $this->Bidang->findAll(),
            'title' => 'Disposisi',
            'sub_title' => 'Tambah Data Disposisi'
        ];

        return view('sekretaris/disposisi/tambah', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'tgl_terima' => 'required',
            'tingkat_keamanan' => 'required',
            'tgl_selesai' => 'required',
            'id_sm' => 'required',
            'disposisi' => 'required',
            'status' => 'required',
            'id_bidang' => 'required',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'tgl_terima' => $this->request->getPost('tgl_terima'),
            'tingkat_keamanan' => $this->request->getPost('tingkat_keamanan'),
            'tgl_selesai' => $this->request->getPost('tgl_selesai'),
            'id_sm' => $this->request->getPost('id_sm'),
            'disposisi' => $this->request->getPost('disposisi'),
            'status' => $this->request->getPost('status'),
            'id_bidang' => $this->request->getPost('id_bidang'),
        ];

        $result = $this->model->save($request);

        if ($result) {
            session()->setFlashdata('message', 'Tambah Data Disposisi Berhasil');
            return redirect()->to('sekretaris/disposisi');
        } else {
            session()->setFlashdata('error', 'Tambah Data Disposisi Tidak Berhasil');
            return redirect()->to('sekretaris/disposisi');
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
            'SMasuk' => $this->SMasuk->findAll(),
            'Bidang' => $this->Bidang->findAll(),
            'Disposisi' => $this->model->where('id_disposisi', $id)->first(),
            'title' => 'Disposisi',
            'sub_title' => 'Edit Data Disposisi'
        ];

        return view('sekretaris/disposisi/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if (!$this->validate([
            'tgl_terima' => 'required',
            'tingkat_keamanan' => 'required',
            'tgl_selesai' => 'required',
            'id_sm' => 'required',
            'disposisi' => 'required',
            'status' => 'required',
            'id_bidang' => 'required',
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $request = [
            'id_disposisi' => $id,
            'tgl_terima' => $this->request->getPost('tgl_terima'),
            'tingkat_keamanan' => $this->request->getPost('tingkat_keamanan'),
            'tgl_selesai' => $this->request->getPost('tgl_selesai'),
            'id_sm' => $this->request->getPost('id_sm'),
            'disposisi' => $this->request->getPost('disposisi'),
            'status' => $this->request->getPost('status'),
            'id_bidang' => $this->request->getPost('id_bidang'),
        ];

        $result = $this->model->save($request);

        if ($result) {
            session()->setFlashdata('message', 'Tambah Data Disposisi Berhasil');
            return redirect()->to('sekretaris/disposisi');
        } else {
            session()->setFlashdata('error', 'Tambah Data Disposisi Tidak Berhasil');
            return redirect()->to('sekretaris/disposisi');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->model->delete($id);

        if ($result) {
            session()->setFlashdata('message', 'Hapus Data Disposisi Berhasil');
            return redirect()->to('sekretaris/disposisi');
        } else {
            session()->setFlashdata('error', 'Hapus Data Disposisi Tidak Berhasil');
            return redirect()->to('sekretaris/disposisi');
        }
    }

    public function preview($id = null)
    {
        $data = [
            'Primer' => $this->APrimer->findAll(),
            'Tersier' => $this->ATersier->findAll(),
            'Sekunder' => $this->ASekunder->findAll(),
            'Kerja' => $this->UKerja->findAll(),
            'SMasuk' => $this->SMasuk->where('id_sm', $id)->first(),
            'Disposisi' => $this->SDisposisi->where('id_disposisi', $id)->first(),
            'title' => 'Disposisi',
            'sub_title' => 'Edit Data Disposisi'
        ];
        return view('sekretaris/disposisi/edit', $data);
    }
}
