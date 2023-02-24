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
    $id = $_REQUEST['id'];
    $sql = "UPDATE incidencias SET estado='ARCHIVADA' WHERE id_incidencia=$id";

    if ($conn->query($sql) === TRUE) {
        header('historial_incidencias.php');
    } else {
        header('historial_incidencias.php');
    }
} catch (\Throwable $th) {
    // error
}

?>