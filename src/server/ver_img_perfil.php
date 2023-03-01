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
    $id = $_SESSION['id'];
    $query = "SELECT img_perfil FROM profesores WHERE id_profesor=$id";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $contenido = $row['img_perfil'];
        }
    } else {
        echo "0 results";
    }
    
} catch (\Throwable $th) {
    echo $th;
}

?>
