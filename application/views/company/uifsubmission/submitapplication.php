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
		<h4 class="text-themecolor">UNEMPLOYMENT INSURANCE FUND</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'company/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">UNEMPLOYMENT INSURANCE FUND</li>
			</ol>
		</div>
	</div>
</div>

<?php //echo $notification; ?>

<form>
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
						<label for="name">1. I,  {Accounting Authority for the Company Name and Surname} duly authorised on behalf of {Registered Company Trading Name} hereby declare:</label>						
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
					<table class="table table-bordered table-striped datatables fullwidth">
						<thead>
							<tr>
								<th>Name and Surname</th>
								<th>{Accounting Authority for the Company Name and Surname}</th>
							</tr>
							<tr>
								<th>Identity Number:</th>
								<th>{Accounting Authority for the Company Id Number}</th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<input type="checkbox" name="check_compile">
						<label for="name">I declare that I have fully read and understood the Legal Undetaking - Form A4</label>	
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
						<input type="checkbox" name="check_compile">
						<label for="name">  I {Accounting Authority for the Company Name and Surname}, ID Number ( {Accounting Authority for the Company ID Number} that I have fully read and understood and accpeted the Memorandum of Agreement between myself as the employer and the Unemplyment Insurance Fund.</label>	
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
						<input type="checkbox" name="check_compile">
						<label for="name">  I {Accounting Authority for the Company Name and Surname}, ID Number ( {Accounting Authority for the Company ID Number} that I have fully read and understood and accpeted the terms and conditions of IOPSA and PIRB.</label>	
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">						
						<label for="name">Date on which you shut down trading</label>	
						<input type="text" name="check_compile">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">						
						<label for="name">Have you commenced trading as yet?</label>	
						<input type="radio" name="check_compile" value="Yes">
						<input type="radio" name="check_compile" value="No">
					</div>

					<div class="form-group col-md-6">						
						<label for="name">Date on which you commenced trading</label>	
						<input type="text" name="check_compile">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">						
						<label for="name">A One Time Pin (OTP) was sent to the {Accounting Authority for the Company Name and Surname}</label>	
						<input type="text" name="check_compile">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">						
						<label for="name">Mobile Number {Accounting Authority mobile number}:</label>	
						<input type="text" name="check_compile">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">						
						<label for="name">Enter OTP</label>	
						<input type="text" name="check_compile">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<input type="button" name="cancel" id="cancel" value="cancel">
						<input type="button" name="resend" id="resend" value="resend">
						<input type="button" name="submit" id="submit" value="submit application">
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
</form>

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

