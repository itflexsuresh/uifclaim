<div class="row add_space">
	<div class="col-sm-12">
		<?php echo $notification; ?>
	</div>
	<div class="col-sm-6 <?php if($usertype==''){ echo 'offset-3';} ?>">
		<div class="card card-body">
			<h4 class="card-title">Already Registered</h4>
			<h5 class="card-subtitle"> If you are already registered please enter your login details </h5>
			<form method="post" action="<?php echo base_url().'login/'.$usertypename; ?>" class="form-horizontal mt-4 login">
				<div class="form-group">
					<label for="email1">Email ID</label>
					<input class="form-control" name="email" id="email1" type="text" placeholder="Email Address">
				</div>
				<div class="form-group">
					<label for="password1">Password</label>
					<input class="form-control" name="password" id="password1" type="password" placeholder="Password">
				</div>
				<div class="text-center">
					<div><a href="<?php echo base_url('forgotpassword/'.$usertypename); ?>">Forgot Password</a></div>
				</div>
				<button type="submit" name="submit" value="login" class="btn btn-success">Login</button>
			</form>
		</div>
	</div>
	<?php if($usertype!=''){ ?>
		<div class="col-sm-6">
			<div class="card card-body">
				<h4 class="card-title">Not yet Registered</h4>
				<h5 class="card-subtitle">Register your Company</h5>
				<form method="post" action="<?php echo base_url().'login/'.$usertypename; ?>" class="form-horizontal mt-4 register">
					<div class="form-group">
						<label for="email2">Email ID</label>
						<input class="form-control" name="email" id="email2" type="text" placeholder="Email ID">
					</div>
					<div class="form-group">
						<label for="verifyemail2">Verify Email ID</label>
						<input class="form-control" name="verifyemail" id="verifyemail2" type="text" placeholder="Verify Email ID">
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group mb_0">
								<label for="password2">Password</label>
								<input class="form-control" name="password" id="password2" type="password" placeholder="Password">

							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group mb_0">
								<label for="verifypassword2">Verify Password</label>
								<input class="form-control" name="verifypassword" id="verifypassword2" type="password" placeholder="Verify Password">
							</div>
						</div>
						<p>Password must be 8 to 24 characters, is case sensitive, and cannot contain spaces.</p>
					</div>
					<input type="hidden" value="<?php echo $usertype; ?>" name="type">
					<button type="submit" name="submit" value="register" class="btn btn-success">Register Now</button>
				</form>
			</div>
		</div>
	<?php } ?>
</div>

	
<script>
	var usertype = '<?php echo $usertype; ?>';
	
	$(function(){

		jQuery.validator.addMethod("noSpace", function(value, element) { 
  			return value.indexOf(" ") < 0 && value != ""; 
		}, "No space please and don't leave it empty");

		validation(
			'.login',
			{
				email 		: {
					required	: true
				},
				password 	: {
					required	: true
				}
			},
			{
				email 		: {
					required	: "Email field is required."
				},
				password 	: {
					required	: "Password field is required."
				}
			}
		);
		
		validation(
			'.register',
			{
				email 				: {
					required	: true,
					email		: true,
					remote		: 	{
										url		: 	"<?php echo base_url().'common/ajax/ajaxuseremailvalidation'; ?>",
										type	: 	"post",
										data	: 	{
														type : function() {
															return usertype;
														}
													}
									}
				},
				verifyemail 		: {
					required	: true,
					equalTo		: "#email2"
				},
				password 			: {
					required	: true,
					minlength	: 8,
					maxlength	: 24,
					noSpace		: true
				},
				verifypassword 		: {
					required	: true,
					equalTo		: "#password2",
					noSpace		: true
				}
			},
			{
				email 				: {
					required	: "Email field is required.",
					email		: "Enter Valid Email Address.",
					remote		: "Email already exists."
				},
				verifyemail 		: {
					required	: "Verify Email field is required.",
					equalTo		: "Email is not matched."
				},
				password 			: {
					required	: "Password field is required.",
					minlength	: "Password must be minium 8 character..",
					maxlength	: "Password must be maximum 24 character..",
				},
				verifypassword 		: {
					required	: "Verify Password field is required.",
					equalTo		: "Password is not matched."
				}
			}
		);
		
	});
</script>
