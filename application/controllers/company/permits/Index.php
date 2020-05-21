<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CC_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_Model');
        $this->load->model('Users_Model');
        $this->load->library('pdf');
    }
	
	public function index()
	{
		
		$pagedata['notification'] 	= $this->getNotification();
		$data['plugins']			= ['datatables', 'datatablesresponsive', 'sweetalert', 'validation'];
		//$data['content'] = $this->load->view('company/permits/index', '', true);
		$data['content'] 			= $this->load->view('company/permits/index', (isset($pagedata) ? $pagedata : ''), true);
		$this->layout2($data);
	}

	public function searchEmployee()
	{

		$postData = $this->input->post();		  
		if($postData)
		{
			$data 	=   $this->Employee_Model->autosearchEmployee($postData);
		}
	  	// echo json_encode($data); exit;
		if(!empty($data)) {
		?>
			<ul id="name-list1">
			<?php
			foreach($data as $key=>$val) {
				//print_r($val['startdate']);die;
				if ($val['startdate']) {
					$startDate1 = date('m-d-Y', strtotime($val['startdate']));
				}
				$fullname 			= $val["fullname"];
				$id 				= $val["id"];
				$fname 				= $val["name"];
				$lname 				= $val["surname"];
				$file 				= $val["file"];
				
			?>
			<li onClick="selectEmployee('<?php echo $fullname; ?>','<?php echo $id; ?>','<?php echo $fname; ?>','<?php echo $lname; ?>','<?php echo $file; ?>');"><?php echo $fullname; ?></li>
			<?php } ?>
			</ul>
<?php 	} 
	}

	public function printpermit(){
		if ($this->input->post()) {
			$requestData = $this->input->post();
			$userID 					= $this->getUserID();
			$compdetail 				= $this->Users_Model->getUserDetails('row', ['id' => $userID]);
			$pagedata['comp_result'] 	= $compdetail;
			
			$data 						= $this->Employee_Model->getList('row', ['id' => $requestData['emp_id_hide']]);
			$pagedata['result'] 		= $data;
			$html 						= $this->load->view('pdf/permit', (isset($pagedata) ? $pagedata : '') ,true);
			//print_r($html);die;
			$this->pdf->loadHtml($html);
			$this->pdf->setPaper('A4', 'portrait');
			$this->pdf->render();			
			$this->pdf->stream('Permit');
			redirect('company/permits/index'); 
			

		}
	}

}
