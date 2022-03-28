<?php
require view('static/header');
$hesapbilgiler = profile();
$hesap = $hesapbilgiler['account'];
$status = $hesap['status'];
$availDt = strtotime($hesap['availDt']);
$now = time();
$fark = $availDt - $now;
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
<link rel="stylesheet" href="<?=public_url('asset/css/account-panel.css')?>"/>
<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[136]?><a href="<?=site_url('index')?>" class="back-to-account" title="Geri"></a></h2>
            <div class="body">
				<?php if ($status == 'BLOCK'):?>
                <center>
					<?=$functions->alert('warning',$lng[137]); ?>
                </center>
				<?php elseif ($availDt > $now):?>
                    <center>
					<?=$functions->alert('warning',$lng[138]); ?>
                    </center>
                    <div class="bg-light item-container">
                        <center><span id="say" style="font-weight: bold;font-size: 45px;"><?=$fark?></span><br> <?=$lng[139]?></center>
                    </div>
                    <script type="text/javascript">
                        var saniye = <?=$fark+1?>;
                        function bak()
                        {
                            if(saniye != 0)
                            {
                                saniye = saniye - 1;
                                document.getElementById("say").innerHTML = saniye;
                                setTimeout(bak, 1000);
                            }
                        }
                        window.onload=bak;
                    </script>
				<?php endif;?>
                <div class="warfg_account">
                    <section id="warfg_ucp_buttons">
						<?php if ($status == 'OK' && $availDt <= $now):?>
                        <ul id="accoun_panel_menu">
                            <li>
                                <a href="<?=site_url('profile-password')?>">
                                    <span>
										<p><?=$lng[141]?></p>
										<?=$lng[178]?>
									</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=site_url('profile-email')?>">
                                    <span>
										<p><?=$lng[142]?></p>
										<?=$lng[179]?>
									</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=site_url('profile-depo')?>">
                                    <span>
										<p><?=$lng[143]?></p>
										<?=$lng[178]?>
									</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=site_url('profile-ksk')?>">
                                    <span>
										<p><?=$lng[144]?></p>
										<?=$lng[178]?>
									</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=site_url('profile-save')?>">
                                    <span>
										<p><?=$lng[145]?></p>
										<?=$lng[180]?>
									</span>
                                </a>
                            </li>
                            <li>
                                <a class="itemshop itemshop-btn iframe" href="<?=URL.'/' . 'support' ?>">
                                    <span>
										<p><?=$lng[146]?></p>
										<?=$lng[181]?>
									</span>
                                </a>
                            </li>
                            <li>
                                <a class="itemshop itemshop-btn iframe" href="<?=URL.'/' . 'shop'?>">
                                    <span>
										<p><?=$lng[147]?></p>
										<?=$lng[182]?>
									</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?=site_url('logout')?>">
                                    <span>
										<p><?=$lng[148]?></p>
										<?=$lng[183]?>
									</span>
                                </a>
                            </li>
                        </ul>
						<?php else:?>
                            <center>
                                <br><br>
                            <h3><?=$lng[149]?></h3>
                            <h4><?=$hesapbilgiler['ban']['why']?></h4><br>
							<?php if ($hesapbilgiler['ban']['evidence'] != ''):?>
                                <h3><?=$lng[150]?></h3>
                                <h4><?=find_url($hesapbilgiler['ban']['evidence'])?></h4><br>
							<?php endif;?>
                            </center>
						<?php endif;?>
                        <div class="clear"></div>
                    </section>
                    <div class="ucp_divider" style="margin-top:15px;"></div>
                    <section id="ucp_top">
                            <section id="ucp_info" style="padding-right:15px;padding-left:15px;width: 100%;">
                                <aside>
                                    <table width="100%">
                                        <tbody>
                                        <tr>
                                            <td width="40%"><?=$lng[22]?> :</td>
                                            <td width="50%" class="wheat"><?=$hesap['login'];?></td>
                                        </tr>
                                        <tr>
                                            <td width="40%"><?=$lng[152]?> :</td>
                                            <td width="50%" class="wheat"><?=$hesap['email'];?></td>
                                        </tr>
                                        <tr>
                                            <td width="40%">Telefon :</td>
                                            <td width="50%" class="wheat"><?=$hesap['phone1'];?></td>
                                        </tr>
                                        <tr>
                                            <td width="40%"><?=$lng[17]?> :</td>
                                            <td width="50%" class="wheat"><?=$hesap['cash'];?></td>
                                        </tr>
                                        <tr>
                                            <td width="40%"><?=$lng[18]?> :</td>
                                            <td width="50%" class="wheat"><?=$hesap['mileage'];?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </aside>
                            </section>
                            <div class="clear"></div>
                        </section>
							<?php foreach ($hesapbilgiler['player'] as $key=>$val):?>
                                <a href="<?=site_url("detail-player?name=".$val['name'])?>">
                                    <div id="profileBox" class="player-table" style="float: left;width: 49%;">
                                        <div class="player-row">
                                            <img src="<?=URL.'/data/chrs/medium/'.$val['job'].'.png'?>" alt="<?=$functions->jobName($val['job']);?>" style="    display: block;margin-left: auto;margin-right: auto;">
                                            <center><span style="font: normal 18px 'Palatino Linotype', 'Times', serif; text-transform: none;color: wheat"><?=$val['name']?></span></center><br>
                                            <center><span><?=$lng[33]?> : <?=$functions->jobName($val['job']);?></span></center>
                                            <center><span><?=$lng[68]?> : <?=$val['level'];?></span></center>
                                            <center><span><?=$lng[40]?> : <?=$val['playtime'];?> <?=$lng[42]?>.</span></center>
                                            <center><span><?=$lng[39]?> : <?=timeConvert($val['last_play']);?></span></center>
                                        </div>
                                    </div>
                                </a>
							<?php endforeach;?>
                        <div class="clear"></div>
                </div>
            </div>
        </article>
    </div>
</aside>

<?php   require view('sidebar');
        require view('static/footer');