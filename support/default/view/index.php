<?php require support_view('static/header');

$functions = new Functions();
$randomString = $functions->generateRandomString();
session_set('random_code',$randomString);

$ticketToken = md5($randomString);

$bantitle = index();



?>

<style>
	.ticket-form
	{
		width: 50%;
		margin-left: auto;
		margin-right: auto;
	}
	select
	{
		width: 100%!important;
		border-radius: 4px;
	}
	textarea {
		resize: none;
		width: 100%!important;
		padding: 10px;
		box-sizing: border-box;
	}
	.form-title
	{
		color: wheat;
		margin-bottom: 5px;
		display: block;
		font-size: 15px;
	}
	.btn-ticket{
		width: 100%;
	}
	input
	{
		width: 65%;
	}
	#captcha
	{
		border: outset;
		width: 81px;
		/* padding: 5px; */
		margin-top: -9px;
		border-radius: 4px;
	}
	#refresh
	{
		width: 18px!important;
		margin-top: -10px;
	}
	.alert
	{
		padding: 5px;
		width: 50%;
		margin-left: auto;
		margin-right: auto;
	}
</style>


<div class="content clearfix" id="wt_refpoint">
	<div class="scrollable_container" style="margin-top: 30px;">
		<div class="inside_scrollable_container">
			<div class="center">
                <div style="display: none;" id="ticket_error" class="alert alert-error" role="alert"></div>
                <div style="display: none;" id="ticket_success" class="alert alert-success" role="alert"></div>

                <?php if ($bantitle['ban']['ticket_ban'] == 1)  :?>
                    <div class="alert alert-error">Yönetici tarafından ticket göndermeniz yasaklanmıştır.</div>
                <?php else:?>
					<?php $sessionResult = isset($_SESSION['mResult']) ? $_SESSION['mResult'] : null; ?>
					<?php if ($sessionResult == "false"):?>
                        <div class="alert alert-error"><?=$_SESSION['mMessage'];?></div>
						<?php unset($_SESSION['mResult']); unset($_SESSION['mMessage']);?>
					<?php elseif($sessionResult == "true"):?>
                        <div class="alert alert-success">Ticket yöneticiye iletildi.</div>
						<?php unset($_SESSION['mResult']);?>
					<?php endif;?>
                    <form method="post" action="" id="ticket_form"  class="ticket-form" onsubmit="return false;">
                        <span class="form-title">Konu Başlığı : </span>
                        <select name="ticket_title">
                            <option value="" selected>Konu başlığı seçiniz...</option>
                            <?php foreach ($bantitle['title'] as $title):?>
                                <option value=" <?=  $title['id']?>"> <?=  $title['title']?> </option>

                            <?php endforeach;?>


                        </select>
                        <span class="form-title">Mesaj İçeriği : </span>
                        <textarea name="message_content"  cols="10" rows="10"></textarea>
                        <input type="hidden" name="captcha" value="<?= $ticketToken ?>">
                        <button type="submit" class="btn-default  btn-ticket" name="submit" value="1" onclick="ticket('#ticket_form')" >Gönder</button>
                    </form>

                <?php endif;?>
			</div>
		</div>
	</div>
</div>


<?php require support_view('static/footer');