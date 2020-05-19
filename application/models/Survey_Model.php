<?php

class Survey_Model extends CC_Model
{
	public function get_Question_List($type, $requestdata=[], $querydata=[])
	{ 
		
		
		$this->db->select('*');
		$this->db->from('survey_question');
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function get_Option_List($type, $requestdata=[], $querydata=[])
	{ 
		
		$this->db->select('*');
		$this->db->from('survey_question_option');
		
		if($type=='count'){
			$result = $this->db->count_all_results();
		}else{
			$query = $this->db->get();
			
			if($type=='all') 		$result = $query->result_array();
			elseif($type=='row') 	$result = $query->row_array();
		}
		
		return $result;
	}

	public function checksurvey($type, $requestdata=[], $querydata=[])
	{ 
		$user_id = $this->getUserID();

		$this->db->select('*');
		$this->db->from('users_survey');
		$this->db->where('user_id',$user_id);
		
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
	
}