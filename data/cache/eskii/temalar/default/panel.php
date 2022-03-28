<div id="content">
    <div id="box1">
        <div class="title1">
            <h1></h1>
        </div>
		<?php if($this->account->status == 'BLOCK'):?>
		<?php if ($ban_sure > '0'):?>
		<br><center>Hesabınız <?php echo $ban_sure;?> Gün Banlanmıştır.<br>				
                <?php else:?>
								<br><center>Hesabınız Süresiz Banlanmıştır.<br>				
                <?php endif;?>
			<h3>BANLANMA NEDENİ</h3> <?php echo $ban_neden;?></center>
	       <br>
        <?php endif; ?>
        <div id="content_center">
            <div class="box-style4" style="margin-bottom: 20px;">
                <div class="entry">
                    <div id="ucp_info">
                        <div class="half">
                            <table width="100%">
                                <tr>
                                    <td width="5%"><img src="/temalar/default/assets/images/user.png"/></td>
                                    <td width="45%">Hesap</td>
                                    <td width="50%"><?php echo $this->account->login; ?></td>
                                </tr>
                                <tr>
                                    <td><img src="/temalar/default/assets/images/email.png"/></td>
                                    <td>E-Mail</td>
                                                                                                            <td><?php 
										$posta	= $this->account->email;
										$postacikti = substr($posta, 0, 5);
										$postacikti2 = substr($posta, 10, 80);
										echo $postacikti;
										echo '******';
										echo $postacikti2;?>
                                </tr>
                                <tr>
                                    <td><img src="/temalar/default/assets/images/award_star_bronze_1.png"/></td>
                                    <td>Ejderha Parası</td>
                                    <td><?php echo $this->account->cash; ?></td>
                                </tr>
                                <tr>
									<td><img src="/temalar/default/assets/images/shield.png"/></td>
                                    <td>Ej. Markası</td>
                                    <td><?php echo $this->account->mileage; ?></td>
                                </tr>
							</table>

                        </div>

                        <div class="half">
                            <table width="100%">
								<tr>
									<td width="5%"><img src="/temalar/default/assets/images/date.png"/></td>
									<td width="40%">Kayıt Tarihi</td>
									<td width="55%"><?php echo $this->model->gecenZaman($this->account->create_time); ?></td>
								</tr>
								<tr>
									<td><img src="/temalar/default/assets/images/server.png"/></td>
									<td>Hesap Sahibi</td>
									<td><?php echo $this->account->real_name; ?></td>
								</tr>
								<tr>
									<td><img src="/temalar/default/assets/images/ip.png"/></td>
									<td>Giriş Yapılan IP</td>
									<td><?php echo $this->input->ip_address(); ?></td>
								</tr>
								<tr>
									<td><img src="/temalar/default/assets/images/ip.png"/></td>
									<td>Hesap Durumu</td>
									<td>Aktif</td>
								</tr>
							</table>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
            </div>
            <div class="box-style4">
                <div class="entry">
                    <div id="character-info">
                        <table>
                            <tbody>
								<tr>
									<td><div><ul><li><a href="<?php echo base_url('parola_degistir');?>"><p>Parola Değiştir</p></a>Hesap şifrenizi değiştirin, bu işlemde E-Mail veya gizli soru onayı gereklidir.<br/>&nbsp;</li></ul></div></td>
									<td><div><ul><li><a href="<?php echo base_url('destek');?>"><p>Destek Sistemi</p></a>Herhangi bir yardıma mı ihtiyacınız var? Bizimle iletişime geçmekten çekinmeyin!<br/>&nbsp;</li></ul></div></td>

								</tr>
								<tr>
									<td><div><ul><li><a href="<?php echo base_url('karakter_silme_kodu_degistir');?>"><p style="margin-top: -31px;">Karakter Silme Kodu Değiştir</p></a>Hesabınızda bulunan 20. seviye üstü karakterleri silip yeni bir yer açmak için gereken koddur.<br/>&nbsp;</li></ul></div></td>
									<td><div><ul><li><a href="<?php echo base_url('depo_sifresi_iste');?>"><p>Depo Şifresini İste</p></a>Oyun içerisindeki deponuza erişmeniz için gerekli kodu mail adresine gönderilmesini veya görünmesini sağlayabilirsiniz. Şifrenizi oyun içerisinden değiştirebilirsiniz.<br/>&nbsp;</li></ul></div></td>
								</tr>
								<tr>									<?php if($this->config->item('pin_durum') == TRUE):?>
									<td><div><ul><li><a href="<?php echo base_url('pin_degistir');?>"><p>Pin Kodu Değiştir</p></a>Hesabınızın pin kodunu değiştirin, bu işlemde E-Mail veya gizli soru onayı gereklidir.<br/>&nbsp;</li></ul></div></td>
								<?php endif;?>
								</tr>
							</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>