<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<!-- NAME: 1 COLUMN -->
	<!--[if gte mso 15]>
	<xml>
		<o:OfficeDocumentSettings>
		<o:AllowPNG/>
		<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	<meta charset="UTF-8">
	<base href="<?php echo base_url();?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo str_ireplace('www.', '', parse_url(base_url(), PHP_URL_HOST));?></title>
</head>
	<body>
		<div style="margin:0;padding:0;background:#004B93;font-family:Arial,Helvetica,sans-serif">
			<table width="100%" border="0" cellspacing="0" cellpadding="20" style="margin:0;padding:0;background:#e7edf3">
				<tbody>
					<tr>
						<td align="center" valign="top">
							<table width="620" border="0" cellspacing="0" cellpadding="0" style="margin-top: 20px;">
								<tbody>
									<tr>
										<td width="620" height="10" align="left" valign="top">
											<img src="/temalar/mail/ust.png" width="620" height="10" style="display:block;float:left;padding:0;margin:0;border:0">
										</td>
									</tr>
									<tr>
										<td width="620" align="center" valign="top">
											<table width="620" align="center" border="0" cellspacing="0" cellpadding="0" style="background:#fff">
												<tbody>
													<tr>
														<td align="left" valign="top" width="10" style="background:#fff;border-left:solid 1px #c6d9e5">&nbsp;</td>
														<td align="center" valign="top" style="padding:10px 0">
															<table width="580" align="center" border="0" cellspacing="0" cellpadding="0">
																<tbody>
																	<tr>
																		<td width="220" align="left" valign="top">
																			<a href="<?php echo base_url();?>">
																				<img src="<?php echo (is_file($this->config->item('logo'))) ? base_url($this->config->item('logo')) : base_url($this->config->item('/temalar/admin/assets/images/icon/logo.png'));?>" height="60" alt="" style="display:block;float:left;padding:0;margin:0;border:0">
																			</a>
																		</td>
																		<td width="209" height="60" align="left" valign="middle">&nbsp;</td>

																		<td width="40" height="60" align="left" valign="middle">
																			<a href="<?php echo base_url();?>">
																				<img src="/temalar/mail/home.png" width="32" height="32" alt="" style="display:block;float:left;padding:0;margin:0;border:0">
																			</a>
																		</td>
																		<?php if($this->model->valid_url($this->config->item('link_tanitim'))):?>
																			<td width="40" height="60" align="left" valign="middle">
																				<a href="<?php echo $this->config->item('link_tanitim');?>">
																					<img src="/temalar/mail/sorun.png" width="32" height="32" alt=" nasıl çalışır" style="display:block;float:left;padding:0;margin:0;border:0">
																				</a>
																			</td>
																		<?php endif;?>

																		<?php if($this->model->valid_url($this->config->item('link_facebook'))):?>
																		<td width="40" height="60" align="left" valign="middle">
																			<a href="<?php echo $this->config->item('link_facebook');?>">
																				<img src="/temalar/mail/face.png" width="32" height="32" alt=" Facebook" style="display:block;float:left;padding:0;margin:0;border:0">
																			</a>
																		</td>
																		<?php endif;?>

																		<?php if($this->model->valid_url($this->config->item('link_twitter'))):?>
																		<td width="32" height="60" align="left" valign="middle">
																			<a href="<?php echo $this->config->item('link_twitter');?>">
																				<img src="/temalar/mail/twit.png" width="32" height="32" alt=" Twitter" style="display:block;float:left;padding:0;margin:0;border:0">
																			</a>
																		</td>
																		<?php endif;?>
																		
																	</tr>
																	<tr>
																		<td colspan="6" style="padding:20px 0 0">
																			<table width="580" border="0" cellspacing="0" cellpadding="0" style="background:#fff;border-top:solid 1px #c6d9e5;padding:20px 0 0">
																				<tbody>
																					<tr>
																						<td align="left" valign="top">
																							<p style="font-size:14px;line-height:20px;margin:0 0 15px;color:#002540">
																								<?php echo isset($sablon) ? $sablon : NULL;?>
																							</p>
																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</td>
																	</tr>
																</tbody>
															</table>
														</td>
														<td width="10" align="left" valign="top" style="background:#fff;border-right:solid 1px #c6d9e5">&nbsp;</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<td width="620" height="10" align="left" valign="top">
											<img src="/temalar/mail/alt.png" width="620" height="10" style="display:block;float:left;padding:0;margin:0;border:0">
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>