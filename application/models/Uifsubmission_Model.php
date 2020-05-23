<?php

class Uifsubmission_Model extends CC_Model
{
	public function getCompanyList($type, $requestdata=[], $querydata=[])
	{ 
		$user_id 		= $this->getUserID();
		$this->db->select('u.*, ud.*');
		$this->db->from('users u');
		$this->db->join('users_detail ud', 'ud.user_id=u.id', 'left');
		$this->db->where('u.id',$user_id);
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function getList($type, $requestdata=[], $querydata=[])
	{ 
		$user_id 		= $this->getUserID();

		$this->db->select('ud.user_id,ud.company_register_no,e.user_id,e.name as fname, ucs.user_id, ucs.covid_submission, ucs.agreement');
		$this->db->from('users_detail ud');	
		$this->db->join('employee e', 'e.user_id=ud.user_id', 'left');
		$this->db->join('user_covid_submission ucs', 'ucs.user_id=ud.user_id', 'left');
		$this->db->where('ud.user_id',$user_id);
		$this->db->where('ud.company_register_no != ""');
		$this->db->where('e.name != ""');
		$this->db->where('ucs.covid_submission','1');
		$this->db->where('ucs.agreement','1');
		$chk_query 	= $this->db->get();
		$chk_result = $chk_query->result_array();
		$chk_count 	= $chk_query->num_rows();
		if($chk_count > 0){
			$current_date 	= date("Y-m-d");
			$datetime		= date('Y-m-d H:i:s');
			$today 			= date('d');
			if($today >= '10') {
				$this->db->select('*');
				$this->db->from('uif_submissions');
				$this->db->where('MONTH(sub_date)', date('m'));
				$this->db->where('YEAR(sub_date)', date('Y'));
				$this->db->where('user_id',$user_id);
				$query 	= $this->db->get();
				$result = $query->row_array();
				$count 	= $query->num_rows();
				if($count == 0){
					$request['user_id'] 		= $user_id;
					$request['sub_date'] 		= $current_date;
					$request['total_employees'] = '0';
					$request['status'] = '0';
					$request['created_at'] 		= $datetime;
					$request['created_by'] 		= $user_id;
					$insert_id = $this->db->insert('uif_submissions', $request);
				}
			}
		}
		
		$this->db->select('*');
		$this->db->from('uif_submissions');
		$this->db->where('user_id',$user_id);
		
		if(isset($querydata['id'])) { $this->db->where('id',$querydata['id']); }		
		
		if($type=='count'){
			$result2 = $this->db->count_all_results();
		}else{
			$query2 = $this->db->get();
			
			if($type=='all') 		$result2 = $query2->result_array();
			elseif($type=='row') 	$result2 = $query2->row_array();
		}
		
		return $result2;
	}

	public function getEmployeesList($type, $requestdata=[], $querydata=[])
	{ 
		$uif_id = $querydata['uif_id'];

		$this->db->select('use.*, e.name as fname, e.surname as lname, e.id_no as id_no, e.passport_no as passport_no, e.contact_no as contact_no, e.file as file');
		$this->db->from('uif_submissions_employees use');
		$this->db->join('employee e', 'e.id=use.employee_id', 'left');
		$this->db->where('use.uif_submissions_id',$uif_id);
		if(isset($querydata['id'])) { $this->db->where('use.id',$querydata['id']); }
		
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
		
		$datetime	= 	date('Y-m-d H:i:s');
		$amount = "";

		if(isset($data['amount'])) $amount_count = count($data['amount']);		
		if(isset($amount_count)){			
			
			$amount_AR = $data['amount'];
			foreach ($amount_AR as $key => $value) {
				$amount   = $amount.$value;			
			}			
		}

		$request['uif_submissions_id'] = $data['uif_submissions_id'];
		$request['employee_id'] = $data['employee_id'];
		$request['status'] = $data['emp_status'];

		if($data['emp_status'] == '1'){
			$request['amount'] = $amount;	
		}
		else{
			$request['amount'] = '0';	
		}
		
		$request['created_at'] = $datetime;
		$request['created_by'] = $this->getUserID();

		if($request !=''){
			if(isset($data['id']) && $data['id'] >0 ){
				$id = $data['id'];
				$result = $this->db->update('uif_submissions_employees', $request, ['id' => $id]);
			}
			else{
				$result = $this->db->insert('uif_submissions_employees', $request);	
			}

			//update the total_employees into uif_submissions
			$this->db->select('*');
			$this->db->from('uif_submissions_employees');
			$this->db->where('uif_submissions_id',$data['uif_submissions_id']);
			$query2 						= $this->db->get();
			$result2 						= $query2->result_array();
			$request2['total_employees'] 	= count($result2);
			$result = $this->db->update('uif_submissions', $request2, ['id' => $data['uif_submissions_id']]);
		}

		return $result;
	}

	public function autosearchEmployee($postData){
		
		$user_id = $this->getUserID();
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->where('status','1');
		$this->db->where('user_id',$user_id);

		$this->db->group_start();
			$this->db->like('name',$postData['search_keyword']);
			$this->db->or_like('surname',$postData['search_keyword']);
		$this->db->group_end();
	
		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
	}

	public function form_action($data)
	{
				
		if($data['check_forma4'] == 'on') { $check_forma4 = '1'; } else { $check_forma4 = '0'; }
		$request['formA4_status'] = $check_forma4;
		
		if($data['check_forma4'] == 'on') { $check_iopsa = '1'; } else { $check_iopsa = '0'; }
		$request['IOPSA_status'] = $check_iopsa;
		
		if($data['check_forma4'] == 'on') { $check_memorandum = '1'; } else { $check_memorandum = '0'; }
		$request['memorandum_status']= $check_memorandum;

		$uifid 								= $data['uifid'];
		$request['commencedtrading_status']	= $data['check_commenced_status'];		
		if($data['check_commenced_status'] == '1'){
			$commencedtrading_date = date("Y-m-d", strtotime($data['check_commenced']));
			$request['commencedtrading_date'] = $commencedtrading_date;		
		}
		$shutdowntrading_date = date("Y-m-d", strtotime($data['check_shutdown']));
		$request['shutdowntrading_date'] 	= $shutdowntrading_date; 

		$result = $this->db->update('uif_submissions', $request, ['id' => $uifid]);
	}
	
}