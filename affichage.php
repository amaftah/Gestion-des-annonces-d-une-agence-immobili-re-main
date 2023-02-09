<?php
                $servername = "localhost";
                $username = "root";
                $password = "";
            
                // Create connection
                $conn = mysqli_connect($servername, $username, $password , 'gestion_d_annonce');
            
                // Check connection
                if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                }
                if(isset($_POST['submit'])) {
                $titre = mysqli_real_escape_string($conn, $_POST['titre']);
                $image = mysqli_real_escape_string($conn, $_POST['image']);
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $superficie = mysqli_real_escape_string($conn, $_POST['superficie']);
                $adresse = mysqli_real_escape_string($conn, $_POST['adresse']);
                $montant = mysqli_real_escape_string($conn, $_POST['montant']);
                $type_annonce = mysqli_real_escape_string($conn, $_POST['type_annonce']);
            
                    $sql = "INSERT INTO annonce (Titre, Image, Description, Superficie, Adresse, Montant, Type_annonce) VALUES ('$titre', '$image', '$description', '$superficie', '$adresse', '$montant', '$type_annonce')";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                if(isset($_POST['delete'])) {
                    $sql = "DELETE FROM annonce WHERE Identifiant = 1";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                if(isset($_POST['update'])) {
                    $sql = "UPDATE annonce SET Titre = 'test' WHERE Identifiant = 1";
                    if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }

                
            ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <header class="container-fluid bg-dark  mb-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <a class="navbar-brand" href="#">
                        <img src="./img/my-home-low-resolution-logo-color-on-transparent-background.png" alt="logo" width="120">
                </a>
                    <h1 class="text-center text-white">Gestion des annonces d'une agence immobilière</h1>
                </div>
            </div>
       </div>
    </header>
    <body>
        <div class="container col-8 ">
            <div class=" row" >
                 <h2> Ajouter une annonce </h2>
                 <p> Remplissez le formulaire ci-dessous pour ajouter une annonce </p>
                <form action="" method="POST">
                    <input type="text" name="titre" placeholder="Titre">
                    <input type="file" name="image" placeholder="Image">
                    <input type="text" name="description" placeholder="Description">
                    <input type="text" name="superficie" placeholder="Superficie">
                    <input type="text" name="adresse" placeholder="Adresse">
                    <input type="text" name="montant" placeholder="Montant">
                    <input type="text" name="type_annonce" placeholder="Type_annonce">
                    <input action="./index.php" type="submit" name="submit" value="submit">  
                    <input type="submit" name="delete" value="delete">
                    <input type="submit" name="update" value="update">
                    <li class="nav-item">
                                <a href="ajout.php" type"button" class="btn btn-outline-light"> + Ajouter une
                                    Annonce</a>
                    </li>
                </form>
                
          </div>
        </div>      
    </body>
</html>
