<?php

use App\src\Flash;
use App\src\Redirect;

function dd($data)
{
    var_dump($data);
    die();
}

function path()
{
    return dirname(dirname(__DIR__));
}

function flash($index, $message)
{
    Flash::add($index, $message);
}

function error($message)
{
    return "<span class='error'>* {$message} </span>";
}

function success($message)
{
    return "<span class='success'>{$message} </span>";
}

function redirect(string $target)
{
    Redirect::redirect($target);
    die();
}

function back()
{
    Redirect::back();
    die();
}

function assets($target)
{
    return "/assets/$target";  
}