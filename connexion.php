<?php
   $severname ="localhost";
   $username = "root";
   $password = "";

   $conn = mysqli_connect($severname, $username, $password, 'gestion_d_annonce');
    if(!$conn){
         die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM annonce";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            
        }
    } else {
        echo "0 results";
    }

?>