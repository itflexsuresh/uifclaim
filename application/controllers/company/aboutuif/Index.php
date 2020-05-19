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
		if ($userid) {
			$data = $this->Users_Model->getUserDetails('row',['comp_id' => $userid]);
			
			if ($data) {
				$pagedata['result'] = $data;
			}
		}


		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('company/aboutuif/index', '', true);
		$data['content'] 			= $this->load->view('company/aboutuif/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}
}
