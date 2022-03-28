
<div class="clear"></div>
<!-- BODY Content end here -->
</div>
</div>
<footer id="footer">
    <span>
            Tüm hakları saklıdır ve <a href="<?=site_url('index')?>"><?=settings('settings_gamename')?></a> mülkiyetindedir.</span>
</footer>

<div id="login-box-container">
    <div class="login-box-holder">
        <div class="login-box">
            <form action="<?= site_url('login') ?>" method="post" accept-charset="utf-8">
                <span class="warfg_input" style=""><input type="text" name="login" id="login_username" value="" placeholder="Kullanıcı adı" autocomplete="off" class="styled-input"></span><br>
                <span class="warfg_input" style=""><input type="password" name="password" id="login_password" value="" placeholder="Şifre" autocomplete="off" class="styled-input"></span><br>
                <!-- buraya recaptcha gelcek -->

                <div class="login-box-row">
                    <span class="warfg_btn" style=""><input type="submit" name="login_submit" value="Giriş" class="styled-input"></span>
                    <div class="login-box-options">
                        <a href="<?= site_url('recuperare') ?>" data-hasevent="1">Şifremi Unuttum?</a><br>
                        <a href="<?= site_url('recuperare-account') ?>" data-hasevent="1">Hesap Adımı Unuttum?</a><br>
                    </div>
                </div>
                <div class="clear"></div>
            </form>
        </div>
        <a href="#" class="close_btn" onclick="CustomJS.toggleLogin(event, this)"></a>
    </div>
</div>
<!-- Login Form.End -->



<!-- Login Form.End -->
<a class="discord-widget" href="https://discord.metin2board.org" title="Join us on Discord">
            <img src="https://discordapp.com/api/guilds/411372177578000404/embed.png?style=banner4">
        </a>
		
		<style>
		
		.discord-widget {
		   width:320px;
   transition-property: right;
   transition-duration: 2s;
   -webkit-transition-property: right; /* Safari */
   -webkit-transition-duration: 2s; /* Safari */
	
	position: fixed;
	bottom: 20px;
	right: -340px;
	z-index:10;
		}
	
	
	.discord-widget.active
{
   right: 20px;
}
		</style>

<script type="text/javascript">
    function toggleLogin(event, element) {
        if(typeof CustomJS !== 'undefined')
            CustomJS.toggleLogin(event, element);
        else
            document.location.replace('login.html');
    };

    $(document).ready(function () {

        $(".discord-widget").addClass("active");

    });
</script>
     <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(53970448, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/53970448" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '454031851840877');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=454031851840877&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


</body>
</html>