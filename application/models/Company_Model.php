<?php

class Company_Model extends CC_Model
{
	public function getList($type, $requestdata=[], $querydata=[])
	{ 
		$select = [];
		
		if(in_array('users', $querydata)){
			$users 			= 	[ 
									'u.id','u.email','u.type'
								];
								
			$select[] 		= 	implode(',', $users);
		}
		
		if(in_array('usersdetail', $querydata)){
			$usersdetail 	= 	[ 
									'ud.id as usersdetailid','ud.name','ud.surname','ud.id_no','ud.mobile_no','ud.work_no',
									'ud.company_name','ud.company_register_no','ud.company_payee_no',
									'ud.uif_register','ud.uif_no','ud.uif_submission','ud.uif_password','ud.association_member','ud.work_type'
								];
								
			$select[] 		= 	implode(',', $usersdetail);
		}
		
		if(in_array('physicaladdress', $querydata)){
			$select[] 		= 	'concat_ws("@-@", ua1.id, ua1.user_id, ua1.address, ua1.province, ua1.city, ua1.suburb, ua1.postal, ua1.type)  as physicaladdress';
		}
		
		if(in_array('postaladdress', $querydata)){
			$select[]		= 	'concat_ws("@-@", ua2.id, ua2.user_id, ua2.address, ua2.province, ua2.city, ua2.suburb, ua2.postal, ua2.type)  as postaladdress';
		}
		
		if(in_array('usersbank', $querydata)){
			$usersbank		= 	[ 
									'ub.id as usersbankid','ub.bank_name','ub.branch_code','ub.account_no','ub.account_type','ub.bank_letter'
								];
								
			$select[] 		= 	implode(',', $usersbank);
		}
		
		$this->db->select(implode(',', $select));
		$this->db->from('users u');
		if(in_array('usersdetail', $querydata)) 		$this->db->join('users_detail ud', 'ud.user_id=u.id', 'left');
		if(in_array('physicaladdress', $querydata)) 	$this->db->join('users_address ua1', 'ua1.user_id=u.id and ua1.type="1"', 'left');
		if(in_array('postaladdress', $querydata)) 		$this->db->join('users_address ua2', 'ua2.user_id=u.id and ua2.type="2"', 'left');
		if(in_array('billingaddress', $querydata)) 		$this->db->join('users_address ua3', 'ua3.user_id=u.id and ua3.type="3"', 'left');
		if(in_array('usersbank', $querydata)) 			$this->db->join('users_bank ub', 'ub.user_id=u.id', 'left');
		
		if(isset($requestdata['id'])) 					$this->db->where('u.id', $requestdata['id']);
		if(isset($requestdata['type'])) 				$this->db->where('u.type', $requestdata['type']);
		if(isset($requestdata['status']))				$this->db->where_in('u.status', $requestdata['status']);
		
		if($type!=='count' && isset($requestdata['start']) && isset($requestdata['length'])){
			$this->db->limit($requestdata['length'], $requestdata['start']);
		}
		if(isset($requestdata['order']['0']['column']) && isset($requestdata['order']['0']['dir'])){
			if(isset($requestdata['page']) && $requestdata['page']=='adminplumberlist'){
				$column = ['up.registration_no', 'ud.name', 'ud.surname', 'c1.name', 'u.email', 'c2.name'];
				$this->db->order_by($column[$requestdata['order']['0']['column']], $requestdata['order']['0']['dir']);
			}
		}
		if(isset($requestdata['search']['value']) && $requestdata['search']['value']!=''){
			$searchvalue = $requestdata['search']['value'];
						
			if(isset($requestdata['page'])){
				$page = $requestdata['page'];
				
				$this->db->group_start();
					if($page=='adminplumberlist'){					
						$this->db->like('up.registration_no', $searchvalue);
						$this->db->or_like('ud.name', $searchvalue);
						$this->db->or_like('ud.surname', $searchvalue);
						$this->db->or_like('c1.name', $searchvalue);
						$this->db->or_like('u.email', $searchvalue);
						$this->db->or_like('c2.name', $searchvalue);
					}
				$this->db->group_end();
			}			
		}
		
		$this->db->group_by('u.id');
		
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
		
		$datetime				= 	date('Y-m-d H:i:s');
		
		if(isset($data['name'])) 					$request1['name'] 					= $data['name'];
		if(isset($data['surname'])) 				$request1['surname'] 				= $data['surname'];
		if(isset($data['id_no'])) 					$request1['id_no'] 					= implode('', $data['id_no']);
		if(isset($data['mobile_no'])) 				$request1['mobile_no'] 				= implode('', $data['mobile_no']);
		if(isset($data['work_no'])) 				$request1['work_no'] 				= implode('', $data['work_no']);
		if(isset($data['company_name'])) 			$request1['company_name'] 			= $data['company_name'];
		if(isset($data['company_register_no'])) 	$request1['company_register_no'] 	= implode('', $data['company_register_no']); 
		if(isset($data['company_payee_no'])) 		$request1['company_payee_no'] 		= implode('', $data['company_payee_no']);
		//if(isset($data['uif_register'])) 			$request1['uif_register'] 			= $data['uif_register'];		
		if(isset($data['uif_no'])) 					$request1['uif_no'] 				= implode('', $data['uif_no']);
		if(isset($data['uif_submission'])) 			$request1['uif_submission'] 		= $data['uif_submission'];
		if(isset($data['uif_password'])) 			$request1['uif_password'] 			= $data['uif_password'];
		if(isset($data['association_member'])) 		$request1['association_member'] 	= $data['association_member'];
		if(isset($data['work_type'])) 				$request1['work_type'] 				= implode(',', $data['work_type']);

		if (isset($data['uif_register'])) {
			$request1['uif_register']='1';
		}else{
			$request1['uif_register']='';
		}
		//echo "<pre>"; print_r($request1);die;
		if(isset($request1)){
			if(isset($data['user_id'])) $request1['user_id'] = $data['user_id'];
			$usersdetailid	= 	(isset($data['usersdetailid'])) ?  $data['usersdetailid'] : '';
			
			if($usersdetailid==''){
				$usersdetail = $this->db->insert('users_detail', $request1);
			}else{
				$usersdetail = $this->db->update('users_detail', $request1, ['id' => $usersdetailid]);
			}
		}
		
		if(isset($data['address']) && count($data['address'])){
			foreach($data['address'] as $key => $request2){
				if(isset($data['user_id'])) 	$request2['user_id']	= $data['user_id'];
				if(isset($request2['postal'])) 	$request2['postal'] 	= implode('', $request2['postal']);
			
				
				if($request2['id']==''){
					$usersaddress = $this->db->insert('users_address', $request2);
				}else{
					$usersaddress = $this->db->update('users_address', $request2, ['id' => $request2['id']]);
				}
			}
		}			

		if(isset($data['bank_name'])) 		$request3['bank_name'] 			= $data['bank_name'];
		if(isset($data['branch_code'])) 	$request3['branch_code'] 		= $data['branch_code'];
		if(isset($data['account_no'])) 		$request3['account_no'] 		= implode('', $data['account_no']);
		if(isset($data['account_type'])) 	$request3['account_type'] 		= $data['account_type'];
		if(isset($data['bank_letter'])) 	$request3['bank_letter'] 		= $data['bank_letter'];
		if(isset($data['user_id'])) 		$request3['user_id'] 			= $data['user_id'];
		
		if(isset($request3)){
			$usersbankid = (isset($data['usersbankid'])) ? $data['usersbankid'] : '';
			
			if($usersbankid==''){
				$usersbank = $this->db->insert('users_bank', $request3);
			}else{
				$usersbank = $this->db->update('users_bank', $request3, ['id' => $usersbankid]);
			}
		}
		
		if((isset($usersdetail) || isset($usersaddress) || isset($usersbank)) && $this->db->trans_status() === FALSE)
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
}