<?php

class Employee_Model extends CC_Model
{
	public function getList($type, $requestdata=[])
	{
		$this->db->select('emp.*');
		$this->db->from('employee emp');
		
		
		if(isset($requestdata['id'])) 		$this->db->where('emp.id', $requestdata['id']);
		//if(isset($requestdata['type']))		$this->db->where_in('u.type', $requestdata['type']);
		if(isset($requestdata['status']))	$this->db->where_in('emp.status', $requestdata['status']);

		if($type!=='count' && isset($requestdata['start']) && isset($requestdata['length'])){
			$this->db->limit($requestdata['length'], $requestdata['start']);
		}
		if(isset($requestdata['order']['0']['column']) && isset($requestdata['order']['0']['dir'])){
			$column = ['emp.status', 'emp.name', 'emp.surname', 'emp.id_no', 'emp.contact_no', 'emp.monthly_remuneration', 'emp.startdate', 'emp.enddate'];
			$this->db->order_by($column[$requestdata['order']['0']['column']], $requestdata['order']['0']['dir']);
		}
		if(isset($requestdata['search']['value']) && $requestdata['search']['value']!=''){
			$searchvalue = $requestdata['search']['value'];
			$this->db->group_start();
				$this->db->like('emp.name', $searchvalue);
				$this->db->or_like('emp.status', $searchvalue);
				$this->db->or_like('emp.surname', $searchvalue);
				$this->db->or_like('emp.id_no', $searchvalue);
				$this->db->or_like('emp.contact_no', $searchvalue);
				$this->db->or_like('emp.monthly_remuneration', $searchvalue);
				$this->db->or_like('emp.startdate', $searchvalue);
				$this->db->or_like('emp.enddate', $searchvalue);
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
	
	
	public function actionEmployee($data){
		
		$id 		= 	$data['id'];
		$datetime	= 	date('Y-m-d H:i:s');
		
		
		if(isset($data['emp_status'])) 		$request['status'] 			= $data['emp_status'];
		if(isset($data['fname'])) 			$request['name'] 			= $data['fname'];
		if(isset($data['lname'])) 			$request['surname'] 		= $data['lname'];
		if(isset($data['id_number'])) 		$request['id_no'] 			= implode('', $data['id_number']);
		if(isset($data['passport_number'])) $request['passport_no'] 	= implode('', $data['passport_number']);
		if(isset($data['regno'])) 			$request['register_no'] 	= implode('', $data['regno']);
		if(isset($data['contact_no'])) 		$request['contact_no'] 		= implode('', $data['contact_no']);
		if(isset($data['monthly_remuneration'])) $request['monthly_remuneration'] 		= implode('', $data['monthly_remuneration']);
		if(isset($data['startdate'])) 		$request['startdate'] 		= date('Y-m-d',strtotime($data['startdate'])); 
		
		if(isset($data['determination']))  	$request['sector_determination'] = $data['determination'];
		if(isset($data['minimal_wage'])) 	$request['sector_wage'] 		= implode('', $data['minimal_wage']);
		if(isset($data['profimage']))  		$request['file']			 = $data['profimage'];
		
		if (isset($data['enddate']) && $data['enddate']!='') {
			$request['enddate'] 		= date('Y-m-d',strtotime($data['enddate'])); 
		}else{
			$request['enddate'] 		= ''; 
		}
		

		if($id==''){
			
			
			$result 					= $this->db->insert('employee', $request);
			$insertid 	= $this->db->insert_id();

		}else{
			
			$result = $this->db->update('employee', $request, ['id' => $id]);
			$insertid 	= $id;
		}
		return $insertid;
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
}