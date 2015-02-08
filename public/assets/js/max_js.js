jQuery(function() {

    a();
    b();
    checkUserBoard();
    addMagnetUser();
    updateMagnetForm();
});


function updateMagnetForm(){
    jQuery('#updateMagnetForm').on('submit', function(e){
        e.preventDefault();
        removeMessage();
        var dateCreate = jQuery('.dateMagnet').val(),
            worksite_id = jQuery('.worksites option:selected').val(),
            magnet_id = jQuery('.magnetBoardId').val();

        if(magnet_id == "") return false;

        if(dateCreate == ""){
            MessageDisplay('error', 'Please select Date');
            return false;
        }

        if(worksite_id == ""){
            MessageDisplay('error', 'Please select Worksite');
            return false;
        }

        if(jQuery('div.wrksite_drop').find('.subClassAdded').length < 1){
            MessageDisplay('error', 'Please add one supervisor.');
            return false;
        }

         if(jQuery('div.wrksite_drop').find('input[name="user_id[]"]').length < 1){
            MessageDisplay('error', 'Please add atleast one user.');
            return false;
        }
        

        var postData = jQuery(this).serialize(),
            url = ae.baseUrl + 'administrator/magnet/update/'+magnet_id;
        
        jQuery.post(url, postData, function(resultData){
            if(resultData.result == true){
                //jQuery('#submitMagnetForm').addClass('disabled');
                MessageDisplay('success', resultData.message);
            }else{
                var htmlError = '';
                jQuery.each(resultData.errors, function(index, val){
                    htmlError += val;
                });
                MessageDisplay('error', htmlError);
            }
        },'json');
    });
}

function addMagnetUser(){
    jQuery('#magnetForm').on('submit', function(e){
        e.preventDefault();
        removeMessage();
        var dateCreate = jQuery('.dateMagnet').val(),
            worksite_id = jQuery('.worksites option:selected').val();
        if(dateCreate == ""){
            MessageDisplay('error', 'Please select Date');
            return false;
        }

        if(worksite_id == ""){
            MessageDisplay('error', 'Please select Worksite');
            return false;
        }

        if(jQuery('div.wrksite_drop').find('.subClassAdded').length < 1){
            MessageDisplay('error', 'Please add one supervisor.');
            return false;
        }

         if(jQuery('div.wrksite_drop').find('input[name="user_id[]"]').length < 1){
            MessageDisplay('error', 'Please add atleast one user.');
            return false;
        }
        

        var postData = jQuery(this).serialize(),
            url = ae.baseUrl + 'administrator/magnet';
        
        jQuery.post(url, postData, function(resultData){
            if(resultData.result == true){
                jQuery('#submitMagnetForm').addClass('disabled');
                MessageDisplay('success', resultData.message);
            }else{
                var htmlError = '';
                jQuery.each(resultData.errors, function(index, val){
                    htmlError += val;
                });
                MessageDisplay('error', htmlError);
            }
        },'json');
    });
}

function removeMessage(){
    jQuery('.messageHere').html('');
}
function MessageDisplay(type, message){

    if(type == 'error')
        var htmlData = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+message+'</div>';
    else
        var htmlData = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+message+'</div>';

    jQuery('.messageHere').html(htmlData);
}   

function checkUserBoard(){
    jQuery('.searchMagnetUsers').on('click', function(){

        removeMessage();
        jQuery('div.wrksite_drop, ul.nano-content').html('');
        jQuery('#submitMagnetForm').addClass('disabled');

        var dateCreate = jQuery('.dateMagnet').val(),
            worksite_id = jQuery('.worksites option:selected').val(),
            postData = 'started_at=' + dateCreate + '&worksite_id=' + worksite_id,
            url = ae.baseUrl + 'administrator/checkboardexists';
            
        if(dateCreate == ""){
            MessageDisplay('error', 'Please select date');
            return false;
        }

        if(worksite_id == ""){
            MessageDisplay('error', 'Please select Worksite');
            return false;
        }

        jQuery.post(url, postData, function(resultData){
            if(resultData.result == true){
                MessageDisplay('error', 'Board Allready exists for this date and worksite.');
                return false;
            }else{
                liUserBoard(resultData.users);
                jQuery('#submitMagnetForm').removeClass('disabled');
            }
        },'json');
    });
}


function liUserBoard(resultData){

    var htmldata= '';

    jQuery.each(resultData, function(index, val){
        var classAdded = 'userClass';
        var data = resultData[index];
        if(data.role == 3){
            classAdded = 'supClass';
        }

         htmldata += "<li class='"+classAdded+"' data-id='"+data.id +"'>" + data.user_name + ' <span><i class="fa fa-arrows"></i></span></li>';     
    });

   jQuery('ul.nano-content').html(htmldata);
    a();
    b();
}


function a() {
    jQuery("ul.nano-content").sortable({
        connectWith: "div.wrksite_drop",
        beforeStop: function(a, b) {
            var c = b["item"];
            removeMessage();

            if(c.hasClass('disableDrag')){                
                MessageDisplay('error', 'Only one supervisor can be added');
                return false;
            }
            var inputName = 'user_id[]';
            var newclass = '';
            if(c.hasClass('supClass')){
                var newclass = 'subClassAdded';
                var inputName = 'supervisor_id'
                jQuery('ul.nano-content li.supClass').addClass('disableDrag');
            }
            var d = [];
            d["name"] = c.text();
            d["id"] = c.data('id');
            var e = '<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title '+newclass+'">' + d["name"] + '</h3><input class="user_id" value="' + d["id"] + '" name="'+inputName+'" type="hidden"/><ul class="panel-control"><li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li><li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li></ul></div><div class="panel-body usrshft"><div id="wrk_1"><div class="row"><div class="col-md-3"><h6>Shift Start Time</h6><input class="form-control timePickerOnly" name="start_time[' + d["id"] + ']" type="text"/></div><div class="col-md-3"><h6>Shift End Time</h6><input class="form-control timePickerOnly" name="end_time[' + d["id"] + ']"  type="text"/></div><div class="col-md-3"><button class="btn ls-light-green-btn"><i class="fa fa-save"></i> Save The Shift</button></div></div></div></div></div>';
            jQuery(e).appendTo("div.wrksite_drop");
        },
        stop: function(a, c) {
            var s = c["item"];
            jQuery(s).remove();
            b();
        }
    });
    jQuery("div.wrksite_drop").sortable();
    jQuery("ul.nano-content").disableSelection();
    jQuery("div.wrksite_drop").disableSelection();
}


function b() {
    jQuery(".panel-control li a.close-panel").click(function() {
        var a = jQuery(this).parents(".panel");
        var classAdded = 'userClass';

        if(a.find(".panel-title").hasClass('subClassAdded')){
            classAdded = 'supClass';
            jQuery('ul.nano-content li.supClass').removeClass('disableDrag');
        }

        var b = "<li class='"+classAdded+"' data-id='"+a.find(".user_id").val() +"'>" + a.find(".panel-title").text() + ' <span><i class="fa fa-arrows"></i></span></li>';
        a.animate({
            opacity: .1
        }, 1e3, function() {
            jQuery(this).remove();
        });
        setTimeout(function() {
            jQuery(b).appendTo("ul.nano-content");
        }, 1e3);
    });
}