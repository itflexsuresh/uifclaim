<?php
$id 						= isset($result['id']) ? $result['id'] : '';
$name_surname 				= isset($result['name']) ? $result['name'] : '';
$idno 						= isset($result['id_no']) ? $result['id_no'] : '';


$uifid 						= isset($uifresult['id']) ? $uifresult['id'] : '';
$covid_submission 			= isset($uifresult['covid_submission']) ? $uifresult['covid_submission'] : '';
$agreement 					= isset($uifresult['agreement']) ? $uifresult['agreement'] : '';


?>

<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<span class="custominfo icon-covid" data-toggle="tooltip" title="Hooray!"><i class="fa fa-info"></i></span><h4 class="text-themecolor">About UIF Covid Submissions</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'company/dashboard'; ?>">Home</a></li>
				<li class="breadcrumb-item active">About UIF Covid Submissions</li>
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
						<p>Brief Explaination Donec augue enim, volutpat at ligula et,</p>
						<p>dictum laoreet sapien. Sed maximus feugiat tincidunt.</p>
						<p>Vestibulum ante ipsum primis in faucibus orci luctus et</p>
						<p>ultrices posuere cubilia Curae; Nulla eu mollis leo, eu</p>
						<p>elementum nisl. Curabitur cursus turpis nibh, egestas</p>
						<p>efficitur diam tristique non. Proin </p>
					</div>
					<div class="form-group col-md-6">
						<video width="400" controls>
						  <source src="<?php echo base_url().'assets/sitedata/about covid.mp4' ?>" type="video/mp4">				  
						</video>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<div class="custom-control custom-checkbox mr-sm-2 mb-3 pt-2">
								<input type="checkbox" class="custom-control-input" name="covid_submission" id="covid_submission" value="1" <?php if($covid_submission=='1'){ echo 'checked="checked"'; } ?>>
								<label class="custom-control-label" for="covid_submission">I <?php echo $name_surname; ?>, ID Number ( <?php echo $idno; ?> that I have fully read and understood about this UIF Covid submission process.</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<a id="imagelink" href="<?php echo base_url().'assets/sitedata/UIF covid Submision.pdf' ?>" target="_blank"><img src="<?php echo base_url().'assets/images/pdf.png'; ?>" class="upload_image" width="100"></a>	
						<p><h4 class="text-themecolor coivd-tag">3 MEMORANDUM OF AGREEMENT UIF EMPLOYER</h4></p>
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-12">
						<div class="custom-control custom-checkbox mr-sm-2 mb-3 pt-2">
								<input type="checkbox" class="custom-control-input" name="agreement" id="agreement" value="1"<?php if($agreement=='1'){ echo 'checked="checked"'; } ?>>
								<label class="custom-control-label" for="agreement">I <?php echo $name_surname; ?>, ID Number ( <?php echo $idno; ?> that I have fully read and understood and accpeted the Memorandum of Agreement between myself as the employer and the Unemplyment Insurance Fund.</label>
						</div>
					</div>
				</div>

				<div class="col-md-6 text-right">
							<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
							
							<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
				</div>

				
				</form>
			</div>
		</div>
	</div>
</div>
