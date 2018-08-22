<?php
$servername = "localhost";
$username = "id6862274_admin007";
$password = "wl007";
$dbname = "id6862274_whitelist_db";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
