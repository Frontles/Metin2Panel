<?php require support_view('static/header');

?>

    <style>
        .ticket-not
        {
            position: fixed;
            margin-left: 2%;
        }
    </style>
<?php
function find_url($string){
//"www."
    $pattern_preg1 = '#(^|\s)(www|WWW)\.([^\s<>\.]+)\.([^\s\n<>]+)#sm';
    $replace_preg1 = '\\1<a href="http://\\2.\\3.\\4" target="_blank" class="link">\\2.\\3.\\4</a>';

//"http://"
    $pattern_preg2 = '#(^|[^\"=\]]{1})(http|HTTP|ftp)(s|S)?://([^\s<>\.]+)\.([^\s<>]+)#sm';
    $replace_preg2 = '\\1<a href="\\2\\3://\\4.\\5" target="_blank" class="link">\\2\\3://\\4.\\5</a>';

    $string = preg_replace($pattern_preg1, $replace_preg1, $string);
    $string = preg_replace($pattern_preg2, $replace_preg2, $string);

    return $string;
}

?>
    <div style="display: none;" id="ticket_success" class="alert alert-success ticket-not"></div>
    <div style="display: none;" id="ticket_error" class="alert alert-error ticket-not"></div>
    <div class="content clearfix" id="wt_refpoint">
        <div id="scroll" class="scrollable_container"  style="margin-top: 30px;">
            <div class="inside_scrollable_container" >
                <div class="center">
                    <?php if (($sth->rowCount()) > 0):?>
                        <?php foreach ($sonuc as $key=>$val):?>
                            <?php if ($val['divs'] == 'user'):?>
                                <div class="user-text">
                                    <span class="message-who"><?= $val['username']?></span>
                                    <span class="message-date"><?= $val['tarih'];?></span>
                                    <div class="breadcrumbs"></div>
                                    <span class="message"><?= find_url($val['message'])?></span>
                                </div>
                            <?php else: ?>
                                <div class="admin-text">
                                    <span class="message-who"><?= $val['username']?></span>
                                    <span class="message-date"><?= $val['tarih'];?></span>
                                    <div class="breadcrumbs"></div>
                                    <span class="message"><?= find_url($val['message'])?></span>
                                </div>

                            <?php endif;?>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="message-input">
            <div class="send-box">
                <form id="reticketform" action="" method="post" onsubmit="return false;">
                    <input type="text" name="message" placeholder="Mesaj??n??z?? Yaz??n??z..." style="width: 75%" autocomplete="off">
                    <input type="hidden" value="<?= get('id') ?>" name="id">
                    <button class="btn-default btn-send" name="send" value="1" onclick="reticket('#reticketform')" type="submit">G??nder</button>
                </form>
            </div>
        </div>

    </div>

    <script>
        setTimeout(function () {
            $('#ticket_error').fadeOut();
        },2000)
    </script>

<?php

die;

$token = md5(settings('tokenkey').$aid.$_url[3]);

$tNoty = session('tNoty');

if ($tNoty == 'empty'){
    echo "<script>notfy('error','Bo?? mesaj g??nderemezsiniz.')</script>";
    session_set('tNoty',false);
}elseif($tNoty == 'lengt'){
    echo "<script>notfy('error','Mesaj i??eri??i en az 10 karakter olmal??d??r.')</script>";
    session_set('tNoty',false);
}elseif ($tNoty == 'time'){
    echo "<script>notfy('error','Son tickettan 1 dakika sonra tekrar g??nderebilirsiniz.')</script>";
    session_set('tNoty',false);
}elseif($tNoty == 'ok'){
    echo "<script>notfy('success','Ticket g??nderildi.')</script>";
    session_set('tNoty',false);
}elseif($tNoty == 'filter'){
    echo "<script>notfy('error','Hata')</script>";
    session_set('tNoty',false);
}
?>
    <div class="page-title">
        <h2><span class="fa fa-comments"></span> Ticket Konu??mas??</h2>
    </div>
    <style>
        header
        {
            font-family: 'Lobster', cursive;
            text-align: center;
            font-size: 25px;
        }

        #info
        {
            font-size: 18px;
            color: #555;
            text-align: center;
            margin-bottom: 25px;
        }

        a{
            color: #074E8C;
        }

        .scrollbar
        {
            float: left;
            height: 700px;
            background: #F5F5F5;
            overflow-y: scroll;
        }


        #wrapper
        {
            text-align: center;
            width: 500px;
            margin: auto;
        }

        /*
         *  STYLE 4
         */

        #style-4::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        #style-4::-webkit-scrollbar
        {
            width: 10px;
            background-color: #F5F5F5;
        }

        #style-4::-webkit-scrollbar-thumb
        {
            background-color: #000000;
            border: 2px solid #555555;
        }

    </style>

    <div class="content-frame">
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">
            <div class="pull-right">
                <a href="<?=support_url('close-ticket?id='. get('id')) ?>"><button class="btn btn-primary"><span class="fa fa-times"></span> Ticket'?? Kapat</button></a>
            </div>
        </div>
        <!-- END CONTENT FRAME TOP -->

        <!-- START CONTENT FRAME BODY -->
        <div class="row">
            <div id="wrapper">
            </div>
            <div class="clearfix" style="margin-bottom: 50px;"></div>
            <div class="col-md-12 scrollbar" id="style-4">
                <div class="messages messages-img">

                </div>
            </div>
            <div class="panel panel-default push-up-10">
                <form action="<?=URI::get_path('ticket/send/'.$_url[3].'&token='.$token);?>" method="post">
                    <div class="panel-body panel-body-search">
                        <div class="input-group">
                            <input type="text" class="form-control"  name="message" placeholder="Mesaj??n??z?? Yaz??n??z..."/>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">G??nder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>

<?php require support_view('static/footer');