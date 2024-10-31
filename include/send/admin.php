<?php if ( ! defined( 'ABSPATH' ) ) exit;
	if (empty($val->mail_send_admin_mail)){
		$myemail = get_option('admin_email');
	}
	else {
		$myemail = $val->mail_send_admin_mail;
	}
	if (empty($param['mail_send_text'])){
		$thank = "Thank you. We will contact you shortly.";
	}
	else {
		$thank = do_shortcode(html_entity_decode($param['mail_send_text']));	 
	}
	
	
	if (empty($val->mail_send_mail_subject)){
		$mailtext = "Letter from the site";
	}
	else {
		$mailtext = $val->mail_send_mail_subject;
	}
	if (empty($val->mail_send_send_timer)){
		$timer = "3000";
	}
	else {
		$timer = $val->mail_send_send_timer*1000;	
	}			
	
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
			$email = ' no-email@example.com ';
		}
	} 
	foreach ($message as $key => $value) {
		$pos2 = stripos($key, $findname);
		if ($pos2 !== false){
			$name = $value;
			break;
		}
		else {
			$name = ' Anonymus ';
		}
	}	
	$refreshpage = "";
	$date=date("d.m.Y"); 
	$time=date("H:i:s"); 
	$headers=null;
	$headers.="content-type: text/html; charset=utf-8\r\n";
	$headers.="From: ".$name." <".$email.">\r\n";
	$headers.="X-Mailer: PHP/".phpversion()."\r\n";
	$mess = '';
	foreach($message as $key => $value){
		$pos = strripos($key, 'wow-field');
		if ($pos === false) {
			$mess.= ' '.$value.'<p/>';
		}
		else {
			$mess.= '<b>'.$value.': </b>';
		}
	}
	$allmsg="<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'><title></title>
	<style>BODY {FONT-FAMILY: verdana,arial,helvetica; FONT-SIZE: 14px;}</style></head>
	<body>
	$mess
	</body></html>";
	$primsg = $thank;			
	
	mail("$myemail", "$mailtext", $allmsg, $headers);
	
	print "<script language='Javascript'>function reload() {jQuery('#wow-form-id-$id').toggle(); }; setTimeout('reload()', \"$timer\");</script>$primsg";			
?>