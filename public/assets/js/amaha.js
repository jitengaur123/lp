var workSiteData = '';
$(function(){
	$('.roleClass').on('change', parentUserChange);
	//$('.viewUserModel').on('click', viewUser);
	$('#client').on('change', changeWorksite);
	$('.editSelected').on('click', editSelected);
	$('.editSelectedData').on('click', editSelectedData);

    $(document).on('change','#worksite',worksite);

    $(document).on('blur','.reg_hour, .reg_rate, .ot_hour, .ot_rate, .dt_hour, .dt_rate',totalLabourHours);

});


function totalLabourHours(){
    	var reg_hour = $(this).closest('.clonedInput').find('.reg_hour').val();
    	var reg_rate = $(this).closest('.clonedInput').find('.reg_rate').val();
    	var ot_hour = $(this).closest('.clonedInput').find('.ot_hour').val();
    	var ot_rate = $(this).closest('.clonedInput').find('.ot_rate').val();
    	var dt_hour = $(this).closest('.clonedInput').find('.dt_hour').val();
    	var dt_rate = $(this).closest('.clonedInput').find('.dt_rate').val();
    	var reg_amount = ot_amount = dt_amount = 0;
    	if(reg_hour != "" && reg_rate != ""){
    		reg_amount = reg_hour*reg_rate;
    		$(this).closest('.clonedInput').find('.reg_amount').val(reg_amount);
    	}

    	if(ot_hour != "" && ot_rate != ""){
    		ot_amount = ot_hour*ot_rate;
    		$(this).closest('.clonedInput').find('.ot_amount').val(ot_amount);
    	}
    	if(dt_hour != "" && dt_rate != ""){
    		dt_amount = dt_hour*dt_rate;
    		$(this).closest('.clonedInput').find('.dt_amount').val(dt_amount);
    	}

    	$(this).closest('.clonedInput').find('.sub_total').val(reg_amount+ot_amount+dt_amount);
    	var total_amount = 0;
    	$('.clonedInput').find('.sub_total').each(function(){
    		//alert($(this).val());
    		total_amount += parseInt($(this).val());
    	});

    	$('.final_total').text(total_amount);

  }

function getLabors(){

	var client_id = $('#client option:selected').val();
	var worksite_id = $('#worksite option:selected').val();
	var started_at = $('#started_at').val();

	var postData = 'client_id='+client_id+'&worksite_id='+worksite_id+'&started_at='+started_at;
	var url = ae.baseUrl + 'administrator/get_labors';
	$.post(url, postData, function(resultData){
		var $data = '<option value="">Select A Labour...</option>';
		if(resultData.result){
			var labours = resultData.data;
			$.each(labours, function(index){
				$data += '<option value="'+this.id+'">'+this.user_name+'</option>';
			});
		}
		$('select.laborOptions').html($data);
	},'json');
}

function worksite(){
	 var index = $('option:selected',this).attr('worksite');
	 workData = workSiteData[index];
	$('.showWorkSiteName').text(workData['job_name']);
	$('.showSiteAddress').text(workData['address']);
	$('.showLocality').text(workData['city']);
	$('.showState').text(workData['state']);
	$('.showPostCode').text(workData['postal_code']);
	$('.showCountry').text(workData['country']);
	getLabors();
}

function editSelected(e){
	e.preventDefault();
    var $id = $('.id').val();
    if($id == ""){
      alert('Please select atleast one record.');
      return false;
    }

    window.location = $('.editUrl').val()+'/'+$id;        
}

function editSelectedData(e){
	e.preventDefault();
    var $id = $('.id').val();
    if($id == ""){
      alert('Please select atleast one record.');
      return false;
    }

    window.location = $('.editUrl').val()+'/'+$id+'/edit';
}

function changeWorksite(e){
	e.preventDefault();

	$('.showCompanyName').text($('option:selected', this).text());

	var url = ae.baseUrl + 'administrator/client_worksite';
	$.post(url, {'id':$(this).val()}, function(resultData){
		var $data = '<option value="">Select A Site...</option>';
		if(resultData.result){
			workSiteData = resultData.data;
			$.each(resultData.data, function(index){
				$data += '<option worksite="'+index+'" value="'+this.id+'">'+this.job_name+'</option>';
			});
		}
		$('select#worksite').html($data);
	},'json');

}



function parentUserChange(){
	var $role = $(this).val();
	var url = ae.baseUrl + 'administrator/parent_user/'+$role;
	$.post(url, {}, function(resultData){
		var $data = '';
		if(resultData.result){
			$.each(resultData.parentUser, function(index){
				$data += '<option value="'+this.id+'">'+this.first_name+'</option>';
			});
		}
		$('.parentUserData').html($data);
	},'json');
}


function viewUser(){
	var $user_id = $(this).data('userid');
	var url = ae.baseUrl + 'administrator/viewuser';
	$.get(url, {user_id:$user_id}, function(resultData){
		$('.viewProfileData').html(resultData.data);
	},'json');
}