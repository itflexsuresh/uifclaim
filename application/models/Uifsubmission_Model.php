<?php

class Uifsubmission_Model extends CC_Model
{
	public function getList($type, $requestdata=[], $querydata=[])
	{ 
		$user_id 		= $this->getUserID();
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

		$this->db->select('*');
		$this->db->from('uif_submissions_employees');
		$this->db->where('uif_submissions_id',$uif_id);
		
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
				
		$datetime				= 	date('Y-m-d H:i:s');
		
		if(isset($data['totalquestion'])) $totalquestion = $data['totalquestion'];
		
		if(isset($totalquestion)){			
			$question = "";
			$option = "";
			for($i=1; $i <= $totalquestion ; $i++)				
				if($i <= $totalquestion) {
					$question = $question.$i.",";
					$option   = $option.$data['option'.$i].",";
				}
			}

			$request['user_id'] = $this->getUserID();
			$request['survey_id'] = '1';
			$request['survey_question_id'] = $question;
			$request['survey_question_option_id'] = $option;
			$request['status'] = '1';
			$request['created_at'] = $datetime;
			$request['created_by'] = $this->getUserID();

			if($request !=''){
				// $users_survey = $this->db->insert('users_survey', $request);
			}
	}

	public function autosearchEmployee($postData){
		
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->where('status','1');

		$this->db->group_start();
			$this->db->like('name',$postData['search_keyword']);
			$this->db->or_like('surname',$postData['search_keyword']);
		$this->db->group_end();
	
		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
	}
	
}