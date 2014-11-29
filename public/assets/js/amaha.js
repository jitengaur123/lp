$(function(){
	$('.roleClass').on('change', parentUserChange);
	//$('.viewUserModel').on('click', viewUser);

	  $('.editSelected').on('click', function(e){
	  		e.preventDefault();
            var $id = $('.id').val();
            if($id == ""){
              alert('Please select atleast one record.');
              return false;
            }

            window.location = $('.editUrl').val()+'/'+$id;
        });

	  $('.editSelectedData').on('click', function(e){
	  		e.preventDefault();
            var $id = $('.id').val();
            if($id == ""){
              alert('Please select atleast one record.');
              return false;
            }

            window.location = $('.editUrl').val()+'/'+$id+'/edit';
        });
});

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