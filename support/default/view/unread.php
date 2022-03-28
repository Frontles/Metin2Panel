<?php require support_view('static/header');?>

<div class="content clearfix" id="wt_refpoint">
    <h2 class="header-title">
        <ul class="breadcrumb">
            <li>
                <a href="#" title="En gözdeler">Yanıtlanmamış Ticketlar</a>
                <span class="item_count"></span>
            </li>
        </ul>
    </h2>
    <div class="scrollable_container" style="margin-top: 30px;">
        <div class="inside_scrollable_container">
            <div class="center">
				<?php if ($count === 0):?>
                    <div class="alert alert-error">Yanıtlanmamış destek bildirimi bulunumadı!</div>
				<?php else:?>
                    <table class="ticket-list table table-hover">
                        <tbody>
                        <tr style="background: white;">
                            <th>#</th>
                            <th>Ticket id</th>
                            <th>Konu Başlığı</th>
                            <th>Mesaj</th>
                            <th>Tarih</th>
                            <th>İşlem</th>
                        </tr>
						<?php foreach ($sonuc as $key=>$val): ?>
							<?php $messageC = strlen($val['message']);
							if ($messageC > 20 ){
								$message = substr($val['message'],0,15) . '...';
							}else{
								$message = $val['message'];
							}
							?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?='#'.$val['ticketid']?></td>
                                <td style="font-weight: 600;"><?=$val['title']?></td>
                                <td><?=$message?></td>
                                <td><?=$val['tarih']?></td>
                                <td>
                                    <a href="<?=support_url('ticket-view?id='.$val['ticketid'])?>"><button type="button" class="btn-default btn-ticket" title="İncele"><i class="zicon-hd-tradable"></i></button></a>
                                    <a href="<?=support_url('close-ticket?id=' .$val['ticketid'])?>"><button type="button" class="btn-default btn-ticket" title="Kapat"><i class="zicon-hd-soldout"></i></button></a>
                                </td>
                            </tr>
						<?php endforeach;?>
                        </tbody>
                    </table>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php require support_view('static/footer');