<?php


$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername,$username,$password);

// Check Conneciton
if ($conn->connect_error){
	die("Connection Error: ".$conn->connect_error);
}

// Create Database
$sql = "CREATE DATABASE FitnessAccounts";
if ($conn->query($sql) == TRUE) {
	echo "Database created successfully";
}else{
	echo "Error Creating Database: ". $conn->error;
}

$conn->close();




?>