<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CC_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_Model');
    }
	
	public function index()
	{
		$userid = $this->getUserID();
		if ($this->input->post()) {
			$requestData 	= 	$this->input->post();

			if($requestData['submit']=='submit'){
				$formresult 	=  $this->Users_Model->uifAction($requestData);
				if($formresult) $message = 'UIF Covid Submissions Submitted Successfully.';
			}

			if(isset($formresult)) $this->session->set_flashdata('success', $message);
			else $this->session->set_flashdata('error', 'Try Later.');
			
			redirect('company/aboutuif/index/');
			
		}else{
			if ($userid) {
			$uifdata = $this->Users_Model->getUif('row',['comp_id' => $userid]);	
			$data = $this->Users_Model->getUserDetails('row',['comp_id' => $userid]);			
				if ($data && $uifdata) {
					$pagedata['result'] = $data;
					$pagedata['uifresult'] = $uifdata;
				}
			}

		}
		



		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('company/aboutuif/index', '', true);
		$data['content'] 			= $this->load->view('company/aboutuif/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}
}
