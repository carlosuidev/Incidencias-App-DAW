<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "incidencias_iespb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    $correo = $_REQUEST['correo'];
    $sql = "SELECT * FROM profesores where correo='$correo'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "[{\"msg\": \"existe\"}]";
    } else {
        echo "[{\"msg\": \"no_existe\"}]";
    }
    $conn->close();
} catch (\Throwable $th) {
    echo "[{\"msg\": \"error\"}]";
}

?>