<?php
    session_start();

    $traduccions = [["Producte", "Preu unitari", "Quantitat", "Continuar comprant", "Acabar i pagar", "Carretó"],["Producto", "Precio unitario", "Cantidad", "Seguir comprando", "Terminar y pagar", "Carrito"],["Product", "Unit price", "Quantity", "Continue shopping", "Finish and pay", "Cart"]];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
    <?php if($_SESSION['lang']=='EN'){ echo $traduccions[2][5];}else if($_SESSION['lang']=='ES'){ echo $traduccions[1][5];}else{echo $traduccions[0][5];} ?>
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>

    </style>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <a class="btn btn-dark" href="../index.php" role="button"><i class="fas fa-arrow-left"></i></a>
    <div class="container">
        <div class="row">
            <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col-2">#</th> 
                            <th scope="col-5">
                                <?php if($_SESSION['lang']=='EN'){ echo $traduccions[2][0];}else if($_SESSION['lang']=='ES'){ echo $traduccions[1][0];}else{echo $traduccions[0][0];} ?>
                            </th>
                            <th scope="col-3">
                                <?php if($_SESSION['lang']=='EN'){ echo $traduccions[2][1];}else if($_SESSION['lang']=='ES'){ echo $traduccions[1][1];}else{echo $traduccions[0][1];} ?>
                            </th>
                            <th scope="col-2">
                                <?php if($_SESSION['lang']=='EN'){ echo $traduccions[2][2];}else if($_SESSION['lang']=='ES'){ echo $traduccions[1][2];}else{echo $traduccions[0][2];} ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
        <?php


            if(isset($_SESSION['carreto'])){
            
                include '../login.php';

                $conn = new mysqli($servername, $username, $password, $dbname);
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                for( $i = 0 ; $i < count($_SESSION['carreto']) ; $i++){


                    $sql = "SELECT productes.id as id, prod_lang.trad_nom as nom, productes.preu as preu from prod_lang join productes ON productes.id = prod_lang.id_prod where prod_lang.idioma='".$_SESSION['lang']."' and productes.id=". $_SESSION['carreto'][$i][0] . ";";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0){

                        while($row = $result->fetch_assoc()){
                            $nom = $row['nom'];
                            $id = $row['id'];
                            $preu = $row['preu'];
                            
                            ?>
                            <tr>
                                <th scope="row"><?php echo $id ?></th>
                                <td><?php echo $nom ?></td>
                                <td><?php echo $preu ?></td>
                                <td><?php echo $_SESSION['carreto'][$i][1]?></td>
                            </tr>

                            <?php

                        }
                    }
                }
                
            }

        ?>

                </tbody>
            </table>
        </div>
    </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <a href='../index.php' class='btn btn-dark btn-lg btn-block'>
                            <?php if($_SESSION['lang']=='EN'){ echo $traduccions[2][3];}else if($_SESSION['lang']=='ES'){ echo $traduccions[1][3];}else{echo $traduccions[0][3];} ?>
                        </a>
                    </div>
                    <div class="col-sm">
                        <form action='destroy_sess.php'>
                            <input type="submit" class="btn btn-info btn-lg btn-block" name="sessDestroy" value="<?php if($_SESSION['lang']=='EN'){ echo $traduccions[2][4];}else if($_SESSION['lang']=='ES'){ echo $traduccions[1][4];}else{echo $traduccions[0][4];} ?>"/>
                        </form>
                    </div>
                </div>
            </div>
            

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>