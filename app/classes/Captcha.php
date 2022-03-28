<?php
    /**
     * Created by PhpStorm.
     * User: user
     * Date: 1.01.2017
     * Time: 19:16
     */
    class Captcha  {
        public  $return;
        public  $captcha;
        public  $refresh;
        public  $script;

        public  function simple(){
            $this->captcha = '<img id="captcha" style="border:outset;" src="'.URL.'data/captcha/captcha.php'.'">';
            $this->refresh = '<img id="refresh" src="'.URL.'data/captcha/refresh.png'.'" alt="" style="width: 30px;">';
            $this->script = "<script>$('#refresh').click(function () {
            var paths = window.location.pathname;
            var protocol = window.location.protocol;
            var host = window.location.host;
            var path = paths.split('/')[1];
            var url = protocol+'//'+host+'/'+path+'/';
            document.getElementById('captcha').src = url + 'data/captcha/captcha.php?' + Math.random();return false;});
            </script>";
            return $this;
        }

        public function google($siteKey){
            $this->captcha = "<script src='https://www.google.com/recaptcha/api.js'></script>";
            $this->refresh = null;
            $this->script = '<div class="g-recaptcha" data-sitekey="'.$siteKey.'"></div>';
            return $this;
        }

        public function call(){
            return $this->captcha.$this->refresh.$this->script;
        }

    }

