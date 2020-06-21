<?php
$servername = "localhost";
$username = "root";
// $username = "printstore_user";
// $password = "slayer102";
$password = "";

//kIx@4YleCK
$dbname = "printstore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//FTP password - vpBfB8loQZ4X