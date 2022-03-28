$(function (){
    $('[tab]').each(function(){
        var tablist=$('[tab-list] li',this),
            tabcontent=$('[tab-content]',this);
        tablist.filter(':first').addClass('active');
        tabcontent.filter(':not(:first)').hide();
        tablist.on('click',function (e){
            var index = $(this).index();
            tablist.removeClass('active').filter(this).addClass('active');
            tabcontent.hide().filter(':eq(' + index + ')').fadeIn(300);
            e.preventDefault();
        })
    });
})