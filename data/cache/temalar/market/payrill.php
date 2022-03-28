<link rel="stylesheet" href="/temalar/market/assets/css/iziModal.min.css">
<link rel="stylesheet" href="/temalar/market/assets/css/animate.css">
<script src="/temalar/market/assets/js/iziModal.min.js" type="text/javascript"></script>
<style>
.paymentimage {
    height: 250px;
    margin-left: 300px;
    margin-top: 110px;
}
</style>
<center>
	<strong><font color="white">Hemen Güvenli bir şekilde EP yüklemek için aşağıda bulunan resime tıklayabilirsiniz</strong></font>
</center>
<a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown"> 
<img class="paymentimage animated infinite pulse" src="https://i.hizliresim.com/qTyjFi.jpg"></a>

								<script>
                                    $("#modal").iziModal({
                                        iframe: true,
                                        iframeHeight: 500,
                                        width: 800,
                                        iframeURL: '<?php echo $payrill;?>',
                                        title: 'Payrill Sanal Mağaza',
                                        headerColor: '#88A0B9',
                                        openFullscreen: true,

                                    });
                                    $(document).on('click', '#trigger', function (event) {
                                        event.preventDefault();
                                        // $('#modal').iziModal('setZindex', 99999);
                                        // $('#modal').iziModal('open', { zindex: 99999 });
                                        $('#modal').iziModal('open');
                                    });
								</script>