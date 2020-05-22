<?php
	echo $custom;
	
	$usersdetailid 			= isset($result['usersdetailid']) ? $result['usersdetailid'] : '';
	$usersbankid 			= isset($result['usersbankid']) ? $result['usersbankid'] : '';
	
	$id 					= isset($result['id']) ? $result['id'] : '';
	$email 					= isset($result['email']) ? $result['email'] : '';
	$type 					= isset($result['type']) ? $result['type'] : '';
	
	$name 					= isset($result['name']) ? $result['name'] : '';
	$surname 				= isset($result['surname']) ? $result['surname'] : '';
	$id_no 					= isset($result['id_no']) ? $result['id_no'] : '';
	$mobile_no 				= isset($result['mobile_no']) ? $result['mobile_no'] : '';
	$work_no 				= isset($result['work_no']) ? $result['work_no'] : '';
	$company_name 			= isset($result['company_name']) ? $result['company_name'] : '';
	$company_register_no 	= isset($result['company_register_no']) ? $result['company_register_no'] : '';
	$company_payee_no 		= isset($result['company_payee_no']) ? $result['company_payee_no'] : '';
	$uif_register 			= isset($result['uif_register']) ? $result['uif_register'] : '';
	$uif_no 				= isset($result['uif_no']) ? $result['uif_no'] : '';
	$uif_submission 		= isset($result['uif_submission']) ? $result['uif_submission'] : '';
	$uif_password 			= isset($result['uif_password']) ? $result['uif_password'] : '';
	$association_member 	= isset($result['association_member']) ? $result['association_member'] : '';
	$work_type 				= isset($result['work_type']) ? explode(',', $result['work_type']) : '';
	
	$physicaladdress 		= isset($result['physicaladdress']) ? explode('@-@', $result['physicaladdress']) : [];
	$addressid1 			= isset($physicaladdress[0]) ? $physicaladdress[0] : '';
	$address1				= isset($physicaladdress[2]) ? $physicaladdress[2] : '';
	$province1 				= isset($physicaladdress[3]) ? $physicaladdress[3] : '';
	$city1 					= isset($physicaladdress[4]) ? $physicaladdress[4] : '';
	$suburb1 				= isset($physicaladdress[5]) ? $physicaladdress[5] : '';
	$postalcode1 			= isset($physicaladdress[6]) ? $physicaladdress[6] : '';
	
	$postaladdress 			= isset($result['postaladdress']) ? explode('@-@', $result['postaladdress']) : [];
	$addressid2 			= isset($postaladdress[0]) ? $postaladdress[0] : '';
	$address2				= isset($postaladdress[2]) ? $postaladdress[2] : '';
	$province2 				= isset($postaladdress[3]) ? $postaladdress[3] : '';
	$city2 					= isset($postaladdress[4]) ? $postaladdress[4] : '';
	$suburb2 				= isset($postaladdress[5]) ? $postaladdress[5] : '';
	$postalcode2 			= isset($postaladdress[6]) ? $postaladdress[6] : '';
	
	$usersbankid 			= isset($result['usersbankid']) ? $result['usersbankid'] : '';
	$bank_name 				= isset($result['bank_name']) ? $result['bank_name'] : '';
	$branch_code 			= isset($result['branch_code']) ? $result['branch_code'] : '';
	$account_no 			= isset($result['account_no']) ? $result['account_no'] : '';
	$account_type 			= isset($result['account_type']) ? $result['account_type'] : '';
	$bank_letter 			= isset($result['bank_letter']) ? $result['bank_letter'] : '';

	$filepath				= base_url().'assets/uploads/company/'.$id.'/bank/';
	$filepathabs			= './assets/uploads/company/'.$id.'/bank/';
	$pdfimg 				= base_url().'assets/images/pdf.png';
	$uploadimg 				= base_url().'assets/images/upload.png';
	
	if($bank_letter!=''){
		$explodefile 		= explode('.', $bank_letter);
		$extfile 			= array_pop($explodefile);
		$bank_letter_file 	= (in_array($extfile, ['pdf', 'tiff'])) ? $pdfimg : $filepath.$bank_letter;
		$bank_letter_url	= $filepath.$bank_letter;
	}else{
		$bank_letter_file 	= $uploadimg;
		$bank_letter_url	= 'javascript:void(0);';
	}
	
	if($roletype=='1'){
	}elseif($roletype=='3'){
	}
