<?php
	
	$id 					= isset($result['id']) ? $result['id'] : '';
	
	$name 					= isset($result['name']) ? $result['name'] : '';
	$surname 				= isset($result['surname']) ? $result['surname'] : '';
	$id_no 					= isset($result['id_no']) ? $result['id_no'] : '';
	$passport_number 		= isset($result['passport_no']) ? $result['passport_no'] : '';
	$regno 					= isset($result['register_no']) ? $result['register_no'] : '';
	$contact_no 			= isset($result['contact_no']) ? $result['contact_no'] : '';

	$monthly_remuneration 	= isset($result['monthly_remuneration']) ? $result['monthly_remuneration'] : '';
	$startdate 				= isset($result['startdate']) ? $result['startdate'] : '';
	$enddate 				= isset($result['enddate']) ? $result['enddate'] : '';
	$determination 			= isset($result['sector_determination']) ? $result['sector_determination'] : '1';
	$minimal_wage 			= isset($result['sector_wage']) ? $result['sector_wage'] : '';	
	
	$company_name 			= isset($result['company_name']) ? $result['company_name'] : '';
	
	
	$profimage 				= isset($result['file']) ? $result['file'] : '';
	$emp_status 			= isset($result['status']) ? $result['status'] : '';

	$filepath				= base_url().'assets/uploads/employee/';
	$filepathabs			= './assets/uploads/employee/';
	$pdfimg 				= base_url().'assets/images/pdf.png';
	$uploadimg 				= base_url().'assets/images/upload.png';
	
	
	if($profimage!=''){
		$explodefile 		= explode('.', $profimage);
		$extfile 			= array_pop($explodefile);
		$image_files 	= (in_array($extfile, ['pdf', 'tiff'])) ? $pdfimg : $filepath.$profimage;
		$image_url	= $filepath.$profimage;
	}else{
		$image_files 	= $uploadimg;
		$image_url	= 'javascript:void(0);';
	}

	if($id==''){
		$heading = "Add";
	}else{
		$heading = 'Update';
	}
?>

<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">My Employees</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'company/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">My Employees</li>
			</ol>
		</div>
	</div>
</div>
<?php echo $notification; ?>

