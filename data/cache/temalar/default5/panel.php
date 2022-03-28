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
									</td>
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
				<div class="kayip-buttonlar2-cp">
				<a href="<?php echo base_url('parola_degistir');?>" class="btn btn-giris"><i class="glyphicon glyphicon-lock"></i> &nbsp; Parola Değiştir</a>
				<a href="<?php echo base_url('destek');?>" class="btn btn-giris"><i class="glyphicon glyphicon-lock"></i> &nbsp; Destek Sistemi</a>
				<a href="<?php echo base_url('depo_sifresi_iste');?>" class="btn btn-giris"><i class="glyphicon glyphicon-lock"></i> &nbsp; Depo Şifresini İste</a>
				<a href="<?php echo base_url('karakter_silme_kodu_degistir');?>" class="btn btn-giris"><i class="glyphicon glyphicon-lock"></i> &nbsp; Karakter Silme K. Değiştir</a>
				<?php if($this->config->item('pin_durum') == TRUE):?><a href="<?php echo base_url('depo_sifresi_iste');?>" class="btn btn-giris"><i class="glyphicon glyphicon-lock"></i> &nbsp; Pin Kodu Değiştir</a>
                      <?php endif;?>
				<a href="<?php echo base_url('email_degistir');?>" class="btn btn-giris"><i class="glyphicon glyphicon-lock"></i> &nbsp; E-Posta Değiştir</a>
				<a href="<?php echo base_url('cikis');?>" class="btn btn-giris"><i class="glyphicon glyphicon-lock"></i> &nbsp; Çıkış Yap</a>
                    </div>
                </div>
            </div>
        </div>
