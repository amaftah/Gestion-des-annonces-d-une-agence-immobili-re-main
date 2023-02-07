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






