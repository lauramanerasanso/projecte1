<?php
    include '../login.php';
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
      
    if(isset($_POST['nom']) &&  isset($_POST['desc']) && isset($_POST['preu'])){
        $nom=$_POST['nom'];
        $desc=$_POST['desc'];
        $preu=$_POST['preu'];
      
        $sql = "INSERT INTO productes (nom, descripcio, preu) VALUES ('$nom', '$desc', '$preu')";
        $conn->query($sql);

        $sql2 = "SELECT max(id) as id FROM productes";
        $result=$conn->query($sql2);

        if ($result->num_rows == 1){
            $id = $result->fetch_assoc()["id"];

            $target_dir = $_SERVER["DOCUMENT_ROOT"] . "/imatges/" .$id.".jpg";
            $nomImg=$_FILES['art_img']['name'];
            $tmpImg=$_FILES['art_img']['tmp_name'];
            if(is_uploaded_file($tmpImg)){
                copy($tmpImg,$target_dir);
            }

        }
    }

        

    $conn->close();

    header('Location: ../index.php');
?>