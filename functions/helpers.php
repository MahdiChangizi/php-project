<?php

//config

use function PHPSTORM_META\map;

define('BASE_URL', 'http://localhost/php-project/');

function redirect($url)
{
    header('Location: '. trim(BASE_URL, '/ ') . '/' . trim($url, '/ '));
    exit;
}
// redirect('panel/category');

function asset($file)
{
    return trim(BASE_URL, '/ ') . '/' . trim($file, '/ ');
}
// <img src="asset(assets/image/hassan.png)">
// echo asset('assets/css/style.css');

function url($url)
{
    return trim(BASE_URL, '/ ') . '/' . trim($url, '/ ');
}
// echo url('panel/category');

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    exit;
}
// $users = ['ali', 'hassan', 'karim'];
// dd($users);


