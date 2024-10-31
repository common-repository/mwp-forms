function wowformsend<?php echo $val->id;?>() {
	var buttid = 'wowformconfirm-<?php echo $val->id;?>';	
	var result = 'wowform-result-<?php echo $val->id;?>';
	var errorcontent = '<?php echo $param['error_notice'];?>';
	var countrequired = jQuery("#" + buttid +" .wowrequired").length;
	error = 0;	
	if (countrequired > 0 ){		
		var i;			
		for (i = 0; i < countrequired; i++) {
			var wowrequired = jQuery('#'+buttid+' .wowrequired:eq('+i+')').val();
			if (wowrequired != "" && !jQuery('#'+buttid+' .wowrequired:eq('+i+')').hasClass("wow-forms-email")){
				jQuery('#'+buttid+' .wowrequired:eq('+i+')').removeAttr('style');					
			}
			if (wowrequired != "" && jQuery('#'+buttid+' .wowrequired:eq('+i+')').hasClass("wow-forms-email")){
				if(wowrequired != ''){						
					var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
					if(pattern.test(wowrequired)){
						jQuery('#'+buttid+' .wowrequired:eq('+i+')').removeAttr('style');							
					}
					else {
						jQuery('#'+buttid+' .wowrequired:eq('+i+')').css({"border-color": '#ff0000'});
						jQuery('#'+buttid+' .wowrequired:eq('+i+')').focus();
						error=1;
					} 
				}					
			}
			if (wowrequired == ""){					
				jQuery('#'+buttid+' .wowrequired:eq('+i+')').css({"border-color": '#ff0000'});
				jQuery('#'+buttid+' .wowrequired:eq('+i+')').focus();
				error=1;
			}
		}
	}
	if (error ==1){		 
		jQuery('#'+result).html(errorcontent);
		return false;
	}
	if (error ==0){	 
		var arrkey = [];
		var arrval = [];
		jQuery("#wow-form-id-<?php echo $val->id;?>").find('input[type=text], input[type=hidden], input[type=checkbox]:checked, input[type=radio]:checked , textarea, select').each( function(){
			var tmp = jQuery(this).attr("name");
			arrkey.push(tmp);
			arrval.push(this.value);
		});
		var recaptcha =  jQuery('#'+buttid+' .g-recaptcha-response').val();						  
		var data = {
			'action': 'send_wow_form',
			arrkey:arrkey,
			arrval:arrval,			 			  
			wowformid:<?php echo $val->id;?>,
			recaptcha:recaptcha,
		};			  
		jQuery.post(send_wow_form.ajaxurl, data, function(msg) {		
			jQuery('#'+result).html(msg);
		});
	}
}