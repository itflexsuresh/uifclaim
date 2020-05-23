<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CC_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_Model');
    }
	
	public function index()
	{
		
		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('admin/company/index', '', true);
		$data['content'] 			= $this->load->view('admin/company/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}

	public function DTCompanyList()
	{
		$post 			= $this->input->post();

		$totalcount 	= $this->Company_Model->getList('count', ['type' => '3', 'status' => ['1', '2'], 'page' => 'adminplumberlist'], ['users', 'usersdetail', 'physicaladdress', 'postaladdress', 'usersbank']+$post);
        $results 		= $this->Company_Model->getList('all', ['type' => '3', 'status' => ['1', '2'], 'page' => 'adminplumberlist'], ['users', 'usersdetail', 'physicaladdress', 'postaladdress', 'usersbank']+$post);

		$totalrecord 	= [];
		
		if(count($results) > 0){
			foreach($results as $result){

				
					$action = 	'<div class="table-action">
									<a href="'.base_url().'admin/company/index/action/'.$result['id'].'" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-alt"></i></a>	
								</div>';
				
				
				$totalrecord[] = 	[
										'c_name' 			=> 	$result['name'].' '.$result['surname'],
                                        'c_regno' 			=> 	$result['company_register_no'],
                                        'c_accounting' 		=> 	$result['name'].' '.$result['surname'],
                                        'c_wrkphone' 		=> 	$result['work_no'],
                                        'c_mobi' 			=> 	$result['mobile_no'],
                                        'c_email' 			=> 	$result['email'],
										'status'			=> 	$this->config->item('statusicon')[$result['status']],
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
	public function action($id){
		$this->companyprofile($id, ['roletype' => $this->config->item('rolecompany'), 'pagetype' => 'admincompanyprofile'], ['redirect' => 'admin/company/index']);

	}
}
