<?php
	if(isset($result) && $result){
		$id 			= $result['id'];
		$role_id        = (set_value('role_id')) 			? set_value('role_id') 			: $result['type'];
		$name 			= (set_value('name')) ? set_value('name') : $result['name'];
		$surname        = (set_value('surname')) ? set_value('surname') : $result['surname'];
		$email          = (set_value('email')) ? set_value('email') : $result['email'];
		$password       = (set_value('password_raw')) 	? set_value('password_raw') 	: $result['password_raw'];
		$type           = (set_value('type')) ? set_value('type') : $result['type'];
		$comments       = (set_value('comments')) ? set_value('comments') : $result['comments'];
		$status 		= (set_value('status')) ? set_value('status') : $result['status'];
	    
		$heading		= 'Update';
	}else{
		$id 			= '';
		$role_id        = set_value('role_id'); 
		$name			= set_value('name');
		$surname        = set_value('surname');
		$password       = set_value('password_raw');
		$email          = set_value('email');
		$type           = set_value('type');
		$comments       = set_value('comments');
		$status			= set_value('status');
		$read       	= set_value('read');
     	$write			= set_value('write');
		
		$heading		= 'Add';
	}
?>

<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Admin System Users</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">Admin System Users</li>
			</ol>
		</div>
	</div>
</div>
<?php echo $notification; ?>

<div class="row">	
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form class="mt-4 form" action="" method="post">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="name">Name *</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter the name*" value="<?php echo $name; ?>">
						</div>
						<div class="form-group  col-md-6">
							<label for="surname">Surname *</label>
							<input type="text" class="form-control" id="surname" name="surname" placeholder="Enthe the surname*" value="<?php echo $surname; ?>">
						</div>
				
						<div class="form-group col-md-6">
							<label for="email">Email Address*</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Enthe the Email*" value="<?php echo $email; ?>">
						</div>
						<div class="form-group col-md-6">
							<label for="password">Password *</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Enthe the Password*" value="<?php echo $password; ?>">
						</div>
						<!-- <div class="form-group col-md-6">
							
							<label for="role_id">Role Type *</label>
							<?php //echo form_dropdown('type', $roletype, $role_id, ['id' => 'role_id', 'class' => 'form-control']); ?>
					    </div> -->

					    <div class="form-group col-md-6">
							<label for="comments">Comments </label>
								<textarea class="form-control" id="comments" name="comments" placeholder="Enter the comments "><?php echo $comments; ?></textarea>
						</div>

					    <div class="row">
							<div class="col-md-6">
								<div class="custom-control custom-checkbox mr-sm-2 mb-3 pt-2">
									<input type="checkbox" class="custom-control-input" name="status" id="status" <?php if($status=='1') echo 'checked'; if($status=='') echo 'checked'; ?> value="1">
									<label class="custom-control-label" for="status">Active</label>
								</div>
							</div>


						</div>

					    
					</div>

					<div class="col-md-6 text-right">
							<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
							<input type="hidden" name="role" value="2">
							<input type="hidden" name="mailstatus" value="1">
							<button type="submit" name="submit" value="submit" class="btn btn-primary"><?php echo $heading; ?> User</button>
						</div>
				</form>


				<div class="table-responsive">
					<table class="table table-bordered table-striped datatables fullwidth">
						<thead>
							<tr>
								<th>Name</th>
								<th>Surname</th>
								<th>Role</th>
								<th>Email Address</th>
								<th>Pin</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function(){
		
		var options = {
			url 	: 	'<?php echo base_url()."admin/administration/users/index/DTSystemusersList"; ?>',
			columns : 	[
			{ "data": "u_name" },
			{ "data": "u_surname" },
			{ "data": "u_type" },
			{ "data": "u_email" },
			{ "data": "u_password_raw" },	
			{ "data": "status" },						
			{ "data": "action" }
			],
			target : [6],
			sort : '0'
		};
		
		ajaxdatatables('.datatables', options);	


		$.validator.addMethod("lettersonly", function(value, element) {
          return this.optional(element) || /^[a-z \s]+$/i.test(value);
        }, "Only Letters");
		
		jQuery.validator.addMethod("noSpace", function(value, element) { 
  			return value.indexOf(" ") < 0 && value != ""; 
		}, "No space please and don't leave it empty");
		
		validation(
			'.form',
			{
				name : {
					    required    : true,
						lettersonly: true,
						 },
				
				surname:{
					required    : true,
					lettersonly: true,
				},
				email  :{
					required    : true,
					remote		: 	{
						url	: "<?php echo base_url().'admin/administration/users/index/DTemailValidation'; ?>",
						type: "post",
						async:false,
						data: {
							email: function() {
								return $( "#email" ).val();
							},
							id: function() {
								return $( "#id" ).val();
							}
						}

					}
				},
				password:{
					required    : true,
					minlength	: 8,
					maxlength	: 24,
					noSpace		: true
				},
				type   :{
					required    :true,
				}

			},
			{
				name : {
					required	: "Please enter the name",
				},
				surname:{
					required    : "Please enter the surname",
				},
				email  :{
					required    : "Please enter the email",
					remote		: "Please enter the differene email",
				},
				password:{
					required    : "Please enter the password",
				},
				type    :{
					required    : "Please Select the type",
				}
			}
		);
	});

	
	// Delete
	
	$(document).on('click', '.delete', function(){
		var action 	= 	'<?php echo base_url().'admin/administration/installationtype'; ?>';
		var data	= 	'\
		<input type="hidden" value="'+$(this).attr('data-id')+'" name="id">\
		<input type="hidden" value="2" name="status">\
		';

		sweetalert(action, data);
	})
</script>
