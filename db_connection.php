<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bmi";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die("Connecntion Failed" . mysqli_connect_error());

    } else {
        echo "connection successfully!";
    }

?>