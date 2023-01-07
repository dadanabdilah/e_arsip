<?php
    function sendEmail($to_email, $sender, $subject, $message, $attachement)
	{
        // require 'email.php';
		$db = \Config\Database::connect();
		$email = \Config\Services::email();

		$builder = $db->table('pengaturan');
		$query = $builder->select('nama_aplikasi, smtp_user, smtp_pass, smtp_email, smtp_host, smtp_port')->get();
		$data  = $query->getRowObject();

		$config['protocol'] = 'smtp';
		$config['SMTPHost'] = $data->smtp_host;
		$config['SMTPUser'] = $data->smtp_user;
		$config['SMTPPass'] = $data->smtp_pass;
		$config['SMTPPort'] = $data->smtp_port;
		$config['SMTPCrypto'] = 'ssl';
		$config['mailType'] = 'html';

		$email->initialize($config);

		$email->setFrom($data->smtp_email, $sender != null ? $sender : $data->nama_aplikasi );
		
		$email->setTo($to_email);
		
		if ($attachement != null) {
			$email->attach($attachement);
		}
		
		$email->setSubject($sender != null ? $sender : $data->nama_aplikasi . ' - ' . $subject);

		$data_view = [ 
			'subject' => $sender != null ? $sender : $data->nama_aplikasi . ' - ' . $subject,
			'message' => $message
		];

		$html_message = view('layout/email', $data_view);

		$email->setMessage($html_message);

		if($email->send()){
			return true;
		}else{
			return $email->printDebugger();
		}
	}

	function sendWa($to_number, $message, $attachement)
	{
		$db = \Config\Database::connect();
		$email = \Config\Services::email();

		$builder = $db->table('pengaturan');
		$query = $builder->select('no_wa, token, url_kirim_pesan')->get();
		$data  = $query->getRowObject();

		return false;
	}

?>