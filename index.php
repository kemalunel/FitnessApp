
<!DOCTYPE html>
<html>
<head>
	<title>Fitness App. Create Exercises</title>
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

</style>

</head>
<body>
<div class="container">

<!-- Create Form for Registration -->


<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
<!-- Action on the same page -->

  
  	<center>
  		<img src="image/image1.jpg">
    <h1>Fitness Membership Register Form</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>


    <label for="username"><b>Name:</b></label>
    <input type="text" placeholder="Enter your name" name="name" required><br><br>

    <label for="surname"><b>Surname:</b></label>
    <input type="text" placeholder="Enter your surname" name="surname" required><br><br>

    <label for="surname"><b>Username:</b></label>
    <input type="text" placeholder="Enter your username" name="user_name" required><br><br>

    <label for="psw"><b>Password:</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required><br><br>

      <label for="length"><b>Length:</b></label>
  <input type="text" id="length" name="length" placeholder="Enter your lenght"><br><br>
  <label for="weight"><b>Weight:</b></label>
  <input type="text" id="weight" name="weight" placeholder="Enter your weight"><br><br>

    <label for="sex"><b>Sex:</b></label>

 <select id="sex" name="sex">
    <option value="male">Male</option>
    <option value="female">Female</option>

  </select> <br><br>
  <label for="age"><b>Age:</b></label>

  <input type="text" id="age" name="age"  placeholder="Enter your age"><br><br>
  <label for="body"><b>Choose your desired body shape:</b></label>
  <select id="body" name="body">
    <option value="Weight loss">Weight loss</option>
    <option value="Body building">Body building</option>
    <option value="Maintaining body mass index">Maintaining body mass index</option>

  </select> <br>
    <hr>
    

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="containersignin"><center>




   <?php

// Information about Host(Server)

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "FitnessAccounts";

// Create Connection 
$conn = new mysqli($servername,$username,$password,$dbname);

// Check Connection
if ($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
}

// Get Data from Form through REQUEST_METHOD 

// Post value must be equal to input's name value

 if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $name=$_POST['name'];
            $surname=$_POST['surname'];
            $user_name=$_POST['user_name'];
            $pass=$_POST['pass'];
            $length = $_POST['length'];
            $weight = $_POST['weight'];
            $sex = $_POST['sex'];
            $age = $_POST['age'];
            $body = $_POST['body'];


            // SQL command is upload to AccountsRegister table and data is mapped to table values.


          $sql = "INSERT INTO AccountsRegister (id, name, surname, username, password, length, weight, sex, age, body) VALUES (NULL,'$name', '$surname', '$user_name','$pass', '$length', '$weight', '$sex', '$age', '$body')";

// If the Registration complete, This message output on the webpage.
if (mysqli_query($conn, $sql)) {
      echo "Account Created Successfully!";
}

        }

       
    ?>
    <p>Already have an account? <a href="sign-in.php">Sign in</a>.</p>
    <p><a href="admin.php">Login Admin</a></p>
    </center>
  </div>

</form>

</center>



</body>
</html>

