<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//
class Index extends CC_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datatype_Model');
    }
	
	public function index()
	{

		$result = $this->Datatype_Model->ClosuregetList('row', ['id' => $this->config->item('monthly_closure'), 'status' => ['1']]);
			
			if($result){
				$pagedata['closure_result'] = $result;
			}

		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('admin/administration/settings/index', '', true);
		$data['content'] 			= $this->load->view('admin/administration/settings/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}
	public function accountedit($id='')
	{

		if($id!='' && !$this->input->post()){		
		
			$result = $this->Datatype_Model->AccountgetList('row', ['id' => $id, 'status' => ['0','1']]);
			
			if($result){
				$pagedata['acc_result'] = $result;
			}else{
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect('admin/administration/settings/index'); 
			}
		}

		if($this->input->post()){

			$requestData 	= 	$this->input->post();

			if($requestData['submit']=='submit'){
				$data 	=  $this->Datatype_Model->Accountaction($requestData);
				if($data) $message = 'Account Types '.(($id=='') ? 'created' : 'updated').' successfully.';
			}

			if(isset($data)) $this->session->set_flashdata('success', $message);
			else $this->session->set_flashdata('error', 'Try Later.');
			
			redirect('admin/administration/settings/index'); 
		}


		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('admin/administration/settings/index', '', true);
		$data['content'] 			= $this->load->view('admin/administration/settings/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}

	public function DTAccountList()
	{
		$post 			= $this->input->post();

		$totalcount 	= $this->Datatype_Model->AccountgetList('count', ['status' => ['0', '1']]+$post);
        $results 		= $this->Datatype_Model->AccountgetList('all', ['status' => ['0', '1']]+$post);
		$totalrecord 	= [];
		
		if(count($results) > 0){
			foreach($results as $result){

				
					$action = 	'<div class="table-action">
									<a href="'.base_url().'admin/administration/settings/index/accountedit/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-alt"></i></a>	
								</div>';
				
				
				$totalrecord[] = 	[
										'acc_type' 			=> 	$result['name'],
                                        'acc_active' 		=> 	$this->config->item('statusicon')[$result['status']],
                                        'acc_action' 		=> 	$action
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

	public function bankedit($id='')
	{
		if($id!='' && !$this->input->post()){		
		
			$result = $this->Datatype_Model->BankgetList('row', ['id' => $id, 'status' => ['0','1']]);
			
			if($result){
				$pagedata['bank_result'] = $result;
			}else{
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect('admin/administration/settings/index'); 
			}
		}

		if($this->input->post()){

			$requestData 	= 	$this->input->post();

			if($requestData['submit']=='submit'){
				$data 	=  $this->Datatype_Model->Bankaction($requestData);
				if($data) $message = 'Banking Types '.(($id=='') ? 'created' : 'updated').' successfully.';
			}

			if(isset($data)) $this->session->set_flashdata('success', $message);
			else $this->session->set_flashdata('error', 'Try Later.');
			
			redirect('admin/administration/settings/index'); 
		}


		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('admin/administration/settings/index', '', true);
		$data['content'] 			= $this->load->view('admin/administration/settings/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}

	public function DTBankList()
	{
		$post 			= $this->input->post();

		$totalcount 	= $this->Datatype_Model->BankgetList('count', ['status' => ['0', '1']]+$post);
        $results 		= $this->Datatype_Model->BankgetList('all', ['status' => ['0', '1']]+$post);
		$totalrecord 	= [];
		//print_r($results);die;
		if(count($results) > 0){
			foreach($results as $result){

				
					$action = 	'<div class="table-action">
									<a href="'.base_url().'admin/administration/settings/index/bankedit/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-alt"></i></a>	
								</div>';
				
				
				$totalrecord[] = 	[
										'bank_name' 		=> 	$result['name'],
										'branch_code' 		=>  $result['code'],
                                        'bank_active' 		=> 	$this->config->item('statusicon')[$result['status']],
                                        'bank_action' 		=> 	$action
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

	public function closueraction($id='')
	{
		if($this->input->post()){

			$requestData 	= 	$this->input->post();

			if($requestData['submit']=='submit'){
				$data 	=  $this->Datatype_Model->Closureupdate($requestData);
				if($data) $message = 'Month Closure '.(($id=='') ? 'created' : 'updated').' successfully.';
			}

			if(isset($data)) $this->session->set_flashdata('success', $message);
			else $this->session->set_flashdata('error', 'Try Later.');
			
			redirect('admin/administration/settings/index'); 
		}


		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('admin/administration/settings/index', '', true);
		$data['content'] 			= $this->load->view('admin/administration/settings/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}
}