<div class="row">	
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="text-themecolor">Employee Listing</h4>
				<form class="mt-4 form" action="" method="post">
					<div class="row">
						
								<label for="name">Employee Status *</label>
								<div class="form-group">
									<div class="custom-control custom-radio">
										<input type="radio" id="employeed" name="emp_status" value="1" <?php if($emp_status=='1'){ echo 'checked="checked"'; } ?>class="auditstatus custom-control-input">
										<label class="custom-control-label" for="employeed">Employeed</label>
									</div>
								
								</div>
							
							<div class="form-group">
									<div class="custom-control custom-radio">
										<input type="radio" id="laid_off" name="emp_status" value="2" <?php if($emp_status=='2'){ echo 'checked="checked"'; } ?> class="auditstatus custom-control-input">
										<label class="custom-control-label" for="laid_off">Tempory laid off</label>
									</div>								
							</div>	
							<div class="form-group">
									<div class="custom-control custom-radio">
										<input type="radio" id="dissmiss" name="emp_status" value="3" <?php if($emp_status=='3'){ echo 'checked="checked"'; } ?> class="auditstatus custom-control-input">
										<label class="custom-control-label" for="dissmiss">Dismissed</label>
									</div>								
							</div>	
					</div>
					<div class="row">
						<div class="form-group col-md-6">
								<label for="name">First Name *</label>
								<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter the name*" value="<?php echo $name; ?>">
							</div>
					</div>
				<div class="row">
						<div class="form-group col-md-6">
							<label for="name">Last Name (Surname)*</label>
							<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter the name*" value="<?php echo $surname; ?>">
						</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="custom-control custom-radio">
								<input type="radio" id="identity" name="identity" value="1" <?php if($id_no!=''){ echo 'checked="checked"'; } ?> class="auditstatus custom-control-input">
								<label class="custom-control-label" for="identity">ID Number *</label>
							</div>
						</div>
						<div class="form-group">
							<!-- <label>Company Registration Number * <span class="custominfo" data-toggle="tooltip" title="Hooray!"><i class="fa fa-info"></i></span></label> -->
							<div><?php customtextbox('13', 'id_number', $id_no); ?></div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
								<div class="custom-control custom-radio">
									<input type="radio" id="passport" name="passport" value="2" <?php if($passport_number!=''){ echo 'checked="checked"'; } ?> class="auditstatus custom-control-input">
									<label class="custom-control-label" for="passport">Passport Number *</label>
								</div>
							</div>
						<div class="form-group">
							<!-- <label>Company Registration Number * <span class="custominfo" data-toggle="tooltip" title="Hooray!"><i class="fa fa-info"></i></span></label> -->
							<div><?php customtextbox('13', 'passport_number', $passport_number); ?></div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>PIRB Registration Number </label>
							<div><?php customtextbox('7', 'regno', $regno, [5]); ?></div>
						</div>
					</div>	

					<div class="col-md-12">
							<div class="form-group">
								<label>Contact Number</label>
								<div><?php customtextbox('10', 'contact_no', $contact_no); ?></div>
							</div>
						</div>	

						<div class="col-md-12">
							<div class="form-group">
								<label>Monthly Remuneration * <span class="custominfo" data-toggle="tooltip" title="Hooray!"><i class="fa fa-info"></i></span></label>
								<h4 class="text-themecolor">R</h4><div><?php customtextbox1('8', 'monthly_remuneration', $monthly_remuneration, [6]); ?></div>
							</div>
						</div>	

										
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="startdate">Employment Start Date *</label>
							<input type="text" autocomplete="off" class="form-control" id="startdate" name="startdate" placeholder="Enter Start date *" value="<?php echo $startdate; ?>">
						</div>
					</div>	
				</div>
				
				<div class="row row_enddate">
					<div class="col-md-6">
						<div class="form-group">
							<label for="startdate">Employment End Date *</label>
							<input type="text" autocomplete="off" class="form-control" id="enddate" name="enddate" placeholder="Enter End date *" value="<?php echo $enddate; ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<label>Is this employees remuneration determined my sectorial determination</label>		
					<div class="form-group">
								<div class="custom-control custom-radio">
									<input type="radio" id="determination1" name="determination" value="<?php echo $determination; ?>" <?php if($determination=='1'){ echo 'checked="checked"'; } ?> class="auditstatus custom-control-input">
									<label class="custom-control-label" for="determination1">Yes</label>
								</div>
								
					</div>	
					<div class="form-group">
						<div class="custom-control custom-radio">
							<input type="radio" id="determination2" name="determination" value="2" <?php if($determination=='2'){ echo 'checked="checked"'; } ?> class="auditstatus custom-control-input">
							<label class="custom-control-label" for="determination2">No</label>
						</div>	
					</div>
				</div>


				<div class="row">
					<div class="col-md-12 wage_emp">
							<div class="form-group">
								<label>What is the Sectors determination minimal wage for this employee? * <span class="custominfo" data-toggle="tooltip" title="Hooray!"><i class="fa fa-info"></i></span></label>
								<h4 class="text-themecolor">R</h4><div><?php customtextbox1('7', 'minimal_wage', $minimal_wage, [5]); ?></div>
							</div>
						</div>	

						<div class="col-md-12">
							<h4 class="card-title"></h4>
							<div class="form-group">
								<div>
									<a href="<?php echo $image_url; ?>" target="_blank"><img src="<?php echo $image_files; ?>" class="upload_image" width="100"></a>
								</div>
								<input type="file" class="employee_imgfile">
								<input type="hidden" name="profimage" class="employee_img" value="<?php echo $profimage; ?>">
								<p>(Image/File Size Smaller than 5mb)</p>
							</div>
						</div>		
				</div>
				<div class="col-md-6 text-right">
							<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
							
							<button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $heading; ?></button>
						</div>

				</form>
				<div class="table-responsive">
					<table class="table table-bordered table-striped datatables fullwidth">
						<thead>
							<tr>
								<th>Employee Status</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>ID Number/Passport No</th>
								<th>Contact Number</th>
								<th>Remuneration</th>
								<th>Employment Start Date</th>
								<th>Employment End Date</th>
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

	var id				= '<?php echo $id; ?>';
	var filepath 		= '<?php echo $filepath; ?>';
	var filepathabs 	= '<?php echo $filepathabs; ?>';
	var pdfimg			= '<?php echo $pdfimg; ?>';
	var uploadimg		= '<?php echo $uploadimg; ?>';

	$(function(){
		$('.row_enddate').hide();
		$('.wage_emp').hide();
		fileupload([".employee_imgfile", filepathabs, ['jpg','gif','jpeg','png','pdf','tiff']], ['.employee_img', '.upload_image', filepath, pdfimg]);
		
		var options = {
			url 	: 	'<?php echo base_url()."company/employee/index/DTEmployeeList"; ?>',
			columns : 	[
			{ "data": "emp_status" },
			{ "data": "emp_fname" },
			{ "data": "emp_lname" },
			{ "data": "emp_IDPassport" },
			{ "data": "emp_contact" },	
			{ "data": "emp_renum" },	
			{ "data": "emp_startdate" },						
			{ "data": "emp_enddate" },
			{ "data": "action" },
			],
			target : [8],
			sort : '0'
		};
		
		ajaxdatatables('.datatables', options);	


		$.validator.addMethod("lettersonly", function(value, element) {
          return this.optional(element) || /^[a-z \s]+$/i.test(value);
        }, "Only Letters");

        datepicker('#startdate', ['currentdate'])
		datepicker('#enddate', ['currentdate'])


        validation(
			'.form',
			{
				fname : {
					    required    : true,
						lettersonly: true,
						minlength	: 1,
						maxlength	: 120,
						 },
				
				lname:{
					required    : true,
					lettersonly: true,
					minlength	: 1,
					maxlength	: 120,
				},
				identity:{
					required    : true,
					
				},
				passport:{
					required    : true,
					
				},
				id_number:{
					required    : true,
					
				},
				passport_number:{
					required    : true,
					
				},
				determination:{
					required    : true,
					
				},
				emp_status:{
					required    : true,
					
				},
				minimal_wage:{
					required    : true,
					
				},
				startdate:{
					required    : true,
					
				},
				enddate:{
					required    : true,
					
				},
				

			},
			{
				fname : {
					required	: "Please enter the name",
				},
				lname:{
					required    : "Please enter the surname",
				},
				identity  :{
					required    : "Please enter Id number",
					
				},
				id_number:{
					required    : "Please enter Id number",
				},
				passport_number:{
					required    : "Please enter Id number",
				},
				determination:{
					required    : "This feild is required",
				},
				emp_status:{
					required    : "Employee Status required",
					
				},
				startdate:{
					required    : "Start Date required",
					
				},
				enddate:{
					required    : "End Date required",
					
				},

				minimal_wage:{
					required    : "Minimal wage for this employee is required",
					
				},
				
			}
		);

        var click_count = 0;
		$('#dissmiss').on('click',function(){
			click_count += 1;
			if($(this).is(':checked')){
		       $('.row_enddate').show();
		    } else {
		      $('.row_enddate').hide();
		    } 			
		});

		$('#employeed, #laid_off').on('click',function(){
			$('.row_enddate').hide();
		});

        if($('#dissmiss').is(':checked')){
	       $('.row_enddate').show();
	    } 


	     var click_count1 = 0;
		$('#determination1').on('click',function(){
			click_count1 += 1;
			if($(this).is(':checked')){
		       $('.wage_emp').show();
		    } else {
		      $('.wage_emp').hide();
		    } 			
		});

		$('#determination2').on('click',function(){
			$('.wage_emp').hide();
		});

        if($('#determination1').is(':checked')){
	       $('.wage_emp').show();
	    } 

});
</script>
