<?php
session_start();

if(isset($_SESSION['lang'])){
    if(isset($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];
    }
}else{
    $_SESSION['lang']='CA';
}

header('Location: '.$_SERVER['HTTP_REFERER']);
?>