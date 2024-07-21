<?php

    include "db_connection.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //check if post data is set

        if(isset($_POST['name']) && isset($_POST['height']) && isset($_POST['weight'])){
            //getting from data
            $name = $_POST['name'];
            $height = $_POST['height'];
            $weight = $_POST['weight'];

            if($height>0) { //ensure na hindi 0 ang height
                //continue to calculate
                $bmi = $weight / ($height * $height);

                //after claculating it will insert to database
                $sql = "INSERT into bmi (name,height,weight,bmi) VALUES ('$name', '$height' , '$weight', '$bmi')";

                //then after that ensures it will add into sql verifying
                if($conn->query($sql) === TRUE) {
                    echo "new record successfully";
                } else {
                    echo "failed to record " . $conn->error . "<br>";
                }
                $conn->close();
            

            //display reslult in php
            echo "name: $name";
            echo "height: $height";
            echo "weight: $weight";
            echo "bmi $bmi";
            //linking to display bmi after adding 
            echo "<br><a href='display_bmi.php'>View all records</a>";

            
            } else{ 
                echo "height must be greater than zero coz who the fuck heights in zero anyway?";

            }
        }else {
            echo "required form data is missing";
            }
    }else {
        echo "invalid request method";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
</head>
<body>
    <h1>BMI Calculator</h1>
    <form action="bmi.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="ex: Joanna" required><br>

        <label for="height">Height (meters):</label>
        <input type="number" step="0.01" name="height" placeholder="2 meters" required><br>

        <label for="weight">Weight (kg):</label>
        <input type="number" step="0.1" name="weight" placeholder="52 kg" required><br>

        <input type="submit" value="Calculate">
    </form>
</body>
</html>
