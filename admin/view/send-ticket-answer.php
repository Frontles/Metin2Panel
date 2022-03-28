<?php  require admin_view('/static/header');

$id = get('id');

if (post('send')){
   send($id);
}

?>
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                    <div class="x_title">
                        <div class="inputs">
                            <span class="caption-helper" style="font-size: 25px;float right !important; color: black"><span class="badge badge-empty badge-danger"></span> <?php if ($stat['whoname'] == null){echo 'Yönetici Atanmadı';}else{echo 'Admin :'.$stat['whoname'];}?></span>
                        </div>
                        <i class="icon-bar-chart font-dark hide"></i>
                        <span  class="caption-subject font-dark bold uppercase d-inline-block"><?=$stat['title']?> </span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="portlet-body">
                            <div class="general-item-list" id="general-list">
                                <?php foreach ($ticket as $row):?>

                                    <?php  if ($row['first'] == '1'):?>
                                        <div class="item">
                                            <div class="item-head">
                                                <a href="<?=admin_url('account/account?id='.$row['accountid'])?>" class="btn btn-success">Hesabı İncele</a>
                                                <?php  if ($getBan):?>
                                                    <a  href="<?=admin_url('ticket-ban-open?id='.$row['accountid'])?>"  class="btn btn-danger">Ticket Ban Aç</a>
                                                <?php else:?>
                                                    <a href="<?=admin_url('ticket-ban?id='.$row['accountid'])?>" class="btn btn-danger">Ticket BAN</a>
                                                <?php endif;?>

                                                <?php if ($status['status']!= 2) :?>
                                                    <a href="<?=admin_url('close-ticket?id='. $stat['ticketid'])?>" class="btn btn-danger">Ticket Kapat</a>
                                                <?php else: ?>
                                                    <span><small>( Bu Ticket Artık Kapandı )</small></span>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="item">
                                            <div class="item-head" >
                                                <div class="item-details" style="display: inline-block !important;">
                                                    <div style="border-style: groove;" class="col-md-12">
                                                        <a href="javascript:void(0);" class="item-name primary-link"></a>

                                                        <div style="" class=" item-body"><?=find_url($row['message'])?> </div>
                                                    </div>
                                                </div>

                                                <span  class="item-status" style="float: right; ">
                                                    <span  class="badge badge-empty badge-primary"></span> <?=$row['tarih']?>
                                                </span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    <?php else:?>
                                        <hr>
                                        <?php if ($row['divs'] == 'user'):?>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img style="width: 50px; border-radius: 50%;" class="item-pic rounded" src="<?=URL . '/data/upload/no-image.jpg'?>">
                                                        <a href="" class="item-name primary-link"><?=$row['username']?></a>
                                                        <span class="item-label"></span>
                                                    </div>
                                                    <span class="item-status"  style="float: right;">
                                                        <span class="badge badge-empty badge-success"></span> <?=$row['tarih']?>
                                                    </span>
                                                </div>
                                                <br>
                                                <div class="item-body"> <?=find_url($row['message'])?> </div>
                                            </div>
                                            <hr>




                                        <?php elseif ($row['divs'] == 'admin'):?>
                                            <div class="item">
                                                <div class="item-head">
                                                    <div class="item-details">
                                                        <img style="width: 50px; border-radius: 50%;" class="item-pic rounded" src="<?=isset($getAdmin['avatar'])  ? URL . $getAdmin['avatar'] :  URL . '/data/upload/no-image.jpg'; ?>">
                                                        <a href="" class="item-name primary-link"><?=$row['username']?></a>
                                                        <span class="item-label"></span>
                                                    </div>
                                                    <span class="item-status" style="float: right">
                                            <span class=" badge badge-empty badge-warning"></span> <?=$row['tarih']?></span>
                                                </div>
                                                <br>
                                                <div class="item-body"> <?=find_url($row['message'])?> </div>
                                            </div>
                                        <?php endif;?>
                                    <?php endif;?>
                                <?php endforeach;?>

                                <div class="append" id="append">
                                </div>
                            </div>
                        </div>
                        <form id="newMessage" action="" method="post">
                            <div class="portlet-body form" style="margin-top: 15px;">
                                <div class="form-body">
                                    <div class="form-group " style="margin-bottom: 1px;">
                                        <input type="text" class="form-control" id="messageValue" name="message" rows="4" placeholder="Bir mesaj yaz..." required autocomplete="off">

                                    </div>
                                    <br>
                                    <div align="right" >
                                        <input type="hidden" name="ticketid" value="<?= get('id') ?>">
                                        <input type="hidden" name="title" value="<?= $stat['title'] ?>">
                                        <input type="hidden" name="username" value="<?= $stat['username'] ?>">
                                        <input type="hidden" name="accountid" value="<?= $stat['accountid'] ?>">
                                        <button value="1" type="submit" name="send" id="messageValue" class="btn btn-dark">Gönder</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- /page content -->

<?php require admin_view('/static/footer');
