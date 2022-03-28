<?php

if(!function_exists('add_js'))
{
    function add_js($file='')
    {
        $str = '';
        $ci = &get_instance();
        $js_files  = $ci->config->item('js_files');

        if(empty($file)){
            return;
        }

        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){
                $js_files[] = $item;
            }
            $ci->config->set_item('js_files',$js_files);
        }else{
            $str = $file;
            $js_files[] = $str;
            $ci->config->set_item('js_files',$js_files);
        }
    }
}

if(!function_exists('add_css'))
{
    function add_css($file='')
    {
        $str = '';
        $ci = &get_instance();
        $css_files = $ci->config->item('css_files');

        if(empty($file)){
            return;
        }

        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){   
                $css_files[] = $item;
            }
            $ci->config->set_item('css_files',$css_files);
        }else{
            $str = $file;
            $css_files[] = $str;;
            $ci->config->set_item('css_files',$css_files);
        }
    }
}

if(!function_exists('put_css'))
{
    function put_css()
    {
        $str = '';
        $ci = &get_instance();
        $css_files = $ci->config->item('css_files');

        if($css_files){
            foreach($css_files AS $item){
                $str .= '<link rel="stylesheet" href="'.$item.'" type="text/css" />'."\n";
            }

            echo $str;
        }
    }
}

if(!function_exists('put_js'))
{
    function put_js()
    {
        $str = '';
        $ci = &get_instance();
        $js_files  = $ci->config->item('js_files');

        if($js_files){
            foreach($js_files AS $item){
                $str .= '<script type="text/javascript" src="'.$item.'"></script>'."\n";
            }

            echo $str;
        }
    }
}