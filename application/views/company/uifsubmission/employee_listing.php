<?php 
$month_year = date('F Y', strtotime($results['sub_date']));

$id 		= isset($result['id']) ? $result['id'] : '';
if($id==''){
	$heading = "Add";
}else{
	$heading = 'Update';
}

$monthly_remuneration 	= isset($result['monthly_remuneration']) ? $result['monthly_remuneration'] : '';
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
				<form class="mt-4 form" action="" method="post">
						
						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Admin Comment</label>
								<textarea class="form-control" ></textarea>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Employee</label>
								<input type="text" class="form-control" id="searchemp" placeholder="No Employees with employed or short time status called up here" value="">
								<input type="hidden" id="user_id_hide" name="user_id_hide" value="0">
								<div id="suggesstion_box" style="display: none;"></div>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">First Name: </label>
								<input type="text" class="form-control" id="fname" placeholder="First Name" value="">
							</div>
							<div class="form-group col-md-6">
								<img src="" class="" width="100">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Last Name (Surname):</label>
								<input type="text" class="form-control" id="lname" placeholder="Last Name (Surname)" value="">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-6">
							<label for="name">Did the employyed recieve any remuneration during this period of shut Down period: *</label>
							<div class="form-group">
								<div class="custom-control custom-radio">
									<input type="radio" id="employeed" name="emp_status" value="1" class="auditstatus custom-control-input">
									<label class="custom-control-label" for="employeed">Yes</label>
								</div>							
								<div class="form-group">
									<div class="custom-control custom-radio">
										<input type="radio" id="laid_off" name="emp_status" value="2"  class="auditstatus custom-control-input">
										<label class="custom-control-label" for="laid_off">No</label>
									</div>								
								</div>						
							</div>
							</div>
						</div>

						<div class="row">												
							<div class="form-group col-md-6">
								<label>Amount of Remuneration recieved:</label>	
								<h4 class="text-themecolor">R</h4>
								<?php customtextbox1('8', 'amount', '',[6]); ?>
							</div>
						</div>

						<div class="row">						
							<div class="form-group col-md-6">
								<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">							
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

$('#searchemp').keyup(function(){
	
	var strlength = $.trim($('#searchemp').val()).length;	
	if(strlength > 0)  {
		userautocomplete(["#searchemp", "#user_id_hide", "#suggesstion_box"], [$(this).val(), '3']);
		$("#suggesstion_box").show();
	}
	else{
		$("#suggesstion_box").hide();
		$("#suggesstion_box").html('');
	}
})

</script>

