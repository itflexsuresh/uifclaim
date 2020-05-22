<?php 
$month_year 		= date('F Y', strtotime($uif_results['sub_date']));
$uif_submissions_id = isset($uif_results['id']) ? $uif_results['id'] : '';


$id 				= isset($results['id']) ? $results['id'] : '';
if($id==''){
	$heading 		= "Add";
}else{
	$heading 		= 'Update';
}
$fname 				= isset($results['fname']) ? $results['fname'] : '';
$lname 				= isset($results['lname']) ? $results['lname'] : '';
$amount 			= isset($results['amount']) ? $results['amount'] : '';
$status 			= isset($results['status']) ? $results['status'] : '';
$file 				= isset($results['file']) ? $results['file'] : '';
$employee_id 		= isset($results['employee_id']) ? $results['employee_id'] : '';

$check_adminid			 = isset($check_adminid) ? $results['check_adminid'] : '';;
?>
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">My UIF "Covid" Submissions</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'company/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">My UIF "Covid" Submissions</li>
			</ol>
		</div>
	</div>
</div>

<?php //echo $notification; ?>

<div class="row">	
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="text-themecolor">My UIF "Covid" Submissions for <?php echo $month_year;?></h4>
				<form class="mt-4 form" action="<?php echo base_url().'company/uifsubmission/index/employee_action'; ?>" method="post">
						<?php if($check_adminid == '1') { ?>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Admin Comment</label>
								<textarea class="form-control" ></textarea>
							</div>
						</div>
						<?php } ?>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Employee</label>
								<input type="text" class="form-control" id="searchemp" placeholder="No Employees with employed or short time status called up here" value="">
								<input type="hidden" id="employee_id" name="employee_id" value="<?php echo $employee_id;?>">
								<div id="suggesstion_box" style="display: none;"></div>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">First Name: </label>
								<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php echo $fname;?>" readonly="true">
							</div>
							<div class="form-group col-md-6">
								<?php if($id > 0) { ?>
									<img id="imgcls" src="<?php echo base_url();?>assets/uploads/employee/<?php echo $file;?>" width="100">
								<?php } else { ?>
									<img id="imgcls" src="" width="100">
								<?php } ?>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Last Name (Surname):</label>
								<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name (Surname)" value="<?php echo $lname;?>" readonly="true">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
							<label for="name">Did the employyed recieve any remuneration during this period of shut Down period: *</label>
							<input type="hidden" id="status" value="<?php echo $status;?>">
							<div class="form-group">
								<div class="custom-control custom-radio">
									<input type="radio" id="employeed" name="emp_status" value="1" class="auditstatus custom-control-input" <?php if($status=='1'){ echo 'checked="checked"'; } ?>>
									<label class="custom-control-label" for="employeed">Yes</label>
								</div>							
								<div class="form-group">
									<div class="custom-control custom-radio">
										<input type="radio" id="employeed2" name="emp_status" value="0"  class="auditstatus custom-control-input" <?php if($status=='0'){ echo 'checked="checked"'; } ?>>
										<label class="custom-control-label" for="employeed2">No</label>
									</div>								
								</div>						
							</div>
							</div>
						</div>

						<div class="row">												
							<div class="form-group col-md-6">
								<label>Amount of Remuneration recieved:</label>	
								<h4 class="text-themecolor">R</h4>
								<?php customtextbox1('8', 'amount', $amount,[6]); ?>
							</div>
						</div>

						<div class="row">						
							<div class="form-group col-md-6">
								<input type="hidden" id="uif_submissions_id" name="uif_submissions_id" value="<?php echo $uif_submissions_id; ?>">		
								<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
								<input type="hidden" id="user_id" name="user_id" value="<?php echo $check_adminid; ?>">					
								<button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $heading; ?></button>
							</div>
						</div>
				</form>


				<div class="table-responsive">
					<table class="table table-bordered table-striped datatables fullwidth">
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>ID Number/Passport No</th>
								<th>Contact Number</th>
								<th>Monthly Remuneration</th>
								<th>Remuneration Recieved During Shut Down Period</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){	

		validation(
			'.form',
			{				
				fname : {
					required	: true
				},
				emp_status : {
					required	: true
				}
			},
			{				
				fname : {
					required	: "Name field is required."
				},
				emp_status : {
					required	: "Shut Down period field is required."
				}
			}
		);
	
		
		
		var options = {
			url 	: 	'<?php echo base_url()."company/uifsubmission/index/DTEmployeeList/$uif_submissions_id"; ?>',
			columns : 	[
			{ "data": "fname" },
			{ "data": "lname" },
			{ "data": "id_passport" },
			{ "data": "contact_no" },
			{ "data": "amount" },
			{ "data": "status" },
			{ "data": "action" },
			],
			target : [6],
			sort : '0'
		};
		
		ajaxdatatables('.datatables', options);	
	});



	$(document).ready(function () {
		var status_val = $('#status').val();
		if(status_val == '1'){
			$('.customtextbox').prop("disabled", false);	
		}
		else{
			$('.customtextbox').prop("disabled", true);	
		}	


	});

	$('#employeed').click(function(){
		$('.customtextbox').prop("disabled", false);
	});

	$('#employeed2').click(function(){
		$('.customtextbox').prop("disabled", true);
	});

	$('#searchemp').keyup(function(){
		
		var strlength = $.trim($('#searchemp').val()).length;
		var user_id = $('#uif_submissions_id').val();	
		if(strlength > 0)  {
			userautocomplete(["#searchemp", "#employee_id", "#suggesstion_box","#fname","#lname","#imgcls"], [$(this).val(), '3']);
			$("#suggesstion_box").show();
		}
		else{
			$("#suggesstion_box").hide();
			$("#suggesstion_box").html('');
		}
	})

</script>

