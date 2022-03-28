<?php
    /**
     * Created by PhpStorm.
     * User: user
     * Date: 28.12.2016
     * Time: 10:29
     */
    class Session
    {
        public static function init()
        {
            @session_start();
        }

        public static function set($key, $value)
        {
        	if (is_array($value))
            	$_SESSION[$key] = $value;
        	else
				$_SESSION[$key] = filter_var($value,FILTER_SANITIZE_STRING);
        }

        public static function get($key)
        {
            if (isset($_SESSION[$key]))
                return $_SESSION[$key];
        }
        public static function destroy()
        {
            //unset($_SESSION);
            session_destroy();
        }
    }