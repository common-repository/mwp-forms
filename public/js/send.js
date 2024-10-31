/* ========= INFORMATION ============================
	- document:  Wow Forms - Create email opt-ins forms & other types of forms!
	- author:    Wow-Company
	- profile:   https://wow-estore.com/author/admin/?author_downloads=true
	- version:   3.0
	- email:     wow@wow-company.com
==================================================== */
jQuery(document).ready(function($) {	   
	$('.wow-forms-number').on('input', function(){
		this.value = this.value.replace(/^\.|[^\d\.]|\.(?=.*\.)|^0+(?=\d)/g, '');
	});	
});