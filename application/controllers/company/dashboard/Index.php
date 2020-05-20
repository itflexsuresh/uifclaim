<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CC_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Survey_Model');
    }
	
	public function index()
	{				
		if(isset($_POST['submit'])) { 
			$result = $this->Survey_Model->action($_POST);
			if($result == '1')
				$pagedata['success'] 	= $result;
		} 
		$questions = $this->Survey_Model->get_Question_List('all', ['type' => 'all']);
		$options = $this->Survey_Model->get_Option_List('all', ['type' => 'all']);
		$pagedata['checksurvey'] = $this->Survey_Model->checksurvey('all', ['type' => 'all']);
		$pagedata['questions'] 	= $questions;
		$pagedata['options'] 	= $options;
		$data['plugins'] 	= [];
		$data['content'] 	= $this->load->view('company/dashboard/index', $pagedata, true);
		$this->layout2($data);
		
	}
}
