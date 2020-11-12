<?php
session_start();

if (isset($_GET['id'])){

    if (isset($_SESSION['carreto'])){


        $id_get = $_GET['id'];
        $quantitat = 1;
        $esTrobat = false;

        for( $i=0 ; $i < count($_SESSION['carreto']) ; $i++){
            if ($_SESSION['carreto'][$i][0] == $id_get){
                $_SESSION['carreto'][$i][1]++;
                $esTrobat = true;
            }
        }

        if($esTrobat == false){
            $producte = array($id_get, $quantitat);

            array_push($_SESSION['carreto'], $producte);
        }

    }else{
        $_SESSION['carreto'] = array();

        if(isset($_GET['id'])){
            $id_get = $_GET['id'];
            $quantitat = 1;

            $producte = array($id_get, $quantitat);

            array_push($_SESSION['carreto'], $producte);
        }
    }
}

header('Location: ../php/cart.php');

?>