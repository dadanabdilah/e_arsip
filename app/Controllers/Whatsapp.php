<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Whatsapp extends BaseController
{
    public function send()
    {
        $db = \Config\Database::connect();
		$email = \Config\Services::email();

		$builder = $db->table('pengaturan');
		$query   = $builder->select('no_wa, token, url_kirim_pesan')->get();
		$set_data  = $query->getRowObject();

        if(!$this->validate([
            'no_tujuan' => 'required',
            'pesan' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }

        $attachement = base_url() . '/' . $this->request->getPost('path');
        $to_number = $this->request->getPost('no_tujuan');
        $message   = $this->request->getPost('pesan');
        $message   = $message . "\r\n\r\nDownload file surat di link berikut\r\n\r\n" . $attachement;

        $data = [
                    'target' => $to_number,
                    'message' => $message, 
                    'countryCode' => '62', //optiona
                ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $set_data->url_kirim_pesan,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $set_data->token
            ),
        ));
                
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        if(isset($response)){
            if($response->status == true){
                session()->setFlashdata('message', 'Whatsapp berhasil dikirim');
            } else {
                session()->setFlashdata('error', $response->detail);
            }
        }

        return redirect()->back();
    }
}
