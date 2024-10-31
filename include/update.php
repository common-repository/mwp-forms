<?php if ( ! defined( 'ABSPATH' ) ) exit;	
	$data = get_option( 'wow_forms_data', '0' );	
	if ($data != '3.0'){			
		global $wpdb;
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		$table = $wpdb->prefix . 'mwp_forms_free';					
		$sql = "CREATE TABLE ".$table." (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		title VARCHAR(200) NOT NULL,
		include_field_name TEXT,
		name_item TEXT,
		item_type TEXT,
		input_validator TEXT,
		input_placeholder TEXT,
		field_required TEXT,
		list_value TEXT,
		list_text TEXT,
		list_checkbox TEXT,
		height_input TEXT,
		height_textarea TEXT,
		field_button TEXT,
		send_to_admin TEXT,
		mail_send_text TEXT,
		mail_send_error_text TEXT,
		mail_send_send_timer TEXT,
		mail_send_admin_mail TEXT,
		mail_send_mail_subject TEXT,
		param TEXT, 
		UNIQUE KEY id (id)
		) DEFAULT CHARSET=utf8;";
		dbDelta($sql);		
		update_option( 'wow_forms_data', '3.0' );
	}
	
	
