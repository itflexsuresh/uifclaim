<?php
$emp_id 				= isset($result['id']) ? $result['id'] : '';
$emp_name 				= isset($result['name']) ? $result['name'] : '';

?>


<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Create Permits/Forms</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'company/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">Create Permits/Forms</li>
			</ol>
		</div>
	</div>
</div>
<?php echo $notification; ?>


<div class="row">	
	<div class="col-12">
		<div class="card">
			<div class="card-body">
			
				<h4 class="text-themecolor">Permit to Perform Essential Services</h4>
			<form class="mt-4 form" action="index/printpermit" method="post">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="points">PIRB CPD Activity:</label>
							<input type="search" class="form-control" id="employee" name="employee" placeholder = "Enter Employee" autocomplete="off" onkeyup="search_employee(this.value);" value="<?php echo $emp_name; ?>">
							<input type="hidden" id="emp_id_hide" name="emp_id_hide" value="<?php echo $emp_id; ?>">
							<div id="emmployee_suggesstion" style="display: none;"></div>								
					</div>	
				
			</div>
			<div class="row">
						<div class="form-group col-md-6">
							<label for="points">First Name:</label>
							<input type="text" class="form-control" id="employee_fname" name="employee_fname" placeholder = "Employee First name" autocomplete="off" readonly>							
					</div>					
			</div>
			<div class="row">
						<div class="form-group col-md-6">
							<label for="points">Last Name (Surname):</label>
							<input type="text" class="form-control" id="employee_lname" name="employee_lname" placeholder = "Employee Last name" autocomplete="off" readonly>							
					</div>	
					<div class="form-group col-md-6">
							
								
							<a id="imagelink" href="<?php echo base_url().'assets/images/upload.png' ?>" target="_blank"><img src="<?php echo base_url().'assets/images/upload.png'; ?>" class="upload_image" width="100"></a>					
					</div>					
			</div>
			<div class="col-md-6 text-right">
							
							<button type="submit" name="submit" value="submit" class="btn btn-primary">Print Permit</button>
			</div>
		</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	validation(
				'.form',
				{
					employee : {
						    required    : true,
							
							 },
					},
				{
					name : {
						required	: "Please enter the name",
					},
				}
			);
	});

var base_url = '<?php echo base_url(); ?>';
var req2 = null;
	function search_employee(value)
	{
	    if (req2 != null) req2.abort();
	    var strlength2 = $.trim($('#employee').val()).length;
	    if(strlength2 > 0)  { 
		    req2 = $.ajax({
		        type: "POST",
		        url: '<?php echo base_url()."company/permits/index/searchEmployee"; ?>',
		        data: {'search_keyword' : value},        
		        beforeSend: function(){
					// $("#search_reg_no").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
				},
		        success: function(data){          	
		        	$("#emmployee_suggesstion").html('');
		        	$("a#imagelink").prop('href',base_url+'assets/images/upload.png');
		        	$("img.upload_image").prop('src',base_url+'assets/images/upload.png');
		        	$("#employee").val('');
					$("#employee_fname").val('');
					$("#employee_lname").val('');
		        	$("#emmployee_suggesstion").show();      	
					$("#emmployee_suggesstion").html(data);
					$("#employee").css("background","#FFF");
		        }
		    });
		}
		else{
			console.log(strlength2);
			$("#emmployee_suggesstion").hide();
			}
	}

	function selectEmployee(employee,id,fname,lname,file) {
		
		$("a#imagelink").prop('href',base_url+'assets/uploads/employee/'+file);
		$("img.upload_image").prop('src',base_url+'assets/uploads/employee/'+file);
		$("#employee").val(employee);
		$("#emp_id_hide").val(id);
		$("#employee_fname").val(fname);
		$("#employee_lname").val(lname);
		$("#emmployee_suggesstion").hide();
	}
</script>
