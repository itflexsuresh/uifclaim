<?php
//
class Datatype_Model extends CC_Model
{
	public function AccountgetList($type, $requestdata=[])
	{
		$this->db->select('acc.*');
		$this->db->from('settings_account_type acc');
		
		
		if(isset($requestdata['id'])) 		$this->db->where('acc.id', $requestdata['id']);
		//if(isset($requestdata['type']))		$this->db->where_in('u.type', $requestdata['type']);
		if(isset($requestdata['status']))	$this->db->where_in('acc.status', $requestdata['status']);

		if($type!=='count' && isset($requestdata['start']) && isset($requestdata['length'])){
			$this->db->limit($requestdata['length'], $requestdata['start']);
		}
		if(isset($requestdata['order']['0']['column']) && isset($requestdata['order']['0']['dir'])){
			$column = ['acc.status', 'acc.name'];
			$this->db->order_by($column[$requestdata['order']['0']['column']], $requestdata['order']['0']['dir']);
		}
		if(isset($requestdata['search']['value']) && $requestdata['search']['value']!=''){
			$searchvalue = $requestdata['search']['value'];
			$this->db->group_start();
				$this->db->like('acc.name', $searchvalue);
				$this->db->or_like('acc.status', $searchvalue);
				
			$this->db->group_end();
		}
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
		
		if($type=='all') 		$result = $query->result_array();
		elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}	

	public function BankgetList($type, $requestdata=[])
	{
		$this->db->select('bnk.*');
		$this->db->from('settings_bank_type bnk');
		
		
		if(isset($requestdata['id'])) 		$this->db->where('bnk.id', $requestdata['id']);
		//if(isset($requestdata['type']))		$this->db->where_in('u.type', $requestdata['type']);
		if(isset($requestdata['status']))	$this->db->where_in('bnk.status', $requestdata['status']);

		if($type!=='count' && isset($requestdata['start']) && isset($requestdata['length'])){
			$this->db->limit($requestdata['length'], $requestdata['start']);
		}
		if(isset($requestdata['order']['0']['column']) && isset($requestdata['order']['0']['dir'])){
			$column = ['bnk.status', 'bnk.name', 'bnk.code'];
			$this->db->order_by($column[$requestdata['order']['0']['column']], $requestdata['order']['0']['dir']);
		}
		if(isset($requestdata['search']['value']) && $requestdata['search']['value']!=''){
			$searchvalue = $requestdata['search']['value'];
			$this->db->group_start();
				$this->db->like('bnk.status', $searchvalue);
				$this->db->or_like('bnk.name', $searchvalue);
				$this->db->or_like('bnk.code', $searchvalue);
				
			$this->db->group_end();
		}
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
		
		if($type=='all') 		$result = $query->result_array();
		elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}	

	public function ClosuregetList($type, $requestdata=[])
	{
		$this->db->select('stng.*');
		$this->db->from('settings stng');
		
		
		if(isset($requestdata['id'])) 		$this->db->where('stng.id', $requestdata['id']);
		//if(isset($requestdata['type']))		$this->db->where_in('u.type', $requestdata['type']);
		if(isset($requestdata['status']))	$this->db->where_in('stng.status', $requestdata['status']);

	
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
		
		if($type=='all') 		$result = $query->result_array();
		elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}	
	
	public function Accountaction($data){

		$id 		= 	$data['id'];
		$datetime	= 	date('Y-m-d H:i:s');
		$userid			= 	$this->getUserID();

		if(isset($data['name'])) 	$request['name'] 	= $data['name'];
		$request['status'] 	= (isset($data['status'])) ? $data['status'] : '0';

		if($id==''){
			$request['created_at'] = $datetime;
			$request['created_by'] = $userid;
			$result = $this->db->insert('settings_account_type', $request);
			
		}else{
			$request['updated_at'] = $datetime;
			$request['updated_by'] = $userid;
			$result = $this->db->update('settings_account_type', $request, ['id' => $id]);

		}
		return $result;		
	}

	public function Bankaction($data){

		$id 		= 	$data['id'];
		$datetime	= 	date('Y-m-d H:i:s');
		$userid			= 	$this->getUserID();

		if(isset($data['name'])) 	$request['name'] 	= $data['name'];
		if(isset($data['code'])) 	$request['code'] 	= $data['code'];
		$request['status'] 	= (isset($data['status1'])) ? $data['status1'] : '0';

		if($id==''){
			$request['created_at'] = $datetime;
			$request['created_by'] = $userid;
			$result = $this->db->insert('settings_bank_type', $request);
			
		}else{
			$request['updated_at'] = $datetime;
			$request['updated_by'] = $userid;
			$result = $this->db->update('settings_bank_type', $request, ['id' => $id]);

		}
		return $result;		
	}

	public function Closureupdate($data){

		$id 		= 	$data['id'];
		$datetime	= 	date('Y-m-d H:i:s');
		$userid			= 	$this->getUserID();

		if(isset($data['day_closed'])) 	$request['name'] 	= $data['day_closed'];
		
		$request['status'] 	= (isset($data['staus_closer'])) ? $data['staus_closer'] : '0';

			$request['updated_at'] = $datetime;
			$request['updated_by'] = $userid;
			$result = $this->db->update('settings', $request, ['id' => $id]);


		return $result;		
	}
}