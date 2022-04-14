<?php
include "config.php";

// Check user login or not and start session
if(!isset($_SESSION['uname'])){
    header('Location: sign-in.php');
}

// logout session
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: sign-in.php');
}

// With Select SQL Command Get information from database which username equal to session's username
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
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-left: 10px;
  background-color: white;

}

.title {
  color: grey;
  font-size: 18px;
}

img {

    width:150px;
    height: 150px;

    
   
    
}


</style>
    </head>
    <body>

        <div class="container">

            <div class="card">

        <center>
<div id="icon"><img src="image/icon.png"></div>
        <h2>Welcome to Homepage <?php echo $_SESSION['uname']; ?></h2><hr>
       

    <?php
// Writing information from the Database table
if ($result->num_rows > 0) {

  // output data of each row

 // Using while loop for writing each row of the table
  while($row = $result->fetch_assoc()) {
    if ($_SESSION['uname'] == $row['username']) {
  
echo "Name :".$row['name']."<br>";
        echo "Surname :".$row['surname']."<br>";
        echo "Age :".$row['age']."<br>";
        echo "Gender :".$row['sex']."<br>";
        echo "Length :".$row['length']."<br>";
        echo "Weight :".$row['weight']."<br>";
        echo "Target :".$row['body'];


        // Using Array shows the picture for user's decision
        if ($row['body'] == "Weight loss") {
    echo "<hr>Your Target is : ".$row['body']. " <br>These are special exercises for you"."<br><br>";


$pictures = array('image/1.jpg','image/2.jpg','image/3.jpg','image/4.jpg','image/5.jpg','image/6.jpg','image/7.jpg');
for($i=0;$i<7;$i++)
echo    "<img src='$pictures[$i]'>";
    
}

elseif ($row['body'] == "Body building") {
    echo "<hr>Your Target is : ".$row['body']. " <br>These are special exercises for you"."<br><br>";


    $pictures = array('image/8.jpg','image/9.jpg','image/10.jpg','image/11.jpg','image/12.jpg','image/13.jpg','image/14.jpg','image/15.jpg');
for($i=0;$i<8;$i++)
echo    "<img src='$pictures[$i]'>";

    

    }
    elseif ($row['body'] == "Maintaining body mass index") {
    echo "<hr>Your Target is : ".$row['body']. " <br>These are special exercises for you"."<br><br>";


    $pictures = array('image/16.jpg','image/17.jpg','image/18.jpg','image/19.jpg','image/20.jpg','image/21.jpg','image/22.jpg');
for($i=0;$i<7;$i++)
echo    "<img src='$pictures[$i]'>";


    }












    }



  }
  
} else {
  echo "0 results";
}






    ?>








        <form method='post' action="">

            <input type="submit" value="Logout" name="but_logout"> <hr

        </form>
    </center>



    </body>
</html>