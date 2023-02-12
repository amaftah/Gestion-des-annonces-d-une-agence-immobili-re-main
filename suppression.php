<?php include("./connexion.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
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
                    
                </div>
            </nav>
       </div>
    </header>
        
        <main class="container-fluid pt-5">
            <div class="container pt-5 bg-light.bg-gradient">
                <div class="d-flex flex-column justify-content-center align-items-center pt-5">
                    <h2>Voulez vous supprimer l'annoonce N°</h2>
                    <div class="row">
                        <div class="col mt-2">
                            <button class="btn btn-dark">Annuler</button>
                            <button class="btn btn-danger">Confirmer</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
           

        




        <script defer src="./script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    </body>
</html>