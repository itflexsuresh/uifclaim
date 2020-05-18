<?php 
	$type 		 	= $userdata['type']; 
?>

<aside class="left-sidebar">
	<div class="scroll-sidebar">
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<?php if($type=='1' || $type=='2'){ ?>
					<li><a href="<?php echo base_url().'admin/dashboard/index'; ?>">Dashboard</a></li>
					<li> 
						<a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">Administration</a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="<?php echo base_url().'admin/administration/settings/index'; ?>">Settings and Data Types</a></li>
							<li><a href="<?php echo base_url().'admin/administration/users/index'; ?>">Admin Users</a></li>
						</ul>
					</li>
					<li> 
						<a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">Company User Register</a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="<?php echo base_url().'admin/company/index'; ?>">Company User Register</a></li>
						</ul>
					</li>
					<li> 
						<a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">UIF Claims Submissions</a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="<?php echo base_url().'admin/uifsubmission/index'; ?>">UIF Claims Submissions</a></li>
						</ul>
					</li>
					<li> 
						<a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">Reports</a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="<?php echo base_url().'admin/reports/index'; ?>">Report</a></li>
						</ul>
					</li>
				<?php }elseif($type=='3'){ ?>
					<li><a href="<?php echo base_url().'company/dashboard/index'; ?>">Home</a></li>
					<li><a href="<?php echo base_url().'company/profile/index'; ?>">Company Profile</a></li>
					<li><a href="<?php echo base_url().'company/aboutuif/index'; ?>">About UIF Covid Submissions</a></li>
					<li><a href="<?php echo base_url().'company/employee/index'; ?>">My Employee Listings</a></li>
					<li><a href="<?php echo base_url().'company/uifsubmission/index'; ?>">My UIF Submissions</a></li>
					<li><a href="<?php echo base_url().'company/permits/index'; ?>">Permits Forms</a></li>
					<li><a href="<?php echo base_url().'company/covidregulation/index'; ?>">COVID Regulations</a></li>
				<?php } ?>
				
			</ul>
		</nav>
	</div>
</aside>
