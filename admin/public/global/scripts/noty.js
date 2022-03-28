/**
 * Created by user on 4.02.2017.
 */
function generate(type, text) {

    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        progressBar : true,
        timeout     : 1500,
        layout      : 'topRight',
        closeWith   : ['click'],
        theme       : 'relax',
        maxVisible  : 10,
        animation   : {
            open  : 'animated tada',
            close : 'animated fadeOutRight',
            easing: 'swing',
            speed : 500
        }
    });
    return n;
}

function generate2(type, text) {

    var n = noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        progressBar : true,
        timeout     : 3000,
        layout      : 'topRight',
        closeWith   : ['button'],
        theme       : 'relax',
        maxVisible  : 10,
        animation   : {
            open  : 'animated tada',
            close : 'animated fadeOutRight',
            easing: 'swing',
            speed : 500
        }
    });
    return n;
}

function notify(type,text) {
    var paths = window.location.pathname;
    var protocol = window.location.protocol;
    var host = window.location.host;
    var path = paths.split('/')[1];
    if(type == 'error'){
        generate('error', '<div class="activity-item"><span style="font-size: 1em">'+text+'</span></div>');
        var soundUrl = protocol+'//'+host+'/'+path+'/app/public/admin/global/sounds/error.wav';
        var audio = new Audio(soundUrl);
        audio.play();
    }else if (type == 'success'){
        generate('success', '<div class="activity-item"><span style="font-size: 1em">'+text+'</span></div>');
        var soundUrl = protocol+'//'+host+'/'+path+'/app/public/admin/global/sounds/success.wav';
        var audio = new Audio(soundUrl);
        audio.play();
    }else if('info'){
        generate2('warning', '<div class="activity-item"><span style="font-size: 1em">'+text+'</span></div>');
        var soundUrl = protocol+'//'+host+'/'+path+'/app/public/admin/global/sounds/success.wav';
        var audio = new Audio(soundUrl);
        audio.play();
    }
}
