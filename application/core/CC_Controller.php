<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CC_Controller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('CC_Model');
		$this->load->model('Custom_Model');
		$this->load->model('Users_Model');
		$this->load->model('Company_Model');
		$this->load->model('Managearea_Model');
		$this->load->model('Employee_Model');
		$this->load->model('Datatype_Model');
		
		$segment1 = $this->uri->segment(1);
		if($segment1!='' && $segment1!='authentication' && $segment1!='login' && $segment1!='forgotpassword' && $segment1!='common') $this->middleware();
	}
	
	public function layout1($data=[])
	{
		$this->middleware('1');
		$this->load->view('common/template/layout1', $data);
	}
	
	public function layout2($data=[])
	{
		$this->middleware();
		$data['userdata'] 		= $this->getUserDetails();
		$data['sidebar'] 		= $this->load->view('common/sidebar/sidebar', $data, true);
		$this->load->view('common/template/layout2', $data);
	}
	
	public function middleware($type='')
	{
		$userDetails 	= 	$this->getUserDetails();
		$userType 		=	($userDetails) ? $userDetails['type'] : '';
		
		if($type=='1'){
			if($userDetails){				
				if($userType=='1' || $userType=='2'){
					redirect('admin/dashboard/index'); 
				}elseif($userType=='3'){
					redirect('company/dashboard/index'); 
				}
			}
		}else{
			$segment1 = $this->uri->segment(1);
			if(!$userDetails){
				if($segment1=='admin'){
					redirect(''); 
				}elseif($segment1=='company'){
					redirect('login/company'); 
				}
			}else{			
				if(($userType=='1' || $userType=='2') && $segment1!='admin'){
					redirect('admin/dashboard/index'); 
				}elseif($userType=='3' && $segment1!='company'){
					redirect('company/dashboard/index'); 
				}
			}
		}
	}
	
	public function getUserID($id='')
	{
		$userDetails = $this->getUserDetails($id);
		
		if($userDetails){
			return $userDetails['id'];
		}else{
			return '';
		}
	}
	
	public function getUserDetails($id='')
	{
		if($id!=''){
			$userid = $id;
		}elseif($this->session->has_userdata('userid')){
			$userid = $this->session->userdata('userid');
		}
		
		if(isset($userid)){
			$result = $this->Users_Model->getUserDetails('row', ['id' => $userid, 'status' => ['0','1']]);
			
			if($result){
				return $result;
			}else{
				return '';
			}
		}else{
			return '';
		}
	}
	
	public function getNotification()
	{
		return $this->load->view('common/notification/notification', '', true);
	}
	
	public function getCustomList($type)
	{
		$data = $this->Custom_Model->getList('all', ['type' => $type]);
		
		if(count($data) > 0) return array_column($data, 'name', 'id');
		else return [];
	}
	
	public function getProvinceList()
	{
		$data = $this->Managearea_Model->getProvinceList('all', ['status' => ['1']]);
		
		if(count($data) > 0) return ['' => 'Select Province']+array_column($data, 'name', 'id');
		else return [];
	}

	public function bankDetails()
	{
		$data = $this->Datatype_Model->BankgetList('all', ['status' => ['1']]);

		if(count($data) > 0) return ['' => 'Select Name of the bank']+array_column($data, 'name', 'id');
		else return [];
	}

	public function accountTypes()
	{
		$data = $this->Datatype_Model->AccountgetList('all', ['status' => ['1']]);
		
		if(count($data) > 0) return ['' => 'Select Account Types']+array_column($data, 'name', 'id');
		else return [];
	}
	
	public function companyprofile($id, $pagedata=[], $extras=[])
	{
		$result = $this->Company_Model->getList('row', ['id' => $id, 'type' => '3', 'status' => ['1', '2']], ['users', 'usersdetail', 'physicaladdress', 'postaladdress', 'usersbank']);
		if(!$result){
			redirect($extras['redirect']); 
		}
		
		if($this->input->post()){
			$requestData 			= 	$this->input->post();
			$requestData['user_id'] = 	$id;
			
			$companydata 	=  $this->Company_Model->action($requestData);
				
			if($companydata){
				$data		= '1';
				$message 	= 'Company '.(($id=='') ? 'created' : 'updated').' successfully.';
			}
			
			if(isset($data)){
				$this->session->set_flashdata('success', $message);
			}else{
				$this->session->set_flashdata('error', 'Try Later.');
			}
			
			redirect($extras['redirect']); 
		}
		
		$pagedata['notification'] 		= $this->getNotification();
		$pagedata['province'] 			= $this->getProvinceList();
		$pagedata['bankdetails'] 		= $this->bankDetails();
		$pagedata['acctypes'] 			= $this->accountTypes();
		$pagedata['yesno'] 				= $this->getCustomList($this->config->item('custom_yesno'));
		$pagedata['worktype'] 			= $this->getCustomList($this->config->item('custom_worktype'));
		$pagedata['employeestatus'] 	= $this->getCustomList($this->config->item('custom_employeestatus'));
		$pagedata['custom'] 			= $this->load->view('common/custom/custom', '', true);
		$pagedata['result'] 			= $result;
		
		$data['plugins']				= ['validation','datepicker','select2'];
		$data['content'] 				= $this->load->view('common/company/profile', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}

	public function employeelisting($id='', $extras=[]){
		if($id!='' && !$this->input->post()){		
		
			$result = $this->Employee_Model->getList('row', ['id' => $id, 'status' => ['1','2','3']]);
			
			if($result){
				$pagedata['result'] = $result;
			}else{
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect('company/employee/index'); 
			}
		}
		if($this->input->post()){

			$requestData 	= 	$this->input->post();
			if($requestData['submit']=='submit'){
				$data 	=  $this->Employee_Model->actionEmployee($requestData);
				if($data) $message = 'Employee Listing '.(($id=='') ? 'created' : 'updated').' successfully.';
			}
			// else{
			// 	$data 			= 	$this->Installationtype_Model->changestatus($requestData);
			// 	$message		= 	'Installation Type deleted successfully.';
			// }

			if(isset($data)) $this->session->set_flashdata('success', $message);
			else $this->session->set_flashdata('error', 'Try Later.');
			
			redirect('company/employee/index'); 
		}

		$pagedata['notification'] 	= $this->getNotification();
		$pagedata['custom'] 			= $this->load->view('common/custom/custom', '', true);
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation', 'datepicker'];
		// $data['content'] = $this->load->view('company/employee/index', '', true);
		$data['content'] 			= $this->load->view('common/company/employee_listing', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}
}
