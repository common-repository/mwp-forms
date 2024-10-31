<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	$act = (isset($_REQUEST["act"])) ? sanitize_text_field($_REQUEST["act"]) : '';
	if ($act == "update") { 
		$recid = sanitize_text_field($_REQUEST["id"]);
		$result = $wpdb->get_row("SELECT * FROM $data WHERE id=$recid");   
		if ($result){
			$id = $result->id;
			$title = $result->title;
			$param = unserialize($result->param);
			$include_field_name = unserialize($result->include_field_name);
			$name_item = unserialize($result->name_item);
			$item_type  = unserialize($result->item_type);
			$input_validator = unserialize($result->input_validator);
			$input_placeholder = unserialize($result->input_placeholder);
			$field_required = unserialize($result->field_required);
			$list_value = unserialize($result->list_value);
			$list_text = unserialize($result->list_text);
			$list_checkbox = unserialize($result->list_checkbox);
			$count_i = count($item_type);
			$height_input = $result->height_input;
			$height_textarea = $result->height_textarea;
			$field_button = $result->field_button;
			$send_to_admin = $result->send_to_admin;
			$mail_send_text = $result->mail_send_text;		
			$mail_send_error_text = $result->mail_send_error_text;		
			$mail_send_send_timer = $result->mail_send_send_timer;
			$mail_send_admin_mail = $result->mail_send_admin_mail;
			$mail_send_mail_subject = $result->mail_send_mail_subject;	
			$param['error_notice'] = (!empty($param['error_notice'])) ? $param['error_notice'] : '<p style="text-align: center;"><span style="color: #ff0000;">Correct the fields, please</span></p>';
			$param['mail_send_text'] = (!empty($param['mail_send_text'])) ? $param['mail_send_text'] : '<p style="text-align: center;"><span style="color: #000000;">Thank you</span></p>';			
			$param['form_width_par'] = (!empty($param['form_width_par'])) ? $param['form_width_par'] : '%';
			$param['button_position'] = (!empty($param['button_position'])) ? $param['button_position'] : 'right';
			$param['mobile_width_par'] = (!empty($param['mobile_width_par'])) ? $param['mobile_width_par'] : 'pr';
			$param['height_input'] = (!empty($param['height_input'])) ? $param['height_input'] : '36';
			$param['height_textarea'] = (!empty($param['height_textarea'])) ? $param['height_textarea'] : '72';
			$btn = "Update";
			$hidval = 2;
		}
	}
	else if ($act == "duplicate") { 
		$recid = sanitize_text_field($_REQUEST["id"]);
		$result = $wpdb->get_row("SELECT * FROM $data WHERE id=$recid");
		if ($result){   
			$id = "";
			$title = "";
			$param = unserialize($result->param);
			$include_field_name = unserialize($result->include_field_name);
			$name_item = unserialize($result->name_item);
			$item_type  = unserialize($result->item_type);
			$input_validator = unserialize($result->input_validator);
			$input_placeholder = unserialize($result->input_placeholder);
			$field_required = unserialize($result->field_required);
			$list_value = unserialize($result->list_value);
			$list_text = unserialize($result->list_text);
			$list_checkbox = unserialize($result->list_checkbox);
			$count_i = count($item_type);
			$height_input = $result->height_input;
			$height_textarea = $result->height_textarea;
			$field_button = $result->field_button;
			$send_to_admin = $result->send_to_admin;
			$mail_send_text = $result->mail_send_text;		
			$mail_send_error_text = $result->mail_send_error_text;		
			$mail_send_send_timer = $result->mail_send_send_timer;
			$mail_send_admin_mail = $result->mail_send_admin_mail;
			$mail_send_mail_subject = $result->mail_send_mail_subject;
			$param['error_notice'] = (!empty($param['error_notice'])) ? $param['error_notice'] : '<p style="text-align: center;"><span style="color: #ff0000;">Correct the fields, please</span></p>';
			$param['mail_send_text'] = (!empty($param['mail_send_text'])) ? $param['mail_send_text'] : '<p style="text-align: center;"><span style="color: #000000;">Thank you</span></p>';	
			$param['form_width_par'] = (!empty($param['form_width_par'])) ? $param['form_width_par'] : '%';
			$param['button_position'] = (!empty($param['button_position'])) ? $param['button_position'] : 'right';
			$param['mobile_width_par'] = (!empty($param['mobile_width_par'])) ? $param['mobile_width_par'] : 'pr';
			$param['height_input'] = (!empty($param['height_input'])) ? $param['height_input'] : '36';
			$param['height_textarea'] = (!empty($param['height_textarea'])) ? $param['height_textarea'] : '72';
			$btn = "Save";
			$hidval = 1;
		}
	}
	else {
		$btn = "Save";
		$id = "";
		$title = "";
		$include_field_name = "1";
		$field_name = "";
		$include_field_mail = "1";
		$field_mail = "";
		$include_field_phone = "";
		$field_phone = "";
		$include_field_review = "";
		$field_review = "";
		$height_input = "";
		$height_textarea = "";
		$field_button = "";
		$send_to_admin = "1";				
		$mail_send_error_text = "";		
		$mail_send_send_timer = "";
		$mail_send_admin_mail = "";
		$mail_send_mail_subject = "";	
		$count_i = 0;		
		$param['error_notice'] = '<p style="text-align: center;"><span style="color: #ff0000;">Correct the fields, please</span></p>';
		$param['mail_send_text'] = '<p style="text-align: center;"><span style="color: #000000;">Thank you</span></p>';
		$param['form_width_par'] = '%';
		$param['button_position'] = 'right';
		$param['mobile_width_par'] = 'pr';
		$param['height_input'] = '36';
		$param['height_textarea'] = '72';
		$hidval = 1;
	}
	$errorsetings = array(
    'textarea_name' => 'param[error_notice]',
	'textarea_rows' => '',
	'wpautop' => 0,	
    'media_buttons' => true,	
    'tinymce' => array(
	'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
	'bullist,blockquote,|,justifyleft,justifycenter' .
	',justifyright,justifyfull,|,link,unlink,|' .
	',spellchecker,wp_fullscreen,wp_adv'
    )
	);
	$confsettings = array(
    'textarea_name' => 'param[mail_send_text]',
	'textarea_rows' => '',
	'wpautop' => 0,	
    'media_buttons' => true,	
    'tinymce' => array(
	'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
	'bullist,blockquote,|,justifyleft,justifycenter' .
	',justifyright,justifyfull,|,link,unlink,|' .
	',spellchecker,wp_fullscreen,wp_adv'
    )
	);
?>