?>

<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">My Company Profile</h4>
	</div>	
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Home</li>
				<li class="breadcrumb-item active">My Company Profile</li>
			</ol>
		</div>
	</div>
</div>

<?php echo $notification; ?>

<form class="form" method="post" action="">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Registered Company Trading Name *</label>
								<input type="text" class="form-control"  id="company_name" name="company_name" value="<?php echo $company_name; ?>" >
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Company Registration Number * <span class="custominfo" data-toggle="tooltip" title="Hooray!"><i class="fa fa-info"></i></span></label>
								<div><?php customtextbox('12', 'company_register_no', $company_register_no, [4, 10]); ?></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Company PAYEE Number * <span class="custominfo" data-toggle="tooltip" title="Hooray!"><i class="fa fa-info"></i></span></label>
								<div><?php customtextbox('10', 'company_payee_no', $company_payee_no); ?></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="custom-control custom-checkbox form-group">
								<input type="checkbox" id="uif_register" name="uif_register" class="custom-control-input" value="1" <?php if($uif_register=='1'){ echo 'checked="checked"'; } ?>>
								<label class="custom-control-label" for="uif_register">Are you regsitered with UIF <span class="custominfo" data-toggle="tooltip" title="Hooray!"><i class="fa fa-info"></i></span></label>
							</div>
						</div>
						<div class="col-md-12 uif_no_wrapper displaynone">
							<div class="form-group">
								<label>UIF Number *</label>
								<div><?php customtextbox('8', 'uif_no', $uif_no, [7]); ?></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Have you a submiitted a UIF Covid claim before? *</label>
								<?php
									foreach ($yesno as $key => $value) {
								?>
										<div class='custom-control custom-radio'>
											<input type='radio' class='custom-control-input uif_submission' data-radio="radio1" name='uif_submission' id="<?php echo 'uif_submission'.$key; ?>" value="<?php echo $key; ?>" <?php echo $key==$uif_submission ? 'checked="checked"' : ''; ?>>
											<label class='custom-control-label' for="<?php echo 'uif_submission'.$key; ?>"><?php echo $value; ?></label>
										</div>
								<?php
									}
								?>
							</div>
						</div>
						<div class="col-md-6 uif_password_wrapper displaynone">
							<div class="form-group">
								<label>What Password did you use for this Submission *</label>
								<input type="text" class="form-control"  id="uif_password" name="uif_password" value="<?php echo $uif_password; ?>" >
							</div>
						</div>
					</div>
									
					<h4 class="card-title">Accounting Authority for the Company</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Full Names *</label>
								<input type="text" class="form-control"  id="name" name="name" value="<?php echo $name; ?>" >
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Surname *</label>
								<input type="text" class="form-control"  id="surname" name="surname" value="<?php echo $surname; ?>" >
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>ID Number *</label>
								<div><?php customtextbox('13', 'id_no', $id_no); ?></div>
							</div>
						</div>
					</div>						
					
					<h4 class="card-title">Company Primary Contact Details</h4>	
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Work Phone *</label>
								<div><?php customtextbox('10', 'work_no', $work_no); ?></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Mobile Phone *</label>
								<div><?php customtextbox('10', 'mobile_no', $mobile_no); ?></div><label id="notif-bg" style="color: red;">Note all SMS and 2nd level Authentication will be sent to this mobile number above</label>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<label>Email Address *</label>
								<input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
							</div>
							<label id="notif-bg" style="color: red;">* Note all emails notifications will be sent to this email address above</label>
						</div>
					</div>	
					
					<div class="row">
						<div class="col-md-6">
							<h4 class="card-title">Company Physical Address</h4>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Physical Address *</label>
										<input type="hidden" class="form-control" name="address[1][id]" value="<?php echo $addressid1; ?>">
										<input type="hidden" class="form-control" name="address[1][type]" value="1">
										<input type="text" class="form-control" name="address[1][address]"  value="<?php echo $address1; ?>">
									</div>
								</div>
								<div class="col-md-12">								
									<div class="form-group"> 
										<label>Province *</label>
										<?php 
											echo form_dropdown('address[1][province]', $province, $province1, ['id' => 'province1', 'class' => 'form-control', 'data-select' => 'select1']); 
										?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>City *</label>
										<?php 
											echo form_dropdown('address[1][city]', [], $city1, ['id' => 'city1', 'class' => 'form-control', 'data-select' => 'select1']); 
										?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Suburb *</label>
										<?php
											echo form_dropdown('address[1][suburb]', [], $suburb1, ['id' => 'suburb1', 'class'=>'form-control', 'data-select' => 'select1']);
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<h4 class="card-title">Company Postal Address</h4>	
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Postal Address *</label>
										<input type="hidden" class="form-control" name="address[2][id]" value="<?php echo $addressid2; ?>">
										<input type="hidden" class="form-control" name="address[2][type]" value="2">
										<input type="text" class="form-control" name="address[2][address]" value="<?php echo $address2; ?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Province *</label>
										<?php
											echo form_dropdown('address[2][province]', $province, $province2, ['id' => 'province2', 'class'=>'form-control', 'data-select' => 'select1']);
										?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>City *</label>
										<?php 
											echo form_dropdown('address[2][city]', [], $city2, ['id' => 'city2', 'class' => 'form-control', 'data-select' => 'select1']); 
										?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Suburb *</label>
										<?php
											echo form_dropdown('address[2][suburb]', [], $suburb2, ['id' => 'suburb2', 'class'=>'form-control', 'data-select' => 'select1']);
										?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Postal Code *</label>
										<div><?php customtextbox('4', 'address[2][postal]', $postalcode2); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>	
					
					<h4 class="card-title">Banking Details</h4>	
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Name of the Banking Institute of the Register Company *</label>
								<?php
									echo form_dropdown('bank_name', $bankdetails, $bank_name, ['id' => 'bank_name', 'class'=>'form-control', 'data-select' => 'select1']);
								?>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Banks Branch Code *</label>
								<input type="text" class="form-control"  id="branch_code" name="branch_code" value="<?php echo $branch_code; ?>" >
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Your Account Number *</label>
								<div><?php customtextbox('13', 'account_no', $account_no); ?></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label>Account Type *</label>
								<?php
									echo form_dropdown('account_type', $acctypes, $account_type, ['id' => 'account_type', 'class'=>'form-control', 'data-select' => 'select1']);
								?>
							</div>
						</div>
						<div class="col-md-12">
							<h4 class="card-title">Bank Confimation letter *</h4>
							<div class="form-group">
								<div>
									<a href="<?php echo $bank_letter_url; ?>" target="_blank"><img src="<?php echo $bank_letter_file; ?>" class="bankletter_image" width="100"></a>
								</div>
								<input type="file" class="bankletter_file">
								<input type="hidden" name="bank_letter" class="bankletter" value="<?php echo $bank_letter; ?>">
								<p>(Image/File Size Smaller than 5mb)</p>
							</div>
							<label id="notif-bg" style="color: red;">Note: Bank Confirmation should not be older than three months</label>
						</div>
					</div>
					
					<h4 class="card-title">Are you a member of any of these Associations/Institutions</h4>	
					<div class="row">
						<div class="form-group">
							<div class='custom-control custom-radio'>
								<input type='radio' class='custom-control-input' name='association_member' id="association_member" value="1" <?php echo $association_member=='1' ? 'checked="checked"' : ''; ?>>
								<label class='custom-control-label' for="association_member">Institute of Plumbing of South Africa (IOPSA)</label>
							</div>
						</div>
					</div>
					
					<h4 class="card-title">Type of work Company Undertakes *</h4>	
					<div class="row">
						<div class="form-group">
							<?php
								foreach ($worktype as $key => $value) {
							?>
									<div class='custom-control custom-checkbox'>
										<input type='checkbox' data-checkbox="checkbox1" class='custom-control-input' name='work_type[]' id="<?php echo 'work_type'.$key; ?>" value="<?php echo $key; ?>" <?php echo in_array($key, $work_type) ? 'checked="checked"' : ''; ?>>
										<label class='custom-control-label' for="<?php echo 'work_type'.$key; ?>"><?php echo $value; ?></label>
									</div>
							<?php
								}
							?>
						</div>
					</div>
					
					<div class="col-md-12 text-right">
						<input type="hidden" name="usersdetailid" value="<?php echo $usersdetailid; ?>">
						<input type="hidden" name="usersbankid" value="<?php echo $usersbankid; ?>">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</form>


