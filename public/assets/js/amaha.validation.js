var errorLabelContainer = ".validationErrors";
$(function(){
	userValidation();
	clientValidation();
	worksiteValidation();
	magnetBoardValidation();
	workReportValidation();
});


function workReportValidation(){
	
	$("#workReportForm, #workreportUpdateForm").validate({
		rules: workReportValidateRule(),
		/*errorLabelContainer: errorLabelContainer*/
	});
}

function workReportValidateRule(){
	var rules = {
		started_at: {
			required: true
		},
		client: {
			required: true
		},
		site: {
			required: true
		}
	};
	return rules;
}


function magnetBoardValidation(){
	
	$("#magnetForm, #magnetUpdateForm").validate({
		rules: magnetBoardValidateRule(),
		/*errorLabelContainer: errorLabelContainer*/
	});
}

function magnetBoardValidateRule(){
	var rules = {
		started_at: {
			required: true
		},
		client_id: {
			required: true
		},
		worksite_id: {
			required: true
		},
		"users[]":{
			required: true
		}
	};
	return rules;
}

function worksiteValidation(){
	
	$("#worksiteForm, #editWorksite").validate({
		rules: worksiteValidateRule(),
		/*errorLabelContainer: errorLabelContainer*/
	});
}

function worksiteValidateRule(){
	var rules = {
		started_at: {
			required: true
		},
		client_id: {
			required: true
		},
		job_name: {
			required: true
		},
		description: {
			required: true
		},
		address: {
			required: true
		},
		city: {
			required: true
		},
		state:{
			required: true
		},
		postal_code:{
			required: true
		},
		country:{
			required: true
		},
		labour_rate:{
			required: true,
			number:true
		}
	};
	return rules;
}

function clientValidation(){
	
	$("#clientForm, #editClient").validate({
		rules: clientValidateRule(),
		/*errorLabelContainer: errorLabelContainer*/
	});
}

function clientValidateRule(){
	var rules = {
		first_name: {
			required: true
		},
		last_name: {
			required: true
		},
		company_name: {
			required: true
		},
		phone_office: {
			required: true,
			phoneUS: true
		},
		mobile1: {
			required: true,
			phoneUS: true
		},
		mobile2: {
			phoneUS: true
		},
		email: {
			required: true,
			email:true
		},
		password: {
			required: true
		},
		fax:{
			required: true,
			number: true
		},
		address:{
			required: true
		},
		city:{
			required: true	
		},
		state:{
			required: true
		},
		postal_code:{
			required: true
		},
		country:{
			required: true
		}
	};
	return rules;
}


function userValidation(){
	
	$("#addUser").validate({
		rules: userValidateRule(),
		/*errorLabelContainer: errorLabelContainer*/
	});

	$("#editProfile").validate({
		rules: userUpdateValidateRule(),
		/*errorLabelContainer: errorLabelContainer*/
	});

}

function userUpdateValidateRule(){
	var rules = {
		first_name: {
			required: true
		},
		last_name: {
			required: true
		},
		email: {
			required: true,
			email: true
		},
		cnf_password: {
			required: {
		        depends: function(element){
		            return $("#password").val() != ""
		        }
		    },
			equalTo: "#password",
		},
		emergency: {
			required: true,
			phoneUS: true
		},
		dob:{
			required: true
		},
		address:{
			required: true
		},
		locality:{
			required: true
		},
		state:{
			required: true
		},
		postal_code:{
			required: true,
			number: true
		},
		country:{
			required: true
		},
		phone_number:{
			required: true,
			phoneUS: true
		},
		mobile_number:{
			required: true,
			phoneUS: true
		},
		race:{
			required: true
		},
		spouse_name:{
			required: true
		},
		bio:{
			required: true
		}
	};
	return rules;
}

function userValidateRule(){
	var rules = {
		first_name: {
			required: true
		},
		last_name: {
			required: true
		},
		email: {
			required: true,
			email: true
		},
		user_name: {
			required: true
		},
		password: {
			required: true,

		},
		password_confirmation: {
			required: true,
			equalTo: "#password",
		},
		role: {
			required: true
		},
		parent_id:{
			required: true
		}
	};
	return rules;
}

$(document).ready(function(){
	jQuery.validator.addMethod("cents", function(value, element) {
        return this.optional(element) || /^\d{0,12}(\.\d{0,2})?$/i.test(value); 
	}, "You must include two decimal places");
});