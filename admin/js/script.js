/*! ========= INFORMATION ============================
	- author:    Wow-Company
	- url:       https://wow-estore.com
	- email:     support@wow-company.com
==================================================== */

'use strict';

jQuery(document).ready(function($) {
  //* Vertical table
  $('.tab-nav li:first').addClass('select');
  $('.tab-panels>div').hide().filter(':first').show();
  $('.tab-nav a').on('click', function() {
    $('.tab-panels>div').hide().filter(this.hash).show();
    $('.tab-nav li').removeClass('select');
    $(this).parent().addClass('select');
    return false;
  });
  //* Include colorpicker
  $('.wp-color-picker-field').wpColorPicker();
  $('form').on('submit', function() {
    var counttitle = jQuery('.titltform').length;
    error = 0;
    var i;
    for (i = 0; i <= counttitle; i++) {
      var title = jQuery('.titltform:eq(' + i + ')').val();
      if (title != '') {
        jQuery('.titltform:eq(' + i + ')').removeAttr('style');
        jQuery('.fieldtitle' + i).remove();
      }
      if (title == '') {
        jQuery('body,html').animate({scrollTop: jQuery('.titltform:eq(' + i + ')').offset().top - 100}, 500);
        jQuery('.titltform:eq(' + i + ')').css({'border-color': '#e52e14'});
        jQuery('.titltform:eq(' + i + ')').focus();
        $('.titltform:eq(' + i + ')').after('<br><span class=\'err fieldtitle' + i + '\'>Please Enter Title</span>');
        error = 1;
      }
    }
    if (error == 0) {
      return true;
    } else {
      return false;
    }
  });
  var icount = jQuery('.icount:last').html();
  var i = 0;
  while (i <= icount) {
    changetype(i);
    i++;
  }
  jQuery('body').on('click', '.value_text_remove', function() {
    $(this).closest('.wow-admin-col').remove();
  });
});

function changetype(count) {
  var type = jQuery('[name="item_type[' + count + ']"]').val();
  if (type === 'input') {
    jQuery('#block_input_' + count).css('display', 'block');
    jQuery('#block_noinput_' + count).css('display', 'none');
    jQuery('[name="input_validator[' + count + ']"]').removeAttr('disabled');
    jQuery('#check_' + count).css('display', 'none');
    return;
  } else if (type === 'textarea') {
    jQuery('#block_input_' + count).css('display', 'block');
    jQuery('#block_noinput_' + count).css('display', 'none');
    jQuery('[name="input_validator[' + count + ']"]').attr('disabled', 'disabled');
    jQuery('#check_' + count).css('display', 'none');
    return;
  } else if (type === 'select') {
    jQuery('#block_input_' + count).css('display', 'none');
    jQuery('#block_noinput_' + count).css('display', 'block');
    jQuery('#check_' + count).css('display', 'none');
  } else if (type == 'radio' || type == 'checkbox') {
    jQuery('#block_input_' + count).css('display', 'none');
    jQuery('#block_noinput_' + count).css('display', 'block');
    jQuery('#check_' + count).css('display', '');
  }
}

function newlist(count) {
  var type = jQuery('[name="item_type[' + count + ']').val();
  jQuery('#value_text_' + count).
      append('<div class="wow-admin-col"><div class="wow-admin-col-4"><input type="text" name="list_value[' + count +
          '][]" value="" /> </div> <div class="wow-admin-col-4"><input type="text" name="list_text[' + count +
          '][]" value="" /></div> <div class="wow-admin-col-3"><input type="checkbox" name="list_checkbox[' + count +
          '][]" value="1" /></div> <div class="wow-admin-col-1 value_text_remove"></div></div>');
}

function itemadd() {
  var icount = jQuery('.icount:last').html();
  var nexticount = icount * 1 + 1;
  jQuery('#sortable').
      append('<div class="items itembox items-' + nexticount +
          '"><div class="item-title"> <h3>Field <span class="icount">' + nexticount +
          '</span></h3></div> <div class="inside wow-admin" style="display: block;"> <div class="wow-admin-col"> <div class="wow-admin-col-4">Title<span class="err">*</span>: show <input name="include_field_name[' +
          icount +
          ']" type="checkbox" value="1"> <br/> <input  placeholder="Title/Required" type="text" name="name_item[' +
          icount +
          ']" value="" class="titltform"/> </div> <div class="wow-admin-col-4">Type: use to calculate <input type="checkbox" disabled="disabled"><br/> <select name="item_type[' +
          icount + ']" onchange="changetype(' + icount +
          ');"> <option value="input">Input</option><option value="textarea">Textarea</option><option value="select">Select</option> <option value="radio">Radio</option> <option value="checkbox">Checkbox</option> </select> </div> <div class="wow-admin-col-4"> Field width <span class="dashicons dashicons-lock" style="color:#37c781;"></span>:<br/> <select disabled="disabled"> <option>12/12</option> </select> </div> </div> <div id="block_input_' +
          icount +
          '"> <div class="wow-admin-col"> <div class="wow-admin-col-4">Validation:<br/> <select name="input_validator[' +
          icount +
          ']"><option value="name">Name</option>  <option value="email">Email</option> <option value="number">Number</option> <option value="text">Text</option> </select> </div> <div class="wow-admin-col-4">Placeholder:<br/> <input type="text" name="input_placeholder[' +
          icount +
          ']" value="" /> </div>  <div class="wow-admin-col-4"> Mask <span class="dashicons dashicons-lock" style="color:#37c781;"></span>:<br/> <input type="text" disabled="disabled" /> </div> </div> <div class="wow-admin-col"><div class="wow-admin-col-12">Required field: <input name="field_required[' +
          icount + ']" type="checkbox" value="1"> </div> </div> </div> <div id="block_noinput_' + icount +
          '"> <div class="wow-admin-col" > <div class="wow-admin-col-4">Value:</div> <div class="wow-admin-col-4">Text:</div> <div class="wow-admin-col-3">Selected:</div><div class="wow-admin-col-1"></div></div>  <div id="value_text_' +
          icount + '"> <div class="wow-admin-col"> <div class="wow-admin-col-4"> <input type="text" name="list_value[' +
          icount + '][]" value="" /> </div> <div class="wow-admin-col-4"> <input type="text" name="list_text[' +
          icount + '][]" value="" /> </div> <div class="wow-admin-col-3"> <input type="checkbox" name="list_checkbox[' +
          icount +
          '][]" value="1"/> </div> <div class="wow-admin-col-1 value_text_remove"></div> </div> </div> <div class="wow-admin-col"><div class="wow-admin-col-4"><a href="javascript:void(0);" onclick="newlist(' +
          icount + ');">Add new value</a></div><div class="wpcalc-admin-col-4" id="check_' + icount +
          '"> <input name="param[check_style][' + icount +
          ']" type="radio" value="colom" checked="checked"> Colom <input name="param[check_style][' + icount +
          ']" type="radio" value="inline"> Inline </div> </div> </div> </div> </div>');
  changetype(icount);
}

function itemremove() {
  var icount = jQuery('.icount:last').html();
  jQuery('.items-' + icount).remove();
}