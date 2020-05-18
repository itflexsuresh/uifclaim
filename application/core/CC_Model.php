<?php

class CC_Model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function sentMail($data)
	{
		$from 		= 	'';
		$sitename	=	$this->config->item('sitename');
		
		$this->load->library('email');
		
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['mailtype'] = 'html';
		$config['charset'] 	= 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		/*
		$config['protocol']    	= 'mail';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_user']    = 'norwin.kairo5@gmail.com';
        $config['smtp_pass']    = 'jedczpvjwxdyhqlo';
		$config['mailtype'] 	= 'html';
		$config['charset'] 		= 'iso-8859-1';
		$config['newline']      = '\r\n';
		$config['wordwrap'] 	= TRUE;
		*/
		
		$this->email->initialize($config);
		$this->email->from($from, $sitename);
		$this->email->to($data['to']);
		if(isset($data['cc'])) $this->email->cc($data['cc']);
		$this->email->subject($data['subject']);
		$this->email->message($data['message']);
		
		if(isset($data['file'])) $this->email->attach($data['file']);

		if($this->email->send()){
			return 'true';
		}else{
			//print_r($this->email->print_debugger());die;
			return 'false';
		}
	}
	
	public function fileUpload($file, $path, $type='')
	{
		$this->createDirectory($path);
		
		$config['upload_path']          = $path;
		$config['allowed_types']        = ($type=='') ? 'jpeg|jpg|png' : $type;
		$config['remove_spaces'] 		= true;
		$config['encrypt_name'] 		= true;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload($file))
		{
			return $this->upload->display_errors();
			return '';
		}
		else
		{
			$data = $this->upload->data();
			if(in_array($data['image_type'], array('png','jpeg','jpg'))){
				//$this->fileResize($data['file_name'], $path);
				$path = rtrim($path, '/').'/';
				$this->fileResizeCore($path.$data['file_name'], $path.$data['file_name'], 80);
			}
			return $data;
		}
	}
	
	public function fileResizeCore($source, $destination, $quality)
	{
		$info = getimagesize($source);
		if ($info['mime'] == 'image/jpeg') 		$image = imagecreatefromjpeg($source);
		elseif ($info['mime'] == 'image/gif') 	$image = imagecreatefromgif($source);
		elseif ($info['mime'] == 'image/png') 	$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);
	}
	
	public function fileResize($file, $path)
	{
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= $path.$file;
		$config['create_thumb'] 	= FALSE;
		$config['maintain_ratio'] 	= FALSE;
		$config['quality'] 			= 10;

		$this->load->library('image_lib', $config);
		
		if(!$this->image_lib->resize()){
			//echo $this->image_lib->display_errors();
			return '';
		}

		$this->image_lib->clear();
	}
	
	public function createDirectory($path)
	{
		$location = explode('/', $path);
		for($i=0; $i<count($location); $i++)
		{
			if($location[$i]!='.'){
				$dir = implode('/', array_slice($location, 0, $i+1));
				if(!is_dir($dir))
				{
					$mask = umask(0);
					mkdir($dir, 0755);
					umask($mask);
				}
			}
		}
	}
	
	public function getUserID()
	{
		if($this->session->has_userdata('userid')){
			$userid = $this->session->userdata('userid');			
			$result = $this->db->select('*')->from('users')->where('id', $userid)->where_in('status', ['0', '1'])->get()->row_array();
			
			if($result){
				return $result['id'];
			}else{
				return '';
			}
		}else{
			return '';
		}
	}
}
