<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 28.09.2016
 * Time: 16:15
 */
header('Content-Type: text/html; charset=utf-8');
$mass['один'] = 1;
$mass['два'] = 2;
$mass['три'] = 3;
$mass['четыре'] = 4;

foreach($mass as $key ){
    echo $key.' =&gt; ';
};

echo $_SERVER['REMOTE_ADDR'];
