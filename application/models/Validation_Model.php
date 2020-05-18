<?php

class Validation_Model extends CC_Model
{
	
	public function useremailvalidation($data)
	{
		if(isset($data['type'])) 	$this->db->where('type', $data['type']);
		if(isset($data['id'])) 		$this->db->where('id !=', $data['id']);
		$this->db->where(['email' => $data['email'], 'status !=' => '2']);
		$query = $this->db->get('users');
		
		if($query->num_rows() > 0){
			return 'false';
		}else{
			return 'true';
		}
	}
	
}