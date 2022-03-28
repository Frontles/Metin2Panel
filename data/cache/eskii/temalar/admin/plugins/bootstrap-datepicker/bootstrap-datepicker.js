(function ($) {
    "use strict";

    if($('.datetimepicker').length){
        $('.datetimepicker').datetimepicker({
            locale: 'tr',
            format: 'YYYY-MM-DD HH:mm',
            icons: {
                time: 'ti-time',
                date: 'ti-calendar',
                up: 'ti-angle-up',
                down: 'ti-angle-down',
                previous: 'ti-angle-left',
                next: 'ti-angle-right',
                today: 'ti-pin',
                clear: 'ti-na',
                close: 'ti-close'
            }
        });
    }
    

    if($('#datepicker').length){
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    }

})(jQuery);