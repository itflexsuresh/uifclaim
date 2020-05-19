<?php

function customtextbox($count, $name, $values='', $extras=[]){
	for($i=1; $i<=$count; $i++){
		$value = ($values!='' && isset($values[$i-1])) ? $values[$i-1] : '';
		echo '<input maxlength="1" type="text" class="form-control customtextbox" name="'.$name.'[]" value="'.$value.'" data-textbox="textbox1">';
		if(in_array($i, $extras)) echo '<span class="customtextboxdivider">/</span>';
	}
	
}

function customtextbox1($count, $name, $values='', $extras=[]){
	for($i=1; $i<=$count; $i++){
		$value = ($values!='' && isset($values[$i-1])) ? $values[$i-1] : '';
		echo '<input maxlength="1" type="text" class="form-control customtextbox" name="'.$name.'[]" value="'.$value.'" data-textbox="textbox1">';
		if(in_array($i, $extras)) echo '<span class="customtextboxdivider">-</span>';
	}
}