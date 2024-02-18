<?php

if (!isset($_GET['page'])){
    include_once 'views/home.php';
    return;
}

if(!file_exists('views/'.$_GET['page'].'.php')){
    include_once 'views/home.php';
    return;
}

include 'views/'.$_GET['page'].'.php';