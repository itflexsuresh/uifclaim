<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Company User Register</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'admin/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">Company User Register</li>
			</ol>
		</div>
	</div>
</div>

<?php echo $notification; ?>
<div class="row">	
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped datatables fullwidth">
						<thead>
							<tr>
								<th>Company Name</th>
								<th>Company Registration Number</th>
								<th>Accounting Authority for the Company</th>
								<th>Company Work Phone</th>
								<th>Company Work Phone</th>
								<th>Email Address</th>
								<th>Satus</th>
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
			url 	: 	'<?php echo base_url()."admin/company/index/DTCompanyList"; ?>',
			columns : 	[
			{ "data": "c_name" },
			{ "data": "c_regno" },
			{ "data": "c_accounting" },
			{ "data": "c_wrkphone" },
			{ "data": "c_mobi" },	
			{ "data": "c_email" },	
			{ "data": "status" },						
			{ "data": "action" }
			],
			target : [7],
			sort : '0'
		};
		
		ajaxdatatables('.datatables', options);	
});
</script>
