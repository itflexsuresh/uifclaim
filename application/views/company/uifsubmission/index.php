
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

<script type="text/javascript">

	$(function(){		
		
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
	});

</script>