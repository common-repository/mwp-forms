<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php include ('include/data.php'); ?>
<form action="admin.php?page=<?php echo $pluginname;?>" method="post">
	<div class="wowcolom">	
		<div id="wow-leftcol">
			<input  placeholder="Name is used only for admin purposes" type='text' name='title' value="<?php echo $title; ?>" class="wow-title"/>
			
			<div class="tab-box ">
				<ul class="tab-nav">
					<li><a href="#t1"><span class="dashicons dashicons-feedback"></span> Form</a></li>
					<li><a href="#t2"><span class="dashicons dashicons-admin-appearance"></span> Style</a></li>
					<li><a href="#t3"><span class="dashicons dashicons-admin-generic"></span> Settings</a></li>					
				</ul>
				<div class="tab-panels wow-admin">
					<div id="t1" class="tab-content">
						
						<div id="sortable">
							<?php 
								if ($count_i == 0){; ?>
								
								<div class="items itembox items-<?php echo $i+1;?>">									
									<div class="item-title">
										<h3>Field <span class="icount"><?php echo $count_i+1;?></span></h3>
									</div>
									<div class="inside wow-admin" style="display: block;">	
										<div class="wow-admin-col">
											<div class="wow-admin-col-4">
												Title<span class="err">*</span>: show <input name="include_field_name[0]" type="checkbox" value="1" checked="checked"><br/>
												<input  placeholder="Title/Required" type='text' name="name_item[0]" value="" class="titltform"/>
											</div>
											<div class="wow-admin-col-4">
												Type: use to calculate <input type="checkbox" disabled="disabled"><br/>
												<select name="item_type[0]" onchange="changetype('0');">        
													<option value="input">Input</option>
													<option value="textarea">Textarea</option>
													<option value="select">Select</option>
													<option value="radio">Radio</option>
													<option value="checkbox" >Checkbox</option>					
												</select>
											</div>
											<div class="wow-admin-col-4">
												Field width <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
												<select disabled="disabled">
													<option>12/12</option>
												</select>
											</div>
											
										</div>
										<div id="block_input_0">
											<div class="wow-admin-col">
												
												<div class="wow-admin-col-4">
													Validation:<br/>
													<select name="input_validator[0]">        
														<option value="name">Name</option>
														<option value="email">Email</option>
														<option value="number">Number</option>
														<option value="text">Text</option>
													</select>
												</div>
												
												<div class="wow-admin-col-4">
													Placeholder:<br/>
													<input type='text' name="input_placeholder[0]" value="" />
												</div>							
												
												<div class="wow-admin-col-4">
													Mask <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
													<input type='text' disabled="disabled" />
												</div>
											</div>
											<div class="wow-admin-col">
												
												<div class="wow-admin-col-12">
													Required field:
													<input name="field_required[0]" type="checkbox" value="1" checked="checked">
												</div>
											</div>
										</div>
										<div id="block_noinput_0">
											<div class="wow-admin-col">
												
												<div class="wow-admin-col-4">Value:</div>
												
												<div class="wow-admin-col-4">Text:</div>
												
												<div class="wow-admin-col-3">Selected:</div>
												<div class="wow-admin-col-1"></div>
												
											</div>
											
											
											<div id="value_text_0">
												<div class="wow-admin-col">
													<div class="wow-admin-col-4">
														<input  placeholder="" type='text' name="list_value[0][0]" value="" />
													</div>
													<div class="wow-admin-col-4">
														<input  placeholder="" type='text' name="list_text[0][0]" value="" />
													</div>
													<div class="wow-admin-col-3">
														<input  placeholder="" type='checkbox' name="list_checkbox[0][0]" value="1" />
													</div>
													<div class="wow-admin-col-1 value_text_remove"></div>
												</div>
											</div>
											
											<div class="wow-admin-col">
												<div class="wow-admin-col-4">												
													<a href="javascript:void(0);" onclick="newlist(0);">Add new value</a>
												</div>
												<div class="wpcalc-admin-col-4" id="check_0">
													<?php if (empty($param['check_style'][0])){ $param['check_style'][0] = 'colom';} ?>
													<input name="param[check_style][0]" type="radio" value="colom" <?php if($param['check_style'][0]=='colom') { echo 'checked="checked"'; } ?>> Colom <input name="param[check_style][0]" type="radio" value="inline" <?php if($param['check_style'][0]=='inline') { echo 'checked="checked"'; } ?>> Inline
												</div>
											</div>
											
											
										</div>
										
										
										
										
										
									</div>
								</div>
								
							<?php } ?>
							
							
							
							<?php 
								if ($count_i > 0){	 
									for ($i = 0; $i < $count_i; $i++) { ?>
									
									<div class="items itembox items-<?php echo $i+1;?>">
										<div class="item-title">
											<h3>Field <span class="icount"><?php echo $i+1;?></span></h3>
										</div>
										<div class="inside wow-admin" style="display: block;">	
											<div class="wow-admin-col">
												<div class="wow-admin-col-4">
													Title<span class="err">*</span>: show <input name="include_field_name[<?php echo $i;?>]" type="checkbox" value="1" <?php if(!empty($include_field_name[$i])) { echo 'checked="checked"'; } ?> > <br/>
													<input  placeholder="Title/Required" type='text' name="name_item[<?php echo $i;?>]" value="<?php echo $name_item[$i]; ?>" class="titltform"/>
												</div>
												<div class="wow-admin-col-4">
													Type: use to calculate <input type="checkbox" disabled="disabled"><br/>
													<select name="item_type[<?php echo $i;?>]" onchange="changetype(<?php echo $i;?>);">        
														<option value="input" <?php if($item_type[$i]=='input') { echo 'selected="selected"'; } ?>>Input</option>
														<option value="textarea" <?php if($item_type[$i]=='textarea') { echo 'selected="selected"'; } ?>>Textarea</option>
														<option value="select" <?php if($item_type[$i]=='select') { echo 'selected="selected"'; } ?>>Select</option>
														<option value="radio" <?php if($item_type[$i]=='radio') { echo 'selected="selected"'; } ?>>Radio</option>
														<option value="checkbox" <?php if($item_type[$i]=='checkbox') { echo 'selected="selected"'; } ?>>Checkbox</option>					
													</select>
												</div>
												<div class="wow-admin-col-4">
													Field width <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
													<select disabled="disabled">
														<option>12/12</option>
													</select>
												</div>
											</div>
											<div id="block_input_<?php echo $i;?>">
												<div class="wow-admin-col" >
													<div class="wow-admin-col-4">
														Validation:<br/>
														<select name="input_validator[<?php echo $i;?>]"> 
															<?php $input_validator[$i] = !empty($input_validator[$i]) ? $input_validator[$i] : 'name';?>
															
															<option value="name" <?php if($input_validator[$i]=='name') { echo 'selected="selected"'; } ?>>Name</option>       
															<option value="email" <?php if($input_validator[$i]=='email') { echo 'selected="selected"'; } ?>>Email</option>
															<option value="number" <?php if($input_validator[$i]=='number') { echo 'selected="selected"'; } ?>>Number</option>
															<option value="text" <?php if($input_validator[$i]=='text') { echo 'selected="selected"'; } ?>>Text</option>
															
														</select>
													</div>
													<div class="wow-admin-col-4">
														Placeholder:<br/>
														<input type='text' name="input_placeholder[<?php echo $i;?>]" value="<?php echo $input_placeholder[$i]; ?>" />
													</div>
													
													<div class="wow-admin-col-4">
														Mask <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
														<input type='text' disabled="disabled" />
													</div>
												</div>
												<div class="wow-admin-col" >
													<div class="wow-admin-col-12">
														Required field:
														<input name="field_required[<?php echo $i;?>]" type="checkbox" value="1" <?php if(!empty($field_required[$i])) { echo 'checked="checked"'; } ?> >
													</div>
													
												</div>
											</div>
											<div id="block_noinput_<?php echo $i;?>">
												<div class="wow-admin-col" >
													<div class="wow-admin-col-4">Value:</div>
													<div class="wow-admin-col-4">Text:</div>
													<div class="wow-admin-col-3">Selected:</div>
													<div class="wow-admin-col-1"></div>
												</div>
												<div id="value_text_<?php echo $i;?>">
													<?php 
														$count_list = count($list_value[$i]);
														if ($count_list > 0) {
															for ($ii = 0; $ii < $count_list; $ii++) { ?>
															<div class="wow-admin-col">
																<div class="wow-admin-col-4">
																	<input type='text' name="list_value[<?php echo $i;?>][<?php echo $ii;?>]" value="<?php echo $list_value[$i][$ii]; ?>" />
																</div>
																<div class="wow-admin-col-4">
																	<input type='text' name="list_text[<?php echo $i;?>][<?php echo $ii;?>]" value="<?php echo $list_text[$i][$ii]; ?>" />
																</div>
																<div class="wow-admin-col-3">
																	<input type='checkbox' name="list_checkbox[<?php echo $i;?>][<?php echo $ii;?>]" value="1" <?php if(!empty($list_checkbox[$i][$ii])) { echo 'checked="checked"'; } ?>/>
																</div>
																<div class="wow-admin-col-1 value_text_remove"></div>
															</div>
															
															
														<?php }	} ?>
														
												</div>
												<div class="wow-admin-col" >
													<div class="wow-admin-col-4">
														<a href="javascript:void(0);" onclick="newlist(<?php echo $i;?>);">Add new value</a>
													</div>
													<div class="wpcalc-admin-col-4" id="check_<?php echo $i;?>">
														<?php if (empty($param['check_style'][$i])){ $param['check_style'][$i] = 'colom';} ?>
														<input name="param[check_style][<?php echo $i;?>]" type="radio" value="colom" <?php if($param['check_style'][$i]=='colom') { echo 'checked="checked"'; } ?>> Colom <input name="param[check_style][<?php echo $i;?>]" type="radio" value="inline" <?php if($param['check_style'][$i]=='inline') { echo 'checked="checked"'; } ?>> Inline
													</div>
												</div>
												
											</div>
										</div>
									</div>							
									
								<?php	} } ?>
						</div>
						<div class="submit-bottom">
							<input type="button" value="Add field" class="formsub fully-rounded" onclick="itemadd()"> <input type="button" class="formpreview fully-rounded" value="Delete last field" onclick="itemremove()">
						</div>
						
						<div class="itembox">
							<div class="item-title">
								<h3>ReCaptcha</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">	
									<div class="wow-admin-col-4">
										<label for="emailset5">Include reCaptcha</label> <input type="checkbox" disabled="disabled" > <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>
									</div>
									<div class="wow-admin-col-4 fieldform">										
									</div>
									<div class="wow-admin-col-4">
										Field width <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<select disabled="disabled">
											<option>12/12</option>
										</select>
									</div>	
								</div>
							</div>
						</div>
						<div class="itembox">
							<div class="item-title">
								<h3>Submit button</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">	
									<div class="wow-admin-col-4 fieldform">
										Button Text: hide button:<input type="checkbox" disabled="disabled" ><br/>
									<input type='text' placeholder="Send" name='field_button' value="<?php echo $field_button; ?>"/></div>
									
									<div class="wow-admin-col-4 fieldform">	
									</div>
									<div class="wow-admin-col-4">
										Field width <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<select disabled="disabled">
											<option>12/12</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
					
					<div id="t2" class="tab-content">
						<div class="itembox">
							<div class="item-title">
								<h3>Form Style</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">	
									<div class="wow-admin-col-4 fieldform">
										Width: <input name="param[form_width_par]" type="radio" value="px" <?php if($param['form_width_par']=='px') { echo 'checked="checked"'; } ?>>px 
										<input name="param[form_width_par]" type="radio" value="%" <?php if($param['form_width_par']=='%' || $param['form_width_par'] =='') { echo 'checked="checked"'; } ?>>%<br/>
										<input type='text' placeholder="100" name='param[form_width]' value="<?php if(!empty($param['form_width'])) echo $param['form_width']; ?>"/> <br/> 
										
									</div>
									<div class="wow-admin-col-4 fieldform">
										Alignment <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>: <br/>
										<select disabled="disabled">											
											<option>center</option> 											
										</select>
									</div>							
									<div class="wow-admin-col-4 fieldform">
										Margin top&bottom (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>										
										<input type='text' placeholder="10" disabled="disabled"/>
									</div>
								</div>
								<div class="wow-admin-col">	
									<div class="wow-admin-col-4 fieldform">
										Margin left&right (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="10" disabled="disabled"/> 
									</div>
									<div class="wow-admin-col-4 fieldform">
										Padding top&bottom (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a><br/>
										<input type='text' placeholder="10" disabled="disabled"/> 
									</div>
									<div class="wow-admin-col-4 fieldform">
										Padding left&right (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="10" disabled="disabled"/>
									</div>
								</div>
								<div class="wow-admin-col">
									<div class="wow-admin-col-4 fieldform">
										Border (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="0" disabled="disabled"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Border radius (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="0" disabled="disabled"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Background image <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="link" disabled="disabled"/>										
									</div>
								</div>
								<div class="wow-admin-col">
									<div class="wow-admin-col-4">
										Font size (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="14" disabled="disabled"/>										
									</div>
									<div class="wow-admin-col-4">
										Font color:<br/> 
										<input type='text' placeholder="#000000" class="wp-color-picker-field" data-alpha="true" name='param[font_color]' value="<?php if(empty($param['font_color'])){echo "#000000";}else{echo $param['font_color'];}?>"/>
									</div>
									<div class="wow-admin-col-4">
										Background color:<br/> 
										<input type='text' placeholder="#ffffff" class="wp-color-picker-field" data-alpha="true" name='param[form_background_color]' value="<?php if(empty($param['form_background_color'])){echo "#ffffff";}else{echo $param['form_background_color'];}?>"/>
									</div>									
								</div>
								<div class="wow-admin-col">
									<div class="wow-admin-col-4">
										Border color:<br/> 
										<input type='text' placeholder="#ffffff" class="wp-color-picker-field" data-alpha="true" name='param[form_border_color]' value="<?php if(empty($param['form_border_color'])){echo "#ffffff";}else{echo $param['form_border_color'];}?>"/>
									</div>
									<div class="wow-admin-col-4"></div>
									<div class="wow-admin-col-4"></div>
								</div>
							</div>
						</div>
						<div class="itembox">
							<div class="item-title">
								<h3>Title</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">	
									<div class="wow-admin-col-4">
										Alignment <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>: <br/>
										<select disabled="disabled">
											<option>left</option>											
										</select>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Font size (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="18" disabled="disabled"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Color:<br/> <input type='text' placeholder="#000" class="wp-color-picker-field" data-alpha="true" name='param[font_color_label]' value="<?php if(empty($param['font_color_label'])){echo "#000";}else{echo $param['font_color_label'];}?>"/>
									</div>	
								</div>
							</div>
						</div>
						<div class="itembox">
							<div class="item-title">
								<h3>Field Style</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">
									<div class="wow-admin-col-4 fieldform">
										Height <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>: <input type="radio" checked="checked" disabled="disabled">auto 
										<input type="radio" disabled="disabled">px 										
										<input type='text' placeholder="auto" disabled="disabled"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Padding top&bottom (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a><br/>
										<input type='text' placeholder="5" disabled="disabled"/>										
									</div>	
									<div class="wow-admin-col-4"></div>	
								</div>
								<div class="wow-admin-col">							
									<div class="wow-admin-col-4 fieldform">
										Border (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="1" disabled="disabled"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Border radius (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="0" disabled="disabled"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Font size (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>: <br/>
										<input type='text' placeholder="14" disabled="disabled"/>
									</div>					
								</div>
								<div class="wow-admin-col">	
									<div class="wow-admin-col-4">
										Text alignment <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>: <br/>
										<select disabled="disabled">
											<option>left</option>											
										</select>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Input height (px): <br/>
										<input type='text' placeholder="36" name='param[height_input]' value="<?php echo $param['height_input']; ?>"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Textarea height (px): <br/>
										<input type='text' placeholder="72" name='param[height_textarea]' value="<?php echo $param['height_textarea']; ?>"/>
									</div>
								</div>
								<div class="wow-admin-col">
									<div class="wow-admin-col-4 fieldform">
										Text color:<br/> <input type='text' placeholder="#555555" class="wp-color-picker-field" data-alpha="true" name='param[field_text_color]' value="<?php if(empty($param['field_text_color'])){echo "#555555";}else{echo $param['field_text_color'];}?>"/>	
									</div>
									<div class="wow-admin-col-4 fieldform">
										Placeholder text color:<br/> <input type='text' placeholder="#777777" class="wp-color-picker-field" data-alpha="true" name='param[field_placeholder_color]' value="<?php if(empty($param['field_placeholder_color'])){echo "#777777";}else{echo $param['field_placeholder_color'];}?>"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Border color:<br/> <input type='text' placeholder="#eeeeee" class="wp-color-picker-field" data-alpha="true" name='param[field_border_color]' value="<?php if(empty($param['field_border_color'])){echo "#eeeeee";}else{echo $param['field_border_color'];}?>"/>
									</div>
								</div>
								<div class="wow-admin-col">
									<div class="wow-admin-col-4 fieldform">
										Background color:<br/> <input type='text' placeholder="#fcfcfc" class="wp-color-picker-field" data-alpha="true" name='param[field_background_color]' value="<?php if(empty($param['field_background_color'])){echo "#fcfcfc";}else{echo $param['field_background_color'];}?>"/>
									</div>
									<div class="wow-admin-col-4"></div>
									<div class="wow-admin-col-4"></div>
								</div>	
							</div>
						</div>
						<div class="itembox">
							<div class="item-title">
								<h3>Button Style</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">								
									<div class="wow-admin-col-4 fieldform">
										Alignment: <br/>
										<select name='param[button_position]'>
											<option value="left" <?php if($param['button_position']=='left') { echo 'selected="selected"'; } ?>>left</option>
											<option value="center" <?php if($param['button_position']=='center') { echo 'selected="selected"'; } ?>>center</option>	
											<option value="right" <?php if($param['button_position']=='right') { echo 'selected="selected"'; } ?>>right</option>
										</select>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Width <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
										<input type='text' placeholder="auto" disabled="disabled"/>
										<input type="radio" checked="checked" disabled="disabled">auto 										
										<input type="radio" disabled="disabled">px 
										<input type="radio" disabled="disabled">%
										
									</div>
									<div class="wow-admin-col-4 fieldform">
										Text size (px) <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>: <br/>
										<input type='text' placeholder="16" disabled="disabled"/>
									</div>
								</div>
								<div class="wow-admin-col">								
									<div class="wow-admin-col-4 fieldform">
										Text color:<br/> 
										<input type='text' placeholder="#ffffff" class="wp-color-picker-field" data-alpha="true" name='param[button_text_color]' value="<?php if(empty($param['button_text_color'])){echo "#ffffff";}else{echo $param['button_text_color'];}?>"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Background color: <br/>
										<input type='text' placeholder="#e95645" class="wp-color-picker-field" data-alpha="true" name='param[button_background_color]' value="<?php if(empty($param['button_background_color'])){echo "#e95645";}else{echo $param['button_background_color'];}?>"/>
									</div>
									<div class="wow-admin-col-4 fieldform">
										Background hover color:<br/> 
										<input type='text' placeholder="#d45041" class="wp-color-picker-field" data-alpha="true" name='param[button_hover_color]' value="<?php if(empty($param['button_hover_color'])){echo "#d45041";}else{echo $param['button_hover_color'];}?>"/>
									</div>	
								</div>
							</div>
						</div>
						<div class="itembox">
							<div class="item-title">
								<h3>Mobile Style</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">
									<div class="wow-admin-col-4">
										Screens less than (px):<br/>
										<input type='text' placeholder="480" name='param[screen_size]' value="<?php if(!empty($param['screen_size'])) echo $param['screen_size']; ?>"/>
									</div>
									<div class="wow-admin-col-4">
										Form width: <input name="param[mobile_width_par]" type="radio" value="px" <?php if($param['mobile_width_par']=='px') { echo 'checked="checked"'; } ?>>px
										<input name="param[mobile_width_par]" type="radio" value="pr" <?php if($param['mobile_width_par']=='pr') { echo 'checked="checked"'; } ?>>%<br/>
										<input type='text' placeholder="85" name='param[mobile_width]' value="<?php if(!empty($param['mobile_width'])) echo $param['mobile_width']; ?>"/> 
										
									</div>	
									<div class="wow-admin-col-4"></div>
								</div>
							</div>
						</div>
					</div>
					
					<div id="t3" class="tab-content">
						<div class="itembox">
							<div class="item-title">
								<h3>Email settings</h3>									
							</div>
							
							<div class="wow-admin-col">
								<div class="wow-admin-col-4 fieldform">
									<input type="checkbox" disabled="disabled" checked="checked"> Send mail to admin  
								</div>	
								<div class="wow-admin-col-4">
									<input type="checkbox" disabled="disabled"> <label for="emailset2">Send mail to user <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a></label>
								</div>	
								<div class="wow-admin-col-4">									
									<input type="checkbox" disabled="disabled"> <label for="emailset3">Add email to the list <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a></label> 
								</div>
								
							</div>
							
							<div class="wow-admin-col">
								<div class="wow-admin-col-4">
									<input type="checkbox" disabled="disabled"> <label for="emailset4">Integration <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a></label>
								</div>		
								<div class="wow-admin-col-4">
									<?php if (class_exists('EMS_Integration') === true) { ;?>
										<input name="param[emsi]" type="checkbox" value="1" <?php if(!empty($param['emsi'])) { echo 'checked="checked"'; } ?> id="emsi"> <label for="emsi"> EMS Integration</label>									
										<?php } else { ;?>
										<input type="checkbox" disabled > <a href="https://wordpress.org/plugins/email-marketing-services-integration/" target="_blank">EMS Integration</a> <br/><i><small>(not installed)</small></i>										
									<?php } ;?>									
									
								</div>	
								<div class="wow-admin-col-4"></div>	
							</div>
							
						</div>
						
						<div class="itembox sendtoadmin">
							<div class="item-title">
								<h3>Email to admin</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">
									<div class="wow-admin-col-4">
										Send to:<br/>
										<input type='text' placeholder="<?php echo get_option('admin_email'); ?>" name='mail_send_admin_mail' value="<?php echo $mail_send_admin_mail; ?>"/>
									</div>
									<div class="wow-admin-col-4">
										Mail subject:<br/>
										<input type='text' placeholder="Letter from the site" name='mail_send_mail_subject' value="<?php echo $mail_send_mail_subject; ?>"/>
									</div>
									<div class="wow-admin-col-4"></div>	
								</div>
							</div>
						</div>						
						
						<div class="itembox">	
							<div class="item-title">
								<h3>Error Notice</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">								
									<div class="wow-admin-col-12">										
										<?php echo wp_editor(stripslashes($param['error_notice']), 'error_notice', $errorsetings); ?>
									</div>
								</div>
							</div>
						</div>						
						
						<div class="itembox">	
							<div class="item-title">
								<h3>After sending</h3>									
							</div>
							<div class="inside" style="display: block;">
								<div class="wow-admin-col">
									<div class="wow-admin-col-6">
										<input type="radio" disabled="disabled" checked="checked"> <label for="confirmationtext">Show confirmation text</label>
									</div>
									<div class="wow-admin-col-6">
										<input type="radio" disabled="disabled"> <label for="redirect">Redirect</label> <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a> <br/>
									</div>
								</div>
								<div class="wow-admin-col confirmationtext wow-wrap">									
									<div class="wow-admin-col-6">
										Close confirmation text after sending (sec): <input type="checkbox" checked="checked"disabled="disabled" > <br/>
										<span id="closeconfirmation"><input type='text' placeholder="3" name='mail_send_send_timer' value="<?php echo $mail_send_send_timer; ?>"/> </span>
									</div>										
									
									
									<div class="wow-admin-col-12">
										<h4>Confirmation text:</h4>
										<?php echo wp_editor(stripslashes($param['mail_send_text']), 'mail_send_text', $confsettings); ?>										
									</div>									
								</div>
								
							</div>
						</div>
						
						
					</div>	
				</div>
			</div>
		</div>
		
		<div id="wow-rightcol">
			<div class="wowbox">
				<h3>Publish</h3>
				<div class="wow-admin" style="display: block;">
					<div class="wow-admin-col">
						<div class="wow-admin-col-6">
							<?php if ($id != ""){ echo '<p class="wowdel"><a href="admin.php?page='.$pluginname.'&info=del&did='.$id.'">Delete</a></p>';}; ?>
						</div>
						<div class="wow-admin-col-6 right">
							<p/>
							<input name="submit" id="submit" class="button button-primary" value="<?php echo $btn; ?>" type="submit">
						</div>
					</div>
				</div>
			</div>
			<div class="wowbox">
				<h3>Display</h3>
				<div class="inside wow-admin" style="display: block;">
					<div class="wow-admin-col wow-wrap">
						<div class="wow-admin-col-12">
							Show for users: <br/>
							<input type="radio" checked="checked"> All users <br />
							<input type="radio" disabled="disabled"> If a user logged in <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a><br />
							<input type="radio" disabled="disabled"> If user not logged <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a> 
						</div>	
						
						<div class="wow-admin-col-12">
							<input type="checkbox" disabled="disabled"> Don’t show on screens less than (px)<a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>							
						</div>
						<div class="wow-admin-col-12">
							<input type="checkbox" disabled="disabled"> Depending on the language <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>
						</div>
						<div class="wow-admin-col-12">
							Show form  <a href='admin.php?page=<?php echo $pluginname;?>&tool=pro' title="Only Pro version"><span class="dashicons dashicons-lock" style="color:#37c781;"></span></a>:<br/>
							<input type="checkbox" disabled="disabled"> Show form after post content							
						</div>
						<div class="wow-admin-col-12">
							<b>[Wow-Forms  id=<?php echo $id; ?>]</b>
						</div>
					</div>
				</div>
			</div>
			<div class="wowbox">
				<center><img src="<?php echo plugin_dir_url( __FILE__ ); ?>thankyou.png" alt=""  /></center>
				<hr/>				
				<div class="wow-admin wow-plugins">
					<p>We will be very grateful if you <a href="https://wordpress.org/plugins/mwp-forms/" target="_blank"><b>leave a review about the plugin</b></a>.</p>
					<p>If you have suggestions on how to improve the plugin or create a new plugin, write to us via the <a href="admin.php?page=<?php echo $pluginname;?>&tool=support" target="_blank"><b>support form</b></a></p>					
					<p>We really appreciate your reviews and suggestions for improving the plugin.</p>
					<p>					
					<b><em>Thank you for choosing the plugin from Wow-Company! </em></b></p>
					<em><b>Best Regards</b>,<br/>						
						<a href="https://wow-estore.com/" target="_blank">Wow-Company Team</a><br/>
						Dmytro Lobov<br/>
						<a href="mailto:support@wow-company.com">support@wow-company.com</a>
					</em>
					
				</div>
			</div>
			
		</div>
		
	</div>
	
	<input type="hidden" name="param[time]" value="<?php echo time(); ?>" />
	<input type="hidden" name="add" value="<?php echo $hidval; ?>" />    
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<input type="hidden" name="data" value="<?php echo $data; ?>" />
	<input type="hidden" name="page" value="<?php echo $pluginname;?>" />	
	<input type="hidden" name="plugdir" value="<?php echo $pluginname;?>" />		
	<?php wp_nonce_field('wow_plugin_action','wow_plugin_nonce_field'); ?>	
</form>
