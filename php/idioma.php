<?php
session_start();

if(isset($_SESSION['lang'])){
    if(isset($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];
    }
}else{
    $_SESSION['lang']='ca';
}

header('Location: '.$_SERVER['REQUEST_URI']);
?>