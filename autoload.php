<?php

//Our autoloader function.
function autoloader($className)
{

    $class = __DIR__. "/".$className.".php";
    if(file_exists($class)){
        include $class;
    }
}

//Tell PHP what our autoloading function is.
spl_autoload_register('autoloader');
