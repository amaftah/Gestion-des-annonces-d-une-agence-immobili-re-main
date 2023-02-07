<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $database = "gestion_d_annonce";
    $con = mysqli_connect($servername, $username, $password, $database);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM `annonces 2`d";
    $data = mysqli_query($con, $sql);
    $line = mysqli_fetch_assoc($data);
    echo $line["id"];
    echo $line["titre"];
    echo $line["image"];
    echo $line["discription"];
    echo $line["Superficie"];
    echo $line["adresse"];
    echo $line["montant"];
    echo $line["type"];
    mysqli_close($con);

    if (isset($_POST['submit'])) {
        $titre = mysqli_real_escape_string($con, $_POST['titre']);
        $image = mysqli_real_escape_string($con, $_POST['image']);
        $description = mysqli_real_escape_string($con, $_POST['discription']);
        $superficie = mysqli_real_escape_string($con, $_POST['superficie']);
        $adresse = mysqli_real_escape_string($con, $_POST['adresse']);
        $montant = mysqli_real_escape_string($con, $_POST['montant']);
        $type_annonce = mysqli_real_escape_string($con, $_POST['type_annonce']);

        $sql = "INSERT INTO annonce (Titre, Image, Description, Superficie, Adresse, Montant, Type_annonce) VALUES ('$titre', '$image', '$description', '$superficie', '$adresse', '$montant', '$type_annonce')";
        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    if (isset($_POST['delete'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $sql = "DELETE FROM annonce WHERE Identifiant = '$id'";
        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    }
    if (isset($_POST['Modify'])) {
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $titre = mysqli_real_escape_string($con, $_POST['titre']);
        $image = mysqli_real_escape_string($con, $_POST['image']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $superficie = mysqli_real_escape_string($con, $_POST['superficie']);
        $adresse = mysqli_real_escape_string($con, $_POST['adresse']);
        $montant = mysqli_real_escape_string($con, $_POST['montant']);
        $type_annonce = mysqli_real_escape_string($con, $_POST['type_annonce']);
        $sql = "UPDATE annonce SET Titre = '$titre', Image = '$image', Description = '$description', Superficie = '$superficie', Adresse = '$adresse', Montant = '$montant', Type_annonce = '$type_annonce' WHERE Identifiant = '$id'";
        if (mysqli_query($con, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }

    }
    









?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affichage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/regular.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/v4-shims.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/v4-shims.css">

    
</head>
<body>

<header class="container-fluid bg-secondary fixed-top mb-1">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark py-2">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="./img/my-home-low-resolution-logo-color-on-transparent-background.png" alt="logo" width="120">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-light">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#Annonce">Annonces</a>
                                </li>
                                <li class="nav-item">
                                    <a tupe"button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#AjoutModal"> + Ajouter une Annonce</a>
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
                <form class="row row-cols-lg-3" action="#">
                    <div class="col">
                        <h5 for="type">Categorie</h5>
                        <select class="form-select" aria-label="type">
                            <option value="Location">Location</option>
                            <option value="Vente">Vente</option>
                        </select>
                    </div>

                    <div class="col">
                        <h5>Prix : </h5>
                        <div class="d-flex gap-1">
                            <input type="number" class="form-control" placeholder="Min" aria-label="Min" min="0">
                            <input type="number" class="form-control" placeholder="Max" aria-label="Max" min="0">
                        </div>
                    </div>
                    
                    <div class="col d-flex align-items-end">
                        <button class="btn btn-dark">Chercher</button>
                    </div>
                </form>
            </section>

            <section class="container mt-5" id="Annonce">
                <h2>Liste des Annonces disponible : </h2>
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
                  if(isset($_POST['Modify'])) {
                      $titre = mysqli_real_escape_string($conn, $_POST['titre']);
                      $image = mysqli_real_escape_string($conn, $_POST['image']);
                      $description = mysqli_real_escape_string($conn, $_POST['description']);
                      $superficie = mysqli_real_escape_string($conn, $_POST['superficie']);
                      $adresse = mysqli_real_escape_string($conn, $_POST['adresse']);
                      $montant = mysqli_real_escape_string($conn, $_POST['montant']);
                      $type_annonce = mysqli_real_escape_string($conn, $_POST['type_annonce']);
                      $id = mysqli_real_escape_string($conn, $_POST['id']);
                      $sql = "UPDATE annonce SET Titre = '$titre', Image = '$image', Description = '$description', Superficie = '$superficie', Adresse = '$adresse', Montant = '$montant', Type_annonce = '$type_annonce' WHERE id = '$id'";
                      if (mysqli_query($conn, $sql)) {
                          echo "New record created successfully";
                      } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }
                  }
                  if(isset($_POST['Delete'])) {
                      $id = mysqli_real_escape_string($conn, $_POST['id']);
                      $sql = "DELETE FROM annonce WHERE id = '$id'";
                      if (mysqli_query($conn, $sql)) {
                          echo "New record created successfully";
                      } else {
                          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                      }
                  }
                  mysqli_close($conn);
                  
              ?>
                <!-- Ajout Modal -->
                <div class='modal fade' id='AjoutModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Ajouter une nouvelle annonce</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <form action='' method='POST'>
                                <div class='mb-3'>
                                    <label for='titre' class='form-label'>Titre d'annonce :</label>
                                    <input type='text' class='form-control' id='titre' name='titre1'>
                                </div>
                                <div class='mb-3'>
                                    <label for='image' class='form-label'>Chemin d'image: </label>
                                    <input type='text' class='form-control' id='image' name='image'>
                                </div>
                                <div class='mb-3'>
                                    <label for='Description' class='form-label'>Description : </label>
                                    <textarea type='text' class='form-control' id='Description' name='description'></textarea>
                                </div>
                                <div class='mb-3'>
                                    <label for='Adresse' class='form-label'>Adresse : </label>
                                    <input type='text' class='form-control' id='Adresse' name='adresse'>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col'>
                                        <label for='Superficie' class='form-label'>Superficie : </label>
                                        <input type='number' class='form-control' id='Superficie' name='superficie'>
                                    </div>
                                    <div class='col'>
                                        <label for='Montant' class='form-label'>Montant : </label>
                                        <input type='number' class='form-control' id='Montant' name='montant'>
                                    </div>
                                    <div class='col'>
                                        <label for='date' class='form-label'>Date : </label>
                                        <input type='date' class='form-control' id='date' name='date'>
                                    </div>
                                </div>
                                <div class='mb-3'>
                                    <label for='Type' class='form-label'>Type d'annonce : </label>
                                    <select class='form-select' aria-label='type' id='Type' name='type'>
                                        <option value='Location'>Location</option>
                                        <option value='Vente'>Vente</option>
                                    </select>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='submit' class='btn btn-dark w-100' name='ajouter'>Ajouter</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                if(isset($_POST['ajouter'])){//lorsque je clik sur le bouttant ajouter
                    $titre =$_POST["titre1"];
                    $img = $_POST["image"];
                    $desc = $_POST["description"];
                    $sup =$_POST["superficie"];
                    $add = $_POST["adresse"];
                    $montant = $_POST["montant"];
                    $date = $_POST["date"];
                    $type = $_POST["type"];

                    $requeteAjout = "INSERT INTO `annonce` (`titre`, `image`, `discription`, `Superficie`, `Adresse`, `Montant`, `Date`, `Type`) VALUES ('$titre', '$img', '$desc', '$sup', '$add','$montant', '$date', '$type')"; // il faut qelle soit ici et pas dans l'autre fichier
                    $dbco->exec($requeteAjout);
                }
                
                 ?>
                            
                        
                  
                <!-- Modification Modal -->
                <div class='modal fade' id='ModificationModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Modification de l'annonce N°</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <form action='index.php' method='POST'>
                                <div class='mb-3'>
                                    <label for='titre' class='form-label'>Titre d'annonce :</label>
                                    <input type='text' class='form-control' id='titre' name='titre'>
                                </div>
                                <div class='mb-3'>
                                    <label for='image' class='form-label'>Chemin d'image: </label>
                                    <input type='text' class='form-control' id='image' name='image'>
                                </div>
                                <div class='mb-3'>
                                    <label for='Description' class='form-label'>Description : </label>
                                    <textarea type='text' class='form-control' id='Description' name='description'></textarea>
                                </div>
                                <div class='mb-3'>
                                    <label for='Adresse' class='form-label'>Adresse : </label>
                                    <input type='text' class='form-control' id='Adresse' name='adresse'>
                                </div>
                                <div class='row mb-3'>
                                    <div class='col'>
                                        <label for='Superficie' class='form-label'>Superficie : </label>
                                        <input type='number' class='form-control' id='Superficie' name='Superficie'>
                                    </div>
                                    <div class='col'>
                                        <label for='Montant' class='form-label'>Montant : </label>
                                        <input type='number' class='form-control' id='Montant' name='Montant'>
                                    </div>
                                    <div class='col'>
                                        <label for='Adresse' class='form-label'>Date : </label>
                                        <input type='date' class='form-control' id='Date' name='date'>
                                    </div>
                                </div>
                                <div class='mb-3'>
                                    <label for='Type' class='form-label'>Type d'annonce : </label>
                                    <select class='form-select' aria-label='type' id='Type' name='type'>
                                        <option value='Location'>Location</option>
                                        <option value='Vente'>Vente</option>
                                    </select>
                                </div>
                            
                        </div>
                        <div class='modal-footer'>
                            <button type='submit' class='btn btn-success' name='modifier'>Modifier</button>
                        </div>
                        </form>
                        <?php 
                        if(isset($_POST["modifier"])){
                            
                        }
                        ?>
                        </div>
                    </div>
                </div>
               <!-- SuppressionModal -->
                <div class='modal fade' id='SuppressionModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Voulez-Vous Supprimer Cette Annonce ?</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-footer'>
                            <form action="" method="POST">
                            <button type='submit' class='btn btn-danger' name='supprimer'>Confirmer</button>
                            </form>
                    <?php 
                        if(isset($_POST["supprimer"])){
                            $requeteSupprimer = "DELETE FROM annonce WHERE IdAnnonce = '$idAnn'";//''ils sont importantes ou il supprime la dernier ligne
                            $resultatRqSupprimer = $dbco->prepare($requeteSupprimer);
                            $resultatRqSupprimer ->execute();
                        }
                    ?>
                        </div>
                    <!-- Modification Modal -->
                    <div class='modal fade' id='ModificationModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal title</h1>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
 
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary'>Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
 
        </div>
            </section>

            
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    
</body>
</html>