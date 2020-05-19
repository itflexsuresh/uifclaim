<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CC_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
    }
	
	public function index($id='')
	{
		if($id!=''){		
		
			$result = $this->Users_Model->getSystemUsers('row', ['id' => $id, 'status' => ['0','1']]);
			
			if($result){
				$pagedata['result'] = $result;
			}else{
				$this->session->set_flashdata('error', 'No Record Found.');
				redirect('admin/administration/users/index'); 
			}
		}

		if($this->input->post()){

			$requestData 	= 	$this->input->post();

			if($requestData['submit']=='submit'){
				$data 	=  $this->Users_Model->systemuserAction($requestData);
				if($data) $message = 'System User '.(($id=='') ? 'created' : 'updated').' successfully.';
			}
			// else{
			// 	$data 			= 	$this->Installationtype_Model->changestatus($requestData);
			// 	$message		= 	'Installation Type deleted successfully.';
			// }

			if(isset($data)) $this->session->set_flashdata('success', $message);
			else $this->session->set_flashdata('error', 'Try Later.');
			
			redirect('admin/administration/users/index'); 
		}

		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('admin/administration/users/index', '', true);
		$data['content'] 			= $this->load->view('admin/administration/users/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}

	public function DTSystemusersList()
	{
		$post 			= $this->input->post();

		$totalcount 	= $this->Users_Model->getSystemUsers('count', ['type' => ['2'], 'status' => ['0', '1']]+$post);
        $results 		= $this->Users_Model->getSystemUsers('all', ['type' => ['2'], 'status' => ['0', '1']]+$post);

       
		$totalrecord 	= [];
		
		if(count($results) > 0){
			foreach($results as $result){

				
					$action = 	'<div class="table-action">
									<a href="'.base_url().'admin/administration/users/index/index/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-alt"></i></a>	
								</div>';
				
				
				$totalrecord[] = 	[
										'u_name' 			=> 	$result['name'],
                                        'u_surname' 		=> 	$result['surname'],
                                        'u_email' 			=> 	$result['email'],
                                        'u_password_raw' 	=> 	$result['password_raw'],
                                        'u_type' 			=> 	$result['type'],
                                        'status' 			=> 	$this->config->item('statusicon')[$result['status']],
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
	public function DTemailValidation()
    {
        $requestData = $this->input->post();
        $data = $this->Users_Model->emailValidator($requestData);
        echo $data;
    }
}
