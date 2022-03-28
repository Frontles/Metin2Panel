function ticket(formId){
    var data;
    data = $(formId).serialize();
    $.post(api_url + '/ticket', data , function (response){
        if(response.error){
            $('#ticket_success').hide();
            $('#ticket_error').show().html(response.error);
        }
        else{
            $('#ticket_error').hide();
            $('#ticket_success').show().html(response.success);
            $(formId + 'select, ' +  formId + ' textarea').val('');
        }
    },'json');

}

function reticket(formId){
    var data;
    data = $(formId).serialize();
    $.post(api_url + '/reticket', data , function (response){
        if(response.error){
            $('#ticket_success').hide();
            $('#ticket_error').show().html(response.error);
        }
        else{
            $('#ticket_error').hide();
            $('#ticket_success').show().html(response.success);
            $(formId + 'select, ' +  formId + ' input').val('');
            location.reload().delay(5000);
        }
    },'json');

}

