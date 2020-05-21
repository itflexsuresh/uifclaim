<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CC_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CC_Model');
		$this->load->model('Validation_Model');
		$this->load->model('Managearea_Model');
		$this->load->model('Uifsubmission_Model');
	}
	 
	public function ajaxuseremailvalidation()
	{	
		$data 	= $this->Validation_Model->useremailvalidation($this->input->post());		
		echo $data;
	}
	
	public function ajaxfileupload()
	{
		$post 			= $this->input->post();
		$path			= strval($post['path']);
		$type			= strval($post['type']);
		
		$result 		= $this->CC_Model->fileUpload('file', $path, $type);
		echo json_encode($result);
	}
	
	public function ajaxcity()
	{
		$post 	= $this->input->post(); 
		$result = $this->Managearea_Model->getCityList('all', $post);

		if(count($result)){
			$json = ['status' => '1', 'result' => $result];
		}else{
			$json = ['status' => '0', 'result' => []];
		}

		echo json_encode($json);
	}

	public function ajaxcityaction()
	{
		$post 		= $this->input->post();
		$checkname 	= $this->Managearea_Model->citynamevalidation(['name' => $post['city1']]);
		
		if($checkname=='0'){
			$result 	= $this->Managearea_Model->action($post);

			if($result){
				$resultdata = $this->Managearea_Model->getCityList('row', ['id' => $result]);
				$json 	= ['status' => '1', 'result' => $resultdata];
			}else{
				$json 	= ['status' => '0', 'result' => []];
			}
		}else{
			$json 	= ['status' => '2', 'result' => []];
		}
		
		echo json_encode($json);
	}

	public function ajaxsuburb()
	{
		$post 	= $this->input->post();  
		$result = $this->Managearea_Model->getSuburbList('all', $post);
		
		if(count($result)){
			$json = ['status' => '1', 'result' => $result];
		}else{
			$json = ['status' => '0', 'result' => []];
		}
		
		echo json_encode($json);
	}
	
	public function ajaxsuburbaction()
	{
		$post 	= $this->input->post();
		$checkname 	= $this->Managearea_Model->suburbnamevalidation(['name' => $post['suburb']]);
		
		if($checkname=='0'){
			$result = $this->Managearea_Model->action($post);

			if($result){
				$resultdata = $this->Managearea_Model->getSuburbList('row', ['id' => $result]);
				$json 	= ['status' => '1', 'result' => $resultdata];
			}else{
				$json 	= ['status' => '0', 'result' => []];
			}
		}else{
			$json 	= ['status' => '2', 'result' => []];
		}
		
		echo json_encode($json);
	}

	public function ajaxuserautocomplete()
	{ 
		$post = $this->input->post();

		if($post['type']== 3){
			$data 	=   $this->Uifsubmission_Model->autosearchEmployee($post);
		}

		
		echo json_encode($data);
	}
}
