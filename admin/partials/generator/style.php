/* ========= INFORMATION ============================
	- document:  Wow Forms - Create email opt-ins forms & other types of forms!
	- author:    Wow-Company
	- profile:   https://wow-estore.com/author/admin/?author_downloads=true
	- version:   3.0
	- email:     wow@wow-company.com
==================================================== */
#wow-form-parent-<?php echo $val->id;?> {
	width: <?php if(empty($param['form_width'])){ echo "100"; } else{ echo $param['form_width'];} ?><?php if(empty($param['form_width_par']) || $param['form_width_par'] == "%"){echo "%"; } else{ echo "px";} ?>;
	margin:0 auto;	
}
#wow-form-id-<?php echo $val->id;?> { 	
	font-size: 14px !important;
	color: <?php if(empty($param['font_color'])){echo "#000000";}else{echo $param['font_color'];}?>;
	padding: 10px;
	background: <?php if($param['form_background_color'] == ""){echo "#eeeeee";}else{echo $param['form_background_color'];}?>; 
	margin: 10px;
	border-radius: 0;
	border: 0px solid #ffffff;	 
	overflow: auto
}
#wow-form-id-<?php echo $val->id;?> .title{
	font-size: 18px;
	color: <?php if($param['font_color_label'] == ""){echo "#000";}else{echo $param['font_color_label'];}?>;
	display:block;
	text-align:left;
}
#wow-form-id-<?php echo $val->id;?> input[type=button]{
	display: inline-block;
	color: <?php if($param['button_text_color'] == ""){echo "#ffffff";}else{echo $param['button_text_color'];}?>; 
	border-radius: none; 
	-moz-border-radius: none;
	-o-border-radius: none;
	-webkit-border-radius: none;
	border: none; 
	background: <?php if($param['button_background_color']  == ""){echo "#e95645";}else{echo $param['button_background_color'];}?>;
	width: auto;
	height:<?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px;
	line-height: <?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px;
	text-decoration: none;
	font-size: 16px;	
	padding:0 20px;
}
#wow-form-id-<?php echo $val->id;?> input[type=button]:hover { 
	cursor: pointer; 
	background: <?php if($param['button_hover_color']  == ""){echo "#d45041";}else{echo $param['button_hover_color'];}?>; 
}
#wow-form-id-<?php echo $val->id;?> input[type=text],#wow-form-id-<?php echo $val->id;?> textarea, #wow-form-id-<?php echo $val->id;?> select{ 
	background: <?php if($param['field_background_color']  == ""){echo "#fcfcfc";}else{echo $param['field_background_color'];}?>; 
	border: 1px solid <?php if(empty($param['field_border_color'])){echo "#cecece";}else{echo $param['field_border_color'];}?>; 	 
	display: block; 
	font-size: 14px; 
	color: <?php if($param['field_text_color']  == ""){echo "#555555";}else{echo $param['field_text_color'];}?>; 
	border-radius: none; 	
	height:<?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px;
	line-height: <?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px;
	max-width: none; 
	width: 100%; 
	-moz-box-sizing: border-box; 
	box-sizing: border-box;	
	text-align:left;
}
#wow-form-id-<?php echo $val->id;?> select{
	padding-left:6px;
}
#wow-form-id-<?php echo $val->id;?> textarea{
	height:<?php if($param['height_textarea']  == ""){echo "72";}else{echo $param['height_textarea'];}?>px; 	
}
#wow-form-id-<?php echo $val->id;?> input[type=text], #wow-form-id-<?php echo $val->id;?> select{
	height:<?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px;
	line-height: <?php if($param['height_input']  == ""){echo "36";}else{echo $param['height_input'];}?>px; 
}
#wow-form-id-<?php echo $val->id;?> input[type=text]::-webkit-input-placeholder,#wow-form-id-<?php echo $val->id;?> textarea::-webkit-input-placeholder {
	color: <?php if($param['field_placeholder_color']  == ""){echo "#777777";}else{echo $param['field_placeholder_color'];}?>;
}
#wow-form-id-<?php echo $val->id;?> input[type=text]:-moz-placeholder,#wow-form-id-<?php echo $val->id;?> textarea:-moz-placeholder { /* Firefox 18- */
	color: <?php if($param['field_placeholder_color']  == ""){echo "#777777";}else{echo $param['field_placeholder_color'];}?>;
}
#wow-form-id-<?php echo $val->id;?> input[type=text]::-moz-placeholder,#wow-form-id-<?php echo $val->id;?> textarea::-moz-placeholder {  /* Firefox 19+ */
	color: <?php if($param['field_placeholder_color']  == ""){echo "#777777";}else{echo $param['field_placeholder_color'];}?>;
}
#wow-form-id-<?php echo $val->id;?> input[type=text]:-ms-input-placeholder,.#wow-form-id-<?php echo $val->id;?> textarea:-ms-input-placeholder {
	color: <?php if($param['field_placeholder_color']  == ""){echo "#777777";}else{echo $param['field_placeholder_color'];}?>;
}
#wow-form-id-<?php echo $val->id;?> input[type="checkbox"], #wow-form-id-<?php echo $val->id;?> input[type="radio"] {
	vertical-align: middle;
}
#wow-form-id-<?php echo $val->id;?> .wow-col {	
	position:relative;
	width: 100%;
	float: left;	
	min-height: 1px;	
	white-space: normal;
	}  
#wow-form-id-<?php echo $val->id;?> .wow-col-12 {
	float: left;
	white-space: normal;
	display: inline-block;
	vertical-align: middle;	
	box-sizing: initial;
	padding: 5px 1%;
	height: auto;
	}    
#wow-form-id-<?php echo $val->id;?> .wow-col-12 {width: 98%;}
<?php if(!empty($param['recaptcha'])){ ?>
.g-recaptcha{
transform:scale(<?php if(empty($param['scale'])){echo "0.77";} else {echo $param['scale'];} ?>);
-webkit-transform:scale(<?php if(empty($param['scale'])){echo "0.77";} else {echo $param['scale'];} ?>);
transform-origin:0 0;
-webkit-transform-origin:0 0;
}
<?php } ?>
@media only screen and (max-width: <?php if(empty($param['screen_size'])){echo "480";}else{echo $param['screen_size'];}?>px){
	#wow-form-parent-<?php echo $val->id;?> {
		width: <?php if(empty($param['mobile_width'])){echo "85"; } else{ echo $param['mobile_width'];} ?><?php if($param['mobile_width_par']  == "pr"){echo "%"; } else{ echo "px";} ?>;		
	}
}