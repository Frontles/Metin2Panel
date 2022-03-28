jQuery(function($){
	$(document).ready(function() {
         $('#startdate').datetimepicker({
             timepicker: true,
             datepicker: true,
             format: 'Y-m-d H:i:00',
             step:15,
             
             
      });
      $('#finishdate').datetimepicker({
             timepicker: true,
             datepicker: true,
             format: 'Y-m-d H:i:00',
             step:15,
             
             
      });
    });
    $('#icon_start').click(function(){
  $('#startdate').datetimepicker('show'); //support hide,show and destroy command
});


$('#icon_end').click(function(){
  $('#finishdate').datetimepicker('show'); //support hide,show and destroy command
});
});


