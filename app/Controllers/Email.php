<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Email extends BaseController
{
    public function __construct()
    {
        helper(['app_helper']);
    }

    public function send()
    {
        if(!$this->validate([
            'pengirim' => 'required',
            'email_tujuan' => 'required',
            'subjek' => 'required',
            'pesan' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $to_mail = $this->request->getPost('email_tujuan');
        $sender = $this->request->getPost('pengirim');
        $subject = $this->request->getPost('subjek');
        $message = $this->request->getPost('pesan');

        $attachement = ROOTPATH . 'public/' . $this->request->getPost('path');

        // $to_email, $sender, $subject, $message, $attachement
        if(sendEmail($to_mail, $sender, $subject, $message, $attachement)){
            session()->setFlashdata('message', 'Email berhasil dikirim.');
            return redirect()->back();
        } else {
            session()->setFlashdata('message', 'Email gagal dikirim terjadi <b></b> error!<b>');
            return redirect()->back();
        }
    }
}
