<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "midterm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Checks connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}