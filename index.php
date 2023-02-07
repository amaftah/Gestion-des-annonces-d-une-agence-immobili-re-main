<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

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
    
      $sql = "INSERT INTO annonce (Titre, Image, Description, Superficie, Adresse, Montant, Type_annonce)
      VALUES ('$titre', '$image', '$description', '$superficie', '$adresse', '$montant', '$type_annonce')";
    
      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    
    
    

    // Select the database
    mysqli_select_db($conn, 'gestion_d_annonce');

    
    //if (mysqli_query($conn, $sql)) {
  echo "Table annonce created successfully";
    //} else {
      //echo "Error creating table: " . mysqli_error($conn);
    //}

    //mysqli_close($conn);
    ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    

<header>
    <nav class="navbar navbar-light bg-primary full">
     <a class="navbar-brand" href="#">
     <img src="./img/308936.svg" width="30" height="30" class="d-inline-block align-top" alt="">
     Bootstrap</a>
    </nav>
    </header>

    <section>
      <div class="container-fluid">
      <img src="./img/Ocean-Inspired Shades of Blue Branding for Blue Ocean Travel Design (1).jfif" width="100%" height="100%" alt="Responsive image">
      </div>
      <div class="row">
      <div class="mt-4 p-5 bg-primary text-white rounded">
    
      <h1>Jumbotron Example</h1>
      <p>Lorem ipsum...</p>
      <div class="card" style="width:400px">
      <img class="card-img-top" src="img_avatar1.png" alt="Card image">
      <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text.</p>
      <a href="#" class="btn btn-primary">See Profile</a>
      </div>
    
      </div>
      <div class="card" style="width:400px">
      <img class="card-img-top" src="img_avatar1.png" alt="Card image">
      <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text.</p>
      <a href="#" class="btn btn-primary">See Profile</a>
      </div>
    
      </div>
      <div class="card" style="width:400px">
      <img class="card-img-top" src="img_avatar1.png" alt="Card image">
      <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text.</p>
      <a href="#" class="btn btn-primary">See Profile</a>
      </div>
    
      </div>
      </div>
      </div>
    </section>






    
</body>
</html>