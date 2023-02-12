<?php include 'connexion.php'; ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>My Home</title>
</head>
<body>

    <header class="container-fluid bg-dark  mb-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a class="navbar-brand" href="#">
                        <img src="./img/my-home-low-resolution-logo-color-on-transparent-background.png" alt="logo" width="120">
                    </a>
                    <h1 class="text-center text-white">Gestion des annonces d'une agence immobilière</h1>   
                </div>
                <nav class="navbar navbar-expand-lg navbar-dark py-2">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-light">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#Annonce">Annonces</a>
                                </li>
                                <li class="nav-item">
                                    <a href="affichage.php" type"button" class="btn btn-outline-light"> + Ajouter une
                                        Annonce</a>
                                </li>
                            </ul>
                        </div>
                    
                </div>
            </nav>
       </div>
    </header>

    <main class="container-fluid pt-5">
        <section class="container pt-5">
            <h2 class="pt-5">Filtrer la liste des annonces !</h2>
            <form class="row row-cols-lg-3" action="index.php" methode="POST">
                <div class="col">
                    <h5 for="type">Categorie</h5>
                    <select class="form-select" aria-label="type" name="categorie">
                        <option value=""></option>
                        <option value="Location">Location</option>
                        <option value="Vente">Vente</option>
                    </select>
                </div>

                <div class="col">
                    <h5>Prix : </h5>
                    <div class="d-flex gap-1">
                        <input type="number" class="form-control" placeholder="Min" name="Min" min="0">
                        <input type="number" class="form-control" placeholder="Max" name="Max" min="0">
                    </div>
                </div>

                <div class="col d-flex align-items-end">
                    <button class="btn btn-dark" type="submit" name="chercher">Chercher</button>
                </div>
            </form>
        </section>
        <?php
        $conn = mysqli_connect("localhost","root","","gestion_d_annonce");
        
        if(isset($_POST['chercher'])){
            $categorie = $_POST['categorie'];
            $Min = $_POST['Min'];
            $Max = $_POST['Max'];
            $sql = "SELECT * FROM annonce WHERE Type_annonce = '$categorie' AND Montant BETWEEN '$Min' AND '$Max'";
            $result = mysqli_query($conn, $sql);
        }else{
            $sql = "SELECT * FROM annonce";
            $result = mysqli_query($conn, $sql);
        }
        ?>

        <section class="container mt-5" id="Annonce">
            <h2>Liste des Annonces disponible : </h2>
            <?php
                    if(mysqli_num_rows($result)> 0 ){
                        echo "<div class='row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 mt-5'>";
                        while($row = mysqli_fetch_assoc($result)){
                            echo("
                                <div class='col mt-2'>
                                    <div class='card'>
                                        <img src='./img/".$row["Image"]."' class='card-img-top' alt='app'>
                                        <div class='card-body'>
                                            <h5 class='card-title'>".$row["Titre"]." à Louer de ".$row["Superficie"]." m²</h5>
                                            <div class='d-flex justify-content-between align-items-center'>
                                                <h5 class='text-danger fs-3'>".$row["Montant"]." DH</h5>
                                            </div>
                                            <p class='card-text'>".$row["Adresse"]."</p>
                                            <p class='card-text'>Publié le ".$row["Date_annonce"].".</p>
                                            <form action='' method='POST'>
                                            <a href='modification.php' class='modifierCarteId btn btn-success'>Modifier</a>
                                            <a href='suppression.php' class='supprimerCarteId btn btn-danger'>Supprimer</a> 
                                            </form>
                                        </div>
                                    </div>
                                </div>"
                            );
                        }
                    }
                        echo "</div>";



                       
                ?>
        </section>
    </main>
    <script defer src= "./script.js"></script>
</body>
</html