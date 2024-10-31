<?php
	/**
		* EMS Integration
		*
		* @package     
		* @subpackage  Send
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       2.1
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;	
	
	$arrkey = wp_kses_post( $_POST['arrkey'] );
	$arrval = wp_kses_post( $_POST['arrval'] );
	$message = array_combine($arrkey, $arrval);
	$findmail = 'email';
	$findname = 'name';
	foreach ($message as $key => $value) {
		$pos1 = stripos($key, $findmail);
		if ($pos1 !== false){
			$email = $value;
			break;
		}
		else {
			$email = 'anonymus@example.com';
		}
	} 
	foreach ($message as $key => $value) {
		$pos2 = stripos($key, $findname);
		if ($pos2 !== false){
			$name = $value;
			break;
		}
		else {
			$name = 'Anonymus';
		}
	}
	
	$userdata = array(
		'EMAIL'    => $email,
		'NAME'     => $name,
		'LNAME'    => '',				
	);
	do_action('ems_integration',$userdata);