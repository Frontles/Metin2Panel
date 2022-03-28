<?php

$say=0;
require admin_view('/static/header'); ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <center>
                <div class="row" style="margin: 10px;">
                    <div class="col-md-12">
                        <a href="<?=admin_url('readmy-tickets')?>" class="btn btn-danger text-center">
                            Bana ait Ticketlar (Yanıtlanmış)
                        </a>
                        <a href="<?=admin_url('unreadnull-tickets')?>" class="btn btn-dark text-center">
                            Yönetici Atanmamış Ticketlar (Yanıtlanmamış)
                        </a>
                        <a href="<?=admin_url('unreadother-tickets')?>" class="btn btn-primary text-center">
                            Diğer Yöneticilere Ait Ticketlar (Yanıtlanmamış)
                        </a>
                    </div>
                </div>
            </center>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Bana  Ait Yanıtlanmamış Ticketlar  <small>
                                </small></h2>
                            <div align="right">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">



                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Ticket ID </th>
                                    <th> Oyuncu Adı </th>
                                    <th>Başlık </th>
                                    <th>Mesaj</th>
                                    <th>Kimde</th>
                                    <th>Tarih </th>
                                    <th width="50px">İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach($tickets as $ticket) :$say++;
                                    $messageC = strlen($ticket['message']);
                                    if ($messageC > 20) {
                                        $message = substr($ticket['message'], 0, 15) . '...';
                                    } else {
                                        $message = $ticket['message'];
                                    }?>
                                    <tr>
                                        <td><?= $say ?></td>
                                        <td><?= $ticket['ticketid'] ?></td>
                                        <td><?= $ticket['username'] ?></td>
                                        <td><?= $ticket['title'] ?></td>
                                        <td><?= $message ?></td>
                                        <td><span class="label label-sm label-primary"> <?=$ticket['whoname']?> </span></td>
                                        <td><?= timeConvert($ticket['tarih']) ?> </td>
                                        <td>
                                            <?php if(permission('tickets','send')) : ?>
                                                <a href="<?=admin_url('send-ticket-answer?id='. $ticket['ticketid'])?>"><button class="btn btn-primary">Yanıtla</button> </a>
                                            <?php endif; ?>
                                            <?php if(permission('tickets','lock')) : ?>
                                                <a onclick="return confirm( 'Kilitleme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('delete?table=ticket_status&column=id&id='. $ticket['id']) ?>"><button class="btn btn-dark"><i class="fa fa-lock"></i></button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('tickets','lock') && !permission('tickets','send') ):  ?>
                                                <span> Kapatma ve Yanıtlama  yetkiniz bulunmamaktadır.</span>
                                            <?php endif; ?>
                                        </td>

                                    </tr>

                                <?php endforeach;?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

<?php require admin_view('/static/footer'); ?>