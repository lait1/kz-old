<?php
require_once('phpThumb.config.php');

function the_php_thumb($src, $width, $height, $crop=true, $quality=70){
    $url = parse_url($src);

    $pars = 'src='.$url['path'];
    $pars .= '&w='.$width.'&h='.$height;
    if($crop){
        $pars .= '&zc=true';
    }
    $pars .= '&q='.$quality;
    return '<img src="'.htmlentities(phpThumbURL($pars, get_stylesheet_directory_uri().'/phpthumb/phpThumb.php')).'">';
}

echo the_php_thumb('')
