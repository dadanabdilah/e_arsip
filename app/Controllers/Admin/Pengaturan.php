<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaturanModel;

class Pengaturan extends BaseController
{
    private $isNull;
    
    public function __construct()
    {
        helper(['app_helper']);
        $this->Pengaturan = new PengaturanModel;
        $this->isNull     = $this->Pengaturan->countAll() == 0 ? null : $this->Pengaturan->countAll();
    }

    public function index()
    {
        if ($_POST) {
            $rule = [
                'nama_aplikasi' => 'required',
                'logo' => 'mime_in[logo,image/jpeg]|ext_in[logo,jpeg,jpg,png]|max_size[logo,4048]',
            ];

            if($this->request->getFile('logo')->getName() != null){
    
                if($this->validate($rule)){
                    if($this->isNull == null){
                        $logo = $this->request->getFile('logo');

                        $filepath = ROOTPATH . 'public/';
                        $logo->move($filepath);

                        $data = [
                            'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
                            'logo' => $logo->getName(),
                        ];
                        
                        if($this->Pengaturan->save($data)){
                            session()->setFlashdata('message', 'Pengaturan aplikasi berhasil diubah.');
                            return redirect()->to('admin/pengaturan');
                        } else {
                            session()->setFlashdata('error', 'Pengaturan aplikasi gagal diubah!');
                            return redirect()->to('admin/pengaturan');
                        }
                    } else {
                        $filepath = ROOTPATH . 'public/';
                        $logo->move($filepath);

                        $data = [
                            'id' => $this->Pengaturan->select('id')->first()->id,
                            'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
                            'logo' => $logo->getName(),
                        ];

                        if($this->Pengaturan->save($data)){
                            session()->setFlashdata('message', 'Pengaturan aplikasi berhasil diubah.');
                            return redirect()->to('admin/pengaturan');
                        } else {
                            session()->setFlashdata('error', 'Pengaturan aplikasi gagal diubah!');
                            return redirect()->to('admin/pengaturan');
                        }
                    }
                } else {
                    session()->setFlashdata('error', $this->validator->listErrors());

                    return redirect()->back()->withInput();
                }
            } else {
                if($this->validate($rule)){
                    if($this->isNull == null){
                        $data = [
                            'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
                        ];
                        
                        if($this->Pengaturan->save($data)){
                            session()->setFlashdata('message', 'Pengaturan aplikasi berhasil diubah.');
                            return redirect()->to('admin/pengaturan');
                        } else {
                            session()->setFlashdata('error', 'Pengaturan aplikasi gagal diubah!');
                            return redirect()->to('admin/pengaturan');
                        }
                    } else {
                        $data = [
                            'id' => $this->Pengaturan->select('id')->first()->id,
                            'nama_aplikasi' => $this->request->getPost('nama_aplikasi'),
                        ];

                        if($this->Pengaturan->save($data)){
                            session()->setFlashdata('message', 'Pengaturan aplikasi berhasil diubah.');
                            return redirect()->to('admin/pengaturan');
                        } else {
                            session()->setFlashdata('error', 'Pengaturan aplikasi gagal diubah!');
                            return redirect()->to('admin/pengaturan');
                        }
                    }
                } else {
                    session()->setFlashdata('error', $this->validator->listErrors());

                    return redirect()->back()->withInput();
                }
            }
        } else {
            $data = [
                'Pengaturan' => $this->Pengaturan->first(),
                'title' => 'Pengaturan',
                'sub_title' => 'Pengaturan Aplikasi',
            ];
    
            return view('admin/pengaturan/index', $data);
        }
    }


