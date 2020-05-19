<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CC_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{
		
		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('company/covidregulation/index', '', true);
		$data['content'] 			= $this->load->view('company/covidregulation/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}
}
