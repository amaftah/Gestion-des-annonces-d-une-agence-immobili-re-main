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
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    </head>
    <body>
           
                <form action="" method="POST">
                    <input type="text" name="titre" placeholder="Titre">
                    <input type="file" name="image" placeholder="Image">
                    <input type="text" name="description" placeholder="Description">
                    <input type="text" name="superficie" placeholder="Superficie">
                    <input type="text" name="adresse" placeholder="Adresse">
                    <input type="text" name="montant" placeholder="Montant">
                    <input type="text" name="type_annonce" placeholder="Type_annonce">
                    <input type="submit" name="submit" value="submit">
                    <input type="button" name="modify" value="modify">
                    <input type="button" name="delete" value="delete">
                </form>
                
    </body>
</html>
