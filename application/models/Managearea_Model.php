<?php

class Managearea_Model extends CC_Model
{
	public function getProvinceList($type, $requestdata=[])
	{
		$this->db->select('*');
		$this->db->from('province');
		
		if(isset($requestdata['id'])) 		$this->db->where('id', $requestdata['id']);
		if(isset($requestdata['status']))	$this->db->where_in('status', $requestdata['status']);
		
		$this->db->order_by('name', 'asc');
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}


	public function getCityList($type, $requestdata=[])
	{
		$this->db->select('*');
		$this->db->from('city');
		
		if(isset($requestdata['id'])) 				$this->db->where('id', $requestdata['id']);
		if(isset($requestdata['name'])) 			$this->db->where('name', $requestdata['name']);
		if(isset($requestdata['provinceid'])) 		$this->db->where('province_id', $requestdata['provinceid']);
		if(isset($requestdata['status']))			$this->db->where_in('status', $requestdata['status']);
		
		$this->db->order_by('name', 'asc');
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function getSuburbList($type, $requestdata=[])
	{
		$this->db->select('*');
		$this->db->from('suburb');

		if(isset($requestdata['id'])) 				$this->db->where('id', $requestdata['id']);
		if(isset($requestdata['name'])) 			$this->db->where('name', $requestdata['name']);
		if(isset($requestdata['provinceid'])) 		$this->db->where('province_id', $requestdata['provinceid']);
		if(isset($requestdata['cityid'])) 			$this->db->where('city_id', $requestdata['cityid']);
		if(isset($requestdata['status']))			$this->db->where_in('status', $requestdata['status']);
		
		$this->db->order_by('name', 'asc');
		
		if($type=='count'){
			$result = $this->db->count_all_results();			
		}else{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}
	
	public function action($data)
	{	        
		$this->db->trans_begin();

		$userid			= 	$this->getUserID();
		$id 			= 	$data['id'];
		$datetime		= 	date('Y-m-d H:i:s');
		
		if($data['choice1']=='choice'){
			$request1		=	[
									'updated_at' 		=> $datetime,
									'updated_by' 		=> $userid,
									'name'				=> $data['city1'],
									'province_id'		=> $data['province']
								];
								
			$request1['status'] = (isset($data['status'])) ? $data['status'] : '0';
			
			if($id==''){
				$request1['created_at'] = $datetime;
				$request1['created_by'] = $userid;

				$result = $this->db->insert('city', $request1);
				$insertid = $this->db->insert_id();
			}else{
				$result = $this->db->update('city', $request1, ['id' => $id]);
				$insertid = $id;
			}
		}else{
			$request2		=	[
				'updated_at' 		=> $datetime,
				'updated_by' 		=> $userid
			];

			if(isset($data['province'])) 	$request2['province_id'] 		= $data['province'];
			if(isset($data['city'])) 		$request2['city_id'] 			= $data['city'];
			if(isset($data['suburb'])) 		$request2['name'] 				= $data['suburb'];
			$request2['status'] = (isset($data['status'])) ? $data['status'] : '0';
	        
			if($id==''){
				$request2['created_at'] = $datetime;
				$request2['created_by'] = $userid;

				$result = $this->db->insert('suburb', $request2);
				$insertid = $this->db->insert_id();
			}else{
				$result = $this->db->update('suburb', $request2, ['id' => $id]);
				$insertid = $id;
			}
		}	

		if(!isset($result) && $this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return $insertid;
		}
	}
	
	public function citynamevalidation($requestData)
	{	
		isset($requestData['id']) ? $requestData['id'] 	= $requestData['id'] : '';
		$data 				= $this->getListCity('row', $requestData);
		
		if($data){
			return '1';
		}else{
			return '0';
		}
	}
	
	public function suburbnamevalidation($requestData)
	{	
		isset($requestData['id']) ? $requestData['id'] 	= $requestData['id'] : '';
		$data 				= $this->getListSuburb('row', $requestData);
		
		if($data){
			return '1';
		}else{
			return '0';
		}
	}
}
