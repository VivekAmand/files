<?php
// MySQLi configuration
$servername = "localhost";
$username = "root";
$password = "root";
$database = "customers";

// Create a new MySQLi connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Read the SQL script file
$sqlScript = file_get_contents('sql.sql');

// Execute the SQL script
if ($mysqli->multi_query($sqlScript)) {
    echo "SQL script executed successfully.";
} else {
    echo "Error executing SQL script: " . $mysqli->error;
}

// Close the connection
$mysqli->close();
