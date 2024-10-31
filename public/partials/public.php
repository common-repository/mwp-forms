<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	$include_field_name = unserialize($val->include_field_name);
	$name_item = unserialize($val->name_item);
	$item_type  = unserialize($val->item_type);
	$input_validator = unserialize($val->input_validator);
	$input_placeholder = unserialize($val->input_placeholder);
	$field_required = unserialize($val->field_required);
	$list_value = unserialize($val->list_value);
	$list_text = unserialize($val->list_text);
	$list_checkbox = unserialize($val->list_checkbox);
	$count_i = count($item_type);
	if(empty($param['button_position'] )){
	$button_position = "right"; }
	else{
		$button_position = $param['button_position'];
	}
    if(empty($param['field_button'] )){
	$field_button = "Send"; }
	else{
		$field_button = $param['field_button'];
	}		
	if(empty($param['mail_send_error_size'])){
	$errsize = "16"; }
	else{
		$errsize = $param['mail_send_error_size'];
	}
	if(empty($param['mail_send_error_text'])){
	$errtext = "Correct the fields, please"; }
	else{
		$errtext = $param['mail_send_error_text'];
	}
	if(empty($param['mail_send_error_color'])){
	$errcolor = "#ff0000"; }
	else{
		$errcolor = $param['mail_send_error_color'];
	}	
	$wowform = '';
	$wowform .= '<div id="wow-form-parent-'.$val->id.'"><form metod="post" id="wow-form-id-'.$val->id.'" onkeypress="if(event.keyCode == 13) return false;"><div id="wowformconfirm-'.$val->id.'" class="wow-col">';
	for ($i = 0; $i < $count_i; $i++) {
		$wowform .= '<div class="wow-col-12">';
		if (!empty($include_field_name[$i])){
			$wowform .= '<div class="title">'.$name_item[$i].'</div>';			
		}
		$wowform .= '<input type="hidden" name="wow-field-'.$i.'" value="'.$name_item[$i].'">';
		if ($item_type[$i] == 'input') {
			$required = (!empty($field_required[$i])) ? 'wowrequired' : '';
			if ($input_validator[$i] == 'name'){
				$wowform .= '<input class="wow-forms-'.$input_validator[$i].' '.$required.'" type="text" name="name-'.$i.'" placeholder="'.$input_placeholder[$i].'">';
			}
			else if ($input_validator[$i] == 'email'){
				$wowform .= '<input class="wow-forms-'.$input_validator[$i].' '.$required.'" type="text" name="email-'.$i.'" placeholder="'.$input_placeholder[$i].'">';
			}
			else if ($input_validator[$i] == 'number'){
				$wowform .= '<input class="wow-forms-'.$input_validator[$i].' '.$required.'" type="text" name="wow-forms-input-'.$i.'" placeholder="'.$input_placeholder[$i].'" value="">';
			}
			else {
				$wowform .= '<input class="wow-forms-'.$input_validator[$i].' '.$required.'" type="text" name="wow-forms-input-'.$i.'" placeholder="'.$input_placeholder[$i].'">';
			}
		}
		if ($item_type[$i] == 'textarea') {
			if(!empty($field_required[$i])){
				$required = 'wowrequired';
			}
			else {
				$required = '';
			}
			$wowform .= '<textarea name="wow-forms-textarea-'.$i.'" class="'.$required.'" placeholder="'.$input_placeholder[$i].'"></textarea>';
		}
		if ($item_type[$i] == 'select') {	
			$wowform .= '<select name="wow-forms-select-'.$i.'">';
			$count_list = count($list_value[$i]);
			if ($count_list > 0) {
				for ($ii = 0; $ii < $count_list; $ii++) {
					if (!empty($list_checkbox[$i][$ii])){
						$wowform .= '<option selected value="'.$list_value[$i][$ii].'">'.$list_text[$i][$ii].'</option>';
					}
					else {
						$wowform .= '<option value="'.$list_value[$i][$ii].'">'.$list_text[$i][$ii].'</option>';
					}
				}
			}			  
			$wowform .= '</select>';
		}
		if ($item_type[$i] == 'radio') {		
			$count_list = count($list_value[$i]);
			if ($count_list > 0) {
				for ($ii = 0; $ii < $count_list; $ii++) {
					if (empty ($param['check_style'][$i])){
						$param['check_style'][$i] = 'colom';
					}
					if ($param['check_style'][$i] == 'colom'){
						$check_style = '<br/>';						
					}
					else {
						$check_style = '&emsp;';	
					}
					if (!empty($list_checkbox[$i][$ii])){
						$wowform .= '<input checked="checked" type="radio" value="'.$list_value[$i][$ii].'" name="wow-forms-radio-'.$i.'" id="form-'.$val->id.'-field-'.$i.'-'.$ii.'"> <label for="form-'.$val->id.'-field-'.$i.'-'.$ii.'">'.$list_text[$i][$ii].'</label>'.$check_style;  
					}
					else {  
						$wowform .= '<input type="radio" value="'.$list_value[$i][$ii].'" name="wow-forms-radio-'.$i.'" id="form-'.$val->id.'-field-'.$i.'-'.$ii.'"> <label for="form-'.$val->id.'-field-'.$i.'-'.$ii.'">'.$list_text[$i][$ii].'</label>'.$check_style;
					}
				}
			}				  
		}
		if ($item_type[$i] == 'checkbox') {			
			$count_list = count($list_value[$i]);
			if ($count_list > 0) {
				for ($ii = 0; $ii < $count_list; $ii++) {
					if (empty ($param['check_style'][$i])){
						$param['check_style'][$i] = 'colom';
					}
					if ($param['check_style'][$i] == 'colom'){
						$check_style = '<br/>';						
					}
					else {
						$check_style = '&emsp;';	
					}
					if (!empty($list_checkbox[$i][$ii])){
						$wowform .= '<input checked="checked" type="checkbox" value="'.$list_value[$i][$ii].'" name="wow-forms-checkbox-'.$i.'-'.$ii.'" id="form-'.$val->id.'-field-'.$i.'-'.$ii.'"> <label for="form-'.$val->id.'-field-'.$i.'-'.$ii.'">'.$list_text[$i][$ii].'</label>'.$check_style;
					}						  
					else {
						$wowform .= '<input type="checkbox" value="'.$list_value[$i][$ii].'" name="wow-forms-checkbox-'.$i.'-'.$ii.'" id="form-'.$val->id.'-field-'.$i.'-'.$ii.'"> <label for="form-'.$val->id.'-field-'.$i.'-'.$ii.'">'.$list_text[$i][$ii].'</label>'.$check_style;
					}
				}
			}				  
		}		
		$wowform .= '</div>';
	}
	if(!empty($param['recaptcha'])){
		$wowform .= '<div class="wow-col-12">';
		$wowform .= '<div class="g-recaptcha" data-theme="'.$param['captcha_them'].'" data-sitekey="'.trim ($param['site_key']).'"></div>';
		$wowform .= '</div>';
	}
	$wowform .= '<div class="wow-col-12">';
	$wowform .= '<div style="width:100%;text-align:'.$button_position.';overflow:hidden;"><input type="button" name="send" onclick="wowformsend'.$val->id.'();" value="'.$field_button.'" id="wow-form-button-'.$val->id.'"></div>';		 
	$wowform .= '</div>';
	$wowform .= '<div class="wow-col-12" id="wowform-result-'.$val->id.'"></div>';
	$wowform .= '</div></form></div>';
	echo $wowform;	 
?>