<script type="text/javascript">

var id				= '<?php echo $id; ?>';
var filepath 		= '<?php echo $filepath; ?>';
var filepathabs 	= '<?php echo $filepathabs; ?>';
var pdfimg			= '<?php echo $pdfimg; ?>';
var uploadimg		= '<?php echo $uploadimg; ?>';
var type			= '<?php echo $type; ?>';
var uif_submission	= '<?php echo $uif_submission; ?>';

$(function(){
	select2('#province1, #city1, #suburb1, #province2, #city2, #suburb2, #bank_name, #account_type');
	fileupload([".bankletter_file", filepathabs, ['jpg','gif','jpeg','png','pdf','tiff']], ['.bankletter', '.bankletter_image', filepath, pdfimg]);
	citysuburb(['#province1','#city1', '#suburb1'], ['<?php echo $city1; ?>', '<?php echo $suburb1; ?>']);
	citysuburb(['#province2','#city2', '#suburb2'], ['<?php echo $city2; ?>', '<?php echo $suburb2; ?>']);
	
	uifno();
	uifpassword(uif_submission);
	
	validation(
		'.form',
		{
			company_name : {
				required			: true,
                alphabetandspace	: true,
				maxlength			: 120
			},
			'company_register_no[]' : {
				allrequired	: true
			},
			'company_payee_no[]' : {
				allrequired	: true
			},
			'uif_no[]' : {
				allrequired	: function() {
								return $('#uif_register').is(':checked');
							  }
			},
			uif_submission : {
				required	: true
			},
			uif_password : {
				required:  	function() {
								return $('.uif_submission:checked').val() == "1";
							}
			},
			name : {
				required	: true
			},
			surname : {
				required	: true
			},
			'id_no[]' : {
				allrequired	: true
			},
			'mobile_no[]' : {
				allrequired	: true
			},
			'work_no[]' : {
				allrequired	: true
			},
			'address[1][address]' : {
				required	: true
			},
			'address[2][address]' : {
				required	: true
			},
			'address[1][suburb]' : {
				required	: true
			},
			'address[2][suburb]' : {
				required	: true
			},
			'address[1][city]' : {
				required	: true
			},
			'address[2][city]' : {
				required	: true
			},
			'address[1][province]' : {
				required	: true
			},
			'address[2][province]' : {
				required	: true
			},
			'address[2][postal][]' : {
				allrequired	: true
			},
			bank_name : {
				//required	: true
			},
			branch_code : {
				required	: true
			},
			'account_no[]' : {
				allrequired	: true
			},
			account_type : {
				//required	: true
			},
			'work_type[]' : {
				required	: true
			}
		},
		{
			company_name : {
				required			: "Registered Company Trading Name field is required.",
				alphabetandspace 	: "Characters only allowed.",
				maxlength 			: "Maximum 120 characters."
			},
			'company_register_no[]' : {
				allrequired	: "Company Registration Number field is required."
			},
			'company_payee_no[]' : {
				allrequired	: "Company PAYEE Number field is required."
			},
			'uif_no[]' : {
				allrequired	: "UIF Number field is required."
			},
			uif_submission : {
				required	: "UIF Covid claim field is required."
			},
			uif_password : {
				required	: "Password field is required."
			},
			name : {
				required	: "Full Names field is required."
			},
			surname : {
				required	: "Surname field is required."
			},
			'id_no[]' : {
				allrequired	: "ID Number field is required."
			},
			'mobile_no[]' : {
				allrequired	: "Mobile Phone field is required."
			},
			'work_no[]' : {
				allrequired	: "Work Phone field is required."
			},
			'address[1][address]' : {
				required	: "Address  field is required.",
			},
			'address[2][address]' : {
				required	: "Address  field is required.",
			},
			'address[1][suburb]' : {
				required	: "Suburb  field is required.",
			},
			'address[2][suburb]' : {
				required	: "Suburb  field is required.",
			},
			'address[1][city]' : {
				required	: "City  field is required.",
			},
			'address[2][city]' : {
				required	: "City  field is required.",
			},
			'address[1][province]' : {
				required	: "Province  field is required.",
			},
			'address[2][province]' : {
				required	: "Province  field is required.",
			},
			'address[2][postal][]' : {
				allrequired	: "Postal code field is required."
			},
			bank_name : {
				required	: "Name of the Banking Institute of the Register Company field is required."
			},
			branch_code : {
				required	: "Banks Branch Code field is required."
			},
			'account_no[]' : {
				allrequired	: "Account Number field is required."
			},
			account_type : {
				required	: "Account Type field is required."
			},
			'work_type[]' : {
				required	: "Type of work Company Undertakes field is required."
			}
		}
	);
	
})



