<div class="row add_space">
	<div class="col-sm-6 offset-sm-3">
		<?php echo $notification; ?>
	</div>
	<div class="col-sm-6 offset-sm-3">
		<div class="card card-body">
			<h4 class="card-title">Forgot Password</h4>
			<form method="post" action="<?php echo base_url().'forgotpassword/'.$usertypename; ?>" class="form-horizontal mt-4 form">
				<div class="form-group">
					<label for="email">Email Address</label>
					<input class="form-control" name="email" id="email" type="text" value="<?php echo set_value('email'); ?>" placeholder="Email Address">
				</div>
				<div class="text-center">
					<div><a href="<?php echo base_url('login/'.$usertypename); ?>">Already have an account?</a></div>
				</div>
				<button type="submit" name="submit" class="btn btn-success">Submit</button>
			</form>
		</div>
	</div>
</div>

	
<script>
	$(function(){
		validation(
			'.form',
			{
				email 		: {
					required	: true
				}
			},
			{
				email 		: {
					required	: "Email field is required."
				}
			}
		);
	});
</script>
