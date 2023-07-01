<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }


    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `manali_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `Date&time`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
   


    if($con->query($sql) == true){
          $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

// Connection close
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Manali">
    <div class="popup" id="popup">
        <img src="tick.png">
        <h2>Thank you!</h2>
        <P>Your details has been suceesfully Submitted. Thanks!</P>
        <button type= "submit" class="button" onclick="closePopup()">OK</button> 
    </div>
    <div class="container">
        <h1>Welcome to Manali Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
      
        <form >
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button type="submit" class="btn" onclick="openPopup()">Submit</button> 
        </form>
    </div>
    <script>
          let popup = document.getElementById("popup");

            function openPopup(){
              popup.classList.add("open-popup");
             }
            //  function closePopup(){
            //   popup.classList.remove("close-popup");
            //  }
         
    </script>
    
</body>
</html>