$(".company_payee_no").keyup(function() {
	var idccount = 0;
	var currentid = '';
	if($(this).val()!==''){
		$(this).each(function( index ) {
			currentid = $( this ).attr('id');
			var splitId = currentid.split("_",1);
			var numconversion = parseInt(splitId);
			var NextCount = numconversion+1
			var param = "#"+NextCount+"_company_payee_no";
			$( param ).focus();
 		});
	}else{
	return false;
	}  
});


$(".company_register_no").keyup(function() {
	var idccount1 = 0;
	var currentid1 = '';
	if($(this).val()!==''){
		$(this).each(function( index ) {
			currentid1 = $( this ).attr('id');
			var splitId1 = currentid1.split("_",1);
			var numconversion1 = parseInt(splitId1);
			var NextCount1 = numconversion1+1
			var param1 = "#"+NextCount1+"_company_register_no";
			$( param1 ).focus();
 		});
	}else{
	return false;
	}  
});


$(".uif_no").keyup(function() {
	var idccount2 = 0;
	var currentid2 = '';
	if($(this).val()!==''){
		$(this).each(function( index ) {
			currentid2 = $( this ).attr('id');
			var splitId2 = currentid2.split("_",1);
			var numconversion2 = parseInt(splitId2);
			var NextCount2 = numconversion2+1
			var param2 = "#"+NextCount2+"_uif_no";
			$( param2 ).focus();
 		});
	}else{
	return false;
	}  
});


