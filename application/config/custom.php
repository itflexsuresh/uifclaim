<?php

$config['sitename']	 				= 	'UIF';
$config['currency'] 				= 	'R';

$config['roleadmin'] 				= 	'1';
$config['rolecompany'] 				= 	'3';

$config['custom_yesno'] 			= 	'1';
$config['custom_worktype'] 			= 	'2';
$config['custom_employeestatus'] 	= 	'3';
$config['monthly_closure'] 			= 	'12';

$config['usertype1'] 				= 	[
											'company' 	=> '3'
										];
										
$config['usertype2'] 				= 	[
											'3' 	=> 'company'
										];
$config['statusicon'] 				= 	[
											'' 	=> '',
											'1' => '<i class="fa fa-check"></i>',
											'0' => '<i class="fa fa-times"></i>'
										];
$config['emp_status'] 				= 	[
											'' 	=> '',
											'1' => 'Employeed',
											'2' => 'Laid Off',
											'3' => 'Dismissed'
										];

$config['uifsubmissions_status'] 		= 	[
											'0' => 'Submission Required',
											'1' => 'Admin Reviewing',
											'2' => 'UIF Submitted',
											'3' => 'Application Issues',
											'4' => 'Application Rejected'
										];		

$config['uifsubmissions_emp_status'] 		= 	[
											'0' => 'No',
											'1' => 'Yes'										
										];																			