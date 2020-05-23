<?php

$name 					= isset($results[0]['name']) ? $results[0]['name'] : '';
$surname 				= isset($results[0]['surname']) ? $results[0]['surname'] : '';
$company_name 			= isset($results[0]['company_name']) ? $results[0]['company_name'] : '';
$company_register_no 	= isset($results[0]['company_register_no']) ? $results[0]['company_register_no'] : '';
$mobile_no 				= isset($results[0]['mobile_no']) ? $results[0]['mobile_no'] : '';
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



<div class="row">	
	<div class="col-12">
		<div class="card">
			<div class="card-body">
			
				<p>Welcome</p>
				
			</div>
		</div>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-bordered table-striped datatables fullwidth">
		<thead>
			<tr>
				<th>Month</th>
				<th>Numer of Employees in this Submission</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>

<input type="hidden" id="popupcheck" value="">
<form class="form" id="formId" method="POST" action="<?php echo base_url()."company/uifsubmission/index/submitapplication"; ?>">
	<div id="otpmodal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
	<div class="modal-body">
	<div class="row">	
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="text-themecolor">UNEMPLOYMENT INSURANCE FUND</h4>
					<h4 class="text-themecolor">LEGAL UNDERTAKING – FORM A4</h4>
					<h4 class="text-themecolor">APPLICATION FORM FOR COVID-19 TERS IN TERMS OF DIRECTIVE BY MINISTER OF</h4>
					<h4 class="text-themecolor">EMPLOYMENT AND LABOUR, PUBLISHED ON 26 MARCH 2020, GOVERNMENT</h4>
					<h4 class="text-themecolor">GAZETTE NUMBER 43161</h4>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1. I, <?php echo $name." ".$surname; ?> duly authorised on behalf of <?php echo $company_name; ?> hereby declare:</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.1. That I have read and understood the contents of this FORM and all UIF Requirements for the COVID-19 TERS application procedure in documents “Easy Application Guide”, “MOA” and Approval Letter “A3”.</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.2. I understand that merely submitting this legal undertaking and all supporting documents including the MOA does not automatically mean that my application has been approved and there is a binding contract between my company/organisation and the UIF /Department of Employment and Labour.</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.3. In short, I understand and accept that notwithstanding the signature for and on behalf of the UIF in the MOA I submit with my application and the date of the last signing party to this MOA, the Agreement will come into effect after the submission of all required documents by me and upon receiving approval letter “A3” and receipt by UIF of my acceptance of such approval. Put differently, upon acceptance, UIF shall dispatch confirmation of acceptance of the application to me, which upon my acceptance, in writing ( in letter A4), and received by UIF, renders this MOA of legal force and effect and thereafter it commences to be a legally binding agreement in law and other respects and commences as provide in MOA’s clause 4.</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.4. I understand and accept that I shall:</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.4.1. Await receipt of a confirmation per approval letter “A3” from the UIF that the application has been approved and advised, in writing, of amounts to be paid to the employees in consequence of such approval.</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.4.2. Sign the acceptance form A4 and send it back to UIF</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.4.3.  Have a valid agreement that shall commence upon receipt of my A4 acceptance letter  by the UIF.</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.5. That all the information provided herein, including all documents submitted with the Application, or any other representation made to the UIF/Department of Employment and Labour, in writing, is accurate, correct, valid and complete.</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.6. I undertake to inform the UIF, in writing, immediately if any information on this form must be updated;</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1.7.  I consider this Undertaking to be a legally binding document, and upon which the UIF/Department will base a decision that will have legal consequences.</label>						
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">COMPILED BY:</label>						
						</div>
					</div>

					<div class="table-responsive">
						<table class="table table-bordered table-striped fullwidth">
							<thead>
								<tr>
									<th>Name and Surname</th>
									<th><?php echo $name." ".$surname; ?></th>
								</tr>
								<tr>
									<th>Identity Number:</th>
									<th><?php echo $company_name; ?></th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<input type="checkbox" name="check_forma4" class="check_forma4">
							<label for="name">I declare that I have fully read and understood the Legal Undetaking - Form A4</label>
							</br>	
							<span class="span_forma4" style="color:red;" >Check the Form A4.</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<img src="">
							<label for="name">3 MEMORANDUM OF AGREEMENT UIF EMPLOYER</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<input type="checkbox" name="check_memorandum" class="check_memorandum">
							<label for="name">  I <?php echo $name." ".$surname; ?>, ID Number ( <?php echo $company_register_no; ?> that I have fully read and understood and accpeted the Memorandum of Agreement between myself as the employer and the Unemplyment Insurance Fund.</label>	
							</br>
							<span class="span_memorandum" style="color:red;" >Check the Memorandum of Agreement.</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">IOPSA and PIRB Terms and Conditions</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">I undertand and acknowledge that:</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">- IOPSA and PIRB iare providing this service at no charge to its members and PIRB registered individual companies.</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">- IOPSA and PIRB are not an authorised agent of the UIF, and this service is a simplified method of data capture and submission to UIF, in order to assist members and PIRB registered indivudlas applications.</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">- Any advice or guidance given by IOPSA or PIRB in this regard cannot be seen as “professional advice”.</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">- Applicants are strongly recommended to familiarise themselves with the policies, procedures, rules and requirements of UIF and to abide by these at all times.</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">- Applicants must check all applications thoroughly to ensure that they are complete and correct.</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">- IOPSA or PIRB in no way guarantees the success or otherwise of any application.</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">- Whilst IOPSA and PIRB will endeavour to provide the best possible service to its members and PIRB registered individuals, IOPSAa and PIRB accepts no liability or responsibility for;</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<label for="name">1. Incorrect or false information supplied by the applicant</label>
							<label for="name">2. The outcome of any application.</label>	
							<label for="name">3. Failure of the applicant to abide by any of the policies, procedures, rules and requirements of UIF.</label>
							<label for="name">4. Changes to any UIF policies, procedures, rules and requirements</label>
							<label for="name">5. Any decisions, errors, omissions or calculations made by the UIF.</label>
							<label for="name">6. Any unlawful activities of any applicant.</label>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<input type="checkbox" name="check_iopsa" class="check_iopsa">
							<label for="name">  I <?php echo $name." ".$surname; ?>, ID Number ( <?php echo $company_register_no; ?> that I have fully read and understood and accpeted the terms and conditions of IOPSA and PIRB.</label>	
							</br>
							<span class="span_iopsa" style="color:red;" >Check the Terms and conditions of IOPSA and PIRB.</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">						
							<label for="name">Date on which you shut down trading</label>
							<input type="text" autocomplete="off" class="form-control check_shutdown" id="check_shutdown" name="check_shutdown" data-date="datepicker" value="">
							</br>
							<span class="span_shutdown" style="color:red;" >Shut down trading field is required.</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">						
							<label for="name">Have you commenced trading as yet?</label>	
							<input type="radio" name="check_commenced_status" class="check_commenced_status1" value="1">
							<label for="male">Yes</label>
							<input type="radio" name="check_commenced_status" class="check_commenced_status2" value="0">
							<label for="male">No</label>
							</br>
							<span class="span_commenced_status" style="color:red;" >Check the commenced trading.</span>
						</div>

						<div class="form-group col-md-6">						
							<label for="name">Date on which you commenced trading</label><input type="text" autocomplete="off" class="form-control check_commenced" id="check_commenced" name="check_commenced" data-date="datepicker" value="" disabled>
							</br>
							<span class="span_commenced" style="color:red;" >Commenced field is required.</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">						
							<label for="name">A One Time Pin (OTP) was sent to the <?php echo $name." ".$surname; ?> </label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">						
							<label for="name">Mobile Number <?php echo $mobile_no; ?>:</label>	
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">						
							<label for="name">Enter OTP</label>	
							<input type="text" name="check_otp" class="check_otp" value="">
							</br>
							<span class="span_otp" style="color:red;" >OTP field is required.</span>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-12">
							<input type="button" name="cancel" id="cancel" value="cancel">
							<input type="button" name="resend" id="resend" value="resend">
							<input type="hidden" name="uifid" id="uifid" value="">
							<input type="submit" name="submit" id="submit" class="submit" value="submit application">
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
</form>

<script type="text/javascript">	

	$(function(){	
		datepicker('#check_shutdown');
		datepicker('#check_commenced');
		
		var options = {
			url 	: 	'<?php echo base_url()."company/uifsubmission/index/DTList"; ?>',
			columns : 	[
			{ "data": "sub_date" },
			{ "data": "total_employees" },
			{ "data": "status" },
			{ "data": "action" },
			],
			target : [3],
			sort : '0'
		};
		
		ajaxdatatables('.datatables', options);	

		$(document).on('click', '#submitapplication',function(){
			console.log("submit");
			$('#otpmodal').modal('show');
			var uifid = $(this).attr("data-id");
			$('#uifid').val(uifid);
		});

		$(document).on('click', '#cancel',function(){
			console.log("cancel");
			$('#otpmodal').modal('hide');
		});

	});

	$( document ).ready(function() {
	    $('.span_forma4').hide();
	    $('.span_memorandum').hide();
	    $('.span_iopsa').hide();
	    $('.span_shutdown').hide();
	    $('.span_commenced_status').hide();
	    $('.span_commenced').hide();
	    $('.span_otp').hide();
	});

	$(document).on('click','.check_commenced_status1', function(){
		$('.check_commenced').prop("disabled", false);
	});

	$(document).on('click','.check_commenced_status2', function(){
		$('.check_commenced').prop("disabled", true);
	});

	$(document).on("click", ".submit", function(e){
		var sub_val = '0';
		if($('.check_forma4').prop('checked') == false){
			$('.span_forma4').show();
			sub_val = '1';
		}
		if($('.check_forma4').prop('checked') == true){
			$('.span_forma4').hide();
			sub_val = '0';
		}

		if($('.check_memorandum').prop('checked') == false){
			$('.span_memorandum').show();
			sub_val = '1';
		}
		if($('.check_memorandum').prop('checked') == true){
			$('.span_memorandum').hide();
			sub_val = '0';
		}

		if($('.check_iopsa').prop('checked') == false){
			$('.span_iopsa').show();
			sub_val = '1';
		}
		if($('.check_iopsa').prop('checked') == true){
			$('.span_iopsa').hide();
			sub_val = '0';
		}

		if($('.check_shutdown').val() == ''){
			$('.span_shutdown').show();
			sub_val = '1';
		}
		if($('.check_shutdown').val() != ''){
			$('.span_shutdown').hide();
			sub_val = '0';
		}

		if($('.check_commenced_status1').prop('checked') == false && $('.check_commenced_status2').prop('checked') == false){
			$('.span_commenced_status').show();
			sub_val = '1';
		}
		if($('.check_commenced_status1').prop('checked') == true || $('.check_commenced_status2').prop('checked') == true){
			$('.span_commenced_status').hide();
			sub_val = '0';
		}

		if($('.check_commenced_status1').prop('checked') == true){
			if($('.check_commenced').val() == ''){
				$('.span_commenced').show();
				sub_val = '1';
			}
			if($('.check_commenced').val() != ''){
				$('.span_commenced').hide();
				sub_val = '0';
			}
		}

		if($('.check_otp').val() == ''){
			$('.span_otp').show();
			sub_val = '1';
		}
		if($('.check_otp').val() != ''){
			$('.span_otp').hide();
			sub_val = '0';
		}

		if(sub_val == '1'){
			// console.log(sub_val+" un submit");
	    	// e.preventDefault();	    
	    	// return  false;
	    }

	    if(sub_val == '0'){
			// console.log(sub_val+" submit");
			// $("form").submit(); 	    	
	    	// return  true;
	    }

	});

</script>