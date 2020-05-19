<?php
//
// print_r($closure_result);die;
$acc_id 				= isset($acc_result['id']) ? $acc_result['id'] : '';
$account_type 			= isset($acc_result['name']) ? $acc_result['name'] : '';
$acc_status		 		= isset($acc_result['status']) ? $acc_result['status'] : '';

if($acc_id==''){
	$heading = "Add";
}else{
		$heading = 'Update';
}

$bank_id 				= isset($bank_result['id']) ? $bank_result['id'] : '';
$bank_name 				= isset($bank_result['name']) ? $bank_result['name'] : '';
$branch_code 			= isset($bank_result['code']) ? $bank_result['code'] : '';
$bank_status		 	= isset($bank_result['status']) ? $bank_result['status'] : '';

if($bank_id==''){
	$heading1 = "Add";
}else{
		$heading1 = 'Update';
}

$closure_id 			= isset($closure_result['id']) ? $closure_result['id'] : '';
$closure_name 			= isset($closure_result['name']) ? $closure_result['name'] : '';

?>
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Settings and Data Types</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">Settings and Data Types</li>
			</ol>
		</div>
	</div>
</div>
<?php echo $notification; ?>

<div class="row">	
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="text-themecolor">Account Types</h4>
				<form class="mt-4 form1" action="index/accountedit" method="post">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="name">Account Types *</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter the name*" value="<?php echo $account_type; ?>">
						</div>
					</div>
					<div class="row">
							<div class="col-md-6">
								<div class="custom-control custom-checkbox mr-sm-2 mb-3 pt-2">
									<input type="checkbox" class="custom-control-input" name="status" id="status" <?php if($acc_status=='1') echo 'checked'; if($acc_status=='') echo 'checked'; ?> value="1">
									<label class="custom-control-label" for="status">Active</label>
								</div>
							</div>
							<div class="col-md-6 text-right">
							<input type="hidden" id="id" name="id" value="<?php echo $acc_id; ?>">
							
							<button type="submit" name="submit" value="submit"  class="btn btn-primary"><?php echo $heading; ?></button>
						</div>
						</div>
					<div class="table-responsive">
						<table class="table table-bordered table-striped datatables fullwidth">
							<thead>
								<tr>
									<th>Account Type</th>
									<th>Active</th>								
									<th>Action</th>
								</tr>
							</thead>
						</table>
				</div>
				</form>

				<h4 class="text-themecolor">Banking Types</h4>
				<form class="mt-4 form2" action="index/bankedit" method="post">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="name">Bank Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter the name*" value="<?php echo $bank_name; ?>">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="name">Branch Code</label>
							<input type="text" class="form-control" id="code" name="code" placeholder="Enter the name*" value="<?php echo $branch_code; ?>">
						</div>
					</div>
					<div class="row">
							<div class="col-md-6">
								<div class="custom-control custom-checkbox mr-sm-2 mb-3 pt-2">
									<input type="checkbox" class="custom-control-input" name="status1" id="status1" <?php if($bank_status=='1') echo 'checked'; if($bank_status=='') echo 'checked'; ?> value="1">
									<label class="custom-control-label" for="status1">Active</label>
								</div>
							</div>
							<div class="col-md-6 text-right">
							<input type="hidden" id="id" name="id" value="<?php echo $bank_id; ?>">
							
							<button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $heading1; ?></button>
						</div>
						</div>					
				</form>
				<div class="table-responsive">
						<table class="table table-bordered table-striped datatables1 fullwidth">
							<thead>
								<tr>
									<th>Bank Name</th>
									<th>Branch Code</th>
									<th>Active</th>							
									<th>Action</th>
								</tr>
							</thead>
						</table>
				</div>

				<h4 class="text-themecolor">Month Closure</h4>
				<form class="mt-4 form3" action="index/closueraction" method="post">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="name">Day the month for which submission will be closed</label>
							<input type="number" class="form-control" id="day_closed" name="day_closed" placeholder="Enter the Day*" value="<?php echo $closure_name; ?>" min="1" max="30" onkeyup="enforceMinMax(this)">
						</div>
					</div>
					
					<div class="row">
							<div class="col-md-6">
								
							</div>
							<div class="col-md-6 text-right">
							<input type="hidden" id="id" name="id" value="<?php echo $closure_id; ?>">
							<input type="hidden" id="staus_closer" name="staus_closer" value="1">
							
							<button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo "Update"; ?></button>
						</div>
						</div>					
				</form>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){


		var options = {
			url 	: 	'<?php echo base_url()."admin/administration/settings/index/DTAccountList"; ?>',
			columns : 	[
			{ "data": "acc_type" },
			{ "data": "acc_active" },
			{ "data": "acc_action" },
			
			],
			target : [2],
			sort : '0'
		};
		
		ajaxdatatables('.datatables', options);	

		var options2 = {
			url 	: 	'<?php echo base_url()."admin/administration/settings/index/DTBankList"; ?>',
			columns : 	[
			{ "data": "bank_name" },
			{ "data": "branch_code" },
			{ "data": "bank_active" },
			{ "data": "bank_action" },
			
			],
			target : [3],
			sort : '0'
		};
		
		ajaxdatatables('.datatables1', options2);	

		$.validator.addMethod("lettersonly", function(value, element) {
          return this.optional(element) || /^[a-z \s]+$/i.test(value);
        }, "Only Letters");


        validation(
			'.form1',
			{
				name : {
					    required    : true,
						lettersonly: true,
						 },
			},
			{
				name : {
					required	: "Please enter the name",
				},
			}
		);

		validation(
			'.form2',
			{
				name : {
					    required    : true,
						lettersonly: true,
						 },
				code : {
					    required    : true,
						lettersonly: true,
						 },
			},
			{
				name : {
					required	: "Please enter Bank Name",
				},
				code : {
					required	: "Please enter Branch Code",
				},
			}
		);
		validation(
			'.form3',
			{
				name : {
					    required    : true,
						lettersonly: true,
						min : 1,
						max : 30,	
						 },
				
			},
			{
				name : {
					required	: "Please enter Bank Name",
				},
				code : {
					required	: "Please enter Branch Code",
				},
			}
		);

	 });


	function enforceMinMax(el){
  if(el.value != ""){
    if(parseInt(el.value) < parseInt(el.min)){
      el.value = el.min;
    }
    if(parseInt(el.value) > parseInt(el.max)){
      el.value = el.max;
    }
  }
}
</script>
