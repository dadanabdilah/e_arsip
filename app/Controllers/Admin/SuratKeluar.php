<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use Codeigniter\Files\File;

use App\Models\ArsipPrimerModel;
use App\Models\ArsipTersierModel;
use App\Models\ArsipSekunderModel;
use App\Models\UnitKerjaModel;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;

class SuratKeluar extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    protected $modelName = 'App\Models\SuratKeluarModel';

    protected $helpers = ['file', 'form'];

    function __construct()
    {
        $this->APrimer = new ArsipPrimerModel;
        $this->ATersier = new ArsipTersierModel;
        $this->ASekunder = new ArsipSekunderModel;
        $this->UKerja = new UnitKerjaModel;
        $this->SMasuk = new SuratMasukModel;
        $this->SKeluar = new SuratKeluarModel;
    }
    public function index()
    {
        $data = [
            'SuratKeluar'  => $this->SKeluar->findAll(),
            'title' => 'Surat Keluar',
            'sub_title' => 'Data Surat Keluar'
        ];
        return view('admin/surat-keluar/index', $data);
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
            'Tersier' => $this->ATersier->findAll(),
            'Sekunder' => $this->ASekunder->findAll(),
            'Kerja' => $this->UKerja->findAll(),
            'title' => 'Surat Keluar',
            'sub_title' => 'Tambah Data Surat Keluar'
        ];
        return view('admin/surat-keluar/tambah', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $messages = [
            'berkas' => [
                'mime_in' => 'Harus berupa file PDF',
                'ext_in' => 'Format file harus PDF',
                'max_size' => 'Ukuran file terlalu besar',
            ],
        ];

        
        if (!$this->validate([
            'kode_tersier' => 'required',
            'tgl_sk' => 'required',
            'no_sk' => 'required',
            'perihal' => 'required',
            'id_unit' => 'required',
            'hubungan' => 'required',
            'kode_tersier' => 'required',
            'berkas' => 'mime_in[berkas,application/pdf]|ext_in[berkas,pdf]|max_size[berkas,4048]'
        ], $messages)) {
            session()->setFlashdata('error', $this->validator->listErrors());
            
            return redirect()->back()->withInput();
        }

        $berkas = $this->request->getFile('berkas');

        if (!$berkas->hasMoved()) {
            $Tersier  = $this->ATersier->select('kode_sekunder, kode_tersier')->where('kode_tersier', $this->request->getPost('kode_tersier'))->first();
            $Sekunder = $this->ASekunder->select('kode_primer, kode_sekunder')->where('kode_sekunder', $Tersier->kode_sekunder)->first();
            $Primer   = $this->APrimer->select('kode_primer')->where('kode_primer', $Sekunder->kode_primer)->first();

            $filepath = ROOTPATH . 'public/assets/surat_keluar/' . $Primer->kode_primer . '/' . $Sekunder->kode_sekunder . '/' . $Tersier->kode_tersier;
            $filedir = ROOTPATH . 'public/assets/surat_keluar/' . $Primer->kode_primer . '/' . $Sekunder->kode_sekunder . '/' . $Tersier->kode_tersier . '/' . $berkas->getName();
            $fileurl = 'assets/surat_keluar/' . $Primer->kode_primer . '/' . $Sekunder->kode_sekunder . '/' . $Tersier->kode_tersier;

            if (!is_dir($filepath)) {
                if (!mkdir($filepath, 0777, TRUE)) {
                    session()->setFlashdata('message', 'Tambah Data Surat Keluar Tidak Berhasil');
                    return redirect()->to('admin/surat-keluar');
                }
            }

            if ($berkas->move($filepath)) {
                $request = [
                    'no_sk' => $this->request->getPost('no_sk'),
                    'id_unit' => $this->request->getPost('id_unit'),
                    'berkas' => $berkas->getName(),
                    'berkas_url' => $fileurl,
                    'perihal' => $this->request->getPost('perihal'),
                    'hubungan' => $this->request->getPost('hubungan'),
                    'kode_tersier' => $this->request->getPost('kode_tersier'),
                    'tgl_sk' => $this->request->getPost('tgl_sk'),
                ];

                $result = $this->model->save($request);

                if ($result) {
                    session()->setFlashdata('message', 'Tambah Data Surat Keluar Berhasil');
                    return redirect()->to('admin/surat-keluar');
                } else {
                    session()->setFlashdata('error', 'Tambah Data Surat Keluar Tidak Berhasil');
                    return redirect()->to('admin/surat-keluar');
                }
            } else {
                session()->setFlashdata('error', 'Tambah Data Surat Keluar Tidak Berhasil');
                return redirect()->to('admin/surat-keluar');
            }
        } else {
            session()->setFlashdata('error', 'Tambah Data Surat Keluar Tidak Berhasil');
            return redirect()->to('admin/surat-keluar');
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
            'title' => 'Surat Keluar',
            'sub_title' => 'Edit Data Surat Keluar'
        ];
        return view('admin/surat-keluar/edit', $data);
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
        $SKeluar = $this->SKeluar->where('id_sk', $id)->first();
        $path = ROOTPATH . 'public/' . $SKeluar->berkas_url . '/' . $SKeluar->berkas;

        if( ! unlink($path)){
            session()->setFlashdata('message', 'Hapus Data Surat Masuk Tudak Berhasil');
            return redirect()->to('admin/surat-masuk');
        }

        if ($this->SKeluar->delete($id)) {
            session()->setFlashdata('message', 'Hapus Data Surat Keluar Berhasil');
            return redirect()->to('admin/surat-keluar');
        } else {
            session()->setFlashdata('error', 'Hapus Data Surat Keluar Tidak Berhasil');
            return redirect()->to('admin/surat-keluar');
        }
    }
}
