<?php

class Custom_Model extends CC_Model
{
	
	public function getList($type, $requestdata=[])
	{ 
		$this->db->select('*');
		$this->db->from('custom');
		
		if(isset($requestdata['id'])) 					$this->db->where('id', $requestdata['id']);
		if(isset($requestdata['type'])) 				$this->db->where('type', $requestdata['type']);
		
		$this->db->order_by('id', 'asc');
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}
	
}