    public function email()
    {
        if ($_POST) {
            $rule = [
                'smtp_host' => 'required',
                'smtp_port' => 'required',
                'smtp_email' => 'required',
                'smtp_user' => 'required',
                'smtp_pass' => 'required',
            ];

            if($this->validate($rule)){
                if($this->isNull == null){
                    $data = [
                        'smpt_host' => $this->request->getPost('smpt_host'),
                        'smpt_port' => $this->request->getPost('smpt_port'),
                        'smpt_email' => $this->request->getPost('smpt_email'),
                        'smpt_user' => $this->request->getPost('smpt_user'),
                        'smpt_pass' => $this->request->getPost('smpt_pass'),
                    ];
                    
                    if($this->Pengaturan->save($data)){
                        session()->setFlashdata('message', 'Pengaturan email berhasil diubah.');
                        return redirect()->to('admin/pengaturan/email');
                    } else {
                        session()->setFlashdata('error', 'Pengaturan email gagal diubah!');
                        return redirect()->to('admin/pengaturan/email');
                    }
                } else {
                    $data = [
                        'id' => $this->Pengaturan->select('id')->first()->id,
                        'smtp_host' => $this->request->getPost('smtp_host'),
                        'smtp_port' => $this->request->getPost('smtp_port'),
                        'smtp_email' => $this->request->getPost('smtp_email'),
                        'smtp_user' => $this->request->getPost('smtp_user'),
                        'smtp_pass' => $this->request->getPost('smtp_pass'),
                    ];

                    if($this->Pengaturan->save($data)){
                        session()->setFlashdata('message', 'Pengaturan email berhasil diubah.');
                        return redirect()->to('admin/pengaturan/email');
                    } else {
                        session()->setFlashdata('error', 'Pengaturan email gagal diubah!');
                        return redirect()->to('admin/pengaturan/email');
                    }
                }
            } else {
                session()->setFlashdata('error', $this->validator->listErrors());

                return redirect()->back()->withInput();
            }
            
        } else {

            $data = [
                'Pengaturan' => $this->Pengaturan->first(),
                'title' => 'Pengaturan',
                'sub_title' => 'Pengaturan Aplikasi',
            ];

            return view('admin/pengaturan/email', $data);
        }
    }
    
    public function wa()
    {
        if ($_POST) {
            $rule = [
                'no_wa' => 'required',
                'token' => 'required',
                'url_kirim_pesan' => 'required',
            ];

            if($this->validate($rule)){
                if($this->isNull == null){
                    $data = [
                        'no_wa' => $this->request->getPost('no_wa'),
                        'token' => $this->request->getPost('token'),
                        'url_kirim_pesan' => $this->request->getPost('url_kirim_pesan'),
                    ];
                    
                    if($this->Pengaturan->save($data)){
                        session()->setFlashdata('message', 'Pengaturan whatsapp gateway berhasil diubah.');
                        return redirect()->to('admin/pengaturan/wa');
                    } else {
                        session()->setFlashdata('error', 'Pengaturan whatsapp gateway gagal diubah!');
                        return redirect()->to('admin/pengaturan/wa');
                    }
                } else {
                    $data = [
                        'id' => $this->Pengaturan->select('id')->first()->id,
                        'no_wa' => $this->request->getPost('no_wa'),
                        'token' => $this->request->getPost('token'),
                        'url_kirim_pesan' => $this->request->getPost('url_kirim_pesan'),
                    ];

                    if($this->Pengaturan->save($data)){
                        session()->setFlashdata('message', 'Pengaturan whatsapp gateway berhasil diubah.');
                        return redirect()->to('admin/pengaturan/wa');
                    } else {
                        session()->setFlashdata('error', 'Pengaturan whatsapp gateway gagal diubah!');
                        return redirect()->to('admin/pengaturan/wa');
                    }
                }
            } else {
                session()->setFlashdata('error', $this->validator->listErrors());

                return redirect()->back()->withInput();
            }
            
        } else {
            $data = [
                'Pengaturan' => $this->Pengaturan->first(),
                'title' => 'Pengaturan',
                'sub_title' => 'Pengaturan WhastApp Gateway',
            ];

            return view('admin/pengaturan/wa', $data);
    
        }

    }
}