$(".id_no").keyup(function() {
	var idccount3 = 0;
	var currentid3 = '';
	if($(this).val()!==''){
		$(this).each(function( index ) {
			currentid3 = $( this ).attr('id');
			var splitId3 = currentid3.split("_",1);
			var numconversion3 = parseInt(splitId3);
			var NextCount3 = numconversion3+1
			var param3 = "#"+NextCount3+"_id_no";
			$( param3 ).focus();
 		});
	}else{
	return false;
	}  
});



$(".work_no").keyup(function() {
	var idccount4 = 0;
	var currentid4 = '';
	if($(this).val()!==''){
		$(this).each(function( index ) {
			currentid4 = $( this ).attr('id');
			var splitId4 = currentid4.split("_",1);
			var numconversion4 = parseInt(splitId4);
			var NextCount4 = numconversion4+1
			var param4 = "#"+NextCount4+"_work_no";
			$( param4 ).focus();
 		});
	}else{
	return false;
	}  
});




$(".mobile_no").keyup(function() {
	var idccount5 = 0;
	var currentid5 = '';
	if($(this).val()!==''){
		$(this).each(function( index ) {
			currentid5 = $( this ).attr('id');
			var splitId5 = currentid5.split("_",1);
			var numconversion5 = parseInt(splitId5);
			var NextCount5 = numconversion5+1
			var param5 = "#"+NextCount5+"_mobile_no";
			$( param5 ).focus();
 		});
	}else{
	return false;
	}  
});

$('#uif_register').click(function(){
	uifno();
})

function uifno(){
	if($('#uif_register').is(':checked')){
		$('.uif_no_wrapper').removeClass('displaynone');
	}else{
		$('.uif_no_wrapper').addClass('displaynone');
	}
}

$('.uif_submission').click(function(){
	uifpassword($(this).val());
})

function uifpassword(value){
	if(value=='1'){
		$('.uif_password_wrapper').removeClass('displaynone');
	}else{
		$('.uif_password_wrapper').addClass('displaynone');
	}	
}

</script>

