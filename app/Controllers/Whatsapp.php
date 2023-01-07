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
		$query = $builder->select('no_wa, token, url_kirim_pesan')->get();
		$set_data  = $query->getRowObject();

        if(!$this->validate([
            'no_tujuan' => 'required',
            'pesan' => 'required',
        ])){
            session()->setFlashdata('error', $this->validator->listErrors());

            return redirect()->back()->withInput();
        }



        $to_number = $this->request->getPost('no_tujuan');
        $message   = $this->request->getPost('pesan');

        $attachement = base_url() . '/' . $this->request->getPost('path');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$set_data->url_kirim_pesan);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_POSTFIELDS,"sender=" . $set_data->no_wa . "&number=" . $to_number . "&caption=" . $message . "&file=" . $attachement);

        // In real life you should use something like:
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
                 http_build_query(array('sender' => $set_data->no_wa, 'number' => $to_number, 'caption' => $message, 'file' =>  $attachement)));

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
        ));
        
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

        // Further processing ...
        dd( $server_output);
    }
}
