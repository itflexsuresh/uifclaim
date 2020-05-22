<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CC_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Uifsubmission_Model');
    }
	
	public function index()
	{			
		$data['plugins']	= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation', 'datepicker'];
		$data['content'] 	= $this->load->view('company/uifsubmission/index', '', true);
		$this->layout2($data);
	}

	public function employeelist($uif_id)
	{			
		
		$pagaedata['uif_results'] 	  	= $this->Uifsubmission_Model->getList('row', ['type' => 'all'],['id' => $uif_id]);
		$pagedata['custom'] 	  		= $this->load->view('common/custom/custom', '', true);
		$pagedata['check_adminid'] 	  	= $this->getUserID();
		$pagedata['notification'] 		= $this->getNotification();
		$data['plugins']	      		= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation', 'datepicker'];
		$data['content'] 	  	  		= $this->load->view('company/uifsubmission/employee_listing', $pagaedata, true);
		$this->layout2($data);
	}

	public function employee_edit($uif_id,$id)
	{			
		
		$pagaedata['uif_results'] = $this->Uifsubmission_Model->getList('row', ['type' => 'all'],['id' => $uif_id]);
		$pagaedata['results'] 	  = $this->Uifsubmission_Model->getEmployeesList('row', ['type' => 'all'],['uif_id' => $uif_id,'id' => $id]);	
		$pagedata['custom'] 	  = $this->load->view('common/custom/custom', '', true);
		$pagedata['notification'] = $this->getNotification();
		$data['plugins']	      = ['datatables', 'datatablesresponsive', 'sweetalert', 'validation', 'datepicker'];
		$data['content'] 	  	  = $this->load->view('company/uifsubmission/employee_listing', $pagaedata, true);
		$this->layout2($data);
	}

	public function employee_action($id='')
	{	
		$insertid = $this->Uifsubmission_Model->action($_POST);
		redirect('/company/uifsubmission/index/employeelist/'.$_POST['uif_submissions_id']);		

	}

	public function DTList()
	{
		$post 			= $this->input->post();

		$totalcount 	= $this->Uifsubmission_Model->getList('count', ['type' => 'all']+$post);
        $results 		= $this->Uifsubmission_Model->getList('all', ['type' => 'all']+$post);
       
		$totalrecord 	= [];
		
		if(count($results) > 0){
			foreach($results as $result){

				
				$sub_date = date('F Y', strtotime($result['sub_date']));
				$status   = $this->config->item('uifsubmissions_status')[$result['status']];
				
				$action = 	'<div class="table-action">
									<a href="'.base_url().'company/uifsubmission/index/employeelist/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-alt"></i></a>

									<a href="'.base_url().'company/uifsubmission/index/index/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>

									<a href="'.base_url().'company/uifsubmission/index/index/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="Submit"><button>Submit Application</button></a>	
								</div>';
				
				
				$totalrecord[] = 	[
										
                                        'sub_date' 		  => $sub_date,
                                        'total_employees' => $result['total_employees'],
                                        'status' 		  => $status,
										'action'		  => $action
									];
			}
		}
		
		$json = array(
			"draw"            => intval($post['draw']),   
			"recordsTotal"    => intval($totalcount),  
			"recordsFiltered" => intval($totalcount),
			"data"            => $totalrecord
		);

		echo json_encode($json);
	}

	public function DTEmployeeList($uif_id)
	{
		$post 			= $this->input->post();

		$totalcount 	= $this->Uifsubmission_Model->getEmployeesList('count',['type' => 'all'],['uif_id' => $uif_id]);
        $results 		= $this->Uifsubmission_Model->getEmployeesList('all',['type' => 'all'],['uif_id' => $uif_id]);
       
		$totalrecord 	= [];
		
		if(count($results) > 0){
			foreach($results as $result){

				$status   = $this->config->item('uifsubmissions_emp_status')[$result['status']];
				
				$action = 	'<div class="table-action">
									<a href="'.base_url().'company/uifsubmission/index/employee_edit/'.$uif_id.'/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-alt"></i></a>	
								</div>';
				
				
				$totalrecord[] = 	[
										
                                        'fname'  		=> $result['fname'],
                                        'lname'  		=> $result['lname'],
                                        'id_passport' 	=> $result['id_no']."/".$result['passport_no'],
                                        'contact_no'    => $result['contact_no'],
                                        'amount'  		=> $result['amount'],
                                        'status'  		=> $status,
										'action'		=> $action
									];
			}
		}
		
		$json = array(
			"draw"            => intval($post['draw']),   
			"recordsTotal"    => intval($totalcount),  
			"recordsFiltered" => intval($totalcount),
			"data"            => $totalrecord
		);

		echo json_encode($json);
	}
}
