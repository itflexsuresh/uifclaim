<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CC_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_Model');
    }
	
	public function index($id='')
	{
		// if($id!=''){		
		
		// 	$result = $this->Employee_Model->getList('row', ['id' => $id, 'status' => ['1','2','3']]);
			
		// 	if($result){
		// 		$pagedata['result'] = $result;
		// 	}else{
		// 		$this->session->set_flashdata('error', 'No Record Found.');
		// 		redirect('company/employee/index'); 
		// 	}
		// }

		// if($this->input->post()){

		// 	$requestData 	= 	$this->input->post();
		// 	if($requestData['submit']=='submit'){
		// 		$data 	=  $this->Employee_Model->actionEmployee($requestData);
		// 		if($data) $message = 'Employee Listing '.(($id=='') ? 'created' : 'updated').' successfully.';
		// 	}
		// 	// else{
		// 	// 	$data 			= 	$this->Installationtype_Model->changestatus($requestData);
		// 	// 	$message		= 	'Installation Type deleted successfully.';
		// 	// }

		// 	if(isset($data)) $this->session->set_flashdata('success', $message);
		// 	else $this->session->set_flashdata('error', 'Try Later.');
			
		// 	redirect('company/employee/index'); 
		// }

		// $pagedata['notification'] 	= $this->getNotification();
		// $pagedata['custom'] 			= $this->load->view('common/custom/custom', '', true);
		// $data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation', 'datepicker'];
		// // $data['content'] = $this->load->view('company/employee/index', '', true);
		// $data['content'] 			= $this->load->view('company/employee/index', (isset($pagedata) ? $pagedata : ''), true);
		// $this->layout2($data);
		$this->employeelisting($id, ['pagedata' => 'company']);
	}
	public function DTEmployeeList()
	{
		$post 			= $this->input->post();

		$totalcount 	= $this->Employee_Model->getList('count', ['status' => ['1', '2', '3']]+$post);
        $results 		= $this->Employee_Model->getList('all', ['status' => ['1', '2', '3']]+$post);
       
		$totalrecord 	= [];
		
		if(count($results) > 0){
			foreach($results as $result){

				if (strtotime($result['enddate'])=='-62169987208') {
					$enddate = '';
				}else{
					$enddate = $result['enddate'];
				}
				
					$action = 	'<div class="table-action">
									<a href="'.base_url().'company/employee/index/index/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-alt"></i></a>	
								</div>';
				
				
				$totalrecord[] = 	[
										'emp_status' 		=> 	$this->config->item('emp_status')[$result['status']],
                                        'emp_fname' 		=> 	$result['name'],
                                        'emp_lname' 		=> 	$result['surname'],
                                        'emp_IDPassport' 	=> 	$result['id_no'].'/'.$result['passport_no'],
                                        'emp_contact' 		=> 	$result['contact_no'],
                                        'emp_renum' 		=> 	$result['monthly_remuneration'],
                                        'emp_startdate' 	=> 	$result['startdate'],
										'emp_enddate'		=> 	$enddate,
										'action'			=> 	$action
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
