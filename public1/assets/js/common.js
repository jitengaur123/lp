function errorHtml(errors){
	if($(document).find('.alert').length) $('.alert').remove();
	if(errors){

		var errorHTML = '<div class="alert alert-danger alert-dismissable"><button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>';
		errorHTML +='<ul>';
		errorHTML += errors
		errorHTML +='</ul></div>';
		return errorHTML;	
	}
	return false;	
}