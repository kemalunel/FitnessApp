<?php


// Information MYSQL SERVER OF LOCALHOST
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FitnessAccounts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// sql to create table
$sql = "CREATE TABLE AccountsRegister (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
surname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
length VARCHAR(30) NOT NULL,
weight VARCHAR(30) NOT NULL,
sex VARCHAR(30) NOT NULL,
age VARCHAR(30) NOT NULL,
body VARCHAR(30) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if ($conn->query($sql) === TRUE) {
  echo "Table FitnessAccounts created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();





?>