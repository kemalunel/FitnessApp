<?php
include "config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: sign-in.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: sign-in.php');
}
// That shows all users of the database's table
$sql = "SELECT id, name, surname, username, age, sex, length, weight, body FROM AccountsRegister";
$result = $con->query($sql);

?>

<!doctype html>
<html>
    <head>
        <style>
        .container {
            margin-top: 80px;
        }

.containersignin{
    margin-bottom: 200px;
}


body {
  background-color: pink;

}   
img{
    width: 170px;
    height: 170px;
}

</style>
    </head>
    <body>
        <center>
        <h1>Welcome to Admin Page</h1>
        <h3>Registered users appear below.</h3>

    <?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // Writing all information about reigstered users
        
        echo "ID: ".$row['id']." Name: ".$row['name']." Surname: ".$row['surname']." Age: ".$row['age']." Sex: ".$row['sex']." Length: ".$row['length']." Weight: ".$row['weight']." Aim: ".$row['body']."<br>";
      
       
    
    

  }
} else {
  echo "0 results";
}



  ?>

  







        <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
    </center>
    </body>
</html>