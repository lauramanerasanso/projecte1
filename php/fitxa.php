<?php
    session_start();

    $traduccions = [["Afegir a la cistella","Detalls producte"],["Añadir a la cesta","Detalles producto"],["Add to cart","Product details"]];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
    <?php if($_SESSION['lang']=='EN'){ echo $traduccions[2][1];}else if($_SESSION['lang']=='ES'){ echo $traduccions[1][1];}else{echo $traduccions[0][1];} ?>
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
            <?php
            include '../login.php';

            $conn = new mysqli($servername, $username, $password, $dbname);
                
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $id_get = $_GET['id'];

            $sql = "SELECT productes.id as id, prod_lang.trad_desc as descripcio, prod_lang.trad_nom as nom, productes.preu as preu from prod_lang join productes ON productes.id = prod_lang.id_prod where prod_lang.idioma='".$_SESSION['lang']."' and productes.id=$id_get;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $nom = $row['nom'];
                    $desc = $row['descripcio'];
                    $preu = $row['preu'];
            ?>
                    <div class='col-6'>
                            <img class='img-fluid' src='../imatges/<?php echo $id ?>.jpg' alt='<?php echo $nom ?>' width='100%'>
                    </div>
                    <div class='col-6'>
                            <h2><?php echo $nom ?></h2>
                            <h4><?php echo $preu ?> EUR</h4>
                            <br>
                            <h6><?php echo $desc ?></h6>
                            <br>                 
                            <a href='addCart.php?id=<?php echo $id ?>' class='btn btn-outline-info btn-lg btn-block'>
                                <?php if($_SESSION['lang']=='EN'){ echo $traduccions[2][0];}else if($_SESSION['lang']=='ES'){ echo $traduccions[1][0];}else{echo $traduccions[0][0];} ?>
                            </a>
                    </div>
            <?php
              }
            } else {
                  echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
