<?php

class Users_Model extends CC_Model
{
	public function login($data)
	{
		$email 		= trim($data['email']);
		$password 	= md5($data['password']);
		$type 		= $data['type'];

		$query = $this->db->where_in('type', $type)->get_where('users', ['email' => $email, 'password' => $password]);
	
		if($query->num_rows() > 0){
			$result = $query->row_array();
			return ['status' => '1', 'result' => $result['id']];
		}else{
			return ['status' => '0', 'result' => ''];
		}
	}
	
	public function getUserDetails($type, $requestdata=[])
	{
		$this->db->select('u.*,concat(ud.name, " ", ud.surname) as name');
		$this->db->from('users u');
		$this->db->join('users_detail ud', 'u.id=ud.user_id', 'left');
		
		if(isset($requestdata['id'])) 		$this->db->where('u.id', $requestdata['id']);
		if(isset($requestdata['type']))		$this->db->where_in('u.type', $requestdata['type']);
		if(isset($requestdata['status']))	$this->db->where_in('u.status', $requestdata['status']);
		
		$query = $this->db->get();
		
		if($type=='all') 		$result = $query->result_array();
		elseif($type=='row') 	$result = $query->row_array();
		
		return $result;
	}
	
	public function actionUsers($data)
	{
		$this->db->trans_begin();
		
		$id 		= 	$data['id'];
		$datetime	= 	date('Y-m-d H:i:s');
		
		$users		=	[];
		
		$password 	= 	(isset($data['password']) ? $data['password'] : '');
		if($password!=''){
			$users['password_raw'] 	= $password;
			$users['password'] 		= md5($password);
		}
		
		if(isset($data['email'])) 		$users['email'] 			= trim($data['email']);
		if(isset($data['type'])) 		$users['type'] 				= $data['type'];
		if(isset($data['mailstatus'])) 	$users['mailstatus'] 		= $data['mailstatus'];
		if(isset($data['status'])) 		$users['status'] 			= $data['status'];
		
		if($id==''){
			$users['created_at'] 		= $datetime;
			$users['updated_at'] 		= $datetime;
			$result 	= $this->db->insert('users', $users);
			$insertid 	= $this->db->insert_id();
		}else{
			$result = $this->db->update('users', $users, ['id' => $id]);
			$insertid 	= $id;
		}
			
		if(!$result || $this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			if($id=='') $this->db->update('users', ['created_by' => $insertid, 'updated_by' => $insertid], ['id' => $insertid]);
			return $insertid;
		}
	}
	
	public function verification($id)
	{
		$this->db->trans_begin();
		
		$id 		= 	$id;
		$datetime	= 	date('Y-m-d H:i:s');
		
		$users		=	[
							'mailstatus' 	=> '1'
						];
		
		$result = $this->db->update('users', $users, ['id' => $id]);

		if((!isset($result)) || !$result || $this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}

	}
	
	public function forgotPassword($data)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $data['email']);
		$this->db->where_in('status', ['0', '1']);
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			$result = $query->row_array();
			$mail 	= $this->forgotPasswordMail($result);
			if($mail=='true') return '1';
			else return '2';
		}else{
			return '3';
		}
	}
		
	public function forgotPasswordMail($data)
	{
		$sitename		=	$this->config->item('sitename');
		
		if($data['type']!='1'){
			$usertypename	=	$this->config->item('usertype2')[$data['type']];
		}else{
			$usertypename	= '';
		}
		
		$this->load->library('encryption');
		
		$id 		=	$data['id'];
		$email 		= 	$data['email'];
		$link		=	base_url().'forgotpassword/verification/'.$id.'/'.$usertypename;
		
		$subject 	= 	$sitename.' Forgot Password';
		$message	= 	'
							<h4>Hi</h4>
							<p>We got a request to reset your '.$sitename.' Password.</p>
							<p>Below you can find the link to reset your password.</p>
							<a href="'.$link.'">Reset Password</a>
							<p style="margin-top:30px;">Regards</p>
							<p>'.$sitename.'</p>
						';
						
		return $this->sentMail($email, $subject, $message);
	}
	
	public function checkUserID($id, $requestdata=[])
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		if(isset($requestdata['type']))	$this->db->where_in('type', $requestdata['type']);
		$this->db->where_in('status', ['0', '1']);
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return '1';
		}else{
			return '2';
		}
	}
	
	public function resetPassword($data)
	{
		$id 					= 	$data['id'];
		$newpassword 			= 	$data['newpassword'];
		
		$userdata = [	
						'password' 		=> md5($newpassword),
						'password_raw' 	=> $newpassword,
						'updated_at'	=> date('Y-m-d'),
						'updated_by'	=> $id
					];
					
		$result 	= $this->db->update('users', $userdata, ['id' => $id]);
	
		if($result){
			return true;
		}else{
			return false;
		}
	}
}