<?php
$checksurvey 			= isset($checksurvey) ? $checksurvey : '0';
?>

<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">Home</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">Home</li>
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

<input type="hidden" id="checksurvey" value="<?php echo count($checksurvey);?>">
<form class="form" id="formId" method="post" action="">
<div id="otpmodal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<h4>Help us Understand your Needs</h4>
				</div>
				<?php 
				$i = 0;				
				foreach ($questions as $key => $value) { 
					$i = $i + 1;
					echo '<div class="row"><label>'.$value['question'].'</label></div>'; 
					$j = 0;
					foreach ($options as $key => $value2) { 
						if($value2['survey_question_id'] == $value['id']) { 
							$j = $j + 1;
							echo'<div class="row"><input type="radio" name="option'.$value['id'].'" id="option_'.$i.'_'.$j.'" value="'.$value2['id'].'" ><label>'.$value2['options'].'</label></div>';
					 	}
					}
					echo '<input type="hidden" id="option_count'.$value['id'].'" value="'.$j.'">';
					echo'</br>';
				} 
				?>
				<input type="hidden" name="totalquestion" id="totalquestion" value="<?php echo $i; ?>">
				<button type="submit" class="btn btn-success verify" name="submit" value="submit">Continue</button>
				</br>
				<span class="checkmeg" style="color:red;">Please check the all radio button.</span>
			</div>
		</div>
	</div>
</div>
</form>

<script type="text/javascript">
	$( document ).ready(function() {
		$('.checkmeg').hide();
		var checksurvey = $('#checksurvey').val();
		if(checksurvey == 0){	
			$('#otpmodal').modal('show');
		}
	});

	$('.verify').click(function(e){
		e.preventDefault();
		var submitvalue = '1';
		var totalquestion = $('#totalquestion').val();		
		for (i = 1; i <= totalquestion; i++) {
			var option_count = $('#option_count'+i).val();
			// console.log(option_count);
			dummyvalue = '0';
			for (j = 1; j <= option_count; j++) {
				// console.log(j+"-"+$('#option_'+i+"_"+j).val());
				if ($('#option_'+i+"_"+j).prop('checked')) {
				   dummyvalue = '1';
				   console.log("checked");
				}
			}
			if(dummyvalue == '0'){
				submitvalue = '0';
			}

		}
		console.log(submitvalue);
		if(submitvalue == '0'){
			console.log("sub val 0");
			$('.checkmeg').show();
		}
		else{
			console.log("sub val 1");
			$('#formId').submit();
		}
	});
	
	$(document).click(function(e) {   
	    if(e.target.id != 'info') {
	        $('#otpmodal').modal('show');   
	    } 
	});
		
</script>
