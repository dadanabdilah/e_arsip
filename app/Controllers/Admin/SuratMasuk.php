<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;

use Codeigniter\Files\File;

use App\Models\ArsipPrimerModel;
use App\Models\ArsipTersierModel;
use App\Models\ArsipSekunderModel;
use App\Models\UnitKerjaModel;
use App\Models\SuratMasukModel;

class SuratMasuk extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    protected $modelName = 'App\Models\SuratMasukModel';

    protected $helpers = ['file', 'form'];

    function __construct()
    {
        $this->APrimer = new ArsipPrimerModel;
        $this->ATersier = new ArsipTersierModel;
        $this->ASekunder = new ArsipSekunderModel;
        $this->UKerja = new UnitKerjaModel;
        $this->SMasuk = new SuratMasukModel;
    }

    public function index()
    {
        $data = [
                    'SuratMasuk'  => $this->SMasuk->findAll(),
                    'title' => 'Data Surat Masuk',
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
            'Primer' => $this->APrimer->findAll(),
            'Tersier' => $this->ATersier->findAll(),
            'Sekunder' => $this->ASekunder->findAll(),
            'Kerja' => $this->UKerja->findAll(),
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
        $messages = [
                'berkas' => [
                    'mime_in' => 'Harus berupa file PDF',
                    'ext_in' => 'Format file harus PDF',
                    'max_size' => 'Ukuran file terlalu besar',
                ],
            ];

        if(!$this->validate([
            'kode_tersier' => 'required',
            'tgl_diterima' => 'required',
            'tgl_sm' => 'required',
            'no_sm' => 'required',
            'perihal' => 'required',
            'id_unit' => 'required',
            'lampiran' => 'required',
            'kode_tersier' => 'required',
            'berkas' => 'mime_in[berkas,application/pdf]|ext_in[berkas,pdf]|max_size[berkas,4048]'
        ], $messages)){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }


        $berkas = $this->request->getFile('berkas');

        dd($berkas->getSize());

        if ( ! $berkas->hasMoved()) {
            $Tersier = $this->ATersier->select('kode_sekunder, kode_tersier')->where('kode_tersier', $this->request->getPost('kode_tersier'))->first();
            $Sekunder = $this->ASekunder->select('kode_primer, kode_sekunder')->where('kode_sekunder', $Tersier->kode_sekunder)->first();
            $Primer = $this->APrimer->select('kode_primer')->where('kode_primer', $Sekunder->kode_primer)->first();

            $filepath = ROOTPATH . 'public/assets/surat/' . $Primer->kode_primer . '/' . $Sekunder->kode_sekunder . '/' . $Tersier->kode_tersier;
            $fileurl = 'assets/surat/' . $Primer->kode_primer . '/' . $Sekunder->kode_sekunder . '/' . $Tersier->kode_tersier;

            if( ! is_dir($filepath)){
                if(! mkdir($filepath, 0777, TRUE)){
                    session()->setFlashdata('message', 'Tambah Data Surat Masuk Tidak Berhasil');
                    return redirect()->to('admin/surat-masuk');
                }
            }

            if($berkas->move($filepath)){
                $request = [
                    'no_sm' => $this->request->getPost('no_sm'),
                    'id_unit' => $this->request->getPost('id_unit'),
                    'berkas' => $berkas->getName(),
                    'berkas_url' => $fileurl,
                    'perihal' => $this->request->getPost('perihal'),
                    'lampiran' => $this->request->getPost('lampiran'),
                    'kode_tersier' => $this->request->getPost('kode_tersier'),
                    'tgl_diterima' => $this->request->getPost('tgl_diterima'),
                    'tgl_sm' => $this->request->getPost('tgl_sm'),
                ];
        
                $result = $this->model->save($request);
        
                if($result){
                    session()->setFlashdata('message', 'Tambah Data Surat Masuk Berhasil');
                    return redirect()->to('admin/surat-masuk');
                }else{
                    session()->setFlashdata('error', 'Tambah Data Surat Masuk Tidak Berhasil');
                    return redirect()->to('admin/surat-masuk');
                }
            } else {
                session()->setFlashdata('error', 'Tambah Data Surat Masuk Tidak Berhasil');
                return redirect()->to('admin/surat-masuk');
            }
    
        } else {
            session()->setFlashdata('error', 'Tambah Data Surat Masuk Tidak Berhasil');
            return redirect()->to('admin/surat-masuk');
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
            'Primer' => $this->APrimer->findAll(),
            'Tersier' => $this->ATersier->findAll(),
            'Sekunder' => $this->ASekunder->findAll(),
            'Kerja' => $this->UKerja->findAll(),
            'SMasuk' => $this->SMasuk->where('id_sm', $id)->first(),
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
        $messages = [
            'berkas' => [
                'mime_in' => 'Harus berupa file PDF',
                'ext_in' => 'Format file harus PDF',
                'max_size' => 'Ukuran file terlalu besar',
            ],
        ];

        if(!$this->validate([
            'kode_tersier' => 'required',
            'tgl_diterima' => 'required',
            'tgl_sm' => 'required',
            'no_sm' => 'required',
            'perihal' => 'required',
            'id_unit' => 'required',
            'lampiran' => 'required',
            'kode_tersier' => 'required',
            'berkas' => 'mime_in[berkas,application/pdf]|ext_in[berkas,pdf]|max_size[berkas,4048]'
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        
        $berkas = $this->request->getFile('berkas');
        
        if( ! $berkas->isFile()){
            $request = [
                'id_sm' => $id,
                'no_sm' => $this->request->getPost('no_sm'),
                'id_unit' => $this->request->getPost('id_unit'),
                'berkas' => $this->request->getPost('old_berkas'),
                'berkas_url' => $this->request->getPost('berkas_url'),
                'perihal' => $this->request->getPost('perihal'),
                'lampiran' => $this->request->getPost('lampiran'),
                'kode_tersier' => $this->request->getPost('kode_tersier'),
                'tgl_diterima' => $this->request->getPost('tgl_diterima'),
                'tgl_sm' => $this->request->getPost('tgl_sm'),
            ];

    
            if($this->model->save($request)){
                session()->setFlashdata('message', 'Edit Data Surat Masuk Berhasil');
                return redirect()->to('admin/surat-masuk');
            }else{
                session()->setFlashdata('error', 'Edit Data Surat Masuk Tidak Berhasil');
                return redirect()->to('admin/surat-masuk');
            }
        }


        if ( ! $berkas->hasMoved()) {
            $SMasuk = $this->SMasuk->where('id_sm', $id)->first();
            $old_filepath = ROOTPATH . 'public/' . $SMasuk->berkas_url . '/' . $SMasuk->berkas;

            // hapus file lama
            if( ! unlink($old_filepath)){
                session()->setFlashdata('message', 'Edit Data Surat Masuk Tudak Berhasil');
                return redirect()->to('admin/surat-masuk');
            }

            $Tersier = $this->ATersier->select('kode_sekunder, kode_tersier')->where('kode_tersier', $this->request->getPost('kode_tersier'))->first();
            $Sekunder = $this->ASekunder->select('kode_primer, kode_sekunder')->where('kode_sekunder', $Tersier->kode_sekunder)->first();
            $Primer = $this->APrimer->select('kode_primer')->where('kode_primer', $Sekunder->kode_primer)->first();

            $filepath = ROOTPATH . 'public/assets/surat/' . $Primer->kode_primer . '/' . $Sekunder->kode_sekunder . '/' . $Tersier->kode_tersier;
            $fileurl = 'assets/surat/' . $Primer->kode_primer . '/' . $Sekunder->kode_sekunder . '/' . $Tersier->kode_tersier;

            if( ! is_dir($filepath)){
                if(! mkdir($filepath, 0777, TRUE)){
                    session()->setFlashdata('message', 'Edit Data Surat Masuk Tidak Berhasil');
                    return redirect()->to('admin/surat-masuk');
                }
            }

            if($berkas->move($filepath)){
                $request = [
                    'id_sm' => $id,
                    'no_sm' => $this->request->getPost('no_sm'),
                    'id_unit' => $this->request->getPost('id_unit'),
                    'berkas' => $berkas->getName(),
                    'berkas_url' => $fileurl,
                    'perihal' => $this->request->getPost('perihal'),
                    'lampiran' => $this->request->getPost('lampiran'),
                    'kode_tersier' => $this->request->getPost('kode_tersier'),
                    'tgl_diterima' => $this->request->getPost('tgl_diterima'),
                    'tgl_sm' => $this->request->getPost('tgl_sm'),
                ];
        
                if($this->model->save($request)){
                    session()->setFlashdata('message', 'Edit Data Surat Masuk Berhasil');
                    return redirect()->to('admin/surat-masuk');
                }else{
                    session()->setFlashdata('error', 'Edit Data Surat Masuk Tidak Berhasil');
                    return redirect()->to('admin/surat-masuk');
                }
            } else {
                session()->setFlashdata('error', 'Edit Data Surat Masuk Tidak Berhasil');
                return redirect()->to('admin/surat-masuk');
            }
    
        } else {
            session()->setFlashdata('error', 'Edit Data Surat Masuk Tidak Berhasil');
            return redirect()->to('admin/surat-masuk');
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $SMasuk = $this->SMasuk->where('id_sm', $id)->first();
        $path = ROOTPATH . 'public/' . $SMasuk->berkas_url . '/' . $SMasuk->berkas;

        if( ! unlink($path)){
            session()->setFlashdata('message', 'Hapus Data Surat Masuk Tudak Berhasil');
            return redirect()->to('admin/surat-masuk');
        }

        if($this->SMasuk->delete($id)){
            session()->setFlashdata('message', 'Hapus Data Surat Masuk Berhasil');
            return redirect()->to('admin/surat-masuk');
        }else{
            session()->setFlashdata('error', 'Hapus Data Surat Masuk Tidak Berhasil');
            return redirect()->to('admin/surat-masuk');
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
            'title' => 'Surat Masuk',
            'sub_title' => 'Edit Data Surat Masuk'
        ];
        return view('admin/surat-masuk/edit', $data);
    